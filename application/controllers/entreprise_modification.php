<?php
class Entreprise_modification extends CI_Controller
{


	public function __construct()
    {
		parent:: __construct();

		$this->lang->load("entreprise","french");

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

//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes PROCEDURE ADMINISTRATIVE
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifier_procedure_administrative($id)
	{

     	 	$procedure_administrative = $this->procedure_m->get_procedure_administrativeById($id);
			
      		$data['id'] = $id;
      		$data['procedure_administrative'] = $procedure_administrative;
     		
      		$this->load->view('backoffice/modifier/vue_modifier_procedure_administrative',$data);	
	}

	public function edit_procedure_administrative()
	{

		
		if ($this->input->post('retour')) 
		{
			redirect('entreprise_liste/list_procedure_admin');
		}

		else
		{
			$id =$this->input->post('GMPA_CODE');
			$this->form_validation->set_rules('GMPA_NOM', lang('th_nom'), 'required|max_length[50]');
      		$this->form_validation->set_rules('GMPA_DESCRIPTION', lang('val_description'), 'required|min_length[5]|max_length[1000]');
      		$this->form_validation->set_rules('GMPA_TYPE', lang('th_type'), 'required|alpha_dash|max_length[50]');

      		$data = array();
      		if($this->form_validation->run() == TRUE)
      		{
      			if($_FILES['GMPA_DOCUMENT']['error']==4)
      			{
	       			$this->procedure_m->edit_procedure_administrative();
      			}
      			if($_FILES['GMPA_DOCUMENT']['error'] == 0)
       			{
           			$config['upload_path'] = 'files/procedures/';
           			$config['allowed_types'] = '*'; 
            		$config['overwrite'] = true; 
            		$config['remove_spaces'] = true;

            		if(!is_dir($config['upload_path']))
	        		{
					   	mkdir($config['upload_path'], 0777, true);
					}

           			$this->load->library('upload', $config);
		           	if($_FILES['GMPA_DOCUMENT']['error'] == 0)
		   			{
		       			$this->load->library('upload', $config);

		        		if ( !$this->upload->do_upload('GMPA_DOCUMENT'))
		        		{
		        			$data['error_document'] =  $this->upload->display_errors();
		        		}
		        		else
	        			{
	       					$this->procedure_m->edit_procedure_administrative();
						}
		   				
		   			}
					
					else
					{
						$message = '<p>'.$message.'</p>';

						$data['error_document'] = $message;
					}


       			}
       		 }
			

			
			
			$procedure_administrative = $this->procedure_m->get_procedure_administrativeById($id);

			
			$this->modifier_procedure_administrative($id);	
		}

	}

	public function fiche_procedure_administrative($id)
	{
		if ($this->input->post('retour')) 
		{
			redirect('entreprise_liste/list_procedure_admin');
		}

		else
		{
			$procedure_administrative = $this->procedure_m->get_procedure_administrativeById($id);
     		$data['id'] = $id;
      		$data['procedure_administrative'] = $procedure_administrative;

     		$this->load->view('entreprise/fiches/fiche_procedure_administrative', $data);
		}
	}
}


