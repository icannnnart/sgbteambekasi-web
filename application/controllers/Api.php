<?php
header('Content-Type: application/json; charset=utf-8');

error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class Api extends CI_Controller {

	private $secret_key = "QUpMQjIwMjQhIUJFS0FTSQ==";
	
	public function __construct(){
		parent::__construct();	
		$this->load->model('M_auth');
		$this->load->model('M_db');
		$this->load->model('M_wa');	
	}
	
	public function index()
	{	
		$res = array('status' => false,'msg' => 'invalid query', );
		print_r(json_encode($res));
	}
	public function getAgama()
	{
		$prov = $this->M_db->get_All_data('t_agama');
		$prov = array('status' => true,'data' => $prov, );
		echo json_encode($prov);
	}
	public function getProfesi()
	{
		$prov = $this->M_db->get_All_data('t_profesi');
		$prov = array('status' => true,'data' => $prov, );
		echo json_encode($prov);
	}
	public function getGender()
	{
		$prov = $this->M_db->get_All_data('t_gender');
		$prov = array('status' => true,'data' => $prov, );
		echo json_encode($prov);
	}
	public function getProv()
	{
		$prov = $this->M_db->get_All_data('t_provinsi');
		$prov = array('status' => true,'data' => $prov, );
		echo json_encode($prov);
	}
	public function getKabkot()
	{
		$id = $_GET['id'];
		if (empty($id)) {
			$res = array('status' => false,'msg' => 'invalid query', );
			$res = json_encode($res);
			die($res);
		}
		$prov = $this->M_db->Get_All_byid('t_kabkot','id_provinsi',$id);
		$prov = array('status' => true,'data' => $prov, );
		echo json_encode($prov);
	}
	public function registerMember()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$response = array(
				'status' => false,
				'code' => 405,
				'messages' => 'Method Not Allowed'
			);
			return $this->output
			->set_content_type('application/json')
			->set_status_header(405)
			->set_output(json_encode($response));
		}
		$json = file_get_contents('php://input');
		$data = json_decode($json, true);

		$nama_lengkap = $data['nama_lengkap'];
		$nama_ibu = $data['nama_ibu'];
		$alias_name = $data['alias_name'];
		$jenis_kelamin = $data['jenis_kelamin'];
		$agama = $data['agama'];
		$profesi = $data['profesi'];
		$nik = $data['nik'];
		$nowa = $data['nowa'];
		$media_sosial = $data['media_sosial'];
		$email = $data['email'];
		$alamat = $data['alamat'];
		$provinsi = $data['provinsi'];
		$kabkot = $data['kabkot'];
		$foto_ktp = $data['foto'];
		$prof_tf = $data['prof_tf'];
		$foto_profile = $data['foto_profile'];
		if ($nama_lengkap == NULL or $nama_ibu == NULL or $jenis_kelamin == NULL or $agama == NULL or $profesi == NULL or $nik == NULL or $nowa == NULL or $media_sosial == NULL or $email == NULL or $alamat == NULL or $provinsi == NULL or $kabkot == NULL or $foto_ktp == NULL or $foto_profile == NULL) {
			$response = array(
				'status' => false,
				'code' => 400,
				'messages' => 'parameter null'
			);
			return $this->output
			->set_content_type('application/json')
			->set_status_header(400)
			->set_output(json_encode($response));
		}
		$datasreg = array(
			'form_id ' => 1,
			'foto_profile' => $foto_profile,
			'nama_lengkap' => $nama_lengkap,
			'nama_ibukandung' => $nama_ibu,
			'jenis_kelamin ' => $jenis_kelamin,
			'agama' => $agama,
			'profesi' => $profesi,
			'nik' => $nik,
			'nowa' => $nowa,
			'sosmed' => $media_sosial,
			'email' => $email,
			'alamat' => $alamat,
			'provinsi ' => $provinsi,
			'kabkot ' => $kabkot,
			'file_img' => $foto_ktp,
			'alias_name' => $alias_name,
			'prof_tf' => $prof_tf,
			'nominal' => 100000,
			'status' => 4,

			 );
		$indata = $this->M_db->insert_AllandGetid('t_register_form',$datasreg);
		if ($indata) {
			$prov = array('status' => true,'msg' => 'insert data successfully', );
			$provesi = $this->M_db->Get_user_by_id('t_profesi','id',$profesi);
			$sendwa = $this->M_wa->successRegis($nowa,$nama_lengkap,$email,$provesi->name,$alamat);
			if ($sendwa) {
				//$nm_level
				$provinsi = $this->M_db->Get_user_by_id('t_level_akun','location_id',$kabkot);
				$sendadmin = $this->M_wa->sendNotifAdmin($provinsi->nowa,"ADMIN-$provinsi->name",$email,$provinsi->name,'PENDING DPC',$indata);
				echo json_encode($sendadmin);
			} else {
				print_r('ga iso kirim wa, tapi sukses');
			}
			
			
		} else {
			$response = array(
				'status' => false,
				'code' => 400,
				'messages' => 'parameter null'
			);
			return $this->output
			->set_content_type('application/json')
			->set_status_header(400)
			->set_output(json_encode($response));
		}
		
		//print_r(json_encode($datasreg));
	}
	public function getDataip()
	{
		$ipnya =  $this->input->ip_address();
		if (empty($ipnya)) {
			die('query invalid');
		}
		$datarecord = $this->db->query("SELECT * FROM `t_visitor` WHERE ip_address = '$ipnya' ORDER BY `t_visitor`.`created_at` DESC;")->row();
		if ($datarecord) {
			$tgl = explode(' ', $datarecord->created_at);
			$detailtgl = explode('-',$tgl[0]);
			if ($detailtgl[2] == date('d')) {
				$prov = array('status' => true,'msg' => 'success', );
			} else {
				$prov = array('status' => true,'msg' => 'insert data successfully same'.date('d'), );
				$dataips = $this->_getDataip($ipnya);
				$dataips = json_decode($dataips,true);
				$datasip = array(
					'ip_address' => $ipnya,
					'org' => $dataips['data']['org'],
					'state' => $dataips['data']['region'],
					'country' => $dataips['data']['country'],
					'toin' => 1, );
				$this->M_db->insert_AllandGetid('t_visitor',$datasip);
			}
			print_r(json_encode($prov));
			
			
		} else {
			$dataips = $this->_getDataip($ipnya);
			$dataips = json_decode($dataips,true);
			$datasip = array(
				'ip_address' => $ipnya,
				'org' => $dataips['data']['org'],
				'state' => $dataips['data']['region'],
				'country' => $dataips['data']['country'],
				'toin' => 1, );
			$this->M_db->insert_AllandGetid('t_visitor',$datasip);
			$prov = array('status' => true,'msg' => 'insert data successfully', );
			print_r(json_encode($prov));
		}
		
		
	}
	
	function _getDataip($ip)
	{
		$url = "https://ipinfo.io/widget/demo/$ip";

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		   "accept: */*",
		   "accept-language: en-US,en;q=0.9",
		   "content-type: application/json",
		   "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36",
		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		curl_close($curl);
		return $resp;
	}
}
