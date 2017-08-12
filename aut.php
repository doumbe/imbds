function authentification(){

    
    //    $data['candidat'] = $this->candidat ;

    $data['titre']='Espace recrutement';

      //  $data['candidat'] = $this->candidature_m->get_id_by_login ;

  // $_SESSION['login']=$this->input->post('login');
  // $_SESSION['password']=$this->input->post('password');
  //        $loginSaisi=$this->input->post('login');
 

  //        $motDEpasseSaisi=$this->input->post('password');
    $this->form_validation->set_rules('login','login','trim|required|xss_clean');
    $this->form_validation->set_rules('password','password','trim|required|xss_clean');

  if ($this->form_validation->run() == TRUE){
           $loginSaisi=$this->input->post('login');
           $motDEpasseSaisi=$this->input->post('password');
$_SESSION['motDEpasse']=$this->authentification_m->get_mot_de_passe($this->input->post('login'));
  if($_SESSION['motDEpasse']==$motDEpasseSaisi){

    $id=$this->authentification_m->get_id_by_login($loginSaisi);


    $this->candidat = $this->candidature_m->get_candidat_by_id('G');

  $data['id']=$id;  
  $data['candidat'] = $this->candidat ;
  $data['stage_projet'] = $this->stage_projet_seminaire_m->getAllStageProjetSeminaire( $data['candidat']->GMET_CODE);
  $newdata= array('username' =>$this->input->post('login') ,'is_logged_in'=>'true','id'=>$data['id']);
  $data['username']=$this->session->userdata('username');
  $this->session->set_userdata('ci_session',$newdata);
  $this->load->view('connexion/authentification_reussi',$data);
 // $this->load->view('etudiant_candidat/gmca',$data);
}
else
{               
    $this->load-> view('connexion/pageSignup',$data);                                                  
}
}
}