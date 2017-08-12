<?php

class Intervenant_c extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();

		$this->lang->load("intervenant","french");
		$this->lang->load("calendar","french");


		$this->load->model('intervenant_m');
		$this->load->model('emploi_m');
		$this->load->model('document_attache_m');
		$this->load->model('social_networks_m');
		$this->load->model('note_m');
		$this->load->model('langue_m');

		$this->load->helper('url');
		$this->load->helper('language');
		$this->load->helper('form');

		$this->load->library('form_validation');
	}

	function index()
	{
		$this->load->view('intervenant/pageAccueil');
	}


	public function intervenant_details($id)
	{
		$intervenant = $this->intervenant_m->get_intervenant($id);

		$files = $this->document_attache_m->getAllFilesByIdIntervenant($intervenant->GMIN_CODE);

		$data['id'] = $intervenant->GMIN_CODE;
		$data['files'] = $files;
		$data["intervenant"] = $intervenant;
	//	$data["langue_cv"] = $langue_cv;

		$this->load->view('intervenant/intervenant_details', $data);
	}


	public function desactivate_file()
	{
		$this->document_attache_m->dasactivateFile();
		$data['files'] = $this->document_attache_m->getAllFilesByIdIntervenant($this->input->post('GMIN_CODE'));
		$data["intervenant"] = $this->intervenant_m->get_etudiant($this->input->post('GMIN_CODE'));
		$this->load->view('intervenant/ajax/files_div',$data);
	}


	public function desactive_all_files()
	{
		$this->document_attache_m->desactivateAllFilesByIdIntervenant();
		$data['files'] = $this->document_attache_m->getAllFilesByIdIntervenant($this->input->post('GMIN_CODE'));
		$data["intervenant"] = $this->intervenant_m->get_etudiant($this->input->post('GMIN_CODE'));
		$this->load->view('intervenant/ajax/files_div',$data);

	}


	public function activate_file()
	{
		$this->document_attache_m->activateFile();
		$data['files'] = $this->document_attache_m->getAllFilesByIdIntervenant($this->input->post('GMIN_CODE'));
		$data["intervenant"] = $this->intervenant_m->get_etudiant($this->input->post('GMIN_CODE'));
		$this->load->view('intervenant/ajax/files_div',$data);

	}


	public function activate_all_files()
	{
		$this->document_attache_m->activateAllFilesByIdIntervenant();
		$data['files'] = $this->document_attache_m->getAllFilesByIdIntervenant($this->input->post('GMIN_CODE'));
		$data["intervenant"] = $this->intervenant_m->get_etudiant($this->input->post('GMIN_CODE'));
		$this->load->view('intervenant/ajax/files_div',$data);
	}

	public function delete_file()
	{
		$this->document_attache_m->deleteFile();
		$data['files'] = $this->document_attache_m->getAllFilesByIdIntervenant($this->input->post('GMIN_CODE'));
		$data["intervenant"] = $this->intervenant_m->get_etudiant($this->input->post('GMIN_CODE'));
		$this->load->view('intervenant/ajax/files_div',$data);

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
                redirect("intervenant_c/intervenant_details/".$this->input->post('GMIN_CODE')); 
            }
            else
            {
                $this->document_attache_m->insertFile();
                redirect("intervenant_c/intervenant_details/".$this->input->post('GMIN_CODE'));
            }
        }
        else
        {
          redirect("intervenant_c/intervenant_details/".$this->input->post('GMIN_CODE'));
        }
    }
 

}
?>