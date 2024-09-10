<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_auth');
		$this->load->model('M_db');
		$this->load->library('Email_lib');
		if($this->session->userdata('logged_in') == 2){
			redirect(site_url('auth/login/verification'));
		}elseif($this->session->userdata('logged_in') == null){
			redirect(site_url());
		}
	}
	private function acakC($panjang)
	{
		$karakter= 'qwertyuiopasdfghjklzxcvbnmABCDEFGHIJKLMNOPQRSTUVWXYZ123456789!@#$%*!@#$%*';
		$string = '';
		for ($i = 0; $i < $panjang; $i++) {
			$pos = rand(0, strlen($karakter)-1);
			$string .= $karakter[$pos];
		}
		return $string;
	}

	public function index()
	{
		//$this->M_wa->successRegis('6285161707161','ihsan','ihsan.mmi121@gmail.com','IT Secure','Jl Raya Bekasi Tambun Utara 17510');
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('user_id'));
		$data['title'] = 'Dashboard';
		$data['sub_menu'] = '';
		$data['update_informasi'] = $this->db->query("SELECT * FROM `t_announcement` ORDER BY `t_announcement`.`created_at` DESC")->result_array();
		$donebayar = $this->db->query('SELECT SUM(nominal) AS total_valid FROM t_cashflow WHERE status=1')->row();
		$keluarbayar = $this->db->query('SELECT SUM(nominal) AS total_keluar FROM t_cashflow WHERE status=2')->row();
		$data['sumkas'] = $donebayar->total_valid;
		$data['sumkeluar'] = $keluarbayar->total_keluar;
		$data['sumcashflow'] = $donebayar->total_valid-$keluarbayar->total_keluar;
		$data['counuser'] = $this->M_db->Countdb('t_user');
		$jan = $this->db->query("SELECT IFNULL(SUM(nominal), 0) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%".date('Y')."-01%'")->row();
		$feb = $this->db->query("SELECT IFNULL(SUM(nominal), 0) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%".date('Y')."-02%'")->row();
		$mar = $this->db->query("SELECT IFNULL(SUM(nominal), 0) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%".date('Y')."-03%'")->row();
		$apr = $this->db->query("SELECT IFNULL(SUM(nominal), 0) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%".date('Y')."-04%'")->row();
		$mei = $this->db->query("SELECT IFNULL(SUM(nominal), 0) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%".date('Y')."-05%'")->row();
		$jun = $this->db->query("SELECT IFNULL(SUM(nominal), 0) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%".date('Y')."-06%'")->row();
		$jul = $this->db->query("SELECT IFNULL(SUM(nominal), 0) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%".date('Y')."-07%'")->row();
		$agu = $this->db->query("SELECT IFNULL(SUM(nominal), 0) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%".date('Y')."-08%'")->row();
		$sep = $this->db->query("SELECT IFNULL(SUM(nominal), 0) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%".date('Y')."-09%'")->row();
		$okt = $this->db->query("SELECT IFNULL(SUM(nominal), 0) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%".date('Y')."-10%'")->row();
		$nov = $this->db->query("SELECT IFNULL(SUM(nominal), 0) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%".date('Y')."-11%'")->row();
		$des = $this->db->query("SELECT IFNULL(SUM(nominal), 0) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%".date('Y')."-12%'")->row();
		$data['grafik'] = [$jan->total_valid,$feb->total_valid,$mar->total_valid,$apr->total_valid,$mei->total_valid,$jun->total_valid,$jul->total_valid,$agu->total_valid,$sep->total_valid,$okt->total_valid,$nov->total_valid,$des->total_valid];
		$data['datacashflow'] = $this->db->query("SELECT * FROM `t_cashflow` WHERE created_at LIKE '%".date('Y')."%' ORDER BY `t_cashflow`.`created_at` DESC")->result_array();
		$data['topspend'] = $this->db->query("SELECT id_user, SUM(nominal) as total_spend FROM t_cashflow WHERE status = 1 GROUP BY id_user ORDER BY total_spend DESC LIMIT 1")->row();
		//SELECT t_user.id,t_user.name FROM t_user LEFT JOIN t_cashflow c ON t_user.id = c.id_user AND c.created_at LIKE '%2024%' WHERE c.id_user IS NULL
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/main/index');
		$this->load->view('dashboard/layout/footer');
	}
	public function masterUser()
	{
		if ($this->session->userdata('role')==2) {
			redirect((site_url()));

		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$names = $this->input->post('names');
			$emails = $this->input->post('emails');
			$password = $this->input->post('password');
			$address = $this->input->post('address');
			$link_fb = $this->input->post('link_fb');
			$number = $this->input->post('number');
			$datasmember = array(
				'name' => $names,
				'email' => $emails,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'address' => $address,
				'linkfb' => $link_fb,
				'nowa' => $number,
				'role' => 2,
				 );
			if ($this->M_db->insert_All('t_user',$datasmember)) {
				$response['status'] = 200;
		        $response['message'] = 'Pendaftaran Member Berhasil!';
			} else {
				$response['status'] = 401;
		        $response['message'] = 'Pendaftaran Member Gagal!';
			}
			print_r(json_encode($response));
			
		} else {
			$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('user_id'));
			$data['title'] = 'Master';
			$data['sub_menu'] = 'User';
			$data['data_user'] = $this->M_db->Get_All_byid('t_user','is_active',0);
			$data['pending_user'] = $this->M_db->Get_All_byid('t_user','is_active',1);
			$this->load->view('dashboard/layout/header',$data);
			$this->load->view('dashboard/master/user');
			$this->load->view('dashboard/layout/footer');
		}
	}
	public function approveMember($id)
	{
		$reg = array('is_active' => 0, );
		$this->M_db->update_Data('t_user','id',$id,$reg);
		redirect(site_url('app/master/user'));
	}
	public function masterForm()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('user_id'));
		$data['title'] = 'Master';
		$data['sub_menu'] = 'Form';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/master/index');
		$this->load->view('dashboard/layout/footer');
	}
	public function liveStream()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('user_id'));
		$data['title'] = 'LIVESTREAM';
		$data['sub_menu'] = 'Form';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/main/live');
		$this->load->view('dashboard/layout/footer');
	}
	public function uProfile()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('user_id'));
		$data['title'] = 'Setting';
		$data['sub_menu'] = 'Account';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/main/profile');
		$this->load->view('dashboard/layout/footer');
	}
	private function _sendEmail($email,$msghtml)
	{
		$this->email_lib->Initialize('mail.sgbteambekasi.org','admin@sgbteambekasi.org','X*gIGl@eq&W5',587,'admin@sgbteambekasi.org','ADMIN SGBTEAM BEKASI');
		$this->email_lib->send_Email($email, "Pembuatan Email Akun Official", $msghtml);
	}
	public function masterAccemail()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('user_id'));
		$data['title'] = 'Master';
		$data['sub_menu'] = 'Registrasi Form';
		$data['data_registrasi'] = $this->M_db->get_All_data('t_emailsgb');
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/master/email');
		$this->load->view('dashboard/layout/footer');
	}
	public function prosesAccemail($id)
	{
		$inf = htmlspecialchars($_GET['px']);
		if ($inf==62) {
			$info = $this->M_db->Get_user_by_id('t_emailsgb','id',$id);
			if ($info->is_active == 5) {
				$pwdnya =$this->acakC(12);
				$infoakun = $this->M_db->Get_user_by_id('t_user','id',$info->id_user);
				$msghtml = file_get_contents(base_url('assets/email/new-email.html'));
				$msghtml = str_replace('{{name}}', $infoakun->name, $msghtml);
				$msghtml = str_replace('{{email}}', $info->email, $msghtml);
				$msghtml = str_replace('{{pwd}}', $pwdnya , $msghtml);
				$dataregis = array('pwd' => $pwdnya,'is_active' => 0,'created_by' => $this->session->userdata('user_id'), );
				$sts = $this->M_db->update_Data('t_emailsgb','id',$id,$dataregis);
				if ($sts) {
					$send = $this->_sendEmail($infoakun->email,$msghtml);
					if ($send) {
						echo "sukses";
					} else {
						print_r($send);
					}
					
				} else {
					exit;
				}
			} else {
				exit;
			}
			
			
			
		} else {
			echo 'asd';
		}
		
	}
	public function masterRegform()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('user_id'));
		$data['title'] = 'Master';
		$data['sub_menu'] = 'Registrasi Form';
		$data['data_registrasi'] = $this->M_db->get_All_data('t_register_form');
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/master/register');
		$this->load->view('dashboard/layout/footer');
	}
	public function masterMember()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('user_id'));
		$data['title'] = 'Master';
		$data['sub_menu'] = 'Member';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/master/index');
		$this->load->view('dashboard/layout/footer');
	}
	public function reportVisitor()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('user_id'));
		$data['title'] = 'Report';
		$data['sub_menu'] = 'Visitor';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/main/index');
		$this->load->view('dashboard/layout/footer');
	}
	public function reportRegform()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('user_id'));
		$data['title'] = 'Report';
		$data['sub_menu'] = 'Registrasi Form';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/main/index');
		$this->load->view('dashboard/layout/footer');
	}
	public function reportDpd()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('user_id'));
		$data['title'] = 'Report';
		$data['sub_menu'] = 'DPD';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/main/index');
		$this->load->view('dashboard/layout/footer');
	}
	public function reportDpc()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('user_id'));
		$data['title'] = 'Report';
		$data['sub_menu'] = 'DPC';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/main/index');
		$this->load->view('dashboard/layout/footer');
	}
	public function trxKas()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (!isset($_POST['nominal']) || empty($_POST['nominal'])) {
		        $response['message'] = 'Nominal is required.';
		        echo json_encode($response);
		        exit;
		    }
		    if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
		    	$nominal = $this->input->post('nominal');
		    	$fixnominal = str_replace('.', '', $nominal);
		        $allowedExtensions = ['jpg', 'jpeg', 'png'];
		        $fileName = $_FILES['img']['name'];
		        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

		        if (!in_array($fileExtension, $allowedExtensions)) {
		        	$response['status'] = 403;
		            $response['message'] = 'Gausah ngehek ngehek ente.';
		        } else {
		            $uploadDir = 'uploads/';
		            $fixfilename = md5(date('hsdmY').$fileName).'.'.$fileExtension;
		            $uploadFile = $uploadDir . basename($fixfilename);
		            if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
		            	$datascashflow = array(
		                	'id_user' => $this->session->userdata('user_id'),
		                	'nominal' => $fixnominal,
		                	'desc_cash' => "Bayar Uang Kas ".date('d-m-Y'),
		                	'status' => 3,
		                	'img_cash' => $fixfilename, );
		                $response['status'] = 200;
		                $response['message'] = 'Pembayaran kamu berhasil!';
		            } else {
		            	$datascashflow = array(
		                	'id_user' => $this->session->userdata('user_id'),
		                	'nominal' => $fixnominal,
		                	'desc_cash' => "Bayar Uang Kas ".date('d-m-Y'),
		                	'status' => 3, );
		            	$response['status'] = 200;
		                $response['message'] = 'Pembayaran kamu berhasil!';
		            }
		            $this->M_db->insert_All('t_cashflow',$datascashflow);
		        }
		    } else {
		    	$response['status'] = 403;
		        $response['message'] = 'Bukti Pembayaran mohon diisi terlebih dahulu.';
		    }
		    print_r(json_encode($response));
		} else {
			$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('user_id'));
			$data['title'] = 'Pembayaran Kas';
			$data['sub_menu'] = 'BayarKas';
			$this->load->view('dashboard/layout/header',$data);
			$this->load->view('dashboard/main/trxkas');
			$this->load->view('dashboard/layout/footer');
		}
		
		
	}
	public function settingAccount()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('user_id'));
		$data['title'] = 'Setting';
		$data['sub_menu'] = 'Account';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/main/index');
		$this->load->view('dashboard/layout/footer');
	}
	
}