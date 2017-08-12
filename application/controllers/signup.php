<?php

   
 //session_start();

class Signup extends CI_Controller {



  function __construct()
  {
    parent::__construct();
    $this->lang->load("pageAccueil","french");
    $this->lang->load("candidat","french");
    $this->lang->load("upload","french");
    $this->load->model('formation_m');
    $this->load->model('cursus_m');

    $this->load->helper("url");
    $this->load->helper('language');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('email');
    $this->load->library('session');
    $this->load->model('antenne_m');
    $this->load->model('candidature_m');
    $this->load->model('stage_projet_seminaire_m');
    $this->load->model('langue_m');
    $this->load->model('emploi_m');
    $this->load->model('authentification_m');


  
     //chargement de la librairie pour la validation du formulaire
    $this->load->library('form_validation');
  //  $this->candidat = $this->candidature_m->get_candidat_by_id($id);

  //chargement du helper form
      $this->lang->load("etudiant","french");
      $this->load->model('ancien_m');
      $this->load->model('promotion_m');
      $this->load->library("pagination");
      $this->load->library('table');
   //   $id=$this->authentification_m->get_id_by_login($this->session->userdata('username'));


  }


 public function add()
{
 $data['somme']=$id+77;
 $this->load->view('etudiant_candidat/gmca',$data);

}
function index(){


   // $this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email|callback_check_email');
   // $this->form_validation->set_rules('pass','Mot de passe','trim|required|xss_clean|min_length[5]');
    
  //  $this->form_validation->run();
    $data['titre']='Espace recrutement';
 //   $data['candidat'] = $this->candidat ;
  
    //$data['candidat'] =$this->candidature_m->get_gmca_code_by_login_etu('nadir');
    $this->load-> view('connexion/pageSignup',$data);
 //   $this->load-> view('etudiant_candidat/sss',$data);


}
 public function ancien_etudiant(){
 //  $this->form_validation->run();
    $data['titre']='Espace ancien étudiant';
 //   $data['candidat'] = $this->candidat ;
  
    //$data['candidat'] =$this->candidature_m->get_gmca_code_by_login_etu('nadir');
    $this->load-> view('connexion/pageSignup_ancien',$data);
 //   $this->load-> view('etudiant_candidat/sss',$data);


 }
 function changementMotdePasse(){
   // $this->form_validation->run();
    $data['titre']='Espace recrutement';
   // $data['candidat'] = $this->candidat ;
    $this->load-> view('connexion/pageChangementMotdePasse',$data);
}
function changementMotdePasse_ancien(){
   // $this->form_validation->run();
    $data['titre']='Espace ancien étudiant';
   // $data['candidat'] = $this->candidat ;
    $this->load-> view('connexion/pageChangementMotdePasse_ancien',$data);
}
public function  mot_de_passe_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJLMWXCVBN123456789+-*/<>_.{}')
{
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for($i=0; $i < $nb_car; $i++)
    {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
    return $generation;
}
 public function EnvoiNouveauMotDePasse()
 {
  $data['titre']='Espace recrutement';
   
  if($this->input->post('valider')){
  //$loginSaisi=$this->input->post('pseudo');
  //$mailSaisi=$this->input->post('email');
  //$this->form_validation->set_rules('pseudo','pseudo','required');
  $this->form_validation->set_rules('email','email','required');
  // $data['mailSaisi']=$mailSaisi;
 // $mot_de_passe=$this->authentification_m->get_mot_de_passe_by_login($this->input->post('email'));
  
                                   if($this->form_validation->run() == TRUE)
                                     {
                                      if($this->authentification_m->verification_existence_candidat($this->input->post('email'))==1
                                        and $this->authentification_m->get_etat_candidat($this->input->post('email'))=='candidat')
                                     
                                        {  
                                        // générer un mot de passe de 8 caractère
                                       $nouveau_mot_de_passe=$this->mot_de_passe_aleatoire(8); 
                                       $this->authentification_m->setMotDEpasse($nouveau_mot_de_passe,$this->input->post('email'));
                                        // envoi du mail de changement de mot de passe
                                        require 'PHPMailer/PHPMailerAutoload.php';

                                        $mail = new PHPMailer;

                                        $mail->isSMTP();                                   // Set mailer to use SMTP
                                        $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
                                        $mail->SMTPAuth = true;                            // Enable SMTP authentication
                                        $mail->Username = 'ibeghouchene.nadir@gmail.com';          // SMTP username
                                        $mail->Password = 'Nadi2016R'; // SMTP password
                                        $mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
                                        $mail->Port = 465;                                 // TCP port to connect to

                                        $mail->setFrom($this->input->post('email'), 'Equipe master MBDS');
                                        $mail->addReplyTo($this->input->post('email'), 'Equipe master MBDS');
                                        $mail->addAddress($this->input->post('email'));   

                                        $mail->isHTML(true);  

                                        $bodyContent = '<h1>Changement de mot de passe </h1>';
                                        $bodyContent .= '<p>Voici votre nouveau mot de passe :  <b></b></p>'.$nouveau_mot_de_passe;

                                        $mail->Subject = 'Envoie d\'un nouveau mot de passe' ;
                                        $mail->Body    = $bodyContent;
                                                    $mail->send();   

                                                    $this->load-> view('connexion/pageConfirmationEnvoiMotdePasse',$data);
                                                    }
                                                     else
                                                    {   
                                                    $data['error']="Error:Email incorrecte";
                                                    $this->load-> view('connexion/pageChangementMotdePasse',$data);
                                                    } 
                                                    }
                                                    else { $this->load-> view('connexion/pageChangementMotdePasse',$data);}
                                                    
                                                    }}

 public function EnvoiNouveauMotDePasse_ancien()
 {
  $data['titre']='Espace ancien étudiant';
   
  if($this->input->post('valider')){

   //$loginSaisi=$this->input->post('pseudo');
  $mailSaisi=$this->input->post('email');
  //$this->form_validation->set_rules('pseudo','pseudo','required');
  $this->form_validation->set_rules('email','email','required');
  //$data['mailSaisi']=$mailSaisi;
  //$data['mail_recuperer']=$this->authentification_m->get_email_by_login($loginSaisi);
  
                                  if($this->form_validation->run() == TRUE)
                                     {
                                      if($this->authentification_m->verification_existence_candidat($this->input->post('email'))==1
                                        and $this->authentification_m->get_etat_candidat($this->input->post('email'))=='ancien')
                                     
                                        { 
                // générer un mot de passe de 8 caractère
                                       $nouveau_mot_de_passe=$this->mot_de_passe_aleatoire(8); 
                                       $this->authentification_m->setMotDEpasse($nouveau_mot_de_passe,$this->input->post('email'));
                                        // envoi du mail de changement de mot de passe
                                        require 'PHPMailer/PHPMailerAutoload.php';

                                        $mail = new PHPMailer;

                                        $mail->isSMTP();                                   // Set mailer to use SMTP
                                        $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
                                        $mail->SMTPAuth = true;                            // Enable SMTP authentication
                                        $mail->Username = 'ibeghouchene.nadir@gmail.com';          // SMTP username
                                        $mail->Password = 'Nadi2016R'; // SMTP password
                                        $mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
                                        $mail->Port = 465;                                 // TCP port to connect to

                                        $mail->setFrom($mailSaisi, 'Equipe master MBDS');
                                        $mail->addReplyTo($mailSaisi, 'Equipe master MBDS');
                                        $mail->addAddress($mailSaisi);   

                                        $mail->isHTML(true);  

                                        $bodyContent = '<h1>Changement de mot de passe </h1>';
                                        $bodyContent .= '<p>Voici votre nouveau mot de passe :  <b></b></p>'.$nouveau_mot_de_passe;

                                        $mail->Subject = 'Envoie d\'un nouveau mot de passe' ;
                                        $mail->Body    = $bodyContent;
                                                    $mail->send();   

                                        
                                        $this->load-> view('connexion/pageConfirmationEnvoiMotdePasse_Ancien',$data);
                                        }
                                         else
                                        {   
                                        $data['error']="Error: Email incorrecte";
                                        $this->load-> view('connexion/pageChangementMotdePasse_ancien',$data);
                                        } 
                                        }
                                        else { $this->load-> view('connexion/pageChangementMotdePasse_ancien',$data);}
                                        
                                        }}
function confirmationEnvoiMotdePasse(){
    
   // $this->form_validation->run();
    $data['titre']='Espace recrutement';
    $data['candidat'] = $this->candidat ;
    $this->load-> view('connexion/pageConfirmationEnvoiMotdePasse',$data);
}
function confirmationEnvoiMotdePasse_ancien(){
    
   // $this->form_validation->run();
    $data['titre']='Espace ancien étudiant';
    $data['candidat'] = $this->candidat ;
    $this->load-> view('connexion/pageConfirmationEnvoiMotdePasse',$data);
}/*
public function essai($id){
  $this->candidature_stage_projet($id);
}*/
function auth(){
  $data['dd']=$this->authentification_m->get_id_by_login('nadir');
  $this->load->view('auth',$data);
}
 
function authentification(){

    
    //    $data['candidat'] = $this->candidat ;

    $data['titre']='Espace recrutement';

   //    if($this->input->post('valider')){  
                        $this->form_validation->set_rules('login','login','trim|required|xss_clean');
                        $this->form_validation->set_rules('mot_de_passe',lang('mot_de_passe'),'trim|required|xss_clean');

                
                      if ($this->form_validation->run() == TRUE){
                                 $loginSaisi=$this->input->post('login');
                                 $motDEpasseSaisi=$this->input->post('mot_de_passe');
                                 $motDEpasse=$this->authentification_m->get_mot_de_passe_by_login($this->input->post('login'));
                                 $etat_candidat=$this->candidature_m->get_etat_candidat($loginSaisi);

                             if($motDEpasseSaisi==$motDEpasse and $etat_candidat=='candidat'){
                                          $id=$this->authentification_m->get_id_by_login($loginSaisi);
                                          $this->candidat = $this->candidature_m->get_candidat_by_id($id);
                                          $GMET_CODE=$this->langue_m->get_GMET_candidat($id);
                                          $data['id']=$id;  
                                          $data['candidat'] = $this->candidat ;
                                          $newdata= array('username' =>$this->input->post('login') ,'is_logged_in'=>'true','id'=>$data['id'],'etat_candidat'=>'candidat','GMET_CODE'=>$GMET_CODE);
                                          $data['username']=$this->session->userdata('username');
                                          $this->session->set_userdata($newdata);
                                          $this->load->view('connexion/authentification_reussi',$data);
                                          }
                                          else
                                          { 
                                          $data['motDEpasse']=$motDEpasse;
                                          $data['loginSaisi']=$loginSaisi;

                                          $data['error']="Error: login ou mot de passe incorrecte";
                                          $this->load-> view('connexion/pageSignup',$data);                                                  
                                          }
                                        }
                                        else{
                                              $this->load-> view('connexion/pageSignup',$data);                                                  
                                          }
                                


                                } 
function authentification_ancien(){

    
    //    $data['candidat'] = $this->candidat ;

    $data['titre']='Espace recrutement';

   //    if($this->input->post('valider')){  
                        $this->form_validation->set_rules('login','login','trim|required|xss_clean');
                        $this->form_validation->set_rules('mot_de_passe',lang('mot_de_passe'),'trim|required|xss_clean');

                
                      if ($this->form_validation->run() == TRUE){
                                 $loginSaisi=$this->input->post('login');
                                 $motDEpasseSaisi=$this->input->post('mot_de_passe');
                                 $motDEpasse=$this->authentification_m->get_mot_de_passe_by_login($this->input->post('login'));
                                 $etat_candidat=$this->candidature_m->get_etat_candidat($loginSaisi);
                             if($motDEpasseSaisi==$motDEpasse and $etat_candidat=='ancien'){
                            
                                           $id=$this->authentification_m->get_id_by_login($loginSaisi);
                                          $this->candidat = $this->candidature_m->get_candidat_by_id($id);
                                          $data['id']=$id;  
                                          $data['candidat'] = $this->candidat ;
                                          $newdata= array('username' =>$this->input->post('login') ,'is_logged_in'=>'true','id'=>$data['id'],'etat_candidat'=>'ancien');
                                          $data['username']=$this->session->userdata('username');
                                          $this->session->set_userdata($newdata);
                                          $this->load->view('connexion/authentification_reussi_ancien',$data);
                                          }
                                          else
                                          { 
                                          $data['error']="Error: login ou mot de passe incorrecte";
                                          $this->load-> view('connexion/pageSignup_ancien',$data);                                                  
                                          }
                                        }
                                        else{
                                              $this->load-> view('connexion/pageSignup_ancien',$data);                                                  
                                          }
                                


                                } 

 public function deconnexion(){

//$data['candidat'] = $this->candidat ;

 session_start();
  // Réinitialisation du tableau de session
  // On le vide intégralement
  $this->session->unset_userdata('username');
  $this->session->unset_userdata('etat_candidat');
  $this->session->unset_userdata('is_logged_in');
  $this->session->unset_userdata('id'); 
    $this->load->view('pageAccueil');

  }

 public function candidature_stage_projet()
  {
    //$id='GMCA160011';
    $id=$this->session->userdata('id');
    $data['candidat'] = $this->candidature_m->get_candidat_by_id($id);
    $data['stage_projet'] = $this->stage_projet_seminaire_m->getAllStageProjetSeminaire( $data['candidat']->GMET_CODE);

    if($this->input->post('valider'))
    {
      echo "ajouter";
      $this->form_validation->set_rules('GMSPS_TITRE', lang('info_candidat_sps_titre'), 'required|max_length[50]');
      $this->form_validation->set_rules('GMSPS_DESCRIPTION', lang('info_candidat_sps_desc'), 'required|max_length[200]'); 
      $this->form_validation->set_rules('GMSPS_DATE_DE_DEBUT', lang('info_candidat_sps_date_deb'), 'required'); 
      $this->form_validation->set_rules('GMSPS_DATE_DE_FIN', lang('info_candidat_sps_date_fin'), 'required'); 
      $this->form_validation->set_rules('GMSPS_TYPE', lang('info_candidat_sps_type'), 'required|max_length[30]'); 
      if($this->form_validation->run() == TRUE)
      {

       // echo var_dump($this->input->post());
        $this->stage_projet_seminaire_m->addStageProjetSeminaire();
         redirect('signup/candidature_stage_projet/');
          }
    }

    if($this->input->post('modifier'))
    {
      echo "modifier";
      
      $this->form_validation->set_rules('GMSPS_TITRE', lang('info_candidat_sps_titre'), 'required|max_length[50]');
      $this->form_validation->set_rules('GMSPS_DESCRIPTION', lang('info_candidat_sps_desc'), 'required|max_length[200]'); 
      $this->form_validation->set_rules('GMSPS_DATE_DE_DEBUT', lang('info_candidat_sps_date_deb'), 'required'); 
      $this->form_validation->set_rules('GMSPS_DATE_DE_FIN', lang('info_candidat_sps_date_fin'), 'required'); 
      $this->form_validation->set_rules('GMSPS_TYPE', lang('info_candidat_sps_type'), 'required|max_length[30]'); 
      if($this->form_validation->run() == TRUE)
      {
        $this->stage_projet_seminaire_m->editStageProjetSeminaire();
        redirect('signup/candidature_stage_projet/');
      }
    }

    if($this->input->post('delete'))
    {
      echo "supprimer";
      $this->stage_projet_seminaire_m->deleteStageProjetSeminaire();
      redirect('signup/candidature_stage_projet/');
    }

    
      $this->load->view('etudiant_candidat/candidat_stage_projet', $data);
    
  }

public function candidat_confirmation_visa(){
    
    $data['candidat'] = $this->candidat ;

      $this->form_validation->set_rules('Date_obtention', 'Date_obtention', 'required');
      $this->form_validation->set_rules('Numero_du_visa', 'Numero_du_visa', 'required');
      $this->form_validation->set_rules('Pays', 'Pays', 'required');

         if ($this->form_validation->run() == FALSE){

             $this->load->view('etudiant_candidat/candidat_confirmation_visa',$data);



      }
    else{        

                   $this->candidature_m->confirmation_obtention_visa();

                   $this->load->view('etudiant_candidat/candidat_confirmation_visa_reussi',$data);


    //     $this->candidature_m->insert_document_candidat();
 
    }
/*
  public function candidature_etape_information_detaille_2()
  {

  }

  public function candidature_etape_question()
  {

  }
*/
}
 public function emploi(){
     $data['candidat'] = $this->candidature_m->get_candidat_by_id($this->session->userdata('id'));
               $this->load->view('etudiant_candidat/gmca',$data);
}

 public function candidature_emploi()

  {  

    $data['candidat'] = $this->candidature_m->get_candidat_by_id($this->session->userdata('GMCA987654'));
    $data['emploi'] = $this->emploi_m->getAllEmplois($data['candidat']->GMET_CODE);
   
    if($this->input->post('valider'))
    {
      $this->form_validation->set_rules('GMEM_FONCTION', lang('info_candidat_emploi_fonction'), 'required|alpha|max_length[40]');
      $this->form_validation->set_rules('GMEM_NOM_ENTREPRISE', lang('info_candidat_emploi_nom'), 'required|alpha_numeric|max_length[30]');
      $this->form_validation->set_rules('GMEM_TYPE_CONTRAT', lang('info_candidat_emploi_type'), 'required|max_length[200]');
      $this->form_validation->set_rules('GMEM_DATE_EMBAUCHE', lang('info_candidat_emploi_date_deb'), 'required');
      $this->form_validation->set_rules('GMEM_DATE_FIN', lang('info_candidat_emploi_date_fin'));
      $this->form_validation->set_rules('GMEM_SALAIRE_ANNUEL', lang('info_candidat_emploi_salaire'), 'required|numeric');
      $this->form_validation->set_rules('GMEM_EMAIL', lang('info_candidat_emploi_email'),'valid_email|max_length[50]');
      $this->form_validation->set_rules('GMEM_TELEPHONE', lang('info_candidat_emploi_tel'), 'numeric|min_length[8]|max_length[20]');
      $this->form_validation->set_rules('GMEM_ADRESSE', lang('info_candidat_emploi_adr'),'max_length[200]');
      $this->form_validation->set_rules('GMEM_CODE_POSTAL', lang('info_candidat_emploi_cp'),'alpha_numeric|min_length[5]|max_length[10]');
      $this->form_validation->set_rules('GMEM_VILLE', lang('info_candidat_emploi_ville'), 'required|alpha|max_length[30]');
      $this->form_validation->set_rules('GMEM_PAYS', lang('info_candidat_emploi_pays'), 'required|alpha|max_length[30]');
      if($this->form_validation->run() == TRUE)
      {

       // echo var_dump($this->input->post());
        $this->emploi_m->addEmploi();
         redirect('signup/candidature_emploi/');
          }
    }

    if($this->input->post('modifier'))
    {
      $this->form_validation->set_rules('GMEM_FONCTION', lang('info_candidat_emploi_fonction'), 'required|alpha|max_length[40]');
      $this->form_validation->set_rules('GMEM_NOM_ENTREPRISE', lang('info_candidat_emploi_nom'), 'required|alpha_numeric|max_length[30]');
      $this->form_validation->set_rules('GMEM_TYPE_CONTRAT', lang('info_candidat_emploi_type'), 'required|max_length[200]');
      $this->form_validation->set_rules('GMEM_DATE_EMBAUCHE', lang('info_candidat_emploi_date_deb'), 'required');
      $this->form_validation->set_rules('GMEM_DATE_FIN', lang('info_candidat_emploi_date_fin'));
      $this->form_validation->set_rules('GMEM_SALAIRE_ANNUEL', lang('info_candidat_emploi_salaire'), 'required|numeric');
      $this->form_validation->set_rules('GMEM_EMAIL', lang('info_candidat_emploi_email'),'valid_email|max_length[50]');
      $this->form_validation->set_rules('GMEM_TELEPHONE', lang('info_candidat_emploi_tel'), 'numeric|min_length[8]|max_length[20]');
      $this->form_validation->set_rules('GMEM_ADRESSE', lang('info_candidat_emploi_adr'),'max_length[200]');
      $this->form_validation->set_rules('GMEM_CODE_POSTAL', lang('info_candidat_emploi_cp'),'alpha_numeric|min_length[5]|max_length[10]');
      $this->form_validation->set_rules('GMEM_VILLE', lang('info_candidat_emploi_ville'), 'required|alpha|max_length[30]');
      $this->form_validation->set_rules('GMEM_PAYS', lang('info_candidat_emploi_pays'), 'required|alpha|max_length[30]');
      if($this->form_validation->run() == TRUE)
      {
        //echo var_dump($this->input->post());
        $this->emploi_m->editEmploi();
        redirect('signup/candidature_emploi/');
      }
    }

    if($this->input->post('delete'))
    {
      $this->emploi_m->deleteEmploi();
     // redirect('signup/candidature_emploi/'.$this->input->post('GMCA_CODE'));
    }

    
      $this->load->view('etudiant_candidat/candidat_emploi', $data);
    
  }
  
public function eee($id){
//$data['NUMERO_VISA']=$this->candidature_m->get_etat_visa($id);

//$this->candidature_m->insert_infos_visa($id);
//$this->candidature_m->insert_demande_attestation_by_id($id);
//$data['NUMERO_VISA']=$this->candidature_m->get_etat_visa($id);

// $this->candidature_m-> insert_infos_visa($id);
 $data['NUMERO_VISA']=$this->authentification_m->get_email_by_login($id);
;
 //$data['NUMERO_VISA']=$this->candidature_m->get_etat_visa($id);

//$data['visa']=$this->candidature_m->get_etat_visa($id);
//$data['etat_demande']=$this->candidature_m->get_etat_demande_attestaion_by_id($id)

//$data['avis_jury']=$this->candidature_m->get_avis_jury_by_id($id);

//$data['demande_attestation']=$this->candidature_m->get_etat_demande_attestaion_by_id($id);


$this->load->view('etudiant_candidat/n',$data);


} 
}

?>


