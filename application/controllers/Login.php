<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	const SESSION_KEY = 'user_id';
	public function __construct(){
		parent::__construct();
		$this->load->model('M_auth');
		$this->load->model('M_db');
		// $this->load->library('Email_lib');
		
	}
	public function index()
	{
		if($this->session->userdata('user_id') != null){
			redirect(site_url('app/dashboard'));
		}
		if (isset($_POST['username'])) {
			$username = $this->input->post('username');
			$ip_address = $this->input->ip_address();
			$password = $this->input->post('password');
			$user = $this->M_auth->checkLogin($username, $password);
			if ($user) {
				if ($user->lastlogin_ip !== $ip_address) {
					//$this->_sendOTP($user->username, $user->id);
					$this->session->set_userdata([self::SESSION_KEY => $user->id,'role' => $user->role,'logged_in' => 1,'session_expiration' => time() + 3600]);
					echo json_encode(['status' => 1, 'message' => 'Success']);
				} else {
					echo json_encode(['status' => 1, 'message' => 'Success']);
					$this->session->set_userdata([self::SESSION_KEY => $user->id,'role' => $user->role,'logged_in' => 1,'session_expiration' => time() + 3600]);

				}
			} else {
				echo json_encode(['status' => 3, 'message' => 'Wrong password, please check again!']);
			}
		} else {
			$data['title'] = 'Login';
			$this->load->view('login/layout/header',$data);
			$this->load->view('login/auth/login');
			$this->load->view('login/layout/footer');
		}	
	}
	private function _sendOTP($username, $id_user) {
        // Generate OTP
		$otp_code = $this->M_auth->acakC(6);

        // Simpan OTP ke database
		$a = $this->M_auth->saveOTP($username, $otp_code, $id_user);        
		if ($a) {
			$to = $username;
			$user = $this->M_db->Get_user_by_id('t_user','id',$id_user);
			//$valwa = explode(',',$user->whatsapp);
			//$this->M_api->sendOTPwa($user->now,a$otp_code);
			echo json_encode(['status' => 2, 'message' => 'OTP has been sent']);
		} else {
			echo json_encode(['status' => 3, 'message' => 'OTP Failed to send, because the sending limit has exceeded, please wait 1 hours']);
		}
	}

	public function registerMemberbang()
	{
		if($this->session->userdata('logged_in') != 2){
			redirect(site_url('app/dashboard'));
		}
		if (isset($_POST['otpku'])) {
			$otp_code = $this->input->post('otpku');
			$user_id = $this->session->userdata('user_id');

			$verified = $this->M_auth->verifyOTP($user_id, $otp_code);
			if ($verified) {
				$user = $this->M_db->Get_user_by_id('t_user','id',$user_id);
				$ip_address = $this->input->ip_address();
				$dt = array('lastlogin_ip' => $ip_address, );
				$this->M_db->update_Data('t_user','id',$user_id,$dt);
				$this->M_auth->Logout();
				$this->session->set_userdata([self::SESSION_KEY => $user->id,'role' => $user->status,'logged_in' => 1,'session_expiration' => time() + 3600]);
				echo json_encode(['status' => 1, 'message' => 'Success']);
			} else {
	            // Tampilkan notifikasi verifikasi OTP gagal
				echo json_encode(['status' => 3, 'message' => 'Invalid OTP']);
			}
		} else {
			$a = $this->session->userdata('logged_in');
			if($a == 1){
				redirect(site_url('app/dashboard'));
			}elseif($this->session->userdata('logged_in') == null){
				redirect(site_url());
			}
			$data['title'] = 'Register Member';
			$this->load->view('login/layout/header',$data);
			$this->load->view('login/auth/otp');
			$this->load->view('login/layout/footer');
		}	
	}

	public function Logout()
	{
		$this->M_auth->logout();
		redirect(site_url());
	}
}
