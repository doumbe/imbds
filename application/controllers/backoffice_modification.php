<?php
class Backoffice_modification extends CI_Controller
{


	public function __construct()
    {
		parent:: __construct();

		$this->lang->load("backoffice","french");

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
	//Methodes CONTACT
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifierContact($id)
	{
     	 	$contact = $this->contact_m->getContactById($id);
     	 
     	 	
     	 	$entrepriseResult = $this->entreprise_m->getEntreprise()->result();

     	 	//pour récuperer l'entreprise d'un seul contact
     	 	$entrepriseContactResult = $this->entreprise_m->getEntrepriseDunContact($id);
     	 	$entreprises = array(''=>'');

			foreach ($entrepriseResult as $entreprise) 
			{
				$entreprises[$entreprise->GMEN_CODE] = $entreprise->GMEN_NOM;
			}

      		$data = array(
      						'id' => $id,
      						"contact" => $contact,
      						"entreprises" =>$entreprises,
      						"entreprisecontact" => $entrepriseContactResult
      					);
     		
      		$this->load->view('Backoffice/modifier/vue_modifier_contact',$data);	
	}

	public function editContact()
	{

		
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listeContact');
		}

		else
		{
			$id =$this->input->post('GMCON_CODE');

			$this->form_validation->set_rules('GMCON_NOM', lang('th_nom'), 'required|alpha|max_length[50]'); 
      		$this->form_validation->set_rules('GMCON_PRENOM', lang('contact_firstname'), 'required|alpha|max_length[50]'); 
      		$this->form_validation->set_rules('GMCON_EMAIL', lang('val_email'), 'required|valid_email|max_length[50]'); //|is_unique[users.email]
      		$this->form_validation->set_rules('GMCON_FONCTION', lang('val_fonction'), 'required|max_length[30]'); 
      		$this->form_validation->set_rules('GMEN_CODE', lang('th_entreprise'), 'required');
      		$this->form_validation->set_rules('GMCON_TEL_FIXE', lang('val_tel_fixe'),'numeric|min_length[10]|max_length[20]');
      		$this->form_validation->set_rules('GMCON_TEL_PORTABLE', lang('val_tel_port'),'required|numeric|min_length[10]|max_length[20]');
      		$this->form_validation->set_rules('GMCON_FAX', lang('val_tel_fax'),'numeric|min_length[10]|max_length[20]');
      		$this->form_validation->set_rules('GMCON_ADRESSE', lang('val_adresse'),'alphanumeric|max_length[200]');
      		$this->form_validation->set_rules('GMCON_CODE_POSTAL', lang('val_code_postal'),'alphanumeric|min_length[5]|max_length[10]');
      		$this->form_validation->set_rules('GMCON_VILLE', lang('val_ville'),'alpha|max_length[50]');
      		$this->form_validation->set_rules('GMCON_PAYS', lang('val_pays'),'alpha|max_length[30]');
      		$this->form_validation->set_rules('GMCE_DATE_DEPART_ENTREPRISE', lang('val_date_depart_entreprise'),'alphanumeric');
      		$this->form_validation->set_rules('GMCE_DATE_PREMIER_CONTACT', lang('val_date_premier_contact'),'required|alphanumeric');
      		$this->form_validation->set_rules('GMCE_REMARQUES', lang('val_remarques'),'alphanumeric|max_length[200]');

			
			//echo $id;
			if ($this->form_validation->run() == TRUE)
      		{
      			$this->contact_m->edit_contact();
				$contact = $this->contact_m->getContactById($id);

					
      		}

      		$this->modifierContact($id);
			
		}

	}

	// la fiche perso 
	public function fichePersonnelle($id)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listeContact');
		}

		else
		{
			$contact = $this->contact_m->getContactById($id);

			//pour récuperer l'entreprise d'un seul contact
     		$entrepriseContactResult = $this->entreprise_m->getEntrepriseDunContact($id);


     		$data = array('id' => $id,
      					"contact" => $contact,
      					"entreprisecontact" => $entrepriseContactResult
      					);

     		$this->load->view('backoffice/fiches/fiche_contact', $data);
		}
	}

	//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes ENTREPRISE
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifierEntreprise($id)
	{
      	//$code = $this->uri->segment(3,0);
     	 $uneEntreprise = $this->entreprise_m->getEntrepriseById($id);

			
      	$data = array(
      				'id' => $id,
      				"uneentreprise" => $uneEntreprise
      				);
     	
      	$this->load->view('Backoffice/modifier/vue_modifier_entreprise',$data);	
	}

	public function editEntreprise()
	{

		
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listeEntreprise');
		}

		else
		{
			$id = $this->input->post('GMEN_CODE');
			
			$this->form_validation->set_rules('GMEN_NOM', lang('val_nom_entreprise'), 'required|alphanumeric|max_length[50]');  
     		$this->form_validation->set_rules('GMEN_SIEGE', lang('val_siege'), 'required|alphanumeric|max_length[50]');  
     		$this->form_validation->set_rules('GMEN_DIRECTEUR', lang('val_nom_directeur'), 'required|alpha|max_length[50]');  
     		$this->form_validation->set_rules('GMEN_TEL_FIXE', lang('val_tel_fixe'),'numeric|min_length[10]|max_length[20]');
      		$this->form_validation->set_rules('GMEN_TEL_PORTABLE', lang('val_tel_port'),'required|numeric|min_length[10]|max_length[20]');
      		$this->form_validation->set_rules('GMEN_FAX', lang('val_tel_fax'),'numeric|min_length[10]|max_length[20]');
      		$this->form_validation->set_rules('GMEN_EMAIL', lang('val_email'), 'required|valid_email|max_length[50]'); //|is_unique[users.email]
      		$this->form_validation->set_rules('GMEN_SITE_WEB', lang('val_site_web'), 'max_length[30]');
      		$this->form_validation->set_rules('GMEN_ADRESSE', lang('val_adresse'),'required|alphanumeric|max_length[200]');
      		$this->form_validation->set_rules('GMEN_CODE_POSTAL', lang('val_code_postal'),'required|alphanumeric|min_length[5]|max_length[10]');
      		$this->form_validation->set_rules('GMEN_VILLE', lang('val_ville'),'required|alpha|max_length[30]');
      		$this->form_validation->set_rules('GMEN_PAYS', lang('val_pays'),'required|alpha|max_length[30]');

      		if ($this->form_validation->run() == TRUE)
      		{
      			$this->entreprise_m->edit_entreprise();
				$entreprise = $this->entreprise_m->getEntrepriseById($id);

					
      		}

			

			$this->modifierEntreprise($id);	
		}

	}

	// la fiche d'une entreprise
	public function ficheEntreprise($id)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listeEntreprise');
		}

		else
		{
			$uneentreprise = $this->entreprise_m->getEntrepriseById($id);

     		$data = array('id' => $id,
      					"uneentreprise" => $uneentreprise
      					);

     		$this->load->view('backoffice/fiches/fiche_entreprise', $data);
		}
	}


	//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes INTERVENANT
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifierIntervenant($id)
	{

		
      	
      	//$code = $this->uri->segment(3,0);
     	 $unintervenant = $this->intervenant_m->getIntervenantById($id);

     	 // on recupere les status 
		$statutResult = $this->intervenant_m->getStatutIntervenant()->result();

		$lestatutResult = $this->intervenant_m->getStatutDunIntervenant($id);

		$antenneintervenantResult = $this->intervenant_m->getAntenneDunIntervenant($id);
		$anneeantenneintervenantResult = $this->intervenant_m->getAnneeAntenneDunIntervenant($id);
		$antenneResult = $this->antenne_m->getAllAntenne();

		$antennes = array('' => '');
		$nomstatut = array('' => '');

		foreach ($antenneResult as $antenne) 
		{
			$antennes[$antenne->GMANT_CODE] = $antenne->GMANT_VILLE;
		}

		foreach ($statutResult as $statut) 
		{
			$nomstatut[$statut->GMIN_STATUT] = $statut->GMIN_STATUT;
		}

			
      	$data = array(
      				'id' => $id,
      				"unintervenant" => $unintervenant,
      				'statuts' => $nomstatut,
      				'sonstatut'=>$lestatutResult,
      				'antennes' =>$antennes,
      				'sonantenne' => $antenneintervenantResult,
      				'annee' => $anneeantenneintervenantResult
      				);
     	
      	$this->load->view('Backoffice/modifier/vue_modifier_intervenant',$data);	
	}

	public function editIntervenant()
	{

		
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listeIntervenant');
		}

		else
		{
			$id = $this->input->post('GMIN_CODE');
			$this->form_validation->set_rules('GMIN_NOM', lang('th_nom'), 'required|alpha|max_length[50]'); 
      		$this->form_validation->set_rules('GMIN_PRENOM', lang('th_prenom'), 'required|alpha|max_length[50]');
      		$this->form_validation->set_rules('GMIN_EMAIL', lang('val_email'), 'required|valid_email|max_length[30]'); //is_unique[users.email] 
      		$this->form_validation->set_rules('GMIN_TEL', lang('val_tel_port'),'required|numeric|min_length[10]|max_length[20]');
      		$this->form_validation->set_rules('GMIN_TEL_PRO',lang('val_tel_pro'),'numeric|min_length[10]|max_length[20]');
      		$this->form_validation->set_rules('GMIN_FAX', lang('val_tel_fax'),'numeric|min_length[10]|max_length[20]');
      		$this->form_validation->set_rules('GMIN_ADRESSE',lang('val_adresse'), 'required|alphanumeric|max_length[200]'); 
      		$this->form_validation->set_rules('GMIN_CODE_POSTAL',lang('val_code_postal'), 'required|alphanumeric|max_length[10]|min_length[5]'); 
      		$this->form_validation->set_rules('GMIN_VILLE', lang('val_ville'), 'required|alpha|max_length[30]'); 
      		$this->form_validation->set_rules('GMIN_PAYS', lang('val_pays'), 'required|alpha|max_length[30]');
      		$this->form_validation->set_rules('GMIN_DERNIER_DIPLOME', lang('val_dernier_diplome'), 'required|alpha_dash|max_length[30]'); 
      		$this->form_validation->set_rules('GMIN_STATUT', lang('val_statut'), 'required|alpha|max_length[10]');
      		$this->form_validation->set_rules('GMIN_PROFESSION', lang('th_profession'), 'required|alpha|max_length[30]'); 
      		$this->form_validation->set_rules('GMIN_LIEU_TRAVAIL', lang('val_lieu_travail'), 'required|alphanumeric|max_length[40]'); 
      		$this->form_validation->set_rules('GMIA_ANNEE', lang('th_annee'), 'required|min_length[4]|max_length[4]');  
      		$this->form_validation->set_rules('GMANT_CODE', lang('val_antenne'), 'required|alphanumeric|min_length[10]|max_length[10]'); 
		
      		// si le formulaire est bon
      		if ($this->form_validation->run() == TRUE)
      		{
      			$this->intervenant_m->edit_intervenant();
				$intervenant = $this->intervenant_m->getIntervenantById($id);
			}

			

			$this->modifierIntervenant($id);	
		}

	}

	// la fiche d'une entreprise
	public function ficheIntervenant($id)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listeIntervenant');
		}

		else
		{

			$unintervenant = $this->intervenant_m->getIntervenantById($id);
     		$data = array('id' => $id,
      					"unintervenant" => $unintervenant
      					);

     		$this->load->view('backoffice/fiches/fiche_intervenant', $data);
		}
	}

	//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes MATIERE
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifierMatiere($id)
	{

     
      	$matiere = $this->matiere_m->getMatiereById($id);
   	 	
     	$ueResult = $this->ue_m->getUe();

     	//on appelle la methodes qui nous renvoie tous les intervenants
		$intervenantResult = $this->intervenant_m->getAllIntervenants();

		//on recupere les semestres pour la recherche et la liste(code apogee) 
		$semestreResult = $this->semestre_m->getSemestre();

		$semestres = array();
		$intervenants = array();
		$ues = array();

		foreach ($semestreResult as $semestre) 
		{
			$semestres[$semestre->GMSEM_CODE] = $semestre->semestre;
		}

		foreach ($intervenantResult as $intervenant) 
		{
			$intervenants[$intervenant->GMIN_CODE] = $intervenant->intervenant;
		}

		foreach ($ueResult as $ue) 
		{
			$ues[$ue->GMUE_CODE] = $ue->GMUE_NOM;
		}

			
      	$data = array(
      					'id' => $id,
      					"matiere" => $matiere,
      					"ues" =>$ues,
      					"semestres" =>$semestres,
      					'intervenants' =>$intervenants
      				);
     		
      	$this->load->view('Backoffice/modifier/vue_modifier_matiere',$data);	
	}


	public function editMatiere()
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listeMatieres');
		}

		else
		{
			$id = $this->input->post('GMMA_CODE');

			$this->matiere_m->edit_matiere();
			$matiere = $this->matiere_m->getMatiereById($id);

			$this->modifierMatiere($id);	
		}

	}

	// la fiche d'une matiere
	public function ficheMatiere($id)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des matieres
			redirect('backoffice_liste/listeMatieres');
		}

		else
		{
			$unematiere = $this->matiere_m->getMatiereById($id);

     		$data = array('id' => $id,
      					"unematiere" => $unematiere
      					);

     		$this->load->view('backoffice/fiches/fiche_matiere', $data);
		}
	}

//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes MATIERE
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifierCours($id)
	{

      	$cours = $this->cours_m->getCoursById($id);
   	 	
     	$matiereResult = $this->matiere_m->getMatiere();

     	//on appelle la methodes qui nous renvoie tous les intervenants
		$intervenantResult = $this->intervenant_m->getAllIntervenants();

		$intervenants = array();
		$matieres = array();

		foreach ($intervenantResult as $intervenant) 
		{
			$intervenants[$intervenant->GMIN_CODE] = $intervenant->intervenant;
		}

		foreach ($matiereResult as $matiere) 
		{
			$matieres[$matiere->GMMA_CODE] = $matiere->GMMA_NOM;
		}

			
      	$data = array('id' => $id,
      					"cours" => $cours,
      					"matieres" =>$matieres,
      					'intervenants' =>$intervenants
      				);
     		
      	$this->load->view('backoffice/modifier/vue_modifier_cours',$data);	
	}


	public function editCours()
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listeCours');
		}

		else
		{
			$id = $this->input->post('GMCO_CODE');
			//echo $id;

			$this->cours_m->edit_cours();
			$cours = $this->cours_m->getCoursById($id);

			$this->modifierCours($id);	
		}

	}

	// la fiche d'un cours
	public function ficheCours($id)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des matieres
			redirect('backoffice_liste/listeCours');
		}

		else
		{
     		$data = array('id' => $id,
      					"cours" => $this->cours_m->getCoursById($id)
      					);

     		$this->load->view('backoffice/fiches/fiche_cours', $data);
		}
	}


	//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes SALLE
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifierSalle($id)
	{

     	 	$salle = $this->salle_m->getSalleById($id);
			
      		$data = array(
      						'id' => $id,
      						"salle" => $salle
      					);
     		
      		$this->load->view('backoffice/modifier/vue_modifier_salle',$data);	
	}

	public function editSalle()
	{

		
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des salles
			redirect('backoffice_liste/listSalle');
		}

		else
		{
			$id =$this->input->post('GMSA_CODE');

			$this->form_validation->set_rules('GMSA_NOM', lang('th_nom_salle'), 'required|alphanumeric|max_length[50]'); 
      		$this->form_validation->set_rules('GMSA_CAPACITE', lang('th_capacite_salle'), 'required|numeric');
      		$this->form_validation->set_rules('GMSA_LIEU', lang('th_lieu_salle'),'required|alphanumeric|max_length[50]');

      		if($this->form_validation->run() == TRUE)
      		{
      			
				$this->salle_m->edit_salle();
				$salle = $this->salle_m->getSalleById($id);
      		}

			$this->modifierSalle($id);	
		}

	}

	// la fiche perso 
	public function ficheSalle($id)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listSalle');
		}

		else
		{
			$salle = $this->salle_m->getSalleById($id);
     		$data = array('id' => $id,
      					"salle" => $salle
      					);

     		$this->load->view('backoffice/fiches/fiche_salle', $data);
		}
	}

	//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes PLANNING
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifierPlanning($id)
	{

			

			$antenneResult = $this->antenne_m->getAllAntenne();

     	 	$planning = $this->planning_m->getPlanningById($id);
     	 	$antenne_planning = $this->antenne_m->getAntenneById($planning->GMANT_CODE);
   
     	 	
     	 	$antennes = array('' => '');

			foreach ($antenneResult as $antenne) 
			{
				$antennes[$antenne->GMANT_CODE] = $antenne->GMANT_VILLE.' ('.$antenne->GMANT_PAYS.')';
			}

     	 	
	
      		$data = array(
      						'id' => $id,
      						"planning" => $planning,
      						"antennes" =>$antennes,
      						"antenne_planning" =>$antenne_planning
      					);
     		
      		$this->load->view('backoffice/modifier/vue_modifier_planning',$data);	
	}

	public function editPlanning()
	{

		
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des plannings
			redirect('backoffice_liste/listPlanning');
		}

		else
		{
			$id =$this->input->post('GMPL_CODE');
			
			$this->form_validation->set_rules('GMANT_CODE', lang('val_antenne'), 'required|alphanumeric|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('GMPL_NOM', lang('val_title_planning'), 'required|alphanumeric|max_length[100]'); 
      		$this->form_validation->set_rules('GMPL_NOMBRE_HEURES', lang('th_nbh'), 'required|numeric');
      		$this->form_validation->set_rules('GMPL_ANNEE', lang('th_annee'),'required|numeric|min_length[4]|max_length[4]');

      		if($this->form_validation->run() == TRUE)
      		{
      			$this->planning_m->edit_planning();
				$planning = $this->planning_m->getPlanningById($id);
      		}

			$this->modifierPlanning($id);	
		}

	}

	// la fiche perso 
	public function fichePlanning($id)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listPlanning');
		}

		else
		{
			$planning = $this->planning_m->getPlanningById($id);
     		$data = array('id' => $id,
      					"planning" => $planning
      					);

     		$this->load->view('backoffice/fiches/fiche_planning', $data);
		}
	}

//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes ANTENNE
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifierAntenne($id)
	{

     	 	$antenne = $this->antenne_m->getAntenneById($id);
     	 
			
      		$data['id'] = $id;
      		$data['antenne'] = $antenne;
     		
      		$this->load->view('backoffice/modifier/vue_modifier_antenne',$data);	
	}

	public function editAntenne()
	{

		
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des antennes
			redirect('backoffice_liste/listAntenne');
		}

		else
		{
			$id =$this->input->post('GMANT_CODE');
			$this->form_validation->set_rules('GMANT_VILLE', lang('val_ville'), 'required|alphanumeric|max_length[30]'); 
      		$this->form_validation->set_rules('GMANT_PAYS', lang('val_pays'), 'required|alpha|max_length[30]');


      		if ($this->form_validation->run() == TRUE)
      		{
      			$this->antenne_m->edit_antenne();
				$antenne = $this->antenne_m->getAntenneById($id);
			}


			

			$this->modifierAntenne($id);	
		}

	}

	// la fiche perso 
	public function ficheAntenne($id)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listAntenne');
		}

		else
		{
			$antenne = $this->antenne_m->getAntenneById($id);
     		$data['id'] = $id;
      		$data['antenne'] = $antenne;
     		

     		$this->load->view('backoffice/fiches/fiche_antenne', $data);
		}
	}

//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes FORMATION
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifierFormation($id)
	{

     	 	$formation = $this->formation_m->getFormationById($id);
     	 
			
      		$data['id'] = $id;
      		$data['formation'] = $formation;
     		
      		$this->load->view('backoffice/modifier/vue_modifier_formation',$data);	
	}

	public function editFormation()
	{

		
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des formations
			redirect('backoffice_liste/listFormation');
		}

		else
		{
			$id =$this->input->post('GMFO_CODE');
			
			$this->form_validation->set_rules('GMFO_NOM', lang('val_nom_formation'), 'required|alphanumeric|max_length[250]'); 
      		$this->form_validation->set_rules('GMFO_FORMATION', lang('th_formation'), 'required|alphanumeric|max_length[10]');
      		$this->form_validation->set_rules('GMFO_NIVEAU', lang('th_niveau'),'required|max_length[3]');
      		$this->form_validation->set_rules('GMFO_MENTION', lang('th_mention'),'alphanumeric|max_length[50]');
      		$this->form_validation->set_rules('GMFO_DOMAINE', lang('th_domaine'),'min_length[5]|max_length[300]');
		
      		if ($this->form_validation->run() == TRUE)
      		{
      			$this->formation_m->edit_formation();
				$formation = $this->formation_m->getFormationById($id);
			}

			

			$this->modifierFormation($id);	
		}

	}

	// la fiche perso 
	public function ficheFormation($id)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listFormation');
		}

		else
		{
			$formation = $this->formation_m->getFormationById($id);
     		$data['id'] = $id;
      		$data['formation'] = $formation;
     		

     		$this->load->view('backoffice/fiches/fiche_formation', $data);
		}
	}
	//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes SEMESTRE
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifierSemestre($id)
	{

     	 	$semestre = $this->semestre_m->getSemestreById($id);
     	 
     	 	
     	 	$formationResult = $this->formation_m->getFormation();

     	 	$formation_semestre = $this->formation_m->getFormationById($semestre->GMFO_CODE);
     	 	
     	 	$formations = array('' => '');

			foreach ($formationResult as $formation) 
			{
				$formations[$formation->GMFO_CODE] = $formation->formation_niveau;
			}

			
      		$data['id'] = $id;
      		$data['semestre'] = $semestre;
      		$data['formations'] = $formations;
      		$data['formation_semestre'] = $formation_semestre;

      		$this->load->view('backoffice/modifier/vue_modifier_semestre',$data);	
	}

	public function editSemestre()
	{

		
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des semestres
			redirect('backoffice_liste/listSemestre');
		}

		else
		{
			//print_r($valeurs);
			$id =$this->input->post('GMSEM_CODE');
			
			$this->form_validation->set_rules('GMFO_CODE', lang('th_formation'), 'required|alphanumeric|min_length[10]|max_length[10]'); 
     		$this->form_validation->set_rules('GMSEM_NOM', lang('val_semestre'), 'required|max_length[200]'); 
      		$this->form_validation->set_rules('GMSEM_ANNEE', lang('th_annee'), 'required|numeric|min_length[4]|max_length[4]');
      		$this->form_validation->set_rules('GMSEM_DESCRIPTION', lang('val_description'), 'required|max_length[200]'); 
      		$this->form_validation->set_rules('GMSEM_CODE_APOGEE',lang('val_code_apogee'),'required|min_length[10]|max_length[10]');
      		$this->form_validation->set_rules('GMSEM_NOMBRE_HEURES_CM', lang('val_nb_h_cm'),'required|numeric|max_length[4]');
      		$this->form_validation->set_rules('GMSEM_NOMBRE_HEURES_TD', lang('val_nb_h_td'),'required|numeric|max_length[4]');
      		$this->form_validation->set_rules('GMSEM_NOMBRE_HEURES_TP', lang('val_nb_h_tp'),'required|numeric|max_length[4]'); 
      		$this->form_validation->set_rules('GMSEM_NOMBRE_HEURES_LIBRES',lang('val_nb_h_libres'),'required|numeric|max_length[4]'); 
      		$this->form_validation->set_rules('GMSEM_CREDIT_ECTS', lang('val_credit_ects'), 'required|numeric|max_length[3]'); 
		
      		// si le formulaire est bon
      		if ($this->form_validation->run() == TRUE)
      		{
      			$this->semestre_m->edit_semestre();
				$semestre = $this->semestre_m->getSemestreById($id);
			}

			$this->modifierSemestre($id);	
		}

	}

	// la fiche perso 
	public function ficheSemestre($id)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des semestres
			redirect('backoffice_liste/listSemestre');
		}

		else
		{
			$semestre = $this->semestre_m->getSemestreById($id);

     		$data['id'] = $id;
      		$data['semestre'] = $semestre;

     		$this->load->view('backoffice/fiches/fiche_semestre', $data);
		}
	}


	//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes UE
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifierUE($id)
	{
     	 	$ue = $this->ue_m->getUEById($id);
     	 
      		$data['id'] = $id;
      		$data['ue'] = $ue;
     		
      		$this->load->view('backoffice/modifier/vue_modifier_ue',$data);	
	}

	public function editUE()
	{

		
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des ues
			redirect('backoffice_liste/listUE');
		}

		else
		{
			$id =$this->input->post('GMUE_CODE');
			
			$this->ue_m->edit_ue();
			$ue = $this->ue_m->getUEById($id);

			$this->modifierUE($id);	
		}

	}

	public function ficheUE($id)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des ues
			redirect('backoffice_liste/listUE');
		}

		else
		{
			$ue = $this->ue_m->getUEById($id);

     		$data['id'] = $id;
      		$data['ue'] = $ue;

     		$this->load->view('backoffice/fiches/fiche_ue', $data);
		}
	}


//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes Seance
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifierSeance($id)
	{
     	 	$seance = $this->seance_m->getSeanceById($id);

     	 	$salleResult = $this->salle_m->getSalle();
  			$salles = array('' => '');

  			foreach ($salleResult as $salle) 
  			{
  				$salles[$salle->GMSA_CODE] = $salle->salle;
  			}

  			$planningResult = $this->planning_m->getAllPlanning();
  			$plannings = array('' => '');

  			foreach ($planningResult as $planning) 
  			{
  				$plannings[$planning->GMPL_CODE] = $planning->GMPL_NOM.' '.$planning->GMPL_ANNEE;
  			}

  			$coursResult = $this->cours_m->getCours();
  			$cours = array('' => '');

  			foreach ($coursResult as $c) 
  			{
  				$cours[$c->GMCO_CODE] = $c->GMCO_NOM;
  			}

  			$data['salles'] = $salles;
  			$data['plannings'] = $plannings;
  			$data['cours'] = $cours;
      		$data['id'] = $id;
      		$data['seance'] = $seance;
     		
      		$this->load->view('backoffice/modifier/vue_modifier_seance',$data);	
	}

	public function editSeance()
	{

		
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des seances
			redirect('backoffice_liste/listSeance');
		}

		else
		{
			$id =$this->input->post('GMSEA_CODE');

			$this->form_validation->set_rules('GMSEA_TYPE', lang('val_type_seance'), 'required|alphanumeric|max_length[50]');  
     		$this->form_validation->set_rules('GMSEA_DATE', lang('th_date'), 'required|min_length[10]|max_length[10]'); 

     		$this->form_validation->set_rules('GMPL_CODE', lang('val_title_planning'), 'required|alphanumeric|min_length[10]|max_length[10]'); 
     		$this->form_validation->set_rules('GMCO_CODE', lang('val_cours_title'), 'required|alphanumeric|min_length[10]|max_length[10]'); 
     		$this->form_validation->set_rules('GMSA_CODE', lang('th_nom_salle'), 'alphanumeric|min_length[10]|max_length[10]'); 

     		$this->form_validation->set_rules('GMSEA_JOUR', lang('th_jour'), 'alpha|max_length[20]');
     		$this->form_validation->set_rules('GMSEA_HEURE_DEBUT', lang('th_heure_deb'), 'alphanumeric|min_length[4]|max_length[5]');
     		$this->form_validation->set_rules('GMSEA_HEURE_FIN', lang('th_heure_fin'), 'min_length[4]|max_length[5]');
     		$this->form_validation->set_rules('GMSEA_STATUT', lang('val_statut_seance'), 'alpha|max_length[20]');
     		$this->form_validation->set_rules('GMSEA_INFOS_COMPLEMENTAIRES', lang('th_infos_comp'), 'alphanumeric|min_length[5]'); 


      		if($this->form_validation->run() == TRUE)
      		{
      			$this->seance_m->edit_seance();
				$seance = $this->seance_m->getSeanceById($id);
      		}

			$this->modifierSeance($id);	
		}

	}

	public function ficheSeance($id)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des seances
			redirect('backoffice_liste/listSeance');
		}

		else
		{
			$seance = $this->seance_m->getSeanceById($id);

     		$data['id'] = $id;
      		$data['seance'] = $seance;

     		$this->load->view('backoffice/fiches/fiche_seance', $data);
		}
	}


//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes PARAMETRES
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifier_parameter($id)
	{

     	 	$parameter = $this->parametre_m->getParameterById($id);
			
      		$data['id'] = $id;
      		$data['parameter'] = $parameter;
     		
      		$this->load->view('backoffice/modifier/vue_modifier_parametre',$data);	
	}

	public function edit_parameter()
	{

		
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des parameters
			redirect('backoffice_liste/listParameter');
		}

		else
		{
			$id =$this->input->post('GMPARA_CODE');


      		$this->form_validation->set_rules('GMPARA_NOM', lang('val_nom_param'), 'required|alpha_dash|max_length[50]');
      		$this->form_validation->set_rules('GMPARA_VALEUR', lang('val_param'), 'required|max_length[50]');
      		$this->form_validation->set_rules('GMPARA_ANNEE', lang('th_date'),'required|numeric|min_length[4]|max_length[4]');
      		$this->form_validation->set_rules('GMPARA_DESCRIPTION', lang('val_description'), 'min_length[2]|max_length[200]');

      		if($this->form_validation->run() == TRUE)
      		{
      			$this->parametre_m->edit_parameter();
				$parameter = $this->parametre_m->getParameterById($id);
      		}

			$this->modifier_parameter($id);	
		}

	}

	// la fiche perso 
	public function fiche_parameter($id)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listParameter');
		}

		else
		{
			$parameter = $this->parametre_m->getParameterById($id);
     		$data['id'] = $id;
      		$data['parameter'] = $parameter;

     		$this->load->view('backoffice/fiches/fiche_parametre', $data);
		}
	}


//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes DOCUMENT MODELE
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifier_document_modele($id)
	{

     	 	$document_modele = $this->document_modele_m->get_document_modeleById($id);
			
      		$data['id'] = $id;
      		$data['document_modele'] = $document_modele;
     		
      		$this->load->view('backoffice/modifier/vue_modifier_document_modele',$data);	
	}

	public function edit_document_modele()
	{

		
		if ($this->input->post('retour')) 
		{
			redirect('backoffice_liste/list_document_modele');
		}

		else
		{
			$id =$this->input->post('GMDM_CODE');

			$this->form_validation->set_rules('GMDM_NOM', lang('val_nom_doc'), 'required|alpha_dash|max_length[30]');
      		$this->form_validation->set_rules('GMDM_TYPE', lang('val_type_doc'), 'required|alpha|max_length[30]');
      		$this->form_validation->set_rules('GMDM_FORMAT', lang('val_format'), 'required|alpha|max_length[20]');    		
      		$this->form_validation->set_rules('GMDM_ANNEE', lang('th_annee'), 'required|numeric|min_length[4]|max_length[4]');
      		$data=array();
      	
      		if($this->form_validation->run() == TRUE)
      		{
      			if($_FILES['GMDM_DOCUMENT']['error'] == 0)
       			{
            		
           			$config['upload_path'] = 'files/document_modele/'.$this->input->post("GMDM_ANNEE").'/'; 
           			$config['allowed_types'] = '*'; 
            		$config['overwrite'] = true; 
            		$config['remove_spaces'] = true;

            		if(!is_dir($config['upload_path']))
            		{
					   	mkdir($config['upload_path'], 0777, true);
					}

					
           			$this->load->library('upload', $config);

            		if ( !$this->upload->do_upload('GMDM_DOCUMENT'))
            		{
            			$data['error_document'] =  $this->upload->display_errors();
            		}
       				
       				else
       				{
       					$this->document_modele_m->edit_document_modele();
       				}
       			
       			}
       			else
       			{
       				if($_FILES['GMDM_DOCUMENT']['error']==4)
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

			$this->modifier_document_modele($id);	
		}

	}

	public function fiche_document_modele($id)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/list_document_modele');
		}

		else
		{
			$document_modele = $this->document_modele_m->get_document_modeleById($id);
     		$data['id'] = $id;
      		$data['document_modele'] = $document_modele;

     		$this->load->view('backoffice/fiches/fiche_document_modele', $data);
		}
	}


//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes LANGUE
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifier_langue($id)
	{

     	 	$langue = $this->langue_m->getLangueById($id);
			
      		$data['id'] = $id;
      		$data['langue'] = $langue;
     		
      		$this->load->view('backoffice/modifier/vue_modifier_langue',$data);	
	}
	public function edit_langue()
	{

		
		if ($this->input->post('retour')) 
		{
			redirect('backoffice_liste/list_langue');
		}

		else
		{
			$id =$this->input->post('GMLA_CODE');

			$this->form_validation->set_rules('GMLA_LANGUE', lang('val_langue'), 'required|max_length[20]|alpha'); 
			$data = array();
     		$data['message'] = 'avant verification';
      		if($this->form_validation->run() == TRUE)
      		{
      			$data['message'] = 'après verification langue';
      			if($_FILES['GMLA_DRAPEAU']['error']==4)
      			{

	   					$langueResult = $this->langue_m->getLanguages();
       					$langues = array();

		      			foreach ($langueResult as $langue) 
		      			{
		      				$langues[$langue->GMLA_CODE] = $langue->GMLA_LANGUE;
		      			}
		      			$val_bd = $langues[$this->input->post('GMLA_CODE')];
       					if(in_array(ucfirst($this->input->post('GMLA_LANGUE')), $langues) and ucfirst($this->input->post('GMLA_LANGUE'))!= $val_bd)
						{
						    $data['error_same_langue'] = lang('error_same_langue');
						}
						else
						{
							$this->langue_m->edit_langue();
       					}
      			}
      			if($_FILES['GMLA_DRAPEAU']['error'] == 0)
       			{
           			$config['upload_path'] = 'images/logo/pays/'; 
           			$config['allowed_types'] = 'jpg|png|gif'; 
            		$config['overwrite'] = true; 
            		$config['remove_spaces'] = true;

            		if(!is_dir($config['upload_path']))
	        		{
					   	mkdir($config['upload_path'], 0777, true);
					}

           			$this->load->library('upload', $config);
		           	if($_FILES['GMLA_DRAPEAU']['error'] == 0)
		   			{
		       			$this->load->library('upload', $config);

		        		if ( !$this->upload->do_upload('GMLA_DRAPEAU'))
		        		{
		        			$data['error_drapeau'] =  $this->upload->display_errors();
		        		}
		        		else
	        			{
	        				$langueResult = $this->langue_m->getLanguages();
	       					$langues = array();

			      			foreach ($langueResult as $langue) 
			      			{
			      				$langues[$langue->GMLA_CODE] = $langue->GMLA_LANGUE;
			      			}
			      			$val_bd = $langues[$this->input->post('GMLA_CODE')];
       					if(in_array(ucfirst($this->input->post('GMLA_LANGUE')), $langues) and ucfirst($this->input->post('GMLA_LANGUE'))!= $val_bd)
							{
							    $data['error_same_langue'] = lang('error_same_langue');
							}
							else
							{
								$this->langue_m->edit_langue();	
								
	       					}
						}
		   				
		   			}
					
					else
					{
						$message = '<p>'.$message.'</p>';

						$data['error_drapeau'] = $message;
					}


       			}
       		 }
       		 
       		 $langue = $this->langue_m->getLangueById($id);
			
      		$data['id'] = $id;
      		$data['langue'] = $langue;

       		$this->load->view('backoffice/modifier/vue_modifier_langue',$data);			
				
		}

	}

	public function fiche_langue($id)
	{
		if ($this->input->post('retour')) 
		{
			redirect('backoffice_liste/list_langue');
		}

		else
		{
			$langue = $this->langue_m->getLangueById($id);
     		$data['id'] = $id;
      		$data['langue'] = $langue;

     		$this->load->view('backoffice/fiches/fiche_langue', $data);
		}
	}

//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes SOCIAL NETWORKS
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifier_social_networks($id)
	{

     	 	$social_networks = $this->social_networks_m->getSocialNetworkById($id);
			
      		$data['id'] = $id;
      		$data['social_networks'] = $social_networks;
     		
      		$this->load->view('backoffice/modifier/vue_modifier_social_networks',$data);	
	}

	public function edit_social_networks()
	{

		
		if ($this->input->post('retour')) 
		{
			redirect('backoffice_liste/list_social_networks');
		}

		else
		{
			$id =$this->input->post('GMRS_CODE');

			$this->form_validation->set_rules('GMRS_NOM', lang('th_social_networks'), 'required|max_length[50]|alpha_dash');
			$data = array();
      		if($this->form_validation->run() == TRUE)
      		{
      			if($_FILES['GMRS_LOGO']['error']==4)
      			{

	   					$socialNetworksResult = $this->social_networks_m->getSocialNetworks();
       					$socialNetworks = array();

		      			foreach ($socialNetworksResult as $sn) 
		      			{
		      				$socialNetworks[$sn->GMRS_CODE] = strtolower($sn->GMRS_NOM);
		      			}
		      			$val_bd = $socialNetworks[$this->input->post('GMRS_CODE')];
						if(in_array(strtolower($this->input->post('GMRS_NOM')), $socialNetworks) and $this->input->post('GMRS_NOM')!= $val_bd)
						{
							$data['error_same_network'] = lang('error_same_network');
						}
						else
						{
	       					$this->social_networks_m->edit_social_network();
       					}
      			}
      			if($_FILES['GMRS_LOGO']['error'] == 0)
       			{
           			$config['upload_path'] = 'images/logo/'; // l'endroit ou sera stoké le fichier
           			$config['allowed_types'] = 'gif|jpeg|jpg|png'; 
            		$config['overwrite'] = true; 
            		$config['remove_spaces'] = true;

            		if(!is_dir($config['upload_path']))
	        		{
					   	mkdir($config['upload_path'], 0777, true);
					}

           			$this->load->library('upload', $config);
		           	if($_FILES['GMRS_LOGO']['error'] == 0)
		   			{
		       			$this->load->library('upload', $config);

		        		if ( !$this->upload->do_upload('GMRS_LOGO'))
		        		{
		        			$data['error_logo'] =  $this->upload->display_errors();
		        		}
		        		else
	        			{
	        				$socialNetworksResult = $this->social_networks_m->getSocialNetworks();
	       					$socialNetworks = array();

			      			foreach ($socialNetworksResult as $sn) 
			      			{
			      				$socialNetworks[$sn->GMRS_CODE] = strtolower($sn->GMRS_NOM);
			      			}
							$val_bd = $socialNetworks[$this->input->post('GMRS_CODE')];
							if(in_array(strtolower($this->input->post('GMRS_NOM')), $socialNetworks) and $this->input->post('GMRS_NOM')!= $val_bd)
							{
								$data['error_same_network'] = lang('error_same_network');
							}
							else
							{
		       					$this->social_networks_m->edit_social_network();
	       					}
						}
		   				
		   			}
					
					else
					{
						$message = '<p>'.$message.'</p>';

						$data['error_logo'] = $message;
					}


       			}
       		 }
			
			$social_networks = $this->social_networks_m->getSocialNetworkById($id);

			
      		$data['id'] = $id;
      		$data['social_networks'] = $social_networks;
     		
      		$this->load->view('backoffice/modifier/vue_modifier_social_networks',$data);	
		}

	}

	public function fiche_social_networks($id)
	{
		if ($this->input->post('retour')) 
		{
			redirect('backoffice_liste/list_social_networks');
		}

		else
		{
			$social_networks = $this->social_networks_m->getSocialNetworkById($id);
     		$data['id'] = $id;
      		$data['social_networks'] = $social_networks;

     		$this->load->view('backoffice/fiches/fiche_social_networks', $data);
		}
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
			redirect('backoffice_liste/list_procedure_admin');
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
			redirect('backoffice_liste/list_procedure_admin');
		}

		else
		{
			$procedure_administrative = $this->procedure_m->get_procedure_administrativeById($id);
     		$data['id'] = $id;
      		$data['procedure_administrative'] = $procedure_administrative;

     		$this->load->view('backoffice/fiches/fiche_procedure_administrative', $data);
		}
	}

//-------------------------------------------------------------------------------------------------------------------------------
	//Methodes SALLE
	//-------------------------------------------------------------------------------------------------------------------------------
	
	public function modifierQuestionnaire($annee)
	{

     	 	$questionnaire = $this->question_m->getQuestionnaireByAnnee($annee);
			
      		$data = array(
      						'annee' => $annee,
      						"questionnaire" => $questionnaire
      					);
     		
      		$this->load->view('backoffice/modifier/vue_modifier_questionnaire',$data);	
	}

	public function editQuestionnaire()
	{

		
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des questionnaires
			redirect('backoffice_liste/list_questionnaire');
		}

		else
		{
			$annee =$this->input->post('GMQQ_ANNEE');

			$this->form_validation->set_rules('GMQQ_NOM', lang('num_question'), 'required');
      		$this->form_validation->set_rules('GMQQ_DESCRIPTION', lang('desc_question'), 'required');
      		$this->form_validation->set_rules('GMQQ_ANNEE', lang('th_annee'), 'required');

      		if($this->form_validation->run() == TRUE)
      		{
      			
				$this->question_m->edit_questionnaire();
				$questionnaire = $this->question_m->getQuestionnaireByAnnee($annee);
      		}

			$this->modifierQuestionnaire($annee);	
		}

	}

	// la fiche perso 
	public function ficheQuestionnaire($annee)
	{
		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/list_questionnaire');
		}

		else
		{
			$questionnaire = $this->question_m->getQuestionnaireByAnnee($annee);
     		$data = array('annee' => $annee,
      					"questionnaire" => $questionnaire
      					);

     		$this->load->view('backoffice/fiches/fiche_questionnaire', $data);
		}
	}



}
