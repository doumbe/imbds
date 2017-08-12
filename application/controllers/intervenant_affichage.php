<?php
class Intervenant_affichage extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();

		$this->lang->load("intervenant","french");
		


	
 		$this->load->model('antenne_m');
 		$this->load->model('contact_m');
 		$this->load->model('cours_m');
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
 		$this->load->model('presence_m');
 		$this->load->model('question_m');
 		$this->load->model('salle_m');
 		$this->load->model('seance_m');
 		$this->load->model('formation_m');
 		$this->load->model('social_networks_m');
 		$this->load->model('soutenance_m');
 		$this->load->model('stage_projet_seminaire_m');
 		$this->load->model('ue_m');
 		$this->load->model('cursus_m');

		$this->load->helper('url');
		$this->load->helper('language');
		$this->load->helper('form');

		$this->load->library('form_validation');
		$this->load->library('pagination');

	}


	public function affichage_choix_liste_presences_absences()
	{
		$coursResult = $this->cours_m->getCours();
		$seanceResult = $this->seance_m->getSeance();
		//$intervenant = $this->intervenant_m->get_intervenant();

		$cours_tab = array('aucun' =>' ');
		$seances = array('aucun' => ' ');


		foreach ($coursResult as $cours) 
		{
			$cours_tab[$cours->GMCO_CODE] = $cours->GMCO_NOM;
		}
		foreach ($seanceResult as $seance) {

			$seances[$seance->GMSEA_CODE] = $seance->GMSEA_DATE.'--'.$seance->GMSEA_HEURE_DEBUT.'--'.$seance->GMSEA_HEURE_FIN;
		}

		$data['cours_tab'] = $cours_tab;
		$data['seances'] = $seances;
		//$data['id'] = $intervenant->GMIN_CODE;
		
		$this->load->view('intervenant/affichage/affichage_liste_presence_absence_choix',$data);	
	}


	public function affichage_liste_presences_absences()
	{
		$data['etudiant'] = $this->seance_m->get_etudiant_by_seance();
		$data['cours'] = $this->cours_m->getCoursById($this->input->post('cours'))->GMCO_NOM;
		$data['annee'] = $this->input->post('annee');
		$data['seance'] = $this->input->post('seance');
		//$data['statut'] = ['NR','P','A','R', 'AJ', 'AE'];
		//$data['statut'] = $this->seance_m->getStatut();
		//echo var_dump($data['enseignant_matiere']);

		
		$this->load->view('intervenant/affichage/affichage_liste_presence_absence',$data);
	}


	public function affichage_choix_notes_cours()
	{
		$coursResult = $this->cours_m->getCours();

		$cours_tab = array('aucun' =>' ');

		foreach ($coursResult as $cours) 
		{
			$cours_tab[$cours->GMCO_CODE] = $cours->GMCO_NOM;
		}

		$data['cours_tab'] = $cours_tab;
		
		$this->load->view('intervenant/affichage/affichage_choix_notes_cours',$data);

	}


	public function affichage_liste_notes_etudiants()
	{
		$data['etudiant'] = $this->cursus_m->get_etudiant_by_matiere();
		$data['cours'] = $this->cours_m->getCoursByIdEtudiant($this->input->post('cours'))->GMCO_NOM;
		$data['annee'] = $this->input->post('annee');
		//$data["notes"] = $this->note_m->getNoteByEtudiant($id_etudiant);

		//echo var_dump($data['enseignant_matiere']);

		
		$this->load->view('intervenant/affichage/affichage_liste_notes_etudiants',$data);
	}



}


?>