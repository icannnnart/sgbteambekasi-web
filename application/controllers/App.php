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
		$data['sumkas'] = $donebayar->;
		// $data['counactivemember'] = $this->M_db->Countdbbyid('t_member','status',1);
		// $data['countinactivemember'] = $this->M_db->Countdbbyid('t_member','status',2);;
		$data['counuser'] = $this->M_db->Countdb('t_user');
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