<?php
class Signup extends CI_Controller {

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    if($this->session->userdata('login') || $this->session->userdata('logged'))
    {
      redirect('signup/membres');
    }
    $this->form_validation->set_rules('pseudo','Pseudo','trim|required|xss_clean|callback_check_pseudo');
    $this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email|callback_check_email');
    $this->form_validation->set_rules('pass','Mot de passe','trim|required|xss_clean|min_length[5]');
    
    if($this->form_validation->run())
    {
      $data = array(
        'pseudo'=>$this->input->post('pseudo'),
        'email'=>$this->input->post('email'),
        'pass'=>sha1($this->input->post('pass'))
      );
      
      $this->signup_model->signup($data);
      
      $this->email->from('contact@simpledev.fr','Mon site');
      $this->email->to($this->input->post('email'),'Inscription');
      $this->email->subject('Inscription');
      $this->email->message('<h4>Bienvenue!</h4>
                            <p>Vous êtes maintenant membre du site, <br />
                            Voici votre mot de passe : <b>'.$this->input->post('pass').'</b></p>');
                      
      $this->email->send();
      
      $data['success'] = 'Inscription réussie';
      $data['titre'] = 'Inscription';
      $this->load->view('signup',$data);
    }
    else
    {
      $data['titre'] = 'Inscription';
      $this->load->view('signup',$data);
    }
  }
  
  function login()
  {
    if($this->session->userdata('login') || $this->session->userdata('logged'))
    {
      redirect('signup/membres');
    }
    $this->form_validation->set_rules('pseudo','Pseudo','trim|required|xss_clean');
    $this->form_validation->set_rules('pass','Mot de passe','trim|required|xss_clean');
    
    if($this->form_validation->run())
    {
      if($this->signup_model->check_id($this->input->post('pseudo'), $this->input->post('pass')))
      {
        $data = array('login'=>$this->input->post('pseudo'), 'logged'=>true);
        $this->session->set_userdata($data);
        redirect('signup/membres');
      }
      else
      {
        $data['error'] = 'Mauvais identifiants';
        $data['titre'] = 'Connexion';
         $data['candidat'] = 'GMCA160011';
        $this->load->view('login',$data);
      }
    }
    else
    {
      $data['titre'] = 'Connexion';
      $this->load->view('login',$data);
    }
  }
  
  function logout()
  {
    $this->session->unset_userdata('login');
    $this->session->unset_userdata('logged');
    $this->session->sess_destroy();
    redirect(site_url());
  }
  
  function membres()
  {
    if(!$this->session->userdata('login') || !$this->session->userdata('logged'))
    {
      redirect(site_url());
    }
    else
    {
      $data['titre'] = 'Zone réservée aux membres';
      $this->load->view('membres',$data);
    }
  }
  
  
  // fonction de callback
  
  function check_pseudo()
  {
    if($this->input->post('pseudo'))
    {
      $this->db->select('id');
      $this->db->from('membres');
      $this->db->where('pseudo',$this->input->post('pseudo'));
      if($this->db->count_all_results()>0)
      {
        $this->form_validation->set_message('check_pseudo','Ce pseudo est déjà pris');
        return false;
      }
      else
      {
        return true;
      }
    }
  }
  
  function check_email()
  {
    if($this->input->post('email'))
    {
      $this->db->select('id');
      $this->db->from('membres');
      $this->db->where('email',$this->input->post('email'));
      if($this->db->count_all_results()>0)
      {
        $this->form_validation->set_message('check_email','Cet email est utilisé');
        return false;
      }
      else
      {
        return true;
      }
    }
  }

}
?>