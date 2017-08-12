<?php
class candidat_c extends CI_Controller
{


	public function __construct()
    {
		parent:: __construct();

		$this->lang->load("candidat","french");
		$this->lang->load("upload","french");

 		$this->load->helper("url");
		$this->load->helper('language');
 		$this->load->helper('form');

 		$this->load->library('form_validation');

 		$this->load->model('antenne_m');
 		$this->load->model('candidature_m');
    $this->load->model('stage_projet_seminaire_m');
    $this->load->model('langue_m');
    $this->load->model('emploi_m');
 		
 	}

	public function index()
	{
		$this->load->view('backoffice/pageAccueil');
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

	public function candidature_fiche_informations_resume($id)
	{
		$data['candidat'] = $this->candidature_m->get_candidat_by_id($id);
		

		if ($this->input->post('retour')) 
		{
			//echo 'hello';
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
  			$this->candidature_m->modify_infos_resume();
		   
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

	}

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

  public function candidature_old_studies($id)
  {
    $data['candidat'] = $this->candidature_m->get_candidat_by_id($id);

    $this->load->view('etudiant_candidat/candidature_old_studies', $data);
  }

  public function candidature_langue($id)
  {
    $data['candidat'] = $this->candidature_m->get_candidat_by_id($id);
    $data['langue'] = $this->langue_m->getAllLanguesById($data['candidat']->GMET_CODE);
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
         redirect('candidat_c/candidature_langue/'.$id);
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
        redirect('candidat_c/candidature_langue/'.$id);
      }
    }

    if($this->input->post('delete'))
    {
      $this->langue_m->deleteLangue();
      redirect('candidat_c/candidature_langue/'.$this->input->post('GMCA_CODE'));
    }

    
      $this->load->view('etudiant_candidat/candidat_langue', $data);
    
  }

  public function candidature_emploi($id)
  {
    $data['candidat'] = $this->candidature_m->get_candidat_by_id($id);
    $data['emploi'] = $this->emploi_m->getAllEmplois($data['candidat']->GMET_CODE);
   //$data['languages'] = $this->langue_m->getLanguages();

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
         redirect('candidat_c/candidature_emploi/'.$id);
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
        redirect('candidat_c/candidature_emploi/'.$id);
      }
    }

    if($this->input->post('delete'))
    {
      $this->emploi_m->deleteEmploi();
      redirect('candidat_c/candidature_emploi/'.$this->input->post('GMCA_CODE'));
    }

    
      $this->load->view('etudiant_candidat/candidat_emploi', $data);
    
  }

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

    
      $this->load->view('etudiant_candidat/candidat_stage_projet', $data);
    
  }

	public function candidature_conditions_inscription()
	{
		$this->load->view('etudiant_candidat/candidat_conditions_inscription');
	}

	public function candidature_pieces_jointes_obligatoires()
	{
		$this->load->view('etudiant_candidat/candidat_pieces_jointes_obligatoires');
	}

	public function candidature_etape_information_detaille_2()
	{

	}

	public function candidature_etape_question()
	{

	}



}
?>