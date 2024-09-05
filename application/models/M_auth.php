<?php
setlocale(LC_ALL, 'IND');
date_default_timezone_set('Asia/Jakarta');
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model {
	const SESSION_KEY = 'user_id';
	public function checkLogin($username, $password) {
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$user = $this->db->get_where('t_user', ['email' => $username])->row();
		
		if ($user && password_verify($password, $user->password)) {
			return $user;
		}
		
		return false;
	}
	
	public function saveOTP($username, $otp_code, $id_user) {
		$user = $this->db->get_where('t_user', ['username' => $username])->row();
		$ceklog = $this->db->get_where('t_otp', ['id_user' => $id_user])->result_array();
		$count = count($ceklog);
		$count = $count+1;
		//print_r($count);
		
		if ($user && $count != 4) {
			$otp_data = [
				'id_user' => $user->id,
				'otp_code' => $otp_code,
				'expiration_time' => date('Y-m-d H:i:s', strtotime('+3 minutes')),
				'retry_count' => $count
			];
			
			$this->db->insert('t_otp', $otp_data);
			return true;
		}else{
			return false;
		}
	}
	
	public function verifyOTP($username, $otp_code) {
		$user = $this->db->get_where('t_user', ['id' => $username])->row();
		
		if ($user) {
			$otp = $this->db->get_where('t_otp', ['id_user' => $user->id])->result_array();
			$am = count($otp);
			$count = $am+1;
			$ad = $am-1;
			if ($otp[$ad]['otp_code'] == $otp_code && $otp[$ad]['expiration_time'] >= date('Y-m-d H:i:s')) {
				$this->db->delete('t_otp', ['id_user' => $username]);
				return true;
			}
		}
		
		return false;
	}
	public function Logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}
	public function acakC($panjang)
	{
		$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
		$string = '';
		for ($i = 0; $i < $panjang; $i++) {
			$pos = rand(0, strlen($karakter)-1);
			$string .= $karakter[$pos];
		}
		return $string;
	}

}