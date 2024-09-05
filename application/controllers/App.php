<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_auth');
		$this->load->model('M_db');
		if($this->session->userdata('logged_in') == 2){
			redirect(site_url('auth/login/verification'));
		}elseif($this->session->userdata('user_id') == null){
			redirect(site_url());
		}
	}

	public function index()
	{
		//$this->M_wa->successRegis('6285161707161','ihsan','ihsan.mmi121@gmail.com','IT Secure','Jl Raya Bekasi Tambun Utara 17510');
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('logged_in'));
		$data['title'] = 'Dashboard';
		$data['sub_menu'] = '';
		$donebayar = $this->db->query('SELECT SUM(nominal) AS total_valid FROM t_cashflow WHERE status=1')->row();
		$keluarbayar = $this->db->query('SELECT SUM(nominal) AS total_keluar FROM t_cashflow WHERE status=2')->row();
		$data['sumkas'] = $donebayar->total_valid;
		$data['sumkeluar'] = $keluarbayar->total_keluar;
		$data['sumcashflow'] = $donebayar->total_valid-$keluarbayar->total_keluar;
		$data['counuser'] = $this->M_db->Countdb('t_user');
		$jan = $this->db->query('SELECT SUM(nominal) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%2024-01%'')->row();
		$feb = $this->db->query('SELECT SUM(nominal) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%2024-02%'')->row();
		$mar = $this->db->query('SELECT SUM(nominal) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%2024-03%'')->row();
		$apr = $this->db->query('SELECT SUM(nominal) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%2024-04%'')->row();
		$mei = $this->db->query('SELECT SUM(nominal) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%2024-05%'')->row();
		$jun = $this->db->query('SELECT SUM(nominal) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%2024-06%'')->row();
		$jul = $this->db->query('SELECT SUM(nominal) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%2024-07%'')->row();
		$agu = $this->db->query('SELECT SUM(nominal) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%2024-08%'')->row();
		$sep = $this->db->query('SELECT SUM(nominal) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%2024-09%'')->row();
		$okt = $this->db->query('SELECT SUM(nominal) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%2024-10%'')->row();
		$nov = $this->db->query('SELECT SUM(nominal) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%2024-11%'')->row();
		$des = $this->db->query('SELECT SUM(nominal) AS total_valid FROM t_cashflow WHERE status=1 AND created_at LIKE '%2024-12%'')->row();
		// $data['grafik'] = [$jan->total_valid,$feb->total_valid,$mar->total_valid,$apr->total_valid,$mei->total_valid,$jun->total_valid,$jul->total_valid,$agu->total_valid,$sep->total_valid,$okt->total_valid,$nov->total_valid,$des->total_valid];
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/main/index');
		$this->load->view('dashboard/layout/footer');
	}
	public function masterUser()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('logged_in'));
		$data['title'] = 'Master';
		$data['sub_menu'] = 'User';
		$data['data_user'] = $this->M_db->get_All_data('t_user');
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/master/user');
		$this->load->view('dashboard/layout/footer');
	}
	public function masterForm()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('logged_in'));
		$data['title'] = 'Master';
		$data['sub_menu'] = 'Form';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/master/index');
		$this->load->view('dashboard/layout/footer');
	}
	public function masterRegform()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('logged_in'));
		$data['title'] = 'Master';
		$data['sub_menu'] = 'Registrasi Form';
		$data['data_registrasi'] = $this->M_db->get_All_data('t_register_form');
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/master/register');
		$this->load->view('dashboard/layout/footer');
	}
	public function masterMember()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('logged_in'));
		$data['title'] = 'Master';
		$data['sub_menu'] = 'Member';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/master/index');
		$this->load->view('dashboard/layout/footer');
	}
	public function reportVisitor()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('logged_in'));
		$data['title'] = 'Report';
		$data['sub_menu'] = 'Visitor';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/main/index');
		$this->load->view('dashboard/layout/footer');
	}
	public function reportRegform()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('logged_in'));
		$data['title'] = 'Report';
		$data['sub_menu'] = 'Registrasi Form';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/main/index');
		$this->load->view('dashboard/layout/footer');
	}
	public function reportDpd()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('logged_in'));
		$data['title'] = 'Report';
		$data['sub_menu'] = 'DPD';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/main/index');
		$this->load->view('dashboard/layout/footer');
	}
	public function reportDpc()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('logged_in'));
		$data['title'] = 'Report';
		$data['sub_menu'] = 'DPC';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/main/index');
		$this->load->view('dashboard/layout/footer');
	}
	public function settingAccount()
	{
		$data['user'] = $this->M_db->Get_user_by_id('t_user','id',$this->session->userdata('logged_in'));
		$data['title'] = 'Setting';
		$data['sub_menu'] = 'Account';
		$this->load->view('dashboard/layout/header',$data);
		$this->load->view('dashboard/main/index');
		$this->load->view('dashboard/layout/footer');
	}
	
}