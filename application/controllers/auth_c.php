<?php

class auth_c extends CI_Controller
{

	public function __construct() {
		parent::__construct();   
        require_once("../application/core/MY_Controller.php");
		$this->lang->load("auth","french");
    }

    public function auth_index()
    {

    	$this->load->helper('url');
    	$this->load->helper('language');

    	$message='bonjour';
    	$users='';	
    	
    	$data["message"]=$message;
    	$data["users"]=$users;

    	$this->load->view('auth/index',$data);
    }
    public function auth_login()
    {
    	$this->load->helper('language');

		$message='bonjour';	

		$data["message"]=$message;

    	$this->load->view('auth/login',$data);
    }

    public function auth_change_password()
    {
    	$this->load->helper('language');
    	$this->load->helper('form');

    	$message='bonjour';
    	$min_length=6;

    	$data["old_password"]='old';
    	$data["new_password"]='new';
		$data["new_password_confirm"]='new_confirm';
		$data["message"]=$message;
		$data["min_password_length"]=$min_length;
		$data["user_id"]='';

    	$this->load->view('auth/change_password',$data);
    }

    public function auth_create_group()
    {
    	$this->load->helper('language');
    	$this->load->helper('form');

    	$message='bonjour';
    	$group_name = '';
    	$description='';

    	$data["message"]=$message;
    	$data["group_name"]=$group_name;
		$data["description"]=$description;
    	
    	$this->load->view('auth/create_group',$data);
    }

    public function auth_create_user()
    {
    	$this->load->helper('language');
    	$this->load->helper('form');

    	$message='bonjour';

    	$data["message"]=$message;
    	$data["first_name"]='';
    	$data["last_name"]='';
		$data["trigram"]='';
		$data["email"]='';
		$data["phone"]='';
		$data["password"]='';
		$data["password_confirm"]='';

    	$this->load->view('auth/create_user',$data);
    }

    public function auth_edit_group()
    {
    	$this->load->helper('language');
    	$this->load->helper('form');

    	$message='bonjour';
    	$group_name = '';
    	$description='';

    	$data["message"]=$message;
    	$data["group_name"]=$group_name;
		$data["group_description"]=$description;
    	
    	$this->load->view('auth/edit_group',$data);
    }

    public function auth_edit_user()
    {
    	$this->load->helper('language');
    	$this->load->helper('form');

    	$message='bonjour';

    	$data["message"]=$message;
    	$data["first_name"]='';
    	$data["last_name"]='';
		$data["company"]='';
		$data["email"]='';
		$data["phone"]='';
		$data["password"]='';
		$data["password_confirm"]='';
		$data["groups"]='';
		$data["csrf"]='';
		$data["user"]='';

    	$this->load->view('auth/edit_user',$data);
    }

    public function auth_reset_password()
    {
    	$this->load->helper('language');
    	$this->load->helper('form');

    	$message='ici';
    	$min_length=6;

    	$data["new_password"]='new';
		$data["new_password_confirm"]='new_confirm';
		$data["message"]=$message;
		$data["min_password_length"]=$min_length;
		$data["user_id"]='';
		$data["code"]='';
		$data["message"]=$message;
		$data["csrf"]='';

    	$this->load->view('auth/reset_password',$data);
    }

    public function auth_deactivate_user()
    {
    	$this->load->helper('language');
    	$this->load->helper('form');

    	$data["csrf"]='';
		$data["user"]='';

    	$this->load->view('auth/deactivate_user',$data);
    }

    public function auth_forgot_password()
    {
    	$this->load->helper('language');
    	$this->load->helper('form');

    	$message='ici';

    	$data["identity_label"]='';
		$data["email"]='';
		$data["message"]=$message;

    	$this->load->view('auth/forgot_password',$data);
    }

    public function auth_email_new_password()
    {
    	$this->load->helper('language');

    	$data["new_password"]='';
		$data["identity"]='';

    	$this->load->view('auth/email/new_password.tpl.php',$data);
    }


    public function auth_email_forgot_password()
    {
    	$this->load->helper('language');

    	$data["identity"]='new';
		$data["forgotten_password_code"]='new_confirm';

    	$this->load->view('auth/email/forgot_password.tpl.php',$data);
    }

    public function auth_email_activate()
    {
    	$this->load->helper('language');

    	$data["identity"]='';
    	$data["id"]='';
		$data["activation"]='';

    	$this->load->view('auth/email/activate.tpl.php',$data);
    }
}
?>