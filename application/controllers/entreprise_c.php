<?php

  class Entreprise_c extends CI_Controller
  {

    public function __construct()
    {
      parent:: __construct();

      $this->lang->load("entreprise","french");
      $this->lang->load("calendar","french");

      $this->load->model('entreprise_m');
      $this->load->model('etudiant_m');
      $this->load->model('emploi_m');
      $this->load->model('document_attache_m');
      $this->load->model('social_networks_m');
      $this->load->model('promotion_m');
      $this->load->model('ancien_m');
      $this->load->model('stage_projet_seminaire_m');
      $this->load->model('etudes_superieures_m');
      $this->load->model('note_m');
      $this->load->model('langue_m');

      $this->load->helper("url");
      $this->load->helper('language');
      $this->load->helper('form');

      $this->load->library('form_validation');
      $this->load->library("pagination");

  

     // $this->load->liste_ancien();

    }

    function index()
    {
      $this->load->view('entreprise/pageAccueil');
        //redirect('ancien_c/ancien_annuaire'); // Une redirection de l'entreprise_c dans la fonction ancien_annuaire qui se trouve dans le controleur ancien_c

    }

    public function etudiant_annuaire()
    {
        $message = 'Annuaire des etudiants Actuels';
        
        $config = array();
        $config["base_url"] = base_url(). "entreprise_c/etudiant_annuaire";
        $config["total_rows"] = $this->etudiant_m->calcul_etudiant();
        $config["per_page"] = 30;
        $config["uri_segment"] = 3;
        
        $this->pagination->initialize($config);
        
        $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        $data["result"] = $this->etudiant_m->getByPage($config["per_page"],$start);
        $data["links"] = $this->pagination->create_links();
        $data["message"] = $message;
        
        $this->load->view('entreprise/etudiant_annuaire',$data);
        
    }

    public function afficher_offres_stage()
    {
       $message = 'Afficher offres';
      
      $config = array();
      $config["base_url"] = base_url(). "entreprise_c/afficher_offres_stage";
      $config["total_rows"] = $this->stage_projet_seminaire_m->calcul_afficher();
      $config["per_page"] = 30;
      $config["uri_segment"] = 3;
     
      $this->pagination->initialize($config);
      
      $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
      $data["result"] = $this->stage_projet_seminaire_m->getByPage($config["per_page"],$start);
      $data["links"] = $this->pagination->create_links();
      $data["message"] = $message;
       $this->load->view('entreprise/afficher_offres',$data); 

    }


    public function etudiant_details($id)
    {

      $etudiant = $this->etudiant_m->get_etudiant($id);


      if(is_null($etudiant->GMET_PHOTO) or empty($etudiant->GMET_PHOTO))
      {
        $this->etudiant_m->initPhoto($etudiant->GMET_CODE,"images/photo_profile/none.jpg");
        $etudiant->GMET_PHOTO=$this->etudiant_m->getPhotoBD($etudiant->GMET_CODE);
      }
      $files = $this->document_attache_m->getAllFilesById($etudiant->GMET_CODE);
      $networks = $this->social_networks_m->getAllSocialNetworksById($etudiant->GMET_CODE);
      $sns = $this->social_networks_m->getSocialNetworks();
      $promos = $this->promotion_m->getPromotionById($etudiant->GMET_CODE);

      $langue_result = $this->langue_m->getLanguages();
      $langue_cv = array('' => '');

      foreach ($langue_result as $langue) 
      {
        $langue_cv[$langue->GMLA_LANGUE] = $langue->GMLA_LANGUE;
      }

      $data['id'] = $etudiant->GMET_CODE;
      $data["networks"] = $networks;
      $data["sns"] = $sns;
      $data["promos"] = $promos;
      $data["files"] = $files;
      $data["etudiant"] = $etudiant;
      $data["langue_cv"] = $langue_cv;

      $this->load->view('entreprise/view_etudiant_details',$data);
    }


    public function ancien_annuaire()
    {
      $message = 'Annuaire des anciens';
      
      $config = array();
      $config["base_url"] = base_url(). "entreprise_c/ancien_annuaire";
    //  $config["total_rows"] = $this->ancien_m->calcul_ancien();
      $config["per_page"] = 30;
      $config["uri_segment"] = 3;
     
      $this->pagination->initialize($config);
      
      $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
      $data["result"] = $this->ancien_m->getByPage($config["per_page"],$start);
      $data["links"] = $this->pagination->create_links();
      $data["message"] = $message;

      $this->load->view('entreprise/ancien_annuaire',$data);
    }

    public function entreprise_details($id)
    {

      $entreprise = $this->entreprise_m->getEntrepriseById($id);


     /* if(is_null($entreprise->GMEN_PHOTO) or empty($entreprise->GMET_PHOTO))
      {
        $this->entreprise_m->initPhoto($entreprise->GMET_CODE,"images/photo_profile/none.jpg");
       // $entreprise->GMET_PHOTO=$this->entreprise_m->getPhotoBD($entreprise->GMEN_CODE);
      }
      //$files = $this->document_attache_m->getAllFilesById($entreprise->GMEN_CODE); 
      /*$networks = $this->social_networks_m->getAllSocialNetworksById($entreprise->GMEN_CODE);
      $sns = $this->social_networks_m->getSocialNetworks();
      $promos = $this->promotion_m->getPromotionById($entreprise->GMEN_CODE); */

     /* $langue_result = $this->langue_m->getLanguages();
      $langue_cv = array('' => '');

      foreach ($langue_result as $langue) 
      {
        $langue_cv[$langue->GMLA_LANGUE] = $langue->GMLA_LANGUE;
      } */

      $data['id'] = $entreprise->GMEN_CODE;
      $data["entreprise"] = $entreprise;
      /*$data["networks"] = $networks;
      $data["sns"] = $sns;
      $data["promos"] = $promos; */
     // $data["files"] = $files;
     /* $data["entreprise"] = $entreprise;
      $data["langue_cv"] = $langue_cv; */

      $this->load->view('entreprise/entreprise_details',$data);
    }

    public function desactivate_file()
    {
      $this->document_attache_m->desactivateFile();
      $data['files'] = $this->document_attache_m->getAllFilesById($this->input->post('GMET_CODE'));
      $data["entreprise"] = $this->entreprise_m->get_entreprise($this->input->post('GMET_CODE'));
      $this->load->view('entreprise/ajax/files_div',$data);
    }

    public function desactivate_all_files()
    {
      $this->document_attache_m->desactivateAllFilesById();
      $data['files'] = $this->document_attache_m->getAllFilesById($this->input->post('GMET_CODE'));
      $data["entreprise"] = $this->entreprise_m->get_entreprise($this->input->post('GMET_CODE'));
      $this->load->view('entreprise/ajax/files_div',$data);
    }
    public function activate_file()
    {
      $this->document_attache_m->activateFile();
      $data['files'] = $this->document_attache_m->getAllFilesById($this->input->post('GMEN_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMEN_CODE'));
      $this->load->view('etudiant/ajax/files_div',$data);
    }
  
  }
