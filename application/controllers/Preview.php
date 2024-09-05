<?php
error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');

class Preview extends CI_Controller {

	private $secret_key = "QUpMQjIwMjQhIUJFS0FTSQ==";
	
	public function __construct(){
		parent::__construct();
		$this->load->model('M_db');
		$this->load->model('M_wa');	
	}
	
	public function index()
	{	
		$res = array('status' => false,'msg' => 'invalid query', );
		print_r(json_encode($res));
	}
	public function previewRegister($id)
	{
		$data['data_regis'] = $this->M_db->Get_user_by_id('t_register_form','id',$id);
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$toj = $_GET['to'];
			$notes = $this->input->post('notes');
			$level = $this->input->post('level');
			if ($toj == 1) {
				$fixlevel = $level-1;
				if ($fixlevel == 3) {
					$notif = "PENDING DPD";
					//$tomsg = $this->M_db->getDataLevel($data['data_regis']->kabkot,$fixlevel);
					$tomsg = $this->M_db->getDataLevel($data['data_regis']->provinsi,2);
					$msg = "DPC";
					$sendadmin = $this->M_wa->sendNotifAdmin($tomsg->nowa,'ADMIN-'.$tomsg->name,$data['data_regis']->email,$tomsg->name,$notif,$id);
				} elseif ($fixlevel == 2) {
					$notif = "PENDING PUSAT";
					
					$tomsg = $this->M_db->getDataLevel(0,1);
					$msg = "DPD";
					$sendadmin = $this->M_wa->sendNotifAdmin($tomsg->nowa,'ADMIN-'.$tomsg->name,$data['data_regis']->email,$tomsg->name,$notif,$id);
				}elseif ($fixlevel == 1) {
					$notif = "SUCCESSFULLY REGISTRASION";
					$msg = "PUSAT";
					
				}else {
					$notif = "REJECTED REGISTRASION";
				}
				$this->M_wa->approveRegis($data['data_regis']->nowa,$data['data_regis']->nama_lengkap,$msg);
				$ress = array('status' => $fixlevel,'note' => $notes );
			} elseif ($toj == 2) {
				if ($level == 3) {
					$tomsg = $this->M_db->getDataLevel($data['data_regis']->kabkot,$level);
				} elseif($level == 2) {
					$tomsg = $this->M_db->getDataLevel($data['data_regis']->provinsi,$level);
				}else{
					$tomsg = $this->M_db->getDataLevel(0,$level);
				}
				
				$notif_rejek = $this->M_wa->rejectRegis($data['data_regis']->nowa,$data['data_regis']->nama_lengkap,$data['data_regis']->email,$notes,$tomsg->name);
				//print_r($notif_rejek);
				$ress = array('status' => 9,'note' => $notes, );
				$notif = "REJECTED REGISTRASION";
			}else {
				return $this->output
					->set_content_type('application/json')
					->set_status_header(400)
					->set_output(json_encode($response));
				die('');
			}
			if ($level == 1 OR $level == 9) {
				return $this->output
					->set_content_type('application/json')
					->set_status_header(400)
					->set_output(json_encode($response));
				exit();
			}
			
			$upd = $this->M_db->update_Data('t_register_form','id',$id,$ress);
			
		} else {
			if ($data['data_regis']->status == 1 OR $data['data_regis']->status == 9) {
				redirect(site_url());
			}
			$this->load->view('preview/index',$data);
		}
		
		
	}
}
