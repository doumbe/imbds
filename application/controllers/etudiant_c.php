<?php

  class etudiant_c extends CI_Controller
  {

    public function __construct()
    {
      parent:: __construct();

      $this->lang->load("etudiant","french");
      $this->lang->load("calendar","french");
    $this->load->helper("url");


      $this->load->model('etudiant_m');
      $this->load->model('presence_m');
      $this->load->model('emploi_m');
      $this->load->model('document_attache_m');
      $this->load->model('social_networks_m');
      $this->load->model('promotion_m');
      $this->load->model('stage_projet_seminaire_m');
      $this->load->model('etudes_superieures_m');
      $this->load->model('note_m');
      $this->load->model('langue_m');

      $this->load->helper("url");
      $this->load->helper('language');
      $this->load->helper('form');

      $this->load->library('form_validation');
  

     // $this->load->liste_ancien();
    }

    function index()
    {
      //$this->load->ancien_annuaire();
      $this->etudiant_login();
    }

    public function etudiant_login() {
         $this->load->view('etudiant/etudiant_login'); 
    }

    public function etudiant_connexion() {
      
          $quelques_etudiants = array("GMET012050","GMET014009","GMET014019","GMET014024");
          // $quelques_etudiants = array("GMET030452","GMET168817","GMET197271","GMET168822");
          $id = $quelques_etudiants[array_rand($quelques_etudiants)];
          $this->etudiant_details($id); 
     
      
    }

    public function etudiant_details($id)
    {

      if(!$id) { redirect('/etudiant_c/etudiant_login');}

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

      $this->load->view('etudiant/etudiant_details',$data);
    }

    public function desactivate_file()
    {
      $this->document_attache_m->desactivateFile();
      $data['files'] = $this->document_attache_m->getAllFilesById($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/files_div',$data);
    }

    public function desactivate_all_files()
    {
      $this->document_attache_m->desactivateAllFilesById();
      $data['files'] = $this->document_attache_m->getAllFilesById($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/files_div',$data);
    }

    public function activate_file()
    {
      $this->document_attache_m->activateFile();
      $data['files'] = $this->document_attache_m->getAllFilesById($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/files_div',$data);
    }

    public function activate_all_files()
    {
      $this->document_attache_m->activateAllFilesById();
      $data['files'] = $this->document_attache_m->getAllFilesById($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/files_div',$data);
    }

    public function delete_file()
    {
      $this->document_attache_m->deleteFile();
      $data["files"] = $this->document_attache_m->getAllFilesById($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/files_div',$data);
    }


    public function add_sns()
    {
      $this->social_networks_m->addSocialNetwork();
      $data["networks"]= $this->social_networks_m->getAllSocialNetworksById($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/sns_div',$data);
    }

    public function desactivate_sns()
    {
      $this->social_networks_m->desactivateSocialNetwork();
      $data["networks"]= $this->social_networks_m->getAllSocialNetworksById($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/sns_div',$data);
    }

    public function desactivate_all_sns()
    {
      $this->social_networks_m->desactivateAllSocialNetworksById();
      $data["networks"]= $this->social_networks_m->getAllSocialNetworksById($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/sns_div',$data);
    }

    public function activate_sns()
    {
      $this->social_networks_m->activateSocialNetwork();
      $data["networks"]= $this->social_networks_m->getAllSocialNetworksById($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/sns_div',$data);
    }

    public function activate_all_sns()
    {
      $this->social_networks_m->activateAllSocialNetworksById();
      $data["networks"]= $this->social_networks_m->getAllSocialNetworksById($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/sns_div',$data);
    }

    public function delete_sns()
    {
      $this->social_networks_m->deleteSocialNetwork();
      $data["networks"] = $this->social_networks_m->getAllSocialNetworksById($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/sns_div',$data);
    }

     public function etudiant_emplois($id)
    {
      $data["etudiant"] = $this->etudiant_m->get_etudiant($id);
      $data["emplois"]= $this->emploi_m->getAllEmplois($id);

      if($this->input->post('add_emploi'))
      {
       // echo "ajouter"; 
        $this->form_validation->set_rules('GMEM_FONCTION', lang('fonction'), 'required|min_length[2]|max_length[40]');
        $this->form_validation->set_rules('GMEM_EMAIL', lang('email_emploi'), 'valid_email|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('GMEM_TELEPHONE', lang('tel_emploi'), 'numeric|min_length[2]|max_length[20]');
        $this->form_validation->set_rules('GMEM_NOM_ENTREPRISE', lang('nom_entreprise'), 'required|min_length[2]|max_length[30]'); 
        $this->form_validation->set_rules('GMEM_TYPE_CONTRAT', lang('type_contrat'), 'alpha_dash|min_length[2]|max_length[200]');
        $this->form_validation->set_rules('GMEM_SALAIRE_ANNUEL', lang('salaire'), 'required|min_length[2]|max_length[10]'); 
        $this->form_validation->set_rules('GMEM_DATE_EMBAUCHE', lang('date_deb_studies'), 'required|min_length[10]|max_length[10]'); 
        $this->form_validation->set_rules('GMEM_DATE_FIN', lang('date_fin_studies'), 'min_length[10]|max_length[10]'); 
         
        $this->form_validation->set_rules('GMEM_ADRESSE', lang('adr_emploi'), 'min_length[5]|max_length[200]');
        $this->form_validation->set_rules('GMEM_CODE_POSTAL', lang('cp_emploi'), 'min_length[3]|max_length[10]');
        $this->form_validation->set_rules('GMEM_VILLE', lang('ville_emploi'), 'required|min_length[2]|max_length[30]');
        $this->form_validation->set_rules('GMEM_PAYS', lang('pays_emploi'), 'required|alpha_dash|min_length[3]|max_length[30]');

        $this->form_validation->set_rules('GMEM_NUMERO_ORDRE', lang('numero_emploi'), 'required|min_length[1]|max_length[2]');
        $this->form_validation->set_rules('GMEM_ACTUEL', lang('actuel_emploi'), 'required|min_length[1]|max_length[1]');
        if($this->form_validation->run() == TRUE)
        {

         // echo var_dump($this->input->post());
           $this->emploi_m->addEmploi();
           redirect('etudiant_c/etudiant_emplois/'.$id);
        }
        else
        {
          $data['error_message'] = 'error';
        }
      }

      if($this->input->post('modifier'))
      {
        //echo "modifier";
        $this->form_validation->set_rules('GMSPS_TITRE', lang('title'), 'required|max_length[50]');
        $this->form_validation->set_rules('GMSPS_DESCRIPTION', lang('description'), 'required|min_length[5]|max_length[200]'); 
        $this->form_validation->set_rules('GMSPS_ENTREPRISE', lang('nom_entreprise'), 'min_length[2]|max_length[50]'); 
        $this->form_validation->set_rules('GMSPS_RESPONSABLE', lang('responsable_stage'), 'min_length[2]|max_length[50]'); 
        $this->form_validation->set_rules('GMSPS_DATE_DE_DEBUT', lang('date_deb_studies'), 'required|min_length[10]|max_length[10]'); 
        $this->form_validation->set_rules('GMSPS_DATE_DE_FIN', lang('date_fin_studies'), 'required|min_length[10]|max_length[10]'); 
        $this->form_validation->set_rules('GMSPS_TYPE', lang('type'), 'alpha|required|max_length[5]'); 
        $this->form_validation->set_rules('GMSPS_NATURE_STAGE', lang('nature_stage'), 'alpha|max_length[5]');
        $this->form_validation->set_rules('GMSPS_PAYS', lang('pays_emploi'), 'alpha_dash|max_length[30]'); 
        if($this->form_validation->run() == TRUE)
        {
          //echo var_dump($this->input->post());
          $this->emploi_m->editEmploi();
          redirect('etudiant_c/etudiant_stages/'.$id);
        }
        else
        {
          //echo var_dump($this->input->post());
          $data['error_message'] = 'error';
          $data['option_edit'] = "edit";
          $data['id_sps_selected'] = $this->input->post('GMSPS_CODE');
        }
      }
      $this->load->view('etudiant/etudiant_emplois',$data);
    }

  /*  public function form_add_emploi()
    {
      $data["emplois"]= $this->emploi_m->getAllEmplois($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/form_emploi_div',$data);
    }

    public function add_emploi()
    {
      $this->emploi_m->addEmploi();
      $data["emplois"]= $this->emploi_m->getAllEmplois($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/etudiant_emplois',$data);
    }

    public function form_edit_emploi()
    {
      $data["job"]= $this->emploi_m->getEmploi();
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/form_edit_emploi_div',$data);
    }

    public function edit_emploi()
    {
      $this->emploi_m->editEmploi();
      $data["emplois"]= $this->emploi_m->getAllEmplois($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/etudiant_emplois',$data);
    }*/

    public function delete_emploi()
    {
      $this->emploi_m->deleteEmploi();
      $data["emplois"]= $this->emploi_m->getAllEmplois($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/emploi_div',$data);
    }




    // LANGUE
    // 
  
    public function etudiant_langues($id)
    {
      $langue_result = $this->langue_m->getLanguages();
      $langue_dispo = array('' => '');

      foreach ($langue_result as $langue) 
      {
        $langue_dispo[$langue->GMLA_CODE] = $langue->GMLA_LANGUE;
      }
      $data["languages"]= $langue_dispo;
      $data["etudiant"] = $this->etudiant_m->get_etudiant($id);
      $data["langues"]= $this->langue_m->getAllLanguesById($id);

      if($this->input->post('add_langues'))
      {
       // echo "ajouter";
        $this->form_validation->set_rules('GMLA_CODE', lang('langue'), 'required|alphanumeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('GMEL_LU', lang('lu'), 'required|alpha|min_length[1]|max_length[1]'); 
        $this->form_validation->set_rules('GMEL_ECRIT', lang('ecrit'), 'required|alpha|min_length[1]|max_length[1]'); 
        $this->form_validation->set_rules('GMEL_PARLE', lang('parle'), 'required|alpha|min_length[1]|max_length[1]'); 
        $this->form_validation->set_rules('GMEL_CERTIFICATION_NOM', lang('nom_certification'), 'min_length[2]|max_length[50]'); 
        $this->form_validation->set_rules('GMEL_CERTIFICATION_NOTE', lang('note_certification'), 'alphanumeric|min_length[1]|max_length[5]'); 
        if($this->form_validation->run() == TRUE)
        {

         // echo var_dump($this->input->post());
          $this->langue_m->addLangue();
          redirect('etudiant_c/etudiant_langues/'.$id);
        }
        else
        {
          $data['error_message'] = 'error';
        }
      }

      if($this->input->post('modifier'))
      {
        //echo "modifier";
        $this->form_validation->set_rules('GMLA_CODE', lang('langue'), 'required|alphanumeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('GMEL_LU', lang('lu'), 'required|alpha|min_length[1]|max_length[1]'); 
        $this->form_validation->set_rules('GMEL_ECRIT', lang('ecrit'), 'required|alpha|min_length[1]|max_length[1]'); 
        $this->form_validation->set_rules('GMEL_PARLE', lang('parle'), 'required|alpha|min_length[1]|max_length[1]'); 
        $this->form_validation->set_rules('GMEL_CERTIFICATION_NOM', lang('nom_certification'), 'min_length[2]|max_length[50]'); 
        $this->form_validation->set_rules('GMEL_CERTIFICATION_NOTE', lang('note_certification'), 'alphanumeric|min_length[1]|max_length[5]'); 
        if($this->form_validation->run() == TRUE)
        {
          //echo var_dump($this->input->post());
          $this->langue_m->editLangueEtu();
          redirect('etudiant_c/etudiant_langues/'.$id);
        }
        else
        {
          //echo var_dump($this->input->post());
          $data['error_message'] = 'error';
          $data['option_edit'] = "edit";
          $data['id_lang_selected'] = $this->input->post('GMLA_CODE');
        }
      }

      $this->load->view('etudiant/etudiant_langues',$data);
    }

    public function delete_langue()
    {
      $this->langue_m->deleteLangue();
      $data["langues"]= $this->langue_m->getAllLanguesById($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/langue_div',$data);
    }


//////////////////////////////////////FIN LANGUE////////////////////////////////////////////////////////////////




     public function form_edit_observation()
    {
      $data["etudiant"]= $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/form_edit_observation_div',$data);
    }


    public function edit_observation()
    {
      $this->etudiant_m->editRemarques();
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/obs_div',$data);
    }

    public function form_edit_address()
    {
      $data["etudiant"]= $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/form_edit_address_div',$data);
    }

    public function edit_address()
    {
      $this->etudiant_m->editAddress();
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/address_div',$data);
    }

    public function form_edit_mail_tel()
    {
      $data["etudiant"]= $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/form_edit_mail_tel_div',$data);
    }
    
    public function edit_mail_tel()
    {
      $this->etudiant_m->editMail_tel();
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/mail_tel_div',$data);
    }

    public function etudiant_studies($id)
    {
      $data["etudiant"] = $this->etudiant_m->get_etudiant($id);
      $data["studies"]= $this->etudes_superieures_m->getAllEtudesSuperieures($id);
      $this->load->view('etudiant/etudiant_studies',$data);
    }

    public function form_add_studies()
    {
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/form_add_studies',$data);
    }

    public function add_studies()
    {
      $this->form_validation->set_rules('GMES_ETABLISSEMENT', lang('etablissement'), 'required|alphanumeric|min_length[2]|max_length[50]');
      $this->form_validation->set_rules('GMES_OPTION', lang('option'), 'required|min_length[2]|max_length[50]'); 
      $this->form_validation->set_rules('GMES_SPECIALISATION', lang('specialisation'), 'min_length[2]|max_length[50]');
      $this->form_validation->set_rules('GMES_DATE_DE_DEBUT', lang('date_deb_studies'),'required|min_length[10]|max_length[10]');
      $this->form_validation->set_rules('GMES_DATE_DE_FIN', lang('date_fin_studies'),'required|min_length[10]|max_length[10]');
      $this->form_validation->set_rules('GMES_NOM_DU_DIPLOME', lang('nom_diplome'),'required|alpha_dash|min_length[2]|max_length[100]');
      if($this->form_validation->run() == TRUE)
      {

        if($_FILES['GMES_DIPLOME']['error'] == 0)
          {
              $config['upload_path'] = 'files/diplomes/'; 
              $config['allowed_types'] = 'jpeg|jpg|pdf';
              $config['overwrite'] = true;
              $config['remove_spaces'] = true;
              
              $this->load->library('upload', $config); 

              if ( !$this->upload->do_upload('GMES_DIPLOME'))
              {
                  $data['message'] = $this->upload->display_errors(); 
                  $this->load->view('etudiant/etudiant_studies',$data);
              }
              else
              {
                  
                 // echo var_dump($this->upload);
                  $data["message"] = $this->upload;
                  $this->etudes_superieures_m->addEtudesSuperieures();
                  $data["studies"]= $this->etudes_superieures_m->getAllEtudesSuperieures($this->input->post('GMET_CODE'));
                  $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
                  $this->load->view('etudiant/etudiant_studies',$data);
              }
          }
          else
          {
            redirect("etudiant_c/etudiant_studies/".$this->input->post('GMET_CODE'));
          }

          if($_FILES['GMES_RELEVE_DE_NOTES']['error'] == 0)
          {

              $config['upload_path'] = 'files/notes/'; 
              $config['allowed_types'] = 'jpeg|jpg|pdf';
              $config['overwrite'] = true;
              $config['remove_spaces'] = true;

              if(!is_dir($config['upload_path']))
              {
                  mkdir($config['upload_path'], 0777, true);
              }

              
              $this->load->library('upload', $config); 

              if ( !$this->upload->do_upload('GMES_RELEVE_DE_NOTES'))
              {
                  $data['message'] = $this->upload->display_errors(); 
                  $data["error_message"] = 'error';
                  $this->load->view('etudiant/etudiant_studies',$data);
              
              }
              else
              {
                  
                 // echo var_dump($this->upload);
                  $data["message"] = $this->upload;
                  $this->etudes_superieures_m->add_releve_de_notes();
                  $data["studies"]= $this->etudes_superieures_m->getAllEtudesSuperieures($this->input->post('GMET_CODE'));
                  $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
                  $this->load->view('etudiant/etudiant_studies',$data);
              }
          }
        }
        else
        {
            $data["error_message"] = 'error';
            $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
            $data["studies"]= $this->etudes_superieures_m->getAllEtudesSuperieures($this->input->post('GMET_CODE'));
            $this->load->view('etudiant/etudiant_studies',$data);
        }
    }

  public function form_edit_study()
    {
      $data["study"]= $this->etudeEtudesSuperieures->getEtudesSuperieures();
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/form_edit_emploi_div',$data);
    }

    public function edit_study()
    {
      $this->etudes_superieures_m->editEtudesSuperieures();
      $data["emplois"]= $this->etudes_superieures_m->getAllEtudesSuperieures($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/etudiant_studies',$data);
    }

    public function delete_study()
    {
      if(!is_null($this->input->post('GMET_CODE')))
      {
      $this->etudes_superieures_m->deleteEtudesSuperieures();
    }
      $data["studies"]= $this->etudes_superieures_m->getAllEtudesSuperieures($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/studies_div',$data);
    }


    public function etudiant_stages($id)
    {
      $data["etudiant"] = $this->etudiant_m->get_etudiant($id);
      $data["stages"]= $this->stage_projet_seminaire_m->getAllStageProjetSeminaire($id);

      if($this->input->post('add_stages'))
      {
       // echo "ajouter";
        $this->form_validation->set_rules('GMSPS_TITRE', lang('title'), 'required|max_length[50]');
        $this->form_validation->set_rules('GMSPS_DESCRIPTION', lang('description'), 'required|min_length[5]|max_length[200]'); 
        $this->form_validation->set_rules('GMSPS_ENTREPRISE', lang('nom_entreprise'), 'min_length[2]|max_length[50]'); 
        $this->form_validation->set_rules('GMSPS_RESPONSABLE', lang('responsable_stage'), 'min_length[2]|max_length[50]'); 
        $this->form_validation->set_rules('GMSPS_DATE_DE_DEBUT', lang('date_deb_studies'), 'required|min_length[10]|max_length[10]'); 
        $this->form_validation->set_rules('GMSPS_DATE_DE_FIN', lang('date_fin_studies'), 'required|min_length[10]|max_length[10]'); 
        $this->form_validation->set_rules('GMSPS_TYPE', lang('type'), 'alpha|required|max_length[5]'); 
        $this->form_validation->set_rules('GMSPS_NATURE_STAGE', lang('nature_stage'), 'alpha|max_length[5]');
        $this->form_validation->set_rules('GMSPS_PAYS', lang('pays_emploi'), 'alpha_dash|max_length[30]');
        if($this->form_validation->run() == TRUE)
        {

         // echo var_dump($this->input->post());
          $this->stage_projet_seminaire_m->addStageProjetSeminaire();
           redirect('etudiant_c/etudiant_stages/'.$id);
        }
        else
        {
          $data['error_message'] = 'error';
        }
      }

      if($this->input->post('modifier'))
      {
        //echo "modifier";
        $this->form_validation->set_rules('GMSPS_TITRE', lang('title'), 'required|max_length[50]');
        $this->form_validation->set_rules('GMSPS_DESCRIPTION', lang('description'), 'required|min_length[5]|max_length[200]'); 
        $this->form_validation->set_rules('GMSPS_ENTREPRISE', lang('nom_entreprise'), 'min_length[2]|max_length[50]'); 
        $this->form_validation->set_rules('GMSPS_RESPONSABLE', lang('responsable_stage'), 'min_length[2]|max_length[50]'); 
        $this->form_validation->set_rules('GMSPS_DATE_DE_DEBUT', lang('date_deb_studies'), 'required|min_length[10]|max_length[10]'); 
        $this->form_validation->set_rules('GMSPS_DATE_DE_FIN', lang('date_fin_studies'), 'required|min_length[10]|max_length[10]'); 
        $this->form_validation->set_rules('GMSPS_TYPE', lang('type'), 'alpha|required|max_length[5]'); 
        $this->form_validation->set_rules('GMSPS_NATURE_STAGE', lang('nature_stage'), 'alpha|max_length[5]');
        $this->form_validation->set_rules('GMSPS_PAYS', lang('pays_emploi'), 'alpha_dash|max_length[30]'); 
        if($this->form_validation->run() == TRUE)
        {
          //echo var_dump($this->input->post());
          $this->stage_projet_seminaire_m->editStageProjetSeminaire();
          redirect('etudiant_c/etudiant_stages/'.$id);
        }
        else
        {
          //echo var_dump($this->input->post());
          $data['error_message'] = 'error';
          $data['option_edit'] = "edit";
          $data['id_sps_selected'] = $this->input->post('GMSPS_CODE');
        }
      }

      if($this->input->post('delete'))
      {
        //echo "supprimer";
        //$this->stage_projet_seminaire_m->deleteStageProjetSeminaire();
        $data["stages"]= $this->stage_projet_seminaire_m->getAllStageProjetSeminaire($this->input->post('GMET_CODE'));
        $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
        $this->load->view('etudiant/ajax/stage_div',$data);
      }
      //echo var_dump($this->input->post());
      $this->load->view('etudiant/etudiant_stage',$data);
    }


 /*      public function add_stage()
    {
      //echo var_dump($this->input->post());
      $this->stage_projet_seminaire_m->addStageProjetSeminaire();
      $data["stages"]= $this->stage_projet_seminaire_m->getAllStageProjetSeminaire($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/etudiant_stage',$data);
    }

    public function form_edit_stage()
    {
      $data["stage"]= $this->stage_projet_seminaire_m->getStageProjetSeminaire();
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/form_edit_stage_div',$data);
    }

    public function edit_stage()
    {
      $this->stage_projet_seminaire_m->editStageProjetSeminaire();
      $data["stages"]= $this->stage_projet_seminaire_m->getAllStageProjetSeminaire($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/etudiant_stage',$data);
    }
*/
    public function delete_stage()
    {
      $this->stage_projet_seminaire_m->deleteStageProjetSeminaire();
      $data["stages"]= $this->stage_projet_seminaire_m->getAllStageProjetSeminaire($this->input->post('GMET_CODE'));
      $data["etudiant"] = $this->etudiant_m->get_etudiant($this->input->post('GMET_CODE'));
      $this->load->view('etudiant/ajax/stage_div',$data);
    }

    public function releve_notes($id_etudiant)
    {
      //$this->note_m->calculNoteUEwithoutMatiere('GMUE140005',$id_etudiant);
      //$this->note_m->calculNoteUEwithoutMatiere('GMUE140006',$id_etudiant);
      //$this->note_m->calculNoteUEwithoutMatiere('GMUE140007',$id_etudiant);
      //$this->note_m->calculAllSemestreNotes(2014);
      //$this->note_m->calculAllUENotes(2014);
      //$this->note_m->calculAllMatiereNotes(2014);
      //$this->note_m->calculNoteMatiere("GMMA140002",$id_etudiant);
      //$this->note_m->initNotes(2015);
      $data["notes"] = $this->note_m->getAllNotesbyEtudiant($id_etudiant);
      $data["etudiant"] = $this->etudiant_m->get_etudiant($id_etudiant);
      $data["notes_matieres"] = $this->note_m->getNotesMatieresByEtudiant($id_etudiant);
    // echo var_dump( $data["notes"]);
      $this->load->view('etudiant/releve_notes',$data);

    }


    public function modification_etudiant($id)
    {
      $message='Modification de la fiche personnelle';
      
      $etudiant = $this->etudiant_m->get_etudiant($id);

      $promo = $this->promotion_m->getAllPromotion();
      
      $data["message"]=$message;
      $data['id'] = $id;
      $data["etudiant"] = $etudiant;
      $data["promo"] = $promo;
     
      $this->load->view('etudiant/etudiant_modification',$data);
    }

    public function submit()
    {
      $result_submit = $_POST;
      $message = $this->etudiant_m->commit($result_submit);

      $data['message']=$message;
      $data['id'] = $result_submit['GMET_CODE'];

      $this->etudiant_details($data['id'],$data['message']);
    }

    public function edit_profilepic()
    {
        if($_FILES['GMET_PHOTO']['error'] == 0)
        {
            //upload and update the file
            $config['upload_path'] = 'images/photo_profile/'; // Location to save the image
            $config['allowed_types'] = 'gif|jpeg|jpg|png';
            $config['overwrite'] = true;
            $config['remove_spaces'] = true;
            //$config['max_size']   = '100';// in KB // if required, remove the comment and give the size
            //var_dump($config);
            //
            /*if(is_file('../public/images/MBDS.png'))
            {
              die('woohoo, folder and file found');
            }*/
            $this->load->library('upload', $config); //codeigniter default function
            /*var_dump(is_dir($config['upload_path']));
            var_dump(is_writeable($config['upload_path']));*/

            if ( !$this->upload->do_upload('GMET_PHOTO'))
            {
                 $this->etudiant_details($this->input->post('GMET_CODE'));
                //redirect("etudiant_c/etudiant_details/".$this->input->post('GMET_CODE')); // redirect  page if the load fails.
            }
            else
            {
                //Image Resizing
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config['height'] = 300; // image re-size  properties
                $config['width'] = 1; // image re-size  propertiees
                $config['maintain_ratio'] = true;
                $config['master_dim'] = 'height';
 
                $this->load->library('image_lib', $config); //codeigniter default function
 
                if ( ! $this->image_lib->resize())
                {
                    $this->etudiant_details($this->input->post('GMET_CODE'));
                    //redirect("etudiant_c/etudiant_details/".$this->input->post('GMET_CODE')); // redirect  page if the resize fails.
                }
 
                $this->etudiant_m->updatePhoto($this->input->post('GMET_CODE')); // here we are using the tank auth library for user log-in. we are getting the user id and updating the resized image as that particular's avatar.
                //echo $this->upload->display_errors();
                redirect("etudiant_c/etudiant_details/".$this->input->post('GMET_CODE'));
            }
        }
        else
        {
        //show an error  to select a picture before clicking the update pic button
         $this->etudiant_details($this->input->post('GMET_CODE'));
        //redirect("etudiant_c/etudiant_details/".$this->input->post('id'));
        }
    }

    public function consulterAbsence($id) {

      $data['etudiant']=$this->etudiant_m->get_etudiant($id);
     $data['absence']=$this->presence_m->consulter_etudiant($id);
     $this->load->view('etudiant/etudiant_absence',$data);
    }

    public function add_file()
    {
        if($_FILES['GMDA_DOCUMENT']['error'] == 0)
        {
            $config['upload_path'] = 'files/document_attache/'; 
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = true;
            $config['remove_spaces'] = true;
            
            $this->load->library('upload', $config); 

            if ( !$this->upload->do_upload('GMDA_DOCUMENT'))
            {
                redirect("etudiant_c/etudiant_details/".$this->input->post('GMET_CODE')); 
            }
            else
            {
                $this->document_attache_m->insertFile();
                redirect("etudiant_c/etudiant_details/".$this->input->post('GMET_CODE'));
            }
        }
        else
        {
          redirect("etudiant_c/etudiant_details/".$this->input->post('GMET_CODE'));
        }
    }
  }
?>