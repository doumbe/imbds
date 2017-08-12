<?php
class Intervenant_ajout extends CI_Controller
{


	public function __construct()
    {
		parent:: __construct();

		$this->lang->load("intervenant","french");
		$this->lang->load("upload","french");

 		$this->load->helper("url");
		$this->load->helper('language');
 		$this->load->helper('form');

 		$this->load->library('form_validation');

 		$this->load->model('antenne_m');
 		$this->load->model('contact_m');
 		$this->load->model('cours_m');
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


 	public function ajouter_document_cours()
 	{
 		if($this->input->post('retour'))
		{
			redirect('intervenant_list/list_document_cours');
		}

		else
		{
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
      				$config['allowed_types'] ='*';
      				$config['overwrite'] = true;
      				$config['remove_spaces'] = true;

      				if(!is_dir($config['upload_path']))
      				{
      					mkdir($config['upload_path'], 0777, true);
      				}

      				$this->load->library('upload', $config);

      				if( !$this->upload->do_upload('GMDA_DOCUMENT'))
      				{
      					$data['error_document'] = $this->upload->display_errors();
      				}

      				else
      				{
      					$this->document_attache_m->inserer_document_attache();
      					redirect("intervenant_list/list_document_cours");
      				}
      			}
      			else
      			{
      				if($_FILES['GMDM_DOCUMENT']['error']==4)
      				{
      					$message = '<p>'.lang('upload_no_file_selected').'</p>';
      				}
      				else
      				{
      					$message = '<p>'.$message.'</p>';
      				}
      				$data['error_document'] = $message;
      			}
      			
      		}
      		$this->load->view('intervenant/ajouter/vue_ajout_document_cours', $data);
      	}
 	}


      public function ajouter_document_examen()
      {
            if($this->input->post('retour'))
            {
                  redirect('intervenant_list/list_document_sujet_examen');
            }

            else
            {
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
                              $config['allowed_types'] ='*';
                              $config['overwrite'] = true;
                              $config['remove_spaces'] = true;

                              if(!is_dir($config['upload_path']))
                              {
                                    mkdir($config['upload_path'], 0777, true);
                              }

                              $this->load->library('upload', $config);

                              if( !$this->upload->do_upload('GMDA_DOCUMENT'))
                              {
                                    $data['error_document'] = $this->upload->display_errors();
                              }

                              else
                              {
                                    $this->document_attache_m->inserer_document_attache();
                                    redirect("intervenant_list/list_document_sujet_examen");
                              }
                        }
                        else
                        {
                              if($_FILES['GMDM_DOCUMENT']['error']==4)
                              {
                                    $message = '<p>'.lang('upload_no_file_selected').'</p>';
                              }
                              else
                              {
                                    $message = '<p>'.$message.'</p>';
                              }
                              $data['error_document'] = $message;
                        }
                        
                  }
                  $this->load->view('intervenant/ajouter/vue_ajout_document_examen', $data);
            }

      }


      public function ajouter_document_vacation()
      {
            if($this->input->post('retour'))
            {
                  redirect('intervenant_list/list_document_vacation');
            }

            else
            {
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
                              $config['allowed_types'] ='pdf|zip|rar|7zip|gzip';
                              $config['overwrite'] = true;
                              $config['remove_spaces'] = true;

                              if(!is_dir($config['upload_path']))
                              {
                                    mkdir($config['upload_path'], 0777, true);
                              }

                              $this->load->library('upload', $config);

                              if( !$this->upload->do_upload('GMDA_DOCUMENT'))
                              {
                                    $data['error_document'] = $this->upload->display_errors();
                              }

                              else
                              {
                                    $this->document_attache_m->inserer_document_attache();
                                    redirect("intervenant_list/list_document_vacation");
                              }
                        }
                        else
                        {
                              if($_FILES['GMDM_DOCUMENT']['error']==4)
                              {
                                    $message = '<p>'.lang('upload_no_file_selected').'</p>';
                              }
                              else
                              {
                                    $message = '<p>'.$message.'</p>';
                              }
                              $data['error_document'] = $message;
                        }
                        
                  }
                  $this->load->view('intervenant/ajouter/vue_ajout_document_vacation', $data);
            }

      }

}

?>