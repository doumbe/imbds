<?php
class Intervenant_modification extends CI_Controller
{

	public function __construct()
    {
		parent:: __construct();

		$this->lang->load("intervenant","french");

 		$this->load->helper("url");
		$this->load->helper('language');
 		$this->load->helper('form');

 		$this->load->library('form_validation');

 		$this->load->model('antenne_m');
 		$this->load->model('contact_m');
 		$this->load->model('cours_m');
    $this->load->model('presence_m');
 		$this->load->model('document_attache_m');
 		$this->load->model('document_modele_m');
 		$this->load->model('emploi_m');
 		$this->load->model('entreprise_m');
 		$this->load->model('etudes_superieures_m');
 		$this->load->model('etudiant_m');
 		$this->load->model('formation_m');
 		$this->load->model('intervenant_m');
 		$this->load->model('jury_m');
 		$this->load->model('langue_m');
 		$this->load->model('matiere_m');
 		$this->load->model('note_m');
 		$this->load->model('parametre_m');
 		$this->load->model('planning_m');
 		$this->load->model('procedure_m');
 		$this->load->model('promotion_m');
 		$this->load->model('question_m');
 		$this->load->model('salle_m');
 		$this->load->model('seance_m');
 		$this->load->model('semestre_m');
 		$this->load->model('social_networks_m');
 		$this->load->model('soutenance_m');
 		$this->load->model('stage_projet_seminaire_m');
 		$this->load->model('ue_m');
 		
 	}


 	public function ficheCours($id)
 	{

 		if($this->input->post('retour'))
 		{
 			redirect('intervenant_list/listeCours');
 		}
 		else
 		{
 			$data = array('id' => $id,
 							"cours" => $this->cours_m->getCoursById($id));
 			$this->load->view('intervenant/fiche/fiche_cours', $data);
 		}
 	}


 	public function fiche_document_cours($id)
 	{
 		if($this->input->post('retour'))
 		{
 			redirect('intervenant_list/list_document_cours');
 		}
 		else
 		{
 			$document_attache = $this->document_attache_m->get_document_attacheById($id);
 			$data['id'] = $id;
 			$data['document_attache'] = $document_attache;

 			$this->load->view('intervenant/fiche/fiche_document_cours', $data);
 		}
 	}


 	public function fiche_document_examen($id)
 	{
 		if($this->input->post('retour'))
 		{
 			redirect('intervenant_list/list_document_sujet_examen');
 		}
 		else
 		{
 			$document_attache = $this->document_attache_m->get_document_attacheById($id);
 			$data['id'] = $id;
 			$data['document_attache'] = $document_attache;

 			$this->load->view('intervenant/fiche/fiche_document_examen', $data);
 		}
 	}

  public function fiche_document_vacation($id)
  {
    if($this->input->post('retour'))
    {
      redirect('intervenant_list/list_document_vacation');
    }
    else
    {
      $document_attache = $this->document_attache_m->get_document_attacheById($id);
      $data['id'] = $id;
      $data['document_attache'] = $document_attache;

      $this->load->view('intervenant/fiche/fiche_document_vacation', $data);
    }
  }

    public function fiche_note_etudiant($id)
    {
      if($this->input->post('retour'))
      {
        redirect('intervenant_affichage/affichage_liste_notes_etudiants');
      }
      else
      {
        $note_etudiant = $this->note_m->getNoteByEtudiant($id);
        $data['id'] = $id;
        $data['note_etudiant'] = $note_etudiant;

        $this->load->view('intervenant/fiche/fiche_note_etudiant', $data);
      }
    }


 	public function modifier_document_cours($id)
 	{
 		$document_attache = $this->document_attache_m->get_document_attacheById($id);

 		$data['id'] = $id;
 		$data['document_attache'] = $document_attache;

 		$this->load->view('intervenant/modifier/vue_modifier_document_attache',$data);
 	
 	}


 	public function modifier_document_examen($id)
 	{
 		$document_attache = $this->document_attache_m->get_document_attacheById($id);

 		$data['id'] = $id;
 		$data['document_attache'] = $document_attache;

 		$this->load->view('intervenant/modifier/vue_modifier_document_attache_examen',$data);
 	
 	}


    public function modifier_document_vacation($id)
  {
    $document_attache = $this->document_attache_m->get_document_attacheById($id);

    $data['id'] = $id;
    $data['document_attache'] = $document_attache;

    $this->load->view('intervenant/modifier/vue_modifier_document_attache_vacation',$data);
  
  }

  public function modifier_notes_etudiant($id)
  {
    $note_etudiant = $this->note_m->getNoteByEtudiantId($id);
    $etudiant = $this->etudiant_m->get_etudiant($id);

    $data['id'] = $id;
    $data['note_etudiant'] = $note_etudiant;
    $data['etudiant'] = $etudiant;


    $this->load->view('intervenant/modifier/vue_modifier_notes_etudiant', $data);

  }

  public function modifier_statut_etudiant($id)
  {
    $statut = $this->presence_m->getStatutEtudiant($id);
    $etudiant = $this->etudiant_m->get_etudiant($id);
      
      $data['id'] = $id;
      $data['statut'] = $statut;
      $data['etudiant'] = $etudiant;

      $this->load->view('intervenant/modifier/vue_modifier_statut_etudiant', $data);

  }
  



 	public function edit_document_attache()
	{

		
		if ($this->input->post('retour')) 
		{
			redirect('intervenant_list/list_document_cours');
		}

		else
		{
			$id =$this->input->post('GMDA_CODE');

			$this->form_validation->set_rules('GMDA_NOM', lang('val_nom_doc'), 'required|alpha_dash|max_length[30]');
      		$this->form_validation->set_rules('GMDA_TYPE', lang('val_type_doc'), 'required|alpha|max_length[30]');
      		$this->form_validation->set_rules('GMDA_FORMAT', lang('val_format'), 'required|alpha|max_length[20]');    		
      		$this->form_validation->set_rules('GMDA_ANNEE', lang('th_annee'), 'required|numeric|min_length[4]|max_length[4]');
      		$data=array();
      	
      		if($this->form_validation->run() == TRUE)
      		{
      			if($_FILES['GMDA_DOCUMENT']['error'] == 0)
       			{
            		
           			$config['upload_path'] = 'files/document_attache/'.$this->input->post("GMDA_ANNEE").'/'; 
           			$config['allowed_types'] = '*'; 
            		$config['overwrite'] = true; 
            		$config['remove_spaces'] = true;

            		if(!is_dir($config['upload_path']))
            		{
					       	mkdir($config['upload_path'], 0777, true);
					      }

					
           			$this->load->library('upload', $config);

            		if ( !$this->upload->do_upload('GMDA_DOCUMENT'))
            		{
            			$data['error_document'] =  $this->upload->display_errors();
            		}
       				
       				  else
       				  {
       					  $this->document_attache_m->edit_document_attache();
       				  }
       			
       			}
       			else
       			{
       				if($_FILES['GMDA_DOCUMENT']['error']==4)
					     {
						    $message='<p>'.lang('upload_no_file_selected').'</p>';
					     }
					     else
					     {
						      $message = '<p>'.$message.'</p>';
					     }
            		$data['error_document'] =  $message;
       			}
      		}

			$this->modifier_document_cours($id);	
		}

	}


  public function edit_notes_cours_etudiant()
  {

    
    if ($this->input->post('retour')) 
    {
      redirect('intervenant_affichage/affichage_liste_notes_etudiants');
    }

    else
    {
      $id =$this->input->post('GMET_CODE');
      $this->form_validation->set_rules('GMET_NOM', lang('val_nom_etu'), 'required|alpha|max_length[30]');
      $this->form_validation->set_rules('GMET_PRENOM', lang('val_prenom'), 'required|alpha|max_length[30]');
      $this->form_validation->set_rules('GMNO_CONTROLE_CONTINU', lang('val_note_cc'), 'required|numeric|max_length[5]');
      $this->form_validation->set_rules('GMNO_PROJET', lang('val_projet'), 'required|numeric|max_length[5]');   
      $this->form_validation->set_rules('GMNO_EXAMEN', lang('val_examen'), 'required|numeric|max_length[5]');       
      $this->form_validation->set_rules('GMNO_FINALE', lang('val_finale'), 'required|numeric|max_length[5]');
      $data=array();

      if($this->form_validation->run() == TRUE)
      {
        $this->note_m->edit_note_etudiant();
      }


     $this->modifier_notes_etudiant($id);

    }
  }


  public function edit_statut_etudiant()
  {

    
    if ($this->input->post('retour')) 
    {
      redirect('intervenant_affichage/affichage_liste_presences_absences');
    }

    else
    {
      $id =$this->input->post('GMET_CODE');
      $this->form_validation->set_rules('GMET_NOM', lang('val_nom_etu'), 'required|alpha|max_length[30]');
      $this->form_validation->set_rules('GMET_PRENOM', lang('val_prenom'), 'required|alpha|max_length[30]');
      $this->form_validation->set_rules('GMPRE_STATUT', lang('val_statut'), 'required|alpha|max_length[2]');

      $data=array();

      if($this->form_validation->run() == TRUE)
      {
        $this->presence_m->edit_statut_etudiant();
        
      }


     $this->modifier_statut_etudiant($id);

    }
  }



 	public function edit_document_attache_examen()
	{

		
		if ($this->input->post('retour')) 
		{
			redirect('intervenant_list/list_document_sujet_examen');
		}

		else
		{
			$id =$this->input->post('GMDA_CODE');

			$this->form_validation->set_rules('GMDA_NOM', lang('val_nom_doc'), 'required|alpha_dash|max_length[30]');
      		$this->form_validation->set_rules('GMDA_TYPE', lang('val_type_doc'), 'required|alpha|max_length[30]');
      		$this->form_validation->set_rules('GMDA_FORMAT', lang('val_format'), 'required|alpha|max_length[20]');    		
      		$this->form_validation->set_rules('GMDA_ANNEE', lang('th_annee'), 'required|numeric|min_length[4]|max_length[4]');
      		$data=array();
      	
      		if($this->form_validation->run() == TRUE)
      		{
      			if($_FILES['GMDA_DOCUMENT']['error'] == 0)
       			{
            		
           			$config['upload_path'] = 'files/document_attache/'.$this->input->post("GMDA_ANNEE").'/'; 
           			$config['allowed_types'] = '*'; 
            		$config['overwrite'] = true; 
            		$config['remove_spaces'] = true;

            		if(!is_dir($config['upload_path']))
            		{
					   	     mkdir($config['upload_path'], 0777, true);
					      }

					
           			$this->load->library('upload', $config);

            		if ( !$this->upload->do_upload('GMDA_DOCUMENT'))
            		{
            			$data['error_document'] =  $this->upload->display_errors();
            		}
       				
       				  else
       				  {
       					 $this->document_attache_m->edit_document_attache();
       				  }
       			
       			}
       			else
       			{
       				if($_FILES['GMDA_DOCUMENT']['error']==4)
					    {
						     $message='<p>'.lang('upload_no_file_selected').'</p>';
					    }
					    else
					    {
						    $message = '<p>'.$message.'</p>';
					    }
            		$data['error_document'] =  $message;
       			}
      		}

			$this->modifier_document_examen($id);	
		}

	}


    public function edit_document_attache_vacation()
    {

      
      if ($this->input->post('retour')) 
      {
        redirect('intervenant_list/list_document_vacation');
      }

      else
      {
        $id =$this->input->post('GMDA_CODE');

        $this->form_validation->set_rules('GMDA_NOM', lang('val_nom_doc'), 'required|alpha_dash|max_length[30]');
            $this->form_validation->set_rules('GMDA_TYPE', lang('val_type_doc'), 'required|alpha|max_length[30]');
            $this->form_validation->set_rules('GMDA_FORMAT', lang('val_format'), 'required|alpha|max_length[20]');        
            $this->form_validation->set_rules('GMDA_ANNEE', lang('th_annee'), 'required|numeric|min_length[4]|max_length[4]');
            $data=array();
          
            if($this->form_validation->run() == TRUE)
            {
              if($_FILES['GMDA_DOCUMENT']['error'] == 0)
              {
                  
                  $config['upload_path'] = 'files/document_attache/'.$this->input->post("GMDA_ANNEE").'/'; 
                  $config['allowed_types'] = '*'; 
                  $config['overwrite'] = true; 
                  $config['remove_spaces'] = true;

                  if(!is_dir($config['upload_path']))
                  {
                mkdir($config['upload_path'], 0777, true);
            }

            
                  $this->load->library('upload', $config);

                  if ( !$this->upload->do_upload('GMDA_DOCUMENT'))
                  {
                    $data['error_document'] =  $this->upload->display_errors();
                  }
                
                else
                {
                  $this->document_attache_m->edit_document_attache();
                }
              
              }
              else
              {
                if($_FILES['GMDA_DOCUMENT']['error']==4)
            {
              $message='<p>'.lang('upload_no_file_selected').'</p>';
            }
            else
            {
              $message = '<p>'.$message.'</p>';
            }
                  $data['error_document'] =  $message;
              }
            }

        $this->modifier_document_vacation($id); 
      }

    }

  public function fiche_procedure_administrative($id)
  {
    if ($this->input->post('retour')) 
    {
      redirect('intervenant_list/list_procedure_admin');
    }

    else
    {
      $procedure_administrative = $this->procedure_m->get_procedure_administrativeById($id);
        $data['id'] = $id;
          $data['procedure_administrative'] = $procedure_administrative;

        $this->load->view('intervenant/fiche/fiche_procedure_administrative', $data);
    }
  }


}

?>