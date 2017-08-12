<?php
class backoffice_affichage extends CI_Controller
{


// le constructeur pour charger tout ce dont on aura besoin
	public function __construct()
    {
		parent:: __construct();

		$this->lang->load("backoffice","french");

 		$this->load->helper("url");
		$this->load->helper('language');
 		$this->load->helper('form');

 		$this->load->library('form_validation');
 		$this->load->library('pagination');

 		$this->load->model('antenne_m');
 		$this->load->model('contact_m');
 		$this->load->model('cours_m');
 		$this->load->model('cursus_m');
 		$this->load->model('document_attache_m');
 		$this->load->model('document_modele_m');
 		$this->load->model('emploi_m');
 		$this->load->model('entreprise_m');
 		$this->load->model('etudes_superieures_m');
 		$this->load->model('etudiant_m');
 		$this->load->model('semestre_m');
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
 		$this->load->model('formation_m');
 		$this->load->model('social_networks_m');
 		$this->load->model('soutenance_m');
 		$this->load->model('stage_projet_seminaire_m');
 		$this->load->model('ue_m');
  	}


	//------------------------------------------------------------------------------------------------------------------------------
	//Methodes CURSUS (cursus détaillé, cursus résumé, enseignant vacataire/matiere, enseignant permanent/matiere)
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function affichage_choix_cursus_detaille()
	{
		$formationResult = $this->formation_m->getFormation();

		$formations = array('aucun' =>' ');

		foreach ($formationResult as $formation) 
		{
			$formations[$formation->GMFO_CODE] = $formation->formation_niveau;
		}

		$data['formations'] = $formations;
		
		$this->load->view('backoffice/affichage/cursus_detaille_choix',$data);	
	}

	public function affichage_cursus_detaille()
	{
		$data['cursus_detail'] = $this->cursus_m->get_cursus_detail_by_year_and_formation();
		$formation = $this->formation_m->getFormationByID($this->input->post('formation'));
		$data['formation'] = $formation->GMFO_FORMATION;
		$data['niveau'] = $formation->GMFO_NIVEAU;
		$data['annee'] = $this->input->post('annee');
		//echo var_dump($data['cursus_detail']);

		
		$this->load->view('backoffice/affichage/cursus_detaille',$data);	
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
		
		$this->load->view('backoffice/affichage/cursus_resume_choix',$data);	
	}

	public function affichage_cursus_resume()
	{
		$data['cursus_resume'] = $this->cursus_m->get_cursus_by_year_and_formation();
		$data['formation'] = $this->formation_m->getFormationByID($this->input->post('formation'))->GMFO_FORMATION;
		$data['annee'] = $this->input->post('annee');
		//echo var_dump($data['cursus_resume']);

		
		$this->load->view('backoffice/affichage/cursus_resume',$data);	
	}

	public function affichage_choix_enseignant_permanent_matiere()
	{
		$formationResult = $this->formation_m->getFormation();

		$formations = array('aucun' =>' ');

		foreach ($formationResult as $formation) 
		{
			$formations[$formation->GMFO_CODE] = $formation->formation_niveau;
		}

		$data['formations'] = $formations;
		
		$this->load->view('backoffice/affichage/enseignant_permanent_matiere_choix',$data);	
	}

	public function affichage_enseignant_permanent_matiere()
	{
		$data['enseignant_matiere'] = $this->cursus_m->get_enseignant_permanent_by_matiere();
		$data['formation'] = $this->formation_m->getFormationByID($this->input->post('formation'))->GMFO_FORMATION;
		$data['annee'] = $this->input->post('annee');
		//echo var_dump($data['enseignant_matiere']);

		
		$this->load->view('backoffice/affichage/enseignant_permanent_matiere',$data);	
	}

	public function affichage_choix_enseignant_vacataire_matiere()
	{
		$formationResult = $this->formation_m->getFormation();

		$formations = array('aucun' =>' ');

		foreach ($formationResult as $formation) 
		{
			$formations[$formation->GMFO_CODE] = $formation->formation_niveau;
		}

		$data['formations'] = $formations;
		
		$this->load->view('backoffice/affichage/enseignant_vacataire_matiere_choix',$data);	
	}

	public function affichage_enseignant_vacataire_matiere()
	{
		$data['enseignant_matiere'] = $this->cursus_m->get_enseignant_vacataire_by_matiere();
		$data['formation'] = $this->formation_m->getFormationByID($this->input->post('formation'))->GMFO_FORMATION;
		$data['annee'] = $this->input->post('annee');
		//echo var_dump($data['enseignant_matiere']);

		
		$this->load->view('backoffice/affichage/enseignant_vacataire_matiere',$data);	
	}







}
?>