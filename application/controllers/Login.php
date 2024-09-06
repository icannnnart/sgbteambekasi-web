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
	    if (isset($_POST['emails'])) {
	        $recaptchaResponse = $this->input->post('g-recaptcha-response');
	        $secretKey = '6LeXLTgqAAAAACtJkpH7O1GFuGw7zDR6kslw4tJS'; // Ganti dengan secret key Anda
	        $userIp = $this->input->ip_address();

	        // Verifikasi Google reCAPTCHA
	        $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse&remoteip=$userIp");
	        $responseData = json_decode($verifyResponse);

	        if ($responseData->success) {
	            $names = $this->input->post('names');
	            $emails = $this->input->post('emails');
	            $cekmail = $this->db->get_where('t_user', ['email' => $emails])->row();
	            if ($cekmail) {
	            	$response['status'] = 409; // Conflict HTTP status code
                	$response['message'] = 'Email sudah digunakan. Silakan gunakan email lain.';
	            }else{
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

		            if ($this->M_db->insert_All('t_user', $datasmember)) {
		                $response['status'] = 1;
		                $response['message'] = 'Pendaftaran Member Berhasil!';
		            } else {
		                $response['status'] = 401;
		                $response['message'] = 'Pendaftaran Member Gagal!';
		            }
	            }
	        } else {
	            // Jika reCAPTCHA tidak valid
	            $response['status'] = 401;
	            $response['message'] = 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.';
	        }

	        print_r(json_encode($response));

	    } else {
	        $a = $this->session->userdata('logged_in');
	        if ($a == 1) {
	            redirect(site_url('app/dashboard'));
	        }
	        $data['title'] = 'Register Member';
	        $this->load->view('login/layout/header', $data);
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
