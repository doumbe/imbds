<?php
class candidat_c extends CI_Controller
{


	public function __construct()
    {
		parent:: __construct();
    
    //$id='GMCA160011';
    $this->lang->load("pageAccueil","french");
		$this->lang->load("candidat","french");
		$this->lang->load("upload","french");
    $this->load->model('formation_m');
    $this->load->model('cursus_m');

    $this->load->helper('security'); 
 		$this->load->helper("url");
		$this->load->helper('language');
 		$this->load->helper('form');
 		$this->load->library('form_validation');
  //  $this->load->library('email',$config);
    $this->load->library('session');


 		$this->load->model('antenne_m');
 		$this->load->model('candidature_m');
    $this->load->model('authentification_m');

    $this->load->model('stage_projet_seminaire_m');
    $this->load->model('langue_m');
    $this->load->model('emploi_m');
    //$this->candidat =array('GMCA_CODE' =>'ddddddd');;
    //$this->candidat = $this->candidature_m->get_candidat_by_id($id);
     //chargement de la librairie pour la validation du formulaire
    $this->load->library('form_validation');
  //chargement du helper form
      $this->lang->load("etudiant","french");
      $this->load->model('ancien_m');
      $this->load->model('promotion_m');
      $this->load->library("pagination");
      $this->load->library('table');

 	}
  public function set(){

    $data['post']=$this->authentification_m->get_etat_candidat('ibeghouchene_nadir@yahoo.fr');
    $this->load->view('etudiant_candidat/n',$data); 

  }
  /*

  public function index()
  {
    $this->load->view('formsuccess'); 
  }
*/ function check_default($post_string) { return $post_string == '0' ? FALSE : TRUE; } 

  public function confirmer_preinscription(){
     $data['candidat'] = $this->candidature_m->get_candidat_by_id($this->session->userdata('id'));
    $data['confirmation']=$this->candidature_m->get_etat_preinscription($this->session->userdata('id'));
    $data['avis_jury']=$this->candidature_m->get_avis_jury_by_id($this->session->userdata('id'));

     if ($this->input->post('valider')) {
    $this->form_validation->set_rules('schoolGroups','School groups','required');

    //$this->form_validation->set_rules('confirmation', 'confirmation', 'required');
    $this->form_validation->set_rules('contrat', 'contrat', 'required');
    $this->form_validation->set_rules('accord', 'accord', 'required');
  

     if ($this->form_validation->run() == TRUE){
        $this->candidature_m->insert_confirmation_preinscription($this->session->userdata('id'));
        $data['confirmation']=$this->candidature_m->get_etat_preinscription($this->session->userdata('id'));

     }
 }
  $this->load->view('etudiant_candidat/confirmation_preinscription',$data);
 }

  public function essai()
  {
    //modify_infos_resume($id); 
    $data['post'] = $this->authentification_m->get_nom_candidat('GMCA160001');
// $data['post']= $this->authentification_m->verification_existence_candidat('ibeghouchene_nadir@yahoo.fr');
     $this->load->view('etudiant_candidat/n',$data);


  }
public function page_accueil_site(){
   
    
        $this->load->view('pageAccueil');

//     $this->load->view('etudiant_candidat/pageAccueilSite.php',$data);

}
public function espace_futur_etudiant(){
   
     
    //$this->load->view('pageAccueil');

 $this->load->view('etudiant_candidat/pageAccueilSite');

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


 public function Date_de_naissance(){
  
   $datecandidature =date('Y-m-d');
   //la date du fin est stocké dans une base de données
        //on extracte la date du fin depuis la bdd et on la met dans une variable $datefin
   $datenaissance= $this->input->post('Date_de_naissance');  
 
   $age=$datecandidature-$datenaissance;
 
   if($age>=18)
   return true;
    else 
   return false;
   }
      
   public function recrutement(){
   

      $GMET_EMAIL=$this->input->post('Email');
    //  $this->candidature_m->Date_de_naissance(); 

      
      $this->form_validation->set_rules('Formation_principal', lang('Formation_principal'), 'required');
      $this->form_validation->set_rules('Civilite', lang('Civilite'), 'required');
      $this->form_validation->set_rules('Nom', lang('Nom'), 'required|min_length[2]|max_length[20]');
      $this->form_validation->set_rules('Prenom', lang('Prenom'), 'required|min_length[2]|max_length[20]');
      $this->form_validation->set_rules('Email', lang('Email'), 'required|valid_email|is_unique[gmetudiant.GMET_EMAIL]'); 
     // $this->form_validation->set_rules('Email', lang('Email'), 'required|valid_email');
      $this->form_validation->set_rules('Date_de_naissance', lang('Date_de_naissance'), 'required|min_length[10]|max_length[10]|callback_Date_de_naissance');
      $this->form_validation->set_rules('Lieu_de_naissance', lang('Lieu_de_naissance'), 'required|min_length[3]|max_length[20]');
      $this->form_validation->set_rules('Departement', lang('Departement'), 'required|min_length[4]|max_length[25]');
      $this->form_validation->set_rules('Nationalite', lang('Nationalite'), 'required|min_length[4]|max_length[25]');
      $this->form_validation->set_rules('Pays', lang('Pays'), 'required|min_length[4]|max_length[25]');
      $this->form_validation->set_rules('Telephone_portable', lang('Telephone_portable'), 'required|min_length[10]|max_length[10]');
      $this->form_validation->set_rules('Dernier_diplome', lang('Dernier_diplome'), 'required|min_length[3]|max_length[30]');

      if( $this->input->post('Resident_en_france')==1){
        

        $this->form_validation->set_rules('Adresse_en_france', lang('Adresse_en_france'),'required');
        $this->form_validation->set_rules('Code_postal', lang('Code_postal'),'required|min_length[5]|max_length[5]');

     //   $this->form_validation->set_rules('', lang('Code_postal'),'numeric|min_length[5]|max_length[5]');
        $this->form_validation->set_rules('Ville', lang('info_candidat_ville'),'required');
        $this->form_validation->set_rules('Adresse_en_france', lang('Adresse_en_france'),'required');
        $this->form_validation->set_rules('Numero_S_Social', lang('Numero_S_Social'),'numeric|required|min_length[15]|max_length[15]');

         }
      elseif($this->input->post('GMCA_RESIDANT_FRANCE')==0)
      {

        $this->form_validation->set_rules('Adresse_etranger', lang('info_candidat_adresse'),'required');
        $this->form_validation->set_rules('Ville_etranger', lang('Ville_etranger'),'required');
       // $this->form_validation->set_rules('GMET_PAYS_ETRANGER', lang('info_candidat_pays'),'required');
        $this->form_validation->set_rules('Numero_campus_France', lang('info_candidat_num_campus_france'),'numeric|required');
        $this->form_validation->set_rules('Date_arrivee_en_France', lang('info_candidat_date_arrivee'),'required|min_length[10]|max_length[10]');

      //$this->form_validation->set_rules('Tel1', 'Tel1', 'required');
  //    $this->form_validation->set_rules('Resident_en_france', lang('Resident_en_france'), 'required'); 
//      $this->form_validation->set_rules('Adresse_en_france', 'Adresse_en_france', 'required');
 //     $this->form_validation->set_rules('Code_postal', 'Code_postal', 'required');
  //    $this->form_validation->set_rules('Ville', 'Ville', 'required');
   //   $this->form_validation->set_rules('Classement_diplome', lang('Classement_diplome'), 'required');


 //     $this->form_validation->set_rules('Numero_S_Social', 'Numero_S_Social', 'required');
 //     $this->form_validation->set_rules('Numero_campus_France', 'Numero_campus_France', 'required');
  //    $this->form_validation->set_rules('Adresse_etranger', 'Adresse_etranger', 'required');

  //    $this->form_validation->set_rules('Ville1', 'Ville1', 'required');
  //    $this->form_validation->set_rules('Date_arrivee_en_France', 'Date_arrivee_en_France', 'required');
//      $this->form_validation->set_rules('Apprentissage', lang('Apprentissage'), 'required');
      //$this->form_validation->set_rules('Annee_etudes', 'Annee_etudes', 'required');
      //$this->form_validation->set_rules('Identifiant_skype', 'Identifiant_skype', 'required');
     // $this->form_validation->set_rules('Remarque', 'Remarque', '');
       }


          if ($this->form_validation->run() == FALSE){
    
            $this->load->view('etudiant_candidat/candidat_c_deposer_un_dossier_dinscription');
                                                     }
          else
                                                     {

            $GMET_CODE = "GMET".rand (100000,999999);
            $GMCA_CODE = "GMCA".rand (100000,999999);
            $GMCA_MOT_DE_PASSE =$this->mot_de_passe_aleatoire(8); 

                  $new_data= array('GMET_CODE' =>$GMET_CODE,'is_logged_in'=>'true','GMCA_CODE'=>$GMCA_CODE,'GMCA_MOT_DE_PASSE'=> $GMCA_MOT_DE_PASSE,'Email'=>$GMET_EMAIL);             
                  $this->session->set_userdata($new_data);


            $this->candidature_m->insert_infos_candidat(1) ;


                 $this->load->view('etudiant_candidat/formsuccess_infos_candidat.php');

      
                                                     }
}
public function gestion_recrutement()
  {
    //$data['candidat'] = $this->candidature_m->get_candidat_by_id($this->session->userdata('id'));
    $this->load->view('etudiant_candidat/candidat_gestion_recrutement'); 
  }

 public function candidat_upload_document(){

      //$data['candidat'] = $this->candidat ;
      $this->form_validation->set_rules('c_i', 'c_i', 'required');
      $this->form_validation->set_rules('cv', 'cv', 'required');
      $this->form_validation->set_rules('dt', 'dt', 'required');
      $this->form_validation->set_rules('lr_1', 'lr_1', 'required');
      $this->form_validation->set_rules('rns_1', 'rns_1', 'required');
      $this->form_validation->set_rules('rns_2', 'rns_2', 'required');
      $this->form_validation->set_rules('rns_3', 'rns_3', 'required');
      $this->form_validation->set_rules('rns_4', 'rns_4', 'required');
      $this->form_validation->set_rules('rns_5', 'rns_5', 'required');
      $this->form_validation->set_rules('rns_6', 'rns_6', 'required');
      $this->form_validation->set_rules('statut_act', 'statut_act', 'required');

      $this->form_validation->set_rules('rns1m', 'rns1m', 'required');

      if($this->input->post('statut_act')=='M1_enCours'){
       
                $this->form_validation->set_rules('bac', 'bac', 'required');
                $this->form_validation->set_rules('dl', 'dl', 'required');
              }
        elseif($this->input->post('statut_act')=='M1_aquise'){

                $this->form_validation->set_rules('bac', 'bac', 'required');
                $this->form_validation->set_rules('dl', 'dl', 'required');
                $this->form_validation->set_rules('rns2m', 'rns2m', 'required');
              }
        elseif($this->input->post('statut_act')=='M2_enCours'){

                $this->form_validation->set_rules('bac', 'bac', 'required');
                $this->form_validation->set_rules('dl', 'dl', 'required');
                $this->form_validation->set_rules('rns2m', 'rns2m', 'required');
                $this->form_validation->set_rules('rns3m', 'rns3m', 'required');
      }
      //                                                         }
    //  else ($this->input->post('statut_act')=='M2_aquis'){
                else {

                $this->form_validation->set_rules('rns2m', 'rns2m', 'required');
                $this->form_validation->set_rules('rns3m', 'rns3m', 'required');
                $this->form_validation->set_rules('rns4m', 'rns4m', 'required');
                $this->form_validation->set_rules('bac', 'bac', 'required');
                $this->form_validation->set_rules('dl', 'dl', 'required');
                $this->form_validation->set_rules('dm', 'dm', 'required');
 
              }
   //   if($this->input->post('statut_act')=='M2_aquis')



    //  $this->form_validation->set_rules('rns1m', 'rns1m', 'required');
    //  $this->form_validation->set_rules('rns2m', 'rns2m', 'required');
  
  //    $this->form_validation->set_rules('rns3m', 'rns3m', 'required');
 //  $this->form_validation->set_rules('rns4m', 'rns4m', 'required');

    //  $this->form_validation->set_rules('bac', 'bac', 'required');
//    $this->form_validation->set_rules('dl', 'dl', 'required');
  //    $this->form_validation->set_rules('dm', 'dm', 'required');




       if ($this->form_validation->run() == FALSE){

         $this->load->view('etudiant_candidat/formsuccess_infos_candidat.php');
}
else{        

            $this->candidature_m->insert_infos_candidat(2) ;
$email=$this->session->userdata('Email');
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'ibeghouchene.nadir@gmail.com';          // SMTP username
$mail->Password = 'Nadi2016R'; // SMTP password
$mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                 // TCP port to connect to

$mail->setFrom($email, 'Equipe master MBDS');
$mail->addReplyTo($email, 'Equipe master MBDS');
$mail->addAddress($email);   // Add a recipient

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Inscription MBDS</h1>';
$bodyContent .= '<p>Votre inscription a ete effectue avec succe, voici vos identifiants: </p>
<b>Mot de passe : </b>'.$this->session->userdata('GMCA_MOT_DE_PASSE').'
<p><b>Login : </b</p>'.$this->session->userdata('Email');


$mail->Subject = 'Dépot de dossier de candidature en MBDS';
$mail->Body    = $bodyContent;
$mail->send();//) {
/*    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}*/

//         $this->candidature_m->insert_document_candidat();
  $this->session->unset_userdata('GMCA_CODE');
  $this->session->unset_userdata('GMET_CODE');
  $this->session->unset_userdata('is_logged_in');
  $this->session->unset_userdata('GMCA_MOT_DE_PASSE'); 
  $this->session->unset_userdata('Email'); 

                    $this->load->view('etudiant_candidat/candidat_inscription_reussi');

}
 }
  public function candidat_formulaire_inscription(){ 
      

     $data['candidat'] = $this->candidat ;


      $this->form_validation->set_rules('Nom', lang('Candidat_Nom'), 'required|min_length[2]|max_length[20]');
      $this->form_validation->set_rules('Prenom',lang('Prenom'), 'required|min_length[2]|max_length[20]'); 
      $this->form_validation->set_rules('Sexe',lang('Candidat_Sexe'), 'required'); 
      $this->form_validation->set_rules('Date_de_naissance',lang('Candidat_Date_de_naissance'),'required');
      $this->form_validation->set_rules('Email',lang('Candidat_Email'), 'required|valid_email'); 
      $this->form_validation->set_rules('Code_postal',lang('Candidat_Code_postal'),'numeric|min_length[3]|max_length[7]');
      $this->form_validation->set_rules('Telephone', lang('Candidat_Telephone'),'numeric|min_length[10]|max_length[10]');
      $this->form_validation->set_rules('Ville',lang('Candidat_Ville'),'required|min_length[3]|max_length[20]');
      $this->form_validation->set_rules('Pays',lang('Candidat_Pays'),'required');
      $this->form_validation->set_rules('Nationalite',lang('Nationalite'),'required|min_length[4]|max_length[20]');
      $this->form_validation->set_rules('Dernier_diplome_obtenu',lang('Dernier_diplome_obtenu'),'required|min_length[4]|max_length[20]');

          if ($this->form_validation->run() == FALSE){

          $this->load->view('etudiant_candidat/candidat_fiche_information_personnel',$data);
                                                     }
          else
                                                     {
$this->email->from('radar1992radars@gmail.com', 'Nadir');
$this->email->to('ibeghouchene.nadir@gmail.com');
$this->email->subject("Titre de l'email");
$this->email->message('ton messsssssssssssssssage');                        
$this->email->send();
echo $this->email->print_debugger();

               $this->load->view('etudiant_candidat/formsuccess_infos_recente.php',$data);

    
}
}   
  public function candidat_suivi_dossier(){
    $data['candidat'] = $this->candidat ;
    $this->load->view('etudiant_candidat/candidat_suivi_dossier',$data);

  }  

  public function candidat_dossier_inscription()
  {
  
    $this->load->view('etudiant_candidat/candidat_c_dossier_inscription');
  }
  public function candidat_accueil_recretement(){ 
   //$data['candidat'] = $this->candidat ;

   $this->load->view('etudiant_candidat/candidat_accueil_recretement');
 
  }

   


  public function informations_complementaire(){
$this->load->view('etudiant_candidat/informations_complementaires');
  }
  public function etudes_superieures()
  {
   {
    
    $data['candidat'] = $this->candidature_m->get_candidat_by_id($this->session->userdata('id'));

  //$data['stage_projet'] = $this->stage_projet_seminaire_m->getAllStageProjetSeminaire($this->session->userdata('GMET_CODE'));

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
        $this->Ajouter_etudes_superieure_m->addEtudesSuperieures();
        redirect('candidat_c/etudes_superieures/');
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
        redirect('candidat_c/etudes_superieures/');
      }
    }

    if($this->input->post('delete'))
    {
      echo "supprimer";
      $this->stage_projet_seminaire_m->deleteStageProjetSeminaire();
      redirect('candidat_c/etudes_superieures/');
    }
        $this->load->view('etudiant_candidat/etudes_superieure');
  }
}
  public function questionnaire()
  {
    $this->load->view('etudiant_candidat/questionnaire');
  }
  public function affichage_choix_cursus_resume()
  { 
    
    $formationResult = $this->formation_m->getFormation();

    $formations = array('aucun' =>' ');

    foreach ($formationResult as $formation) 
    {
      $formations[$formation->GMFO_CODE] = $formation->formation_niveau;
    }

    $data['formations'] = $formations;
    
    $this->load->view('etudiant_candidat/cursus_resume_choix',$data);  
  }

  public function affichage_cursus_resume()
  {
    //if(!empty($this->input->post($this->input->post('formation'))) or empty($this->input->post($this->input->post('annee')))) 
    //{

    $data['cursus_resume'] = $this->cursus_m->get_cursus_by_year_and_formation();
    $data['formation'] = $this->formation_m->getFormationByID($this->input->post('formation'))->GMFO_FORMATION;
    $data['annee'] = $this->input->post('annee');
    
    $this->load->view('etudiant_candidat/cursus_resume',$data);  
  }
  
	public function candidature_etape_information_base()
	{
	  	$this->form_validation->set_rules('GMCA_ANNEE_CANDIDATURE', lang('info_candidat_annee'), 'required'); 
  		$this->form_validation->set_rules('GMCA_FORMATION_PRINCIPAL', lang('info_formation_prin'), 'required'); 
  		$this->form_validation->set_rules('GMET_DERNIER_DIPLOME', lang('info_candidat_dernier_diplome'),'required');

		  $this->form_validation->set_rules('GMET_NOM', lang('info_candidat_nom'), 'required'); 
  		$this->form_validation->set_rules('GMET_PRENOM', lang('info_candidat_prenom'), 'required'); 
  		$this->form_validation->set_rules('GMET_TELEPHONE_PORTABLE', lang('info_candidat_tel_port'),'numeric|min_length[10]|max_length[10]');
  		$this->form_validation->set_rules('GMET_EMAIL', lang('info_candidat_email'), 'required|valid_email'); 
  		$this->form_validation->set_rules('GMET_SKYPE', lang('info_candidat_skype'),'required');
  		
  		$this->form_validation->set_rules('GMET_DATE_NAISSANCE', lang('info_candidat_date_naiss'),'required|min_length[10]|max_length[10]');
  		$this->form_validation->set_rules('GMET_LIEU_NAISSANCE', lang('info_candidat_lieu_naiss'),'required');
  		$this->form_validation->set_rules('GMET_DEPARTEMENT_NAISSANCE', lang('info_candidat_dep_naiss'),'required');
  		$this->form_validation->set_rules('GMET_PAYS_NAISSANCE', lang('info_candidat_pays'),'required');
  		$this->form_validation->set_rules('GMET_NATIONALITE', lang('info_candidat_nationalite'),'required');
  		$this->form_validation->set_rules('PRIM_ARRIVANT', lang('info_candidat_form_prim_arrivant'),'numeric');


  		if($this->input->post('GMCA_RESIDANT_FRANCE')==1)
  		{
	  		$this->form_validation->set_rules('GMET_ADRESSE_FRANCE', lang('info_candidat_adresse'),'required');
	  		$this->form_validation->set_rules('GMET_CODE_POSTAL', lang('info_candidat_cp_france'),'numeric|min_length[5]|max_length[5]');
	  		$this->form_validation->set_rules('GMET_VILLE', lang('info_candidat_ville'),'required');
	  		$this->form_validation->set_rules('GMET_PAYS', lang('info_candidat_pays'),'required');
	  		$this->form_validation->set_rules('GMET_NUMERO_SEC_SOCIALE', lang('info_candidat_numero_sec_sociale'),'numeric');
	  		
  		}
  		elseif($this->input->post('GMCA_RESIDANT_FRANCE')==0)
  		{
  			$this->form_validation->set_rules('GMET_ADRESSE_ETRANGER', lang('info_candidat_adresse'),'required');
  			$this->form_validation->set_rules('GMET_VILLE_ETRANGER', lang('info_candidat_ville'),'required');
  			$this->form_validation->set_rules('GMET_PAYS_ETRANGER', lang('info_candidat_pays'),'required');
  			$this->form_validation->set_rules('GMET_NUMERO_CAMPUS_FRANCE', lang('info_candidat_num_campus_france'),'numeric|required');
  			//$this->form_validation->set_rules('DATE_ARRIVEE_FRANCE', lang('info_candidat_date_arrivee'),'required|min_length[10]|max_length[10]');
  		}
  		else
  		{
  			$this->form_validation->set_rules('GMCA_RESIDANT_FRANCE', lang('info_residence_france'),'numeric');
  		}


  		if ($this->form_validation->run() == TRUE)
  		{
  			$data['result'] = $this->candidature_m->insert_dossier_candidature();
		   

		    $this->load->view('etudiant_candidat/candidat_validation_formulaire_base', $data);
  		}

  		else
  		{
  		 	$this->load->view('etudiant_candidat/candidat_information_base');
  		}

	}
 public function candidature_suivi_dossier(){
  
     $data['candidat'] = $this->candidature_m->get_candidat_by_id($this->session->userdata('id'));
     $data['etat_preinscription']=$this->candidature_m->get_etat_preinscription($this->session->userdata('id'));

   

    if ($this->input->post('retour')) 
    {
      //echo 'hello';
      redirect('candidat_c/candidature_suivi_dossier/'.$data['candidat']->GMCA_CODE);
    }


      $this->form_validation->set_rules('GMCA_CLASSEMENT_DERNIER_DIPLOME_NIVEAU', lang('info_verif_candidat_rang_dernier_diplome'), 'required|numeric|max_length[3]'); 
      $this->form_validation->set_rules('GMCA_NOM_UNIVERSITE_DIPLOME_NIVEAU', lang('info_verif_candidat_uni_dernier_diplome'), 'required'); 
      $this->form_validation->set_rules('GMCA_EXPERIENCE_PROFESSIONNELLE_TICS', lang('info_verif_candidat_exp_pro_tics'),'required');
      $this->form_validation->set_rules('GMCA_COMPETENCES_TECHNIQUES', lang('info_verif_candidat_comp_tech'), 'required'); 

    
      $this->form_validation->set_rules('GMET_CIVILITE',lang('civilite'), 'required'); 
      $this->form_validation->set_rules('GMCA_SITUATION',lang('info_situation'), 'required'); 
      $this->form_validation->set_rules('GMCA_FONGECIF',lang('info_fongecif'), 'required'); 
      $this->form_validation->set_rules('GMCA_CONTRAT_PRO',lang('info_contrat_pro'), 'required'); 
       
    if ( $this->form_validation->run() == FALSE && $this->input->post('valider'))
      {

      $this->candidature_m->modify_infos_resume($this->session->userdata('id'),$data_candidat);
       
       redirect('candidat_c/candidature_suivi_dossier/');

      }
      elseif ($this->form_validation->run() == FALSE && $this->input->post('valider'))
      {
        redirect('candidat_c/candidature_suivi_dossier/');
      }
      else
      {
      $this->load->view('etudiant_candidat/candidat_fiche_informations_resume', $data);
    }

  }
/*
	public function candidature_suivi_dossier44554($id)
	{
    $candidat = $this->candidature_m->get_candidat_by_id($id);
		$data['candidat'] = $this->candidat ;
       
    

        //echo var_dump($this->input->post());

        $this->candidature_m->modify_infos_resume($id);
       
       //redirect('candidat_c/candidature_fiche_informations_resume/'.$id);
      

      $this->load->view('etudiant_candidat/candidat_fiche_informations_resume', $data);
    }
/*
		if ($this->input->post('retour')) 
		{
			redirect('candidat_c/candidature_fiche_informations_resume/'.$data['candidat']->GMCA_CODE);
		}


		$this->form_validation->set_rules('GMCA_CLASSEMENT_DERNIER_DIPLOME_NIVEAU', lang('info_verif_candidat_rang_dernier_diplome'), 'required|numeric|max_length[3]'); 
  	$this->form_validation->set_rules('GMCA_NOM_UNIVERSITE_DIPLOME_NIVEAU', lang('info_verif_candidat_uni_dernier_diplome'), 'required'); 
  	$this->form_validation->set_rules('GMCA_EXPERIENCE_PROFESSIONNELLE_TICS', lang('info_verif_candidat_exp_pro_tics'),'required');
		$this->form_validation->set_rules('GMCA_COMPETENCES_TECHNIQUES', lang('info_verif_candidat_comp_tech'), 'required'); 

		
  		$this->form_validation->set_rules('GMET_CIVILITE',lang('civilite'), 'required'); 
  		$this->form_validation->set_rules('GMCA_SITUATION',lang('info_situation'), 'required'); 
  		$this->form_validation->set_rules('GMCA_FONGECIF',lang('info_fongecif'), 'required'); 
  		$this->form_validation->set_rules('GMCA_CONTRAT_PRO',lang('info_contrat_pro'), 'required'); 
		   
		if ($this->form_validation->run() == TRUE && $this->input->post('valider'))
  		{

  			//echo var_dump($this->input->post());

  			$this->candidature_m->modify_infos_resume($id);
		   
		   redirect('candidat_c/candidature_fiche_informations_resume/'.$id);

  		}
  	elseif ($this->form_validation->run() == FALSE && $this->input->post('valider'))
  		{

  			redirect('candidat_c/candidature_fiche_informations_resume/'.$id);
  		}
  		else
  		{       

			$this->load->view('etudiant_candidat/candidat_fiche_informations_resume', $data);
		}
*/
	

	public function candidature_upload_documents($id)
	{
		$data['candidat'] = $this->candidature_m->get_candidat_by_id($id);
	
  		if($this->input->post('save_id_card'))
  		{
  			if($_FILES['GMCA_COPIE_CARTE_IDENTITE']['error'] == 0)
   			{
        		
       			$config['upload_path'] = 'files/candidatures/'.$this->input->post("GMCA_ANNEE_CANDIDATURE").'/'.strtoupper($this->input->post("GMET_NOM")).'_'.ucfirst($this->input->post("GMET_PRENOM")); 
       			$config['allowed_types'] = 'jpeg|jpg|gif|png|bmp'; 
        		$config['overwrite'] = false; 
        		$config['remove_spaces'] = true;

        		if(!is_dir($config['upload_path']))
        		{
				   	mkdir($config['upload_path'], 0777, true);
				}
       			$this->load->library('upload', $config);

        		if ( !$this->upload->do_upload('GMCA_COPIE_CARTE_IDENTITE'))
        		{
        			$data['error_id_card'] =  $this->upload->display_errors();
        		}
   				
   				else
   				{
   					$this->candidature_m->upload_id_card();
   					 redirect('candidat_c/candidature_upload_documents/'.$id);
   				}
   			}
			else
			{
				if($_FILES['GMCA_COPIE_CARTE_IDENTITE']['error']==4)
				{
					$message='<p>'.lang('upload_no_file_selected').'</p>';
				}
				else
				{
					$message = '<p>'.$message.'</p>';
				}

				$data['error_id_card'] = $message;
			}
  			
  		}
  		elseif($this->input->post('save_cv'))
  		{
  			if($_FILES['GMCA_CV']['error'] == 0)
        {
            
            $config['upload_path'] = 'files/candidatures/'.$this->input->post("GMCA_ANNEE_CANDIDATURE").'/'.strtoupper($this->input->post("GMET_NOM")).'_'.ucfirst($this->input->post("GMET_PRENOM")); 
            $config['allowed_types'] = 'pdf'; 
            $config['overwrite'] = true; 
            $config['remove_spaces'] = true;

            if(!is_dir($config['upload_path']))
            {
            mkdir($config['upload_path'], 0777, true);
        }
            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload('GMCA_CV'))
            {
              $data['error_cv'] =  $this->upload->display_errors();
            }
          
          else
          {
            $this->candidature_m->upload_cv();
            redirect('candidat_c/candidature_upload_documents/'.$id);
          }
            }
        else
        {
          if($_FILES['GMCA_CV']['error']==4)
          {
            $message='<p>'.lang('upload_no_file_selected').'</p>';
          }
          else
          {
            $message = '<p>'.$message.'</p>';
          }

          $data['error_cv'] = $message;
        }
  		}
		elseif($this->input->post('save_photo'))
  		{
  			if($_FILES['GMET_PHOTO']['error'] == 0)
   			{
        		
       			$config['upload_path'] = 'files/candidatures/'.$this->input->post("GMCA_ANNEE_CANDIDATURE").'/'.strtoupper($this->input->post("GMET_NOM")).'_'.ucfirst($this->input->post("GMET_PRENOM")); 
       			$config['allowed_types'] = 'jpeg|jpg|gif|png'; 
        		$config['overwrite'] = false; 
        		$config['remove_spaces'] = true;

        		if(!is_dir($config['upload_path']))
        		{
				   	mkdir($config['upload_path'], 0777, true);
				}
       			$this->load->library('upload', $config);

        		if ( !$this->upload->do_upload('GMET_PHOTO'))
        		{
        			$data['error_photo'] =  $this->upload->display_errors();
        		}
   				
   				else
   				{
   					$this->candidature_m->upload_photo();
   					 redirect('candidat_c/candidature_upload_documents/'.$id);
   				}
   			}
			else
			{
				if($_FILES['GMET_PHOTO']['error']==4)
				{
					$message='<p>'.lang('upload_no_file_selected').'</p>';
				}
				else
				{
					$message = '<p>'.$message.'</p>';
				}

				$data['error_photo'] = $message;
			}
  		}
		elseif($this->input->post('save_lettre'))
  		{
  			if($_FILES['GMCA_LETTRES_RECOMMANDATION']['error'] == 0)
   			{
        		
       			$config['upload_path'] = 'files/candidatures/'.$this->input->post("GMCA_ANNEE_CANDIDATURE").'/'.strtoupper($this->input->post("GMET_NOM")).'_'.ucfirst($this->input->post("GMET_PRENOM")); 
       			$config['allowed_types'] = 'pdf|zip|rar|7zip|gzip'; 
        		$config['overwrite'] = true; 
        		$config['remove_spaces'] = true;

        		if(!is_dir($config['upload_path']))
        		{
				   	mkdir($config['upload_path'], 0777, true);
				}
       			$this->load->library('upload', $config);

        		if ( !$this->upload->do_upload('GMCA_LETTRES_RECOMMANDATION'))
        		{
        			$data['error_lettre'] =  $this->upload->display_errors();
        		}
   				
   				else
   				{
   					$this->candidature_m->upload_lettre();
   					 redirect('candidat_c/candidature_upload_documents/'.$id);
   				}
   			}
			else
			{
				if($_FILES['GMCA_LETTRES_RECOMMANDATION']['error']==4)
				{
					$message='<p>'.lang('upload_no_file_selected').'</p>';
				}
				else
				{
					$message = '<p>'.$message.'</p>';
				}

				$data['error_lettre'] = $message;
			}
  		}
		
		$this->load->view('etudiant_candidat/candidat_upload_documents', $data);
		
	}
  public function candidature_inscription_en_ligne($id)  
  {
     {
               // $this->load->helper(array('form', 'url'));

               // $this->load->library('form_validation');
           $this->form_validation->set_rules( 'username', 'Username','required|min_length[5]|max_length[12]|is_unique[users.username]',
        array(  'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        )
);
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('etudiant_candidat/candidat_formulaire_inscription');
                }
                else
                {
                        $this->load->view('etudiant_candidat/formsuccess');
                }
        }
   // $this->load->view('etudiant_candidat/candidat_formulaire_inscription');
  }
  public function candidature_old_studies($id)
  {
    $data['candidat'] = $this->candidature_m->get_candidat_by_id($id);

    $this->load->view('etudiant_candidat/candidature_old_studies', $data);
  }
  
 public function candidature_langue()
  {

    $data['candidat'] = $this->candidature_m->get_candidat_by_id($this->session->userdata('id'));
    $data['langue'] = $this->langue_m->getAllLanguesById($this->session->userdata('GMET_CODE'));
    $data['languages'] = $this->langue_m->getLanguages();

    if($this->input->post('valider'))
    {
      $this->form_validation->set_rules('GMLA_CODE', lang('info_candidat_langue_nom'), 'required');
      $this->form_validation->set_rules('GMEL_LU', lang('info_candidat_langue_lu'), 'required|max_length[1]'); 
      $this->form_validation->set_rules('GMEL_ECRIT', lang('info_candidat_langue_ecrit'), 'required|max_length[1]'); 
      $this->form_validation->set_rules('GMEL_PARLE', lang('info_candidat_langue_parle'), 'required|max_length[1]');
      $this->form_validation->set_rules('GMEL_CERTIFICATION_NOM', lang('info_candidat_langue_certif_nom'), 'alphanumeric');
      $this->form_validation->set_rules('GMEL_CERTIFICATION_NOTE', lang('info_candidat_langue_certif_note'), 'numeric');
      if($this->form_validation->run() == TRUE)
      {

       // echo var_dump($this->input->post());
        $this->langue_m->addLangue();
         redirect('candidat_c/candidature_langue/');
          }
    }

    if($this->input->post('modifier'))
    {
      $this->form_validation->set_rules('GMLA_CODE', lang('info_candidat_langue_nom'), 'required');
      $this->form_validation->set_rules('GMEL_LU', lang('info_candidat_langue_lu'), 'required|max_length[1]'); 
      $this->form_validation->set_rules('GMEL_ECRIT', lang('info_candidat_langue_ecrit'), 'required|max_length[1]'); 
      $this->form_validation->set_rules('GMEL_PARLE', lang('info_candidat_langue_parle'), 'required|max_length[1]');
      $this->form_validation->set_rules('GMEL_CERTIFICATION_NOM', lang('info_candidat_langue_certif_nom'), 'alphanumeric');
      $this->form_validation->set_rules('GMEL_CERTIFICATION_NOTE', lang('info_candidat_langue_certif_note'), 'numeric');
      if($this->form_validation->run() == TRUE)
      {
        $this->langue_m->editLangueEtu();
        redirect('candidat_c/candidature_langue/');
      }
    }

    if($this->input->post('delete'))
    {
      $this->langue_m->deleteLangue();
      redirect('candidat_c/candidature_langue/');
    }

    
      $this->load->view('etudiant_candidat/candidat_langue', $data);
    
  
}
  public function candidature_emploi()
  {
    $data['candidat'] = $this->candidature_m->get_candidat_by_id($this->session->userdata('id'));
    $data['emploi'] = $this->emploi_m->getAllEmplois($this->session->userdata('GMET_CODE'));
  

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
         redirect('candidat_c/candidature_emploi/');
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
        redirect('candidat_c/candidature_emploi/');
      }
    }

    if($this->input->post('delete'))
    {
      $this->emploi_m->deleteEmploi();
      redirect('candidat_c/candidature_emploi/');
    }

    
      $this->load->view('etudiant_candidat/candidat_emploi', $data);
    
  }
  

  public function candidature_stage_projet(){}

	public function candidature_conditions_inscription(){

	
      
		$this->load->view('etudiant_candidat/candidat_conditions_inscription');
	}

	public function candidature_pieces_jointes_obligatoires(){
	
         
		$this->load->view('etudiant_candidat/candidat_pieces_jointes_obligatoires');
	}
  

  public function ancien_annuaire()

    {
          $data['candidat'] = $this->candidature_m->get_candidat_by_id($this->session->userdata('id'));


      $message = 'Annuaire des anciens';
      
      $config = array();
      $config["base_url"] = base_url(). "candidat_c/ancien_annuaire";
      $config["total_rows"] = $this->ancien_m->calcul_ancien();
      $config["per_page"] = 10;
      $config["uri_segment"] = 3;
     
      $this->pagination->initialize($config);
      
      $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
      $data["result"] = $this->ancien_m->getByPage($config["per_page"],$start);
      $data["links"] = $this->pagination->create_links();
      $data["message"] = $message;

      $this->load->view('etudiant_candidat/ancien_annuaire',$data);
    }
    public function consulter_procedure() {
     $data['candidat'] = $this->candidature_m->get_candidat_by_id($this->session->userdata('id'));
    $this->load->view('etudiant_candidat/candidat_consultation_procedure',$data);

    }


    public function demande_attestation_preinscription(){

           $data['candidat'] = $this->candidature_m->get_candidat_by_id($this->session->userdata('id'));
           $data['avis_jury']=$this->candidature_m->get_avis_jury_by_id($this->session->userdata('id'));
           $data['etat_demande']=$this->candidature_m->get_etat_demande_attestaion_by_id($this->session->userdata('id'));
           $this->form_validation->set_rules('S1', 'S1', 'required');
           $nom=$this->authentification_m->get_nom_candidat($this->session->userdata('id'));
           $prenom=$this->authentification_m->get_prenom_candidat($this->session->userdata('id'));
           $email=$this->authentification_m->get_email_by_login($this->session->userdata('id'));

           //get_email_by_login
          // $prenom=$candidat->GMET_PRENOM;   
           $data['avis_jury']=$this->candidature_m->get_avis_jury_by_id($this->session->userdata('id'));  
          // $data['demande_attestation']=$this->candidature_m->get_etat_demande_attestaion_by_id($id);
                                                           
        //if ($this->input->post()=='Valider' ){
         if($this->form_validation->run() == TRUE)  { 

          $this->candidature_m->insert_demande_attestation_by_id($this->session->userdata('id'));
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'ibeghouchene.nadir@gmail.com';          // SMTP username
$mail->Password = 'Nadi2016R'; // SMTP password
$mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                 // TCP port to connect to

$mail->setFrom('ibeghouchene.nadir@gmail.com', 'Equipe master MBDS');
$mail->addReplyTo('ibeghouchene.nadir@gmail.com', 'Equipe master MBDS');
$mail->addAddress('ibeghouchene.nadir@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Demande d\'une attestation de preinscription </h1>';
$bodyContent .= '<p>Par le candidat: </p>
<b>NOM : </b>'.$nom.'
<p><b>PRENOM : </b>'.$prenom.'</p><b> EMAIL <b>'.$email;

$mail->Subject = 'Inscription Master MBDS';
$mail->Body    = $bodyContent;
$mail->send();
          redirect('candidat_c/demande_attestation_preinscription');
        }
        // $this->load->view('etudiant_candidat/candidat_demande_attestation_preinscription',$data);

       //           $this->load->view('etudiant_candidat/candidat_demande_attestation_reussi',$data);
    
         $this->load->view('etudiant_candidat/candidat_demande_attestation_preinscription',$data);
       }
  



    
    public function information_sur_la_rentre(){
    $data['candidat'] = $this->candidature_m->get_candidat_by_id($this->session->userdata('id'));
    $this->load->view('etudiant_candidat/candidat_information_rentre',$data);
 
    }
    /*
     public function candidature_stage_projet($id)
  {
    
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
         redirect('candidat_c/candidature_stage_projet/'.$id);
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
        redirect('candidat_c/candidature_stage_projet/'.$id);
      }
    }

    if($this->input->post('delete'))
    {
      echo "supprimer";
      $this->stage_projet_seminaire_m->deleteStageProjetSeminaire();
      redirect('candidat_c/candidature_stage_projet/'.$this->input->post('GMCA_CODE'));
    }

    
      $this->load->view('etudiant_candidat/candidat_stage_projet', $data);-->
    
    */
    
    public function candidat_confirmation_visa(){

     $data['candidat'] = $this->candidature_m->get_candidat_by_id($this->session->userdata('id'));
     
     $data['NUMERO_VISA']=$this->candidature_m->get_etat_visa($this->session->userdata('id'));
     $data['date_actuel']= date("Y-m-d");
     $data['date_saisie']=$this->input->post('Date_obtention');

 
   // if($this->input->post('valider'))
   // {
       //$this->form_validation->set_rules('Date_obtention', 'Date_obtention', 'required');
      // $this->form_validation->set_rules('Numero_du_visa', 'Numero_du_visa', 'required');
     //  $this->form_validation->set_rules('Pays', 'Pays', 'required');
    //   $this->candidature_m-> insert_infos_visa($id);
  
         // if($this->form_validation->run() == TRUE) 
          if($this->input->post('valider'))  {

        $this->form_validation->set_rules('Date_obtention',lang('Date_obtention'),'required|date_valid');
        $this->form_validation->set_rules('Numero_du_visa',lang('Numero_du_visa'), 'required');
        $this->form_validation->set_rules('Pays', 'Pays', 'required');
         

          if ($this->form_validation->run() == true and $data['date_saisie']<=$data['date_actuel']){

          $this->candidature_m-> insert_infos_visa($id);
           // $data['NUMERO_VISA']= $this->candidature_m->get_etat_visa($id);

          
         redirect('candidat_c/candidat_confirmation_visa/'.$id);
      //
}       }
                  $this->load->view('etudiant_candidat/candidat_confirmation_visa',$data);

}

    //     $this->candidature_m->insert_document_candidat();
//      $data['etat_visa']= $this->candidature_m->get_etat_visa($id);

    
/*
	public function candidature_etape_information_detaille_2()
	{

	}

	public function candidature_etape_question()
	{

	}
*/
  
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