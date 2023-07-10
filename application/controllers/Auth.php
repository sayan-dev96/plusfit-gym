<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
		$this->load->database();
		$this->load->library('session');
		$this->load->model('Auth_Model');

	}

	public function index()
	{
		if($this->session->userdata('gym_admin'))
		{
			redirect('Admin/dashboard');
			exit;
		}
		else
		{
			redirect('Admin/index');
			exit;
		}
	}
	public function auth()
	{

		if(isset($_POST['btn_login']))
		{

			$username=$this->security->xss_clean($this->input->post('ad_email'));
			$pass=$this->security->xss_clean($this->input->post('ad_pass'));
		
			$chk=$this->Auth_Model->AuthCheck($username,$pass);
			if($chk==true)
			{
				$this->db->select('*');
				$this->db->from('accounts');
				$this->db->where('admin_email',$username);
				
				$run=$this->db->get();
				$fname=$run->row('first_name');
		
				$this->session->set_userdata('gym_admin',$username);
				$this->session->set_userdata('admin_name',$fname);
				redirect('Admin/dashboard');
			}
			else
			{
				redirect('Admin');
			}



		}
	}

	public function logout()
	{
		if($this->session->userdata('gym_admin'))
		{
			$this->session->unset_userdata('gym_admin');
			$this->session->unset_userdata('access_level');
			redirect('Admin');
		}
		else
		{
			redirect('Admin');
		}
	}
	
}
