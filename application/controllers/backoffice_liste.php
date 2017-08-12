<?php
class Backoffice_liste extends CI_Controller
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
	//Methodes LISTCONTACT
	//Pour afficher la liste de tous les contacts sans caracteristiques précises.
	//-------------------------------------------------------------------------------------------------------------------------------
	

	public function listeContact()
	{

		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/listeContact";
     	$config["total_rows"] = $this->contact_m->nombreContact();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$contactResult = $this->contact_m->getByPageContact($config["per_page"],$start);
      	$link = $this->pagination->create_links();
		
		// on recupere le résultat de la requete pour le tableau de contact
		//$contactsResult = $this->backoffice_m->getAllContacts(); REMPLAC2 PAR GETBYPAGECONTACT qui fait la meme chose mais 
		//avec la pagination 

		//on récupère le résultat de la requete pour le dropdown entreprise
		$entrepriseResult = $this->entreprise_m->getEntreprise()->result();

		$defaut = ' ';
		// tableau qui va contenir les entreprises
		$entreprises = array('aucun' =>' ');

		foreach ($entrepriseResult as $entreprise) 
		{
			$entreprises[$entreprise->GMEN_CODE] = $entreprise->GMEN_NOM;
		}

		// on charge des données dans un tableau pour la vue 
		$data = array('contact'=> $contactResult,
						'entreprises' => $entreprises,
						'link' => $link,
						'defaut' =>$defaut);

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_contact',$data);	
	}
	
	//methode pour supprimer un contact

	public function deleteContact($id)
	{
		
		$deletecontactResult = $this->contact_m->delete_contact($id);
		redirect('Backoffice_liste/listeContact');
	}


	public function rechercheContact()
	{
		$entrepriseResult = $this->entreprise_m->getEntreprise()->result();
		$defaut = ' ';
		$entreprises = array('aucun'=>' ');

		foreach ($entrepriseResult as $entreprise) 
		{
			$entreprises[$entreprise->GMEN_CODE] = $entreprise->GMEN_NOM;
		}

		$data['contact'] = $this->contact_m->recherche_contact();
		$data['entreprises'] = $entreprises;
		$data['defaut'] = $defaut;

		$this->load->view('backoffice/liste/vue_liste_contact',$data);
	}

//------------------------------------------------------------------------------------------------------------------------------
	//Methodes ENTREPRISE
	//------------------------------------------------------------------------------------------------------------------------------

	public function listeEntreprise()
	{

		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/listeEntreprise";
     	$config["total_rows"] = $this->entreprise_m->nombreEntreprise();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$entrepriseResult = $this->entreprise_m->getByPageEntreprise($config["per_page"],$start);
      	$link = $this->pagination->create_links();

		
		$defaut = ' ';
		// tableau qui va contenir les entreprises
		

		// on charge des données dans un tableau pour la vue 
		$data = array('entreprises' => $entrepriseResult,
					'link' => $link,
						'defaut' =>$defaut);

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_entreprise',$data);	
	}


	public function deleteEntreprise($id)
	{
		$deleteentrepriseResult = $this->entreprise_m->delete_entreprise($id);
		redirect('Backoffice_liste/listeentreprise');
	}


	public function rechercheEntreprise()
	{
		$defaut = ' ';

		$data['entreprises'] = $this->entreprise_m->recherche_entreprise();
		$data['defaut'] = $defaut;

		$this->load->view('backoffice/liste/vue_liste_entreprise',$data);
	}
		

/*----------------------------------------------------------------------------------
METHODES POUR INTERVENANT
-----------------------------------------------------------------------------------*/
	public function listeIntervenant()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/listeIntervenant";
     	$config["total_rows"] = $this->intervenant_m->nombreIntervenant();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$intervenantResult = $this->intervenant_m->getByPageIntervenant($config["per_page"],$start);
      	$link = $this->pagination->create_links();

		//on récupère le résultat de la requete pour la liste
	//	$intervenantResult = $this->backoffice_m->getAllIntervenants(); ceci est remplacé par getbypageIntervenant

		// on recupere les status 
		$statutResult = $this->intervenant_m->getStatutIntervenant()->result();
		//liste des antennes pour la dropdown de recherche par antenne
		$antenneResult = $this->antenne_m->getAllAntenne();
		$defaut = ' ';

		$antennes = array('aucun' => ' ');
		foreach ($antenneResult as $antenne) 
		{
			$antennes[$antenne->GMANT_CODE] = $antenne->GMANT_VILLE;
		}


		$nomstatut = array('aucun' => ' ');

		foreach ($statutResult as $statut) 
		{
			$nomstatut[$statut->GMIN_STATUT] = $statut->GMIN_STATUT;
		}

		// on charge des données dans un tableau pour la vue 
		$data = array('intervenants' => $intervenantResult,
						'statuts' => $nomstatut,
						'antennes' =>$antennes,
						'link' => $link,
						'default' =>$defaut);

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_intervenant',$data);	
	}

	public function deleteIntervenant($id)
	{
		$deleteintervenantResult = $this->intervenant_m->delete_intervenant($id);
		redirect('Backoffice_liste/listeIntervenant');
	}


	public function rechercheIntervenant()
	{
		//on récupère le résultat de la requete pour la liste
		$intervenantResult = $this->intervenant_m->getAllIntervenants();

		// on recupere les status 
		$statutResult = $this->intervenant_m->getStatutIntervenant()->result();

		//liste des antennes pour la dropdown de recherche par antenne
		$antenneResult = $this->antenne_m->getAllAntenne();
		$defaut = ' ';
		$nomstatut = array('aucun' => ' ');
		$antennes = array('aucun' => ' ');
		foreach ($antenneResult as $antenne) 
		{
			$antennes[$antenne->GMANT_CODE] = $antenne->GMANT_VILLE;
		}

		foreach ($statutResult as $statut) 
		{
			$nomstatut[$statut->GMIN_STATUT] = $statut->GMIN_STATUT;
		}

		$data['statuts'] = $nomstatut;
		$data['antennes'] = $antennes;
		$data['default'] = $defaut;

		$data['intervenants'] =  $this->intervenant_m->recherche_intervenant();

		$this->load->view('backoffice/liste/vue_liste_intervenant',$data);

	}
/*----------------------------------------------------------------------------------
METHODES POUR MATIERES
-----------------------------------------------------------------------------------*/

public function listeMatieres()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/listeMatieres";
     	$config["total_rows"] = $this->matiere_m->nombre_matiere();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$matiereResult = $this->matiere_m->getByPageMatiere($config["per_page"],$start);
      	$link = $this->pagination->create_links();

      	$defaut = ' ';
		//on récupère le résultat de la requete pour la liste
	//	$intervenantResult = $this->backoffice_m->getAllIntervenants(); ceci est remplacé par getbypageIntervenant

		// on recupere les ues pour la recherche et la liste(code apogee)
		$ueResult = $this->ue_m->getUe();
		//on recupere les semestres pour la recherche et la liste(code apogee) 
		$semestreResult = $this->semestre_m->getSemestre();

		$ues = array('aucun' =>' ');
		$semestres = array('aucun' =>' ');

		foreach ($ueResult as $ue) 
		{
			$ues[$ue->GMUE_CODE] = $ue->GMUE_NOM;
		}

		foreach ($semestreResult as $semestre) 
		{
			$semestres[$semestre->GMSEM_CODE] = $semestre->semestre;
		}

		// on charge des données dans un tableau pour la vue 
		$data = array('ues' => $ues,
						'semestres' => $semestres,
						'matiere' =>$matiereResult,
						'link' => $link,
						'defaut' =>$defaut);

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_matiere',$data);	
	}


	public function deleteMatiere($id)
	{
		$deleteintervenantResult = $this->matiere_m->delete_matiere($id);
		
		$this->session->set_flashdata('error', $deleteintervenantResult);
		redirect('Backoffice_liste/listeMatieres');
	}

	public function rechercheMatiere()
	{
		$ueResult = $this->ue_m->getUe();
		$semestreResult = $this->semestre_m->getSemestre();
		$defaut = ' ';
		$ues = array('aucun'=>' ');
		$semestres = array('aucun' =>' ');

		foreach ($ueResult as $ue) 
		{
			$ues[$ue->GMUE_CODE] = $ue->GMUE_NOM;
		}

		foreach ($semestreResult as $semestre) 
		{
			$semestres[$semestre->GMSEM_CODE] = $semestre->semestre;
		}

		$data['ues'] = $ues;
		$data['semestres'] = $semestres;
		$data['defaut'] = $defaut;

		$data['matiere'] =  $this->matiere_m->recherche_matiere();

		$this->load->view('backoffice/liste/vue_liste_matiere',$data);

			
	}



	/*----------------------------------------------------------------
	METHODES POUR PROMOTION
	___________________________________________________________________*/

	public function list_Promotion()
	{
		$config = array();
		$config["base_url"] = base_url(). "backoffice_liste/list_Promotion";
		$config["total_rows"] = count($this->promotion_m->getAllPromotion());
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);

		$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$promotionResult = $this->promotion_m->getByPagePromotion($config["per_page"],$start);
		$link = $this->pagination->create_links();

		// on recupere les etudiants pour la recherche et la liste(code apogee)
		$etudiantResult = $this->etudiant_m->get_all_etudiants();
		//on recupere les semestres pour la recherche et la liste(code apogee) 
		$formationResult = $this->formation_m->getFormation();
		$antenneResult = $this->antenne_m->getAllAntenne();

		$defaut = ' ';
		$etudiants = array('aucun' => ' ');
		$formations = array('aucun' => ' ');
		$antennes = array('aucun' => ' ');

		$promotionResult = $this->promotion_m->getPromotion();
		$promotion = array('aucun' => '');
		
		foreach ($etudiantResult as $etudiant) {
			$etudiants[$etudiant->GMET_CODE] = $etudiant->etudiant_nom;
		}

		foreach ($formationResult as $formation) {
			$formations[$formation->GMFO_CODE] = $formation->GMFO_NIVEAU;
		}

		foreach ($antenneResult as $antenne) {
			$antennes[$antenne->GMANT_CODE] = $antenne->GMANT_VILLE;
		}

		// on charge des données dans un tableau pour la vue 
		$data = array('etudiants' => $etudiants,
						'formations' => $formations,
						'antennes' =>$antennes,
						'promotions' =>$promotionResult,
						'link' => $link,
						'defaut' =>$defaut);

		// on appel la vue 
		//$this->load->view('backoffice/liste/vue_liste_cours',$data);
		/*
		$data['promotion'] = $promotionResult;
		$data['link'] = $link;
*/
		$this->load->view('backoffice/promotion/promotion_affichage', $data);

	}



	/*----------------------------------------------------------------------------------
METHODES POUR COURS
-----------------------------------------------------------------------------------*/

public function listeCours()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/listecours";
     	$config["total_rows"] = $this->cours_m->nombre_cours();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$coursResult = $this->cours_m->getByPageCours($config["per_page"],$start);
      	$link = $this->pagination->create_links();

		// on recupere les ues pour la recherche et la liste(code apogee)
		$ueResult = $this->ue_m->getUe();
		//on recupere les semestres pour la recherche et la liste(code apogee) 
		$semestreResult = $this->semestre_m->getSemestre();
		$matiereResult = $this->matiere_m->getMatiere();

		$defaut = ' ';
		$ues = array('aucun' => ' ');
		$semestres = array('aucun' => ' ');
		$matieres = array('aucun' => ' ');

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


		// on charge des données dans un tableau pour la vue 
		$data = array('ues' => $ues,
						'semestres' => $semestres,
						'matieres' =>$matieres,
						'cours' =>$coursResult,
						'link' => $link,
						'defaut' =>$defaut);

		// on appel la vue 
		
		$this->load->view('backoffice/liste/vue_liste_cours',$data);	
	}


	public function deleteCours($id)
	{
		$result = $this->cours_m->delete_cours($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('backoffice_liste/listeCours');
	}

	public function rechercheCours()
	{
		$ueResult = $this->ue_m->getUe();
		$semestreResult = $this->semestre_m->getSemestre();
		$matiereResult = $this->matiere_m->getMatiere();
		$defaut = ' ';
		$ues = array('aucun'=>' ');
		$semestres = array('aucun' =>' ');
		$matieres = array('aucun' => ' ' );

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
		
		$data['cours'] = $this->cours_m->recherche_cours();

		$this->load->view('backoffice/liste/vue_liste_cours',$data);

	}

/*----------------------------------------------------------------------------------
METHODES POUR UE
-----------------------------------------------------------------------------------*/

public function listUE()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/listUE";
     	$config["total_rows"] = $this->ue_m->nombre_ue();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$ueResult = $this->ue_m->getByPageUE($config["per_page"],$start);
      	$link = $this->pagination->create_links();

      	$defaut = ' ';
		//on récupère le résultat de la requete pour la liste
	//	$intervenantResult = $this->backoffice_m->getAllIntervenants(); ceci est remplacé par getbypageIntervenant

		// on recupere les ues pour la recherche et la liste(code apogee)
		$semestreResult = $this->semestre_m->getSemestre();

		$semestres = array('aucun' =>' ');

		foreach ($semestreResult as $semestre) 
		{
			$semestres[$semestre->GMSEM_CODE] = $semestre->GMSEM_CODE_APOGEE;
		}
		// on charge des données dans un tableau pour la vue 
		$data['semestres'] = $semestres;
		$data['ue'] = $ueResult;
		$data['link'] = $link;
		$data['defaut'] = $defaut;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_ue',$data);	
	}


	public function deleteUE($id)
	{
		$result = $this->ue_m->delete_ue($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('Backoffice_liste/listUE');
	}

	public function rechercheUE()
	{
		$defaut = ' ';
		$semestreResult = $this->semestre_m->getSemestre();

		$semestres = array('aucun' =>' ');

		foreach ($semestreResult as $semestre) 
		{
			$semestres[$semestre->GMSEM_CODE] = $semestre->GMSEM_CODE_APOGEE;
		}

		$data['semestres'] = $semestres;
		$data['defaut'] = $defaut;


		$data['ue'] = $this->ue_m->recherche_ue();

		$this->load->view('backoffice/liste/vue_liste_ue',$data);
	}



	


/*----------------------------------------------------------------------------------
METHODES POUR SEMESTRE
-----------------------------------------------------------------------------------*/

public function listSemestre()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/listSemestre";
     	$config["total_rows"] = $this->semestre_m->nombre_semestre();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$semestreResult = $this->semestre_m->getByPageSemestre($config["per_page"],$start);
      	$link = $this->pagination->create_links();

      	$defaut = ' ';
		//on récupère le résultat de la requete pour la liste
	//	$intervenantResult = $this->backoffice_m->getAllIntervenants(); ceci est remplacé par getbypageIntervenant

		// on recupere les ues pour la recherche et la liste(code apogee)
		$formationResult = $this->formation_m->getFormation();

		$formations = array('aucun' =>' ');

		foreach ($formationResult as $formation) 
		{
			$formations[$formation->GMFO_CODE] = $formation->formation_niveau;
		}
		// on charge des données dans un tableau pour la vue 
		$data['formations'] = $formations;
		$data['semestre'] = $semestreResult;
		$data['link'] = $link;
		$data['defaut'] = $defaut;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_semestre',$data);	
	}


	public function deleteSemestre($id)
	{
		$result = $this->semestre_m->delete_semestre($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('Backoffice_liste/listSemestre');
	}

	public function rechercheSemestre()
	{
		$formationResult = $this->formation_m->getFormation();
		$defaut = ' ';
		$formations = array('aucun'=>' ');

		foreach ($formationResult as $formation) 
		{
			$formations[$formation->GMFO_CODE] = $formation->formation_niveau;
		}

		$data['formations'] = $formations;
		$data['defaut'] = $defaut;

		$data['semestre'] = $this->semestre_m->recherche_semestre();

		$this->load->view('backoffice/liste/vue_liste_semestre',$data);
			
	}



	
/*----------------------------------------------------------------------------------
METHODES POUR FORMATION
-----------------------------------------------------------------------------------*/

public function listFormation()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/listFormation";
     	$config["total_rows"] = $this->formation_m->nombre_formation();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$formationResult = $this->formation_m->getByPageFormation($config["per_page"],$start);
      	$link = $this->pagination->create_links();

		// on charge des données dans un tableau pour la vue 
		$data['formation'] = $formationResult;
		$data['link'] = $link;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_formation',$data);	
	}


	public function deleteFormation($id)
	{
		$result = $this->formation_m->delete_formation($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('Backoffice_liste/listFormation');
	}

	public function rechercheFormation()
	{

		$data['formation'] = $this->formation_m->recherche_formation();

		$this->load->view('backoffice/liste/vue_liste_formation',$data);

	}


/*----------------------------------------------------------------------------------
METHODES POUR ANTENNE
-----------------------------------------------------------------------------------*/

public function listAntenne()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/listAntenne";
     	$config["total_rows"] = $this->antenne_m->nombre_antenne();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$antenneResult = $this->antenne_m->getByPageAntenne($config["per_page"],$start);
      	$link = $this->pagination->create_links();

		// on charge des données dans un tableau pour la vue 
		$data['antenne'] = $antenneResult;
		$data['link'] = $link;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_antenne',$data);	
	}


	public function deleteAntenne($id)
	{
		$result = $this->antenne_m->delete_antenne($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('Backoffice_liste/listAntenne');
	}

	public function rechercheAntenne()
	{
		
		$data['antenne'] = $this->antenne_m->recherche_antenne();

		$this->load->view('backoffice/liste/vue_liste_antenne',$data);

	}

/*----------------------------------------------------------------------------------
METHODES POUR SALLE
-----------------------------------------------------------------------------------*/

public function listSalle()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/listSalle";
     	$config["total_rows"] = $this->salle_m->nombre_salle();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$salleResult = $this->salle_m->getByPageSalle($config["per_page"],$start);
      	$link = $this->pagination->create_links();

		// on charge des données dans un tableau pour la vue 
		$data['salle'] = $salleResult;
		$data['link'] = $link;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_salle',$data);	
	}


	public function deleteSalle($id)
	{
		$result = $this->salle_m->delete_salle($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('Backoffice_liste/listSalle');
	}

	public function rechercheSalle()
	{
		
		$data['salle'] = $this->salle_m->recherche_salle();

		$this->load->view('backoffice/liste/vue_liste_salle',$data);
			
	}

/*----------------------------------------------------------------------------------
METHODES POUR PLANNING
-----------------------------------------------------------------------------------*/

public function listPlanning()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/listPlanning";
     	$config["total_rows"] = $this->planning_m->nombre_planning();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$planningResult = $this->planning_m->getByPagePlanning($config["per_page"],$start);
      	$link = $this->pagination->create_links();

      	//$defaut = ' ';
		//on récupère le résultat de la requete pour la liste
	//	$intervenantResult = $this->backoffice_m->getAllIntervenants(); ceci est remplacé par getbypageIntervenant

		// on recupere les ues pour la recherche et la liste(code apogee)
		$antenneResult = $this->antenne_m->getAllAntenne();

		$antennes = array('aucun' =>' ');

		foreach ($antenneResult as $antenne) 
		{
			$antennes[$antenne->GMANT_CODE] = $antenne->GMANT_VILLE;
		}
		// on charge des données dans un tableau pour la vue 
		$data['antennes'] = $antennes;
		$data['planning'] = $planningResult;
		$data['link'] = $link;
		$data['defaut'] = $defaut;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_planning',$data);	
	}


	public function deletePlanning($id)
	{
		$result = $this->planning_m->delete_planning($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('Backoffice_liste/listPlanning');
	}


	public function recherchePlanning()
	{
		$antenneResult = $this->antenne_m->getAllAntenne();
		$defaut = ' ';
		$antennes = array('aucun'=>' ');

		foreach ($antenneResult as $antenne) 
		{
			$antennes[$antenne->GMANT_CODE] = $antenne->GMANT_VILLE;
		}

		$data['planning'] = $this->planning_m->recherche_planning();
		$data['antennes'] = $antennes;
		$data['defaut'] = $defaut;

		$this->load->view('backoffice/liste/vue_liste_planning',$data);
	}


/*----------------------------------------------------------------------------------
METHODES POUR SEANCE
-----------------------------------------------------------------------------------*/

	public function accueil_Seance()
	{
		$planningResult = $this->planning_m->getAllPlanning();
		$plannings = array('aucun' =>' ');

		foreach ($planningResult as $planning) 
		{
			$plannings[$planning->GMPL_CODE] = $planning->GMPL_NOM.' '.$planning->GMPL_ANNEE;
		}
		$data['plannings'] = $plannings;

		$this->load->view('backoffice/liste/vue_liste_seance',$data);
	}

	public function listSeance()
	{

		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/listSeance";
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
		$planningResult = $this->planning_m->getAllPlanning();

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
		$this->load->view('backoffice/liste/vue_liste_seance',$data);	
	}


	public function deleteSeance($id)
	{
		$result = $this->seance_m->delete_seance($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('Backoffice_liste/listSeance');
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


			$this->load->view('backoffice/liste/vue_recherche_seance',$data);
		}

		else
		{
			redirect('Backoffice_liste/listSeance');
		}
			
	}


/*----------------------------------------------------------------------------------
METHODES POUR ETUDIANT
-----------------------------------------------------------------------------------*/

	public function list_etudiant()
	{

		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/list_etudiant";
     	$config["total_rows"] = $this->etudiant_m->nombre_etudiant();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     	//var_dump($this->input->post());
      	$this->pagination->initialize($config);
      $etudiantResult ='';
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$etudiantResult = $this->etudiant_m->getByPageEtudiant($config["per_page"],$start);
      	$link = $this->pagination->create_links();

      	$defaut = ' ';
      	$le_planning=$this->input->post('planning');
      	$get_planning = $this->planning_m->getPlanningById($le_planning);
		//on récupère le résultat de la requete pour la liste
	//	$intervenantResult = $this->backoffice_m->getAllIntervenants(); ceci est remplacé par getbypageIntervenant

		// on recupere les ues pour la recherche et la liste(code apogee)
		$planningResult = $this->planning_m->getAllPlanning();

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
		$data['etudiant'] = $etudiantResult;
		$data['link'] = $link;
		$data['defaut'] = $defaut;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_etudiant',$data);	
	}


	public function deleteEtudiant($id)
	{
		$result = $this->etudiant_m->delete_etudiant($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('Backoffice_liste/listEtudiant');
	}

	public function rechercheEtudiant()
	{

		$antenneResult = $this->antenne_m->getAllAntenne();
		$defaut = ' ';

		$antennes = array('aucun' => ' ');
		foreach ($antenneResult as $antenne) 
		{
			$antennes[$antenne->GMANT_CODE] = $antenne->GMANT_VILLE;
		}

		$formationResult = $this->formation_m->getFormation();

		$formations = array('aucun' =>' ');

		foreach ($formationResult as $formation) 
		{
			$formations[$formation->GMFO_CODE] = $formation->formation_niveau;
		}

		$data['antennes'] = $antennes;

		$data['formations'] = $formations;

		if($this->input->post('annee'))
		{
		
			$result = $this->etudiant_m->recherche_etudiant_par_annee();
			///var_dump($result);
			//on transmet les info a la vue
			$data['etudiant'] = $result;

			$this->load->view('backoffice/liste/vue_recherche_etudiant',$data);
		}

		else if($this->input->post('nom'))
		{
		
			$result = $this->etudiant_m->recherche_etudiant_par_nom();
			///var_dump($result);
			//on transmet les info a la vue
			$data['etudiant'] = $result;

			$this->load->view('backoffice/liste/vue_recherche_etudiant',$data);
		}

		else if($this->input->post('annee'))
		{
		
			$result = $this->etudiant_m->recherche_etudiant_par_annee();
			///var_dump($result);
			//on transmet les info a la vue
			$data['etudiant'] = $result;

			$this->load->view('backoffice/liste/vue_recherche_etudiant',$data);
		}

		else
		{
			redirect('Backoffice_liste/listEtudiant');
		}
			
	}


/*----------------------------------------------------------------------------------
METHODES POUR PARAMETRES
-----------------------------------------------------------------------------------*/

public function listParameter()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/listParameter";
     	$config["total_rows"] = $this->parametre_m->nombre_parameter();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$parameterResult = $this->parametre_m->getByPageParameter($config["per_page"],$start);
      	$link = $this->pagination->create_links();

		// on charge des données dans un tableau pour la vue 
		$data['parameter'] = $parameterResult;
		$data['link'] = $link;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_parameter',$data);	
	}


	public function delete_parameter($id)
	{
		$result = $this->parametre_m->delete_parameter($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('backoffice_liste/listParameter');
	}

	public function recherche_parameter()
	{
		
		$data['parameter'] = $this->parametre_m->recherche_parameter();

		$this->load->view('backoffice/liste/vue_liste_parameter',$data);
			
	}


/*----------------------------------------------------------------------------------
METHODES POUR DOCUMENT_MODELE
-----------------------------------------------------------------------------------*/

public function list_document_modele()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/list_document_modele";
     	$config["total_rows"] = $this->document_modele_m->nombre_document_modele();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$document_modeleResult = $this->document_modele_m->getByPage_document_modele($config["per_page"],$start);
      	$link = $this->pagination->create_links();

		// on charge des données dans un tableau pour la vue 
		$data['document_modele'] = $document_modeleResult;
		$data['link'] = $link;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_document_modele',$data);	
	}


	public function delete_document_modele($id)
	{
		$result = $this->document_modele_m->delete_document_modele($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('backoffice_liste/list_document_modele');
	}

	public function recherche_document_modele()
	{
		
		$data['document_modele'] = $this->document_modele_m->recherche_document_modele();

		$this->load->view('backoffice/liste/vue_liste_document_modele',$data);
			
	}



/*----------------------------------------------------------------------------------
METHODES POUR PROCEDURE ADMINISTRATIVE
-----------------------------------------------------------------------------------*/

public function list_procedure_admin()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/list_procedure_admin";
     	$config["total_rows"] = $this->procedure_m->nombre_procedure_administrative();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$procedure_administrativeResult = $this->procedure_m->getByPage_procedure_administrative($config["per_page"],$start);
      	$link = $this->pagination->create_links();

		// on charge des données dans un tableau pour la vue 
		$data['procedure_administrative'] = $procedure_administrativeResult;
		$data['link'] = $link;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_procedure_administrative',$data);	
	}


	public function delete_procedure_administrative($id)
	{
		$result = $this->procedure_m->delete_procedure_administrative($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('backoffice_liste/list_procedure_admin');
	}

	public function recherche_procedure_administrative()
	{
		
		$data['procedure_administrative'] = $this->procedure_m->recherche_procedure_administrative();

		$this->load->view('backoffice/liste/vue_liste_procedure_administrative',$data);
			
	}

/*----------------------------------------------------------------------------------
METHODES POUR LANGUE
-----------------------------------------------------------------------------------*/

public function list_langue()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/list_langue";
     	$config["total_rows"] = $this->langue_m->nombre_langue();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$langueResult = $this->langue_m->getByPage_langue($config["per_page"],$start);
      	$link = $this->pagination->create_links();

		// on charge des données dans un tableau pour la vue 
		$data['langue'] = $langueResult;
		$data['link'] = $link;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_langue',$data);	
	}


	public function delete_langue($id)
	{
		$result = $this->langue_m->delete_langue($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('backoffice_liste/list_langue');
	}

	public function recherche_langue()
	{
		
		$data['langue'] = $this->langue_m->recherche_langue();

		$this->load->view('backoffice/liste/vue_liste_langue',$data);
			
	}


/*----------------------------------------------------------------------------------
METHODES POUR SOCIAL NETWORKS
-----------------------------------------------------------------------------------*/

public function list_social_networks()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/list_social_networks";
     	$config["total_rows"] = $this->social_networks_m->nombre_social_network();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$socialnetworksResult = $this->social_networks_m->getByPage_social_network($config["per_page"],$start);
      	$link = $this->pagination->create_links();

		// on charge des données dans un tableau pour la vue 
		$data['social_networks'] = $socialnetworksResult;
		$data['link'] = $link;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_social_networks',$data);	
	}


	public function delete_social_networks($id)
	{
		$result = $this->social_networks_m->delete_social_network($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('backoffice_liste/list_social_networks');
	}

	public function recherche_social_networks()
	{
		
		$data['social_networks'] = $this->social_networks_m->recherche_social_network();

		$this->load->view('backoffice/liste/vue_liste_social_networks',$data);
			
	}

/*----------------------------------------------------------------------------------
METHODES POUR QUESTIONNAIRE
-----------------------------------------------------------------------------------*/

public function list_questionnaire()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/list_questionnaire";
     	$config["total_rows"] = $this->question_m->nombre_questionnaire();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$questionnaireResult = $this->question_m->getByPage_questionnaire($config["per_page"],$start);
      	$link = $this->pagination->create_links();

		// on charge des données dans un tableau pour la vue 
		$data['questionnaire'] = $questionnaireResult;
		$data['link'] = $link;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_questionnaire',$data);	
	}


	public function delete_questionnaire($annee)
	{
		$result = $this->question_m->delete_questionnaire($annee);
		
		$this->session->set_flashdata('error', $result);
		redirect('backoffice_liste/list_questionnaire');
	}

	public function recherche_questionnaire()
	{
		
		$data['questionnaire'] = $this->question_m->recherche_questionnaire();

		$this->load->view('backoffice/liste/vue_liste_questionnaire',$data);
			
	}

/*----------------------------------------------------------------------------------
METHODES POUR JURY 
-----------------------------------------------------------------------------------*/

public function listJury()
	{
		$config = array();
      	$config["base_url"] = base_url(). "backoffice_liste/listJury";
     	$config["total_rows"] = $this->jury_m->nombre_jury();
      	$config["per_page"] = 20;
      	$config["uri_segment"] = 3;
     
      	$this->pagination->initialize($config);
      
     	$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
     	$juryResult = $this->jury_m->getByPageJury($config["per_page"],$start);
      	$link = $this->pagination->create_links();

		// on charge des données dans un tableau pour la vue 
		$data['jury'] = $juryResult;
		$data['link'] = $link;

		// on appel la vue avec le tableau des contacts et des entreprises
		$this->load->view('backoffice/liste/vue_liste_jury',$data);	
	}


	public function delete_jury($id)
	{
		$result = $this->jury_m->delete_jury($id);
		
		$this->session->set_flashdata('error', $result);
		redirect('backoffice_liste/listJury');
	}

	public function recherche_jury()
	{
		
		$data['jury'] = $this->jury_m->recherche_jury();

		$this->load->view('backoffice/liste/vue_liste_jury',$data);
			
	}


/*----------------------------------------------------------------------------------
METHODES POUR MENU
-----------------------------------------------------------------------------------*/


	public function gestion_cursus()
	{
		
		$this->load->view('backoffice/page_accueil/page_gestion_cursus');	
	}

	public function gestion_planning()
	{
		
		$this->load->view('backoffice/page_accueil/page_gestion_planning');	
	}

	public function gestion_etudiant()
	{
		
		$this->load->view('backoffice/page_accueil/page_gestion_etudiant');	
	}

	public function gestion_divers()
	{
		
		$this->load->view('backoffice/page_accueil/page_gestion_divers');	
	}

	public function gestion_contact()
	{
		
		$this->load->view('backoffice/page_accueil/page_gestion_contact');	
	}



}


