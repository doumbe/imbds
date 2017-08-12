<?php
class Intervenant_list extends CI_Controller
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
 		$this->load->model('question_m');
 		$this->load->model('salle_m');
 		$this->load->model('seance_m');
 		$this->load->model('formation_m');
 		$this->load->model('social_networks_m');
 		$this->load->model('soutenance_m');
 		$this->load->model('stage_projet_seminaire_m');
 		$this->load->model('ue_m');

		$this->load->helper('url');
		$this->load->helper('language');
		$this->load->helper('form');

		$this->load->library('form_validation');
		$this->load->library('pagination');

	}

	public function listeCours() // renvoi la liste des cours 
	{
		$config = array();
		$config["base_url"] = base_url()."intervenant_list/listecours";
		$config["total_rows"] = $this->cours_m->nombre_cours();
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);

		$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$coursResult = $this->cours_m->getByPageCours($config["per_page"],$start);
		$link = $this->pagination->create_links();
		
		$ueResult = $this->ue_m->getUe();

		$semestreResult = $this->semestre_m->getSemestre();
		$matiereResult = $this->matiere_m->getMatiere();

		$defaut = ' ';
		$ues = array('aucun' => ' ');
		$semestres = array('aucun' => ' ');
		$matieres = array('aucun' => ' ');

		foreach ($ueResult as $ue) {
			$ues[$ue->GMUE_CODE] = $ue->GMUE_NOM;
		}

		foreach ($semestreResult as $semestre) {
			$semestres[$semestre->GMSEM_CODE] = $semestre->semestre;
		}

		foreach ($matiereResult as $matiere) {
			$matieres[$matiere->GMMA_CODE] = $matiere->GMMA_NOM;
		}

		$data = array('ues' => $ues,
						'semestres' => $semestres,
						'matieres' => $matieres,
						'cours' => $coursResult,
						'link' => $link,
						'defaut' =>$defaut);
						

		$this->load->view('intervenant/liste/vue_liste_cours',$data);
	}



	public function deleteCours($id) // supprime un cours dans la liste
	{
		$result = $this->cours_m->delete_cours($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('intervenant_list/listeCours');
	}


	public function rechercheCours() // fonction qui sert a cherché un cours dans la liste 
	{
		$ueResult = $this->ue_m->getUe();
		$semestreResult = $this->semestre_m->getSemestre();
		$matiereResult = $this->matiere_m->getMatiere();
		$defaut = ' ';
		$ues = array('aucun'=>' ');
		$semestres = array('aucun' =>' ');
		$matieres = array('aucun' => ' ' );
		$link = $this->pagination->create_links();

		foreach ($ueResult as $ue) 
		{
			$ues[$ue->GMUE_CODE] = $ue->GMUE_NOM;
		}

		foreach ($semestreResult as $semestre) 
		{
			$semestres[$semestre->GMSEM_CODE] = $semestre->semestre;
		}
		foreach ($matiereResult as $matiere) 
		{
			$matieres[$matiere->GMMA_CODE] = $matiere->GMMA_NOM;
		}

		$data['ues'] = $ues;
		$data['semestres'] = $semestres;
		$data['matieres'] = $matieres;
		$data['defaut'] = $defaut;
		$data['link'] = $link;
		
		$data['cours'] = $this->cours_m->recherche_cours();

		$this->load->view('intervenant/liste/vue_liste_cours',$data);

	}


	public function delete_document_cours($id) // supprimme un document attache a un cours
	{
		$result = $this->document_attache_m->delete_document_attache($id);

		$this->session->set_flashdata('error', $result);
		redirect('intervenant_list/list_document_cours');
	}

	public function delete_document_vacation($id) // supprimme un document attache a un cours
	{
		$result = $this->document_attache_m->delete_document_attache($id);

		$this->session->set_flashdata('error', $result);
		redirect('intervenant_list/list_document_vacation');
	}


	public function recherche_document_cours() // recherche un document attache a un cours
	{
		$data['document_attache'] = $this->document_attache_m->recherche_document_attache();

		$this->load->view('intervenant/liste/vue_liste_document_cours',$data);
	}

	public function recherche_document_vacation()
	{
		$data['document_attache'] = $this->document_attache_m->recherche_document_attache();

		$this->load->view('intervenant/liste/vue_liste_document_vacation',$data);
	}


	public function recherche_document_examen()
	{
		$data['document_attache'] = $this->document_attache_m->recherche_document_attache();

		$this->load->view('intervenant/liste/vue_liste_document_sujet_examen',$data);
	}

	public function list_document_cours() // fonction qui donne la liste des documents associé au cours
	{
		$config = array();
		$config["base_url"] = base_url(). "intervenant_list/list_document_cours";
		$config["total_rows"] = $this->document_attache_m->nombre_document_attache();
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);

		$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$document_attacheResult = $this->document_attache_m->getByPage_document_attache($config["per_page"],$start);
		$link = $this->pagination->create_links();

		$data['document_attache'] = $document_attacheResult;
		$data['link'] = $link;

		
		$this->load->view('intervenant/liste/vue_liste_document_cours', $data);
	}


	public function list_notes_etudiant() // fonction qui donne la liste des documents associé au cours
	{
		$config = array();
		$config["base_url"] = base_url(). "intervenant_list/list_notes_etudiant";
		$config["total_rows"] = $this->etudiant_m->nombre_etudiant();
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);

		$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$etudiantResult = $this->document_attache_m->getByPage_etudiant($config["per_page"],$start);
		$link = $this->pagination->create_links();

		$data['etudiant'] = $etudiantResult;
		$data['link'] = $link;

		
		$this->load->view('intervenant/liste/vue_liste_notes_etudiant', $data);
	}


	public function list_document_vacation() // fonction qui donne la liste des documents de vacation
	{
		$config = array();
		$config["base_url"] = base_url(). "intervenant_list/list_document_vacation";
		$config["total_rows"] = $this->document_attache_m->nombre_document_attache();
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);

		$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$document_attacheResult = $this->document_attache_m->getByPage_document_attache($config["per_page"],$start);
		$link = $this->pagination->create_links();

		$data['document_attache'] = $document_attacheResult;
		$data['link'] = $link;

		
		$this->load->view('intervenant/liste/vue_liste_document_vacation', $data);
	}




	public function list_document_sujet_examen()
	{
		$config = array();
		$config["base_url"] = base_url(). "intervenant_list/list_document_sujet_examen";
		$config["total_rows"] = $this->document_attache_m->nombre_document_attache();
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);

		$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$document_attacheResult = $this->document_attache_m->getByPage_document_attache($config["per_page"],$start);
		$link = $this->pagination->create_links();

		$data['document_attache'] = $document_attacheResult;
		$data['link'] = $link;

		
		$this->load->view('intervenant/liste/vue_liste_document_sujet_examen', $data);
	}



	/*----------------------------------------------------------------------------------
METHODES POUR PROCEDURE ADMINISTRATIVE
-----------------------------------------------------------------------------------*/

	public function list_procedure_admin()
	{
		$config = array();
      	$config["base_url"] = base_url(). "intervenant_list/list_procedure_admin";
     	$config["total_rows"] = $this->procedure_m->nombre_procedure_administrative();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$procedure_administrativeIntervenant = $this->procedure_m->getByPage_procedure_administrative_intervenant($config["per_page"],$start);
     	$procedure_administrativeResult = $this->procedure_m->getByPage_procedure_administrative($config["per_page"],$start);
      	$link = $this->pagination->create_links();

		// on charge des données dans un tableau pour la vue 
		$data['procedure_administrative'] = $procedure_administrativeResult;
		$data['procedure_administrative_intervenant'] = $procedure_administrativeIntervenant;
		$data['link'] = $link;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('intervenant/liste/vue_liste_procedure_administrative',$data);	
	}






	
	public function recherche_procedure_administrative()
	{
		
		$data['procedure_administrative'] = $this->procedure_m->recherche_procedure_administrative();

		$this->load->view('intervenant/liste/vue_liste_procedure_administrative',$data);
			
	}


	public function accueil_Seance()
	{
		$planningResult = $this->planning_m->getAllPlanning();
		$plannings = array('aucun' =>' ');

		foreach ($planningResult as $planning) 
		{
			if($planning->GMPL_ANNEE == date('Y'))
			{
				$plannings[$planning->GMPL_CODE] = $planning->GMPL_NOM.' '.$planning->GMPL_ANNEE;
			}
		}
		$data['plannings'] = $plannings;

		$this->load->view('intervenant/liste/vue_liste_seance',$data);
	}

	public function listSeance()
	{

		$config = array();
      	$config["base_url"] = base_url(). "intervenant_list/listSeance";
     	$config["total_rows"] = $this->seance_m->nombre_seance();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     	//var_dump($this->input->post());
      	$this->pagination->initialize($config);
      	$seanceResult ='';
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$seanceResult = $this->seance_m->getByPageSeance($config["per_page"],$start);
      	$link = $this->pagination->create_links();

      	$defaut = ' ';
      	$le_planning=$this->input->post('planning');
      	$get_planning = $this->planning_m->getPlanningById($le_planning);
		//on récupère le résultat de la requete pour la liste
	//	$intervenantResult = $this->backoffice_m->getAllIntervenants(); ceci est remplacé par getbypageIntervenant

		// on recupere les ues pour la recherche et la liste(code apogee)
		$planningResult = $this->planning_m->getPlanningbyYear();

		$plannings = array('aucun' =>' ');

		foreach ($planningResult as $planning) 
		{
			$plannings[$planning->GMPL_CODE] = $planning->GMPL_NOM.' '.$planning->GMPL_ANNEE;
		}
		// on charge des données dans un tableau pour la vue 
		$data['plannings'] = $plannings;
		$data['selected_planning_code'] = $le_planning;
		$data['selected_planning_nom'] = $get_planning->GMPL_NOM;
		$data['selected_planning_annee'] = $get_planning->GMPL_ANNEE;
		$data['seance'] = $seanceResult;
		$data['link'] = $link;
		$data['defaut'] = $defaut;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('intervenant/liste/vue_liste_seance',$data);	
	}


	public function rechercheSeance()
	{
		$planningResult = $this->planning_m->getAllPlanning();
		$defaut = ' ';
		$plannings = array('aucun'=>' ');

		$le_planning=$this->input->post('selected_planning');
      	$get_planning = $this->planning_m->getPlanningById($le_planning);
      	$data['selected_planning_code'] = $le_planning;
		$data['selected_planning_nom'] = $get_planning->GMPL_NOM;
		$data['selected_planning_annee'] = $get_planning->GMPL_ANNEE;
		$link = $this->pagination->create_links();

		foreach ($planningResult as $planning) 
		{
			$plannings[$planning->GMPL_CODE] = $planning->GMPL_NOM.' ('.$planning->GMPL_ANNEE.')';
		}

		// si on fait la recherche par l'annee
		if($this->input->post('cours'))
		{
		
			$result = $this->seance_m->recherche_seance_par_cours();
			///var_dump($result);
			//on transmet les info a la vue
			$data['seance'] = $result;


			$data['plannings'] = $plannings;
			$data['defaut'] = $defaut;
			$data['link'] = $link;


			$this->load->view('intervenant/liste/vue_liste_seance',$data);
		}

		else
		{
			redirect('intervenant_list/listSeance');
		}
			
	}



/*


	public function gestion_cours()
	{
		$this->load->view('intervenant/page_accueil/page_gestion_cours');

	}
*/

	public function gestion_vacation()
	{
		$this->load->view('intervenant/page_accueil/page_gestion_vacation');
	}


}

?>