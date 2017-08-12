<?php

class MY_Controller extends CI_Controller {

    protected $connected_user;

    public function __construct() {
        parent::__construct();

        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in()){

                redirect('/auth/login');
        }


        $user = $this->ion_auth->user()->row();
        $user->group = $this->ion_auth->get_users_groups($user->id)->result()[0];


        //Check permissions
        
        $acl_controller = $this->router->fetch_class();
        $acl_method = strtolower($this->router->fetch_method());

       
        
        $this->load->config('permissions',true);
        $permissions = $this->config->item('permissions');


        //Permissions pour ce controller
        if(!array_key_exists($acl_controller, $permissions)){
            show_error('Accès interdit controller');
            exit();
        }

        //Permissions pour cette methode
        if(!array_key_exists($acl_method, $permissions[$acl_controller])){
            show_error('Accès interdit methode');
            exit();
        }

       
        
        //Permissions pour cette methode
        if( !in_array($user->group->name, $permissions[$acl_controller][$acl_method])){
            show_error('Accès interdit groupe');
            exit();
        }


        $this->connected_user = $user;

        $this->layout->setData('user', $user);
        $this->layout->setData('menu', $this->router->fetch_class());
        $this->layout->setData('sub_menu', $this->router->fetch_method());
       
        $this->layout->setData('assets_url', base_url().'assets/');
    }

}