<?php

  class ancien_c extends CI_Controller
  {

    public function __construct()
    {
      parent:: __construct();
//    $id='GMCA160011';
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
    $this->load->model('authentification_m');

    $this->load->model('stage_projet_seminaire_m');
    $this->load->model('langue_m');
    $this->load->model('emploi_m');
  //  $this->candidat = $this->candidature_m->get_candidat_by_id($id);
     //chargement de la librairie pour la validation du formulaire
    $this->load->library('form_validation');
  //chargement du helper form
      $this->lang->load("etudiant","french");
      $this->load->model('ancien_m');
      $this->load->model('promotion_m');
      $this->load->library("pagination");
      $this->load->library('table');

      $this->lang->load("etudiant","french");

      $this->load->model('ancien_m');
      $this->load->model('candidature_m');
      $this->load->model('authentification_m');

      $this->load->model('promotion_m');

      $this->load->helper("url");
      $this->load->helper('language');
      $this->load->helper('form');
    
      $this->load->library("pagination");
      $this->load->library('table');

     // $this->load->liste_ancien();
    }

    function index()
    {
      //$this->load->ancien_annuaire();
    }
    public function ancien_etudiant(){

      $this->load->view('ancien/page_gestion_ancien');
    }
    public function ancien_annuaire()
    {
      $message = 'Annuaire des anciens';
      
      $config = array();
      $config["base_url"] = base_url(). "ancien_c/ancien_annuaire";
      $config["total_rows"] = $this->ancien_m->calcul_ancien();
      $config["per_page"] = 10;
      $config["uri_segment"] = 3;
     
      $this->pagination->initialize($config);
      
      $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
      $data["result"] = $this->ancien_m->getByPage($config["per_page"],$start);
      $data["links"] = $this->pagination->create_links();
      $data["message"] = $message;

      $this->load->view('ancien/ancien_annuaire',$data);
    }
    public function ancien_annuaireOrderBYannee()
    {
      $message = 'Annuaire des anciens';
      
      $config = array();
      $config["base_url"] = base_url(). "ancien_c/ancien_annuaireOrderBYannee";
      $config["total_rows"] = $this->ancien_m->calcul_ancien();
      $config["per_page"] = 10;
      $config["uri_segment"] = 3;
     
      $this->pagination->initialize($config);
      
      $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
      $data["result"] = $this->ancien_m->getByPageOrderByAnnee($config["per_page"],$start);
      $data["links"] = $this->pagination->create_links();
      $data["message"] = $message;

      $this->load->view('ancien/ancien_annuaire',$data);
    }

   public function fiche_personnelle()
  {  
  
     $data['candidat'] = $this->candidature_m->get_candidat_by_id($this->session->userdata('id'));
   
   

    if ($this->input->post('retour')) 
    {
      //echo 'hello';
      redirect('ancien_c/fiche_personnelle/');
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
       
       redirect('ancien_c/fiche_personnelle/');

      }
      elseif ($this->form_validation->run() == FALSE && $this->input->post('valider'))
      {
        redirect('ancien_c/fiche_personnelle/');
      }
      else
      {
      $this->load->view('ancien/candidat_fiche_informations', $data);
    }

  }   
  
    
   }
  
   
?>