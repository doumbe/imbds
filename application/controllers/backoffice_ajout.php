<?php
class Backoffice_ajout extends CI_Controller
{


	public function __construct()
    {
		parent:: __construct();

		$this->lang->load("backoffice","french");
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

	public function index()
	{
		// la page d'accueil
		$this->load->view('backoffice/pageAccueil');
		//$this->load->view('auth/index');
	}

	public function inscription()
	{
		$this->load->view('backoffice/inscription');
	}

	//----------------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes CONTACT
	//----------------------------------------------------------------------------------------------------------------------------------------------------
	
	public function ajouterContact()
	{

		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listeContact');
		}

		else
		{
			//vérification du formulaire 
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

      		// si le formulaire est bon
      		if ($this->form_validation->run() == TRUE)
      		{
      			$this->contact_m->inserer_contact();
			    redirect('backoffice_liste/listeContact');
      		}
      		else
      		{
      			$entrepriseResult = $this->entreprise_m->getEntreprise()->result();

      			$entreprises = array('' => '');

				foreach ($entrepriseResult as $entreprise) 
				{
					$entreprises[$entreprise->GMEN_CODE] = $entreprise->GMEN_NOM;
				}

				$data = array('entreprises' => $entreprises);
      			// ce lien sera remplacé par le bon lien 
      		 	$this->load->view('Backoffice/ajouter/vue_ajouter_contact', $data);
      		}
		}	
	}


	//-------------------------------------------------------------------------------------------------------------------------------------
	//Methodes ENTREPRISE
	//--------------------------------------------------------------------------------------------------------------------------------------
	
	public function ajouterEntreprise()
	{

		if ($this->input->post('retour')) 
		{
			// on revient dans la liste des contacts
			redirect('backoffice_liste/listeEntreprise');
		}

		else
		{
			//vérification du formulaire 
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

      		// si le formulaire est bon
      		if ($this->form_validation->run() == TRUE)
      		{
      			// on a cliquer sur valider
      			// on ajoute dans la base de données.
      			$this->entreprise_m->inserer_entreprise();
		    	redirect('backoffice_ajout/ajouterEntreprise');
      		}

			else
			{
				$this->load->view('backoffice/ajouter/vue_ajout_entreprise');
			}	
		}
	}


	//--------------------------------------------------------------------------------------------------------------------------------------
	//Methodes INTERVENANT
	//-----------------------------------------------------------------------------------------------------------------------------------------
	
	public function ajouterIntervenant()
	{

		if($this->input->post('retour'))
		{
      		redirect('backoffice_liste/listeIntervenant');
		}

		else
		{
			//vérification du formulaire 
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
      			$this->intervenant_m->inserer_intervenant();
			    redirect('backoffice_ajout/ajouterIntervenant');
			}

			else
			{
				$antenneResult = $this->antenne_m->getAllAntenne();
				$antennes = array('' => '');

				foreach ($antenneResult as $antenne) 
				{
					$antennes[$antenne->GMANT_CODE] = $antenne->GMANT_VILLE;
				}

				$data = array('antennes' => $antennes);
				$this->load->view('Backoffice/ajouter/vue_ajout_intervenant', $data);
			}	

		}
	}
	//-----------------------------------------------------------------------------------------------------------------------------------------
	//Methodes FORMATION
	//-------------------------------------------------------------------------------------------------------------------------------------------
	
	public function ajouterFormation()
	{

		if($this->input->post('retour'))
		{
      		redirect('backoffice_liste/listFormation');
		}

		else
		{
			//vérification du formulaire 
     		$this->form_validation->set_rules('GMFO_NOM', lang('val_nom_formation'), 'required|alphanumeric|max_length[250]'); 
      		$this->form_validation->set_rules('GMFO_FORMATION', lang('th_formation'), 'required|alphanumeric|max_length[10]');
      		$this->form_validation->set_rules('GMFO_NIVEAU', lang('th_niveau'),'required|max_length[3]');
      		$this->form_validation->set_rules('GMFO_MENTION', lang('th_mention'),'alphanumeric|max_length[50]');
      		$this->form_validation->set_rules('GMFO_DOMAINE', lang('th_domaine'),'min_length[5]|max_length[300]');
		
      		// si le formulaire est bon
      		if ($this->form_validation->run() == TRUE)
      		{
      			$this->formation_m->inserer_formation();
			    redirect('backoffice_liste/listFormation');
			}

			else
			{
				$this->load->view('backoffice/ajouter/vue_ajout_formation');
			}	

		}
	}


	//------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes ANTENNE
	//-------------------------------------------------------------------------------------------------------------------------------------------
	
	public function ajouterAntenne()
	{

		if($this->input->post('retour'))
		{
      		redirect('backoffice_liste/listAntenne');
		}


		else
		{
			$this->form_validation->set_rules('GMANT_VILLE', lang('val_ville'), 'required|alphanumeric|max_length[30]'); 
      		$this->form_validation->set_rules('GMANT_PAYS', lang('val_pays'), 'required|alpha|max_length[30]');


      		// si le formulaire est bon
      		if ($this->form_validation->run() == TRUE)
      		{
      			$this->antenne_m->inserer_antenne();
			    redirect('backoffice_liste/listAntenne');
			}

			else
			{
				$this->load->view('Backoffice/ajouter/vue_ajout_antenne');
			}	
		}
	}


	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes SEMESTRE
	//--------------------------------------------------------------------------------------------------------------------------------------------
	
	public function ajouterSemestre()
	{

		if ($this->input->post('retour')) 
		{
			redirect('backoffice_liste/listSemestre');
		}

		else
		{
			//vérification du formulaire 
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
      			$this->semestre_m->inserer_semestre();
			    redirect('backoffice_liste/listSemestre');
			}

			else
			{
				// on appel le model avec la methode qu'on veut
				$formationsResult = $this->formation_m->getFormation();
				// tableau où va être stocké les valeurs
				$formations = array('' => '');

				foreach ($formationsResult as $formation) 
				{
					$formations[$formation->GMFO_CODE] = $formation->formation_niveau;
				}

				$data['formations'] = $formations;
				$this->load->view('Backoffice/ajouter/vue_ajout_semestre',$data);
			}	

		}
	}

	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes UE
	//--------------------------------------------------------------------------------------------------------------------------------------------
	
	public function ajouterUe()
	{

		if ($this->input->post('retour')) 
		{
			redirect('backoffice_liste/listUE');
		}

		else
		{
			//vérification du formulaire 
     		$this->form_validation->set_rules('GMUE_NOM', lang('val_ue'), 'required|max_length[200]'); 
     		$this->form_validation->set_rules('GMSEM_CODE', lang('val_semestre'), 'required|alphanumeric|min_length[10]|max_length[10]');
      		$this->form_validation->set_rules('GMUE_COORDINATEUR1', lang('val_coordinateur1'), 'required|alpha|max_length[50]');
      		$this->form_validation->set_rules('GMUE_COORDINATEUR2', lang('val_coordinateur2'), 'alpha|max_length[50]');
			$this->form_validation->set_rules('GMUE_DESCRIPTION', lang('val_description'), 'required|max_length[200]'); 
      		$this->form_validation->set_rules('GMUE_CODE_APOGEE',lang('val_code_apogee'),'required|min_length[10]|max_length[10]');
      		$this->form_validation->set_rules('GMUE_NOMBRE_HEURES_CM', lang('val_nb_h_cm'),'required|numeric|max_length[4]');
      		$this->form_validation->set_rules('GMUE_NOMBRE_HEURES_TD', lang('val_nb_h_td'),'required|numeric|max_length[4]');
      		$this->form_validation->set_rules('GMUE_NOMBRE_HEURES_TP', lang('val_nb_h_tp'),'required|numeric|max_length[4]'); 
      		$this->form_validation->set_rules('GMUE_NOMBRE_HEURES_LIBRES',lang('val_nb_h_libres'),'required|numeric|max_length[4]'); 
      		$this->form_validation->set_rules('GMUE_CREDIT_ECTS', lang('val_credit_ects'), 'required|numeric|max_length[3]');  
		
      		// si le formulaire est bon
      		if ($this->form_validation->run() == TRUE)
      		{
      			$this->ue_m->inserer_ue();
			    redirect('backoffice_liste/listUE');
			}

			else
			{
				// on appele la methode qui prend tous les semestres
				$semestreResult = $this->semestre_m->getSemestre();
				$semestres = array('' => '');

				foreach ($semestreResult as $semestre) 
				{
					$semestres[$semestre->GMSEM_CODE] = $semestre->semestre;
				}

				// on passe le tableau des semestres à la vue
				$data = array('semestres' => $semestres);
				$this->load->view('Backoffice/ajouter/vue_ajout_ue', $data);
			}	

		}

	}


	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes MATIERE
	//--------------------------------------------------------------------------------------------------------------------------------------------

	public function ajouterMatiere()
	{

		if($this->input->post('retour'))
		{
			// ce lien sera remplacé par le bon lien 
      		redirect('backoffice_liste/listeMatieres');
		}

		else
		{ 
			
			$this->form_validation->set_rules('GMMA_NOM', lang('val_ue'), 'required|max_length[200]'); 
     		$this->form_validation->set_rules('GMUE_CODE', lang('val_ue'), 'required|alphanumeric|min_length[10]|max_length[10]');
     		$this->form_validation->set_rules('GMIN_CODE', lang('th_intervenant'), 'required|alphanumeric|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('GMMA_DESCRIPTION', lang('val_description'), 'required|max_length[100]'); 
      		$this->form_validation->set_rules('GMMA_CODE_APOGEE',lang('val_code_apogee'),'required|min_length[10]|max_length[10]');
      		$this->form_validation->set_rules('GMMA_NOMBRE_HEURES_CM', lang('val_nb_h_cm'),'required|numeric|max_length[4]');
      		$this->form_validation->set_rules('GMMA_NOMBRE_HEURES_TD', lang('val_nb_h_td'),'required|numeric|max_length[4]');
      		$this->form_validation->set_rules('GMMA_NOMBRE_HEURES_TP', lang('val_nb_h_tp'),'required|numeric|max_length[4]'); 
      		$this->form_validation->set_rules('GMMA_NOMBRE_HEURES_LIBRES',lang('val_nb_h_libres'),'required|numeric|max_length[4]'); 
      		$this->form_validation->set_rules('GMMA_CREDIT_ECTS', lang('val_credit_ects'), 'required|numeric|max_length[3]'); 
      		$this->form_validation->set_rules('GMMA_NOMBRE_SPECIALITE', lang('val_nb_specialite'), 'required|numeric|min_length[1]|max_length[1]'); 
      		// si le formulaire est bon
      		if ($this->form_validation->run() == TRUE)
      		{
      			$this->matiere_m->inserer_matiere();
			    redirect('backoffice_ajout/ajouterMatiere');
			}

			else
			{
				// on appele la methode qui prend tous les ues
				$ueResult = $this->ue_m->getUe();

				//on appelle la methodes qui nous renvoie tous les intervenants
				$intervenantResult = $this->intervenant_m->getAllIntervenants();

				$intervenants = array('' => '');
				$ues = array('' => '');

				foreach ($ueResult as $ue) 
				{
					$ues[$ue->GMUE_CODE] = $ue->GMUE_NOM;
				}

				foreach ($intervenantResult as $intervenant) 
				{
					$intervenants[$intervenant->GMIN_CODE] = $intervenant->intervenant;
				}

				
				$data = array('ues' => $ues,
								'intervenants' => $intervenants);
				$this->load->view('Backoffice/ajouter/vue_ajout_matiere', $data);
			}
		}	

	}

	
	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes COURS
	//--------------------------------------------------------------------------------------------------------------------------------------------

	public function ajouterCours()
	{

		if($this->input->post('retour'))
		{
			redirect('backoffice_liste/listeCours');
		}

		else
		{
			//vérification du formulaire 
     		$this->form_validation->set_rules('GMCO_NOM', lang('val_cours_title'), 'required'); 
     		$this->form_validation->set_rules('GMCO_PLANIFIE', lang('statut_planifie'), 'required');
     		$this->form_validation->set_rules('GMCO_REALISE', lang('statut_realise'), 'required');
      		$this->form_validation->set_rules('GMCO_HEURES_CM', lang('val_nb_h_cm'),'required|numeric|max_length[4]');
      		$this->form_validation->set_rules('GMCO_HEURES_TD', lang('val_nb_h_td'),'required|numeric|max_length[4]');
      		$this->form_validation->set_rules('GMCO_HEURES_TP', lang('val_nb_h_tp'),'required|numeric|max_length[4]');
      		$this->form_validation->set_rules('GMCO_HEURES_LIBRES', lang('val_nb_h_libres'),'required|numeric|max_length[4]');
      		$this->form_validation->set_rules('GMCO_NOTATION', lang('val_notation'), 'required|max_length[50]');
      		$this->form_validation->set_rules('GMCO_NOMBRE_SEANCES', lang('val_nb_seance'), 'required|numeric|min_length[1]|max_length[3]');

     		$this->form_validation->set_rules('GMMA_CODE', lang('val_matiere'), 'alphanumeric|min_length[10]|max_length[10]');
     		$this->form_validation->set_rules('GMIN_CODE', lang('th_intervenant'), 'required|alphanumeric|min_length[10]|max_length[10]');
     		$this->form_validation->set_rules('GMANT_CODE', lang('val_antenne'), 'required|alphanumeric|min_length[10]|max_length[10]');

      		$this->form_validation->set_rules('GMCO_PLANIFIE', lang('val_quest_planification'), 'required|numeric|min_length[1]|max_length[1]'); 
      		$this->form_validation->set_rules('GMCO_REALISE', lang('val_quest_realisation'), 'required|numeric|min_length[1]|max_length[1]'); 
      		$this->form_validation->set_rules('GMCO_RANG', lang('val_rang'), 'numeric|min_length[1]|max_length[2]'); 

      		$this->form_validation->set_rules('GMCO_PLAN_OBJECTIFS_GENERAUX', lang('val_rang'), 'min_length[5]|max_length[1000]'); 
      		$this->form_validation->set_rules('GMCO_PLAN_OBJECTIFS_SPECIFIQUES', lang('val_rang'), 'min_length[5]|max_length[1000]'); 
      		$this->form_validation->set_rules('GMCO_PLAN_PREREQUIS', lang('val_rang'), 'min_length[5]|max_length[1000]'); 
      		$this->form_validation->set_rules('GMCO_PLAN_MODE_EVALUATION', lang('val_rang'), 'min_length[5]|max_length[100]'); 
      		$this->form_validation->set_rules('GMCO_PLAN_LECTURE_RECOMMANDEE', lang('val_rang'), 'min_length[5]|max_length[1000]'); 
      
		
      		// si le formulaire est bon
      		if ($this->form_validation->run() == TRUE)
      		{
      			//echo $this->input->post('antennes');
      			//echo $this->input->post('matieres');
      			$this->cours_m->inserer_cours();
			    redirect('backoffice_ajout/ajouterCours');
			}

			else
			{
				// on appele la methode qui prend tous les intervenants
				$intervenantResult = $this->intervenant_m->getIntervenant();
				$matiereResult = $this->matiere_m->getMatiere();
				$antenneResult = $this->antenne_m->getAllAntenne();

				$antennes = array('' => '');
				$intervenants = array('' => '');
				$matieres = array('' => '');

				foreach ($antenneResult as $antenne) 
				{
					$antennes[$antenne->GMANT_CODE] = $antenne->GMANT_VILLE;
				} 

				foreach ($intervenantResult as $intervenant) 
				{
					$intervenants[$intervenant->GMIN_CODE] = $intervenant->intervenant;
				}

				foreach ($matiereResult as $matiere) 
				{
					$matieres[$matiere->GMMA_CODE] = $matiere->GMMA_NOM;
				}

				// on passe le tableau des semestres à la vue
				$data = array('matieres' => $matieres,
								'intervenants' => $intervenants,
								'antennes' => $antennes);

				$this->load->view('Backoffice/ajouter/vue_ajout_cours', $data);
			}
		}	

	}


	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes SALLE
	//--------------------------------------------------------------------------------------------------------------------------------------------

	public function ajouterSalle()
	{
		if($this->input->post('retour'))
		{
			// ce lien sera remplacé par le bon lien 
      		redirect('backoffice_liste/listSalle');
		}

		else
		{
			//vérification du formulaire 
     		$this->form_validation->set_rules('GMSA_NOM', lang('th_nom_salle'), 'required|alphanumeric|max_length[50]'); 
      		$this->form_validation->set_rules('GMSA_CAPACITE', lang('th_capacite_salle'), 'required|numeric');
      		$this->form_validation->set_rules('GMSA_LIEU', lang('th_lieu_salle'),'required|alphanumeric|max_length[50]');

      		if($this->form_validation->run() == TRUE)
      		{
      			$this->salle_m->inserer_salle();
      			redirect('backoffice_liste/listSalle');
      		}

      		else
      		{
      			$this->load->view('backoffice/ajouter/vue_ajout_salle');
      		}

		}
	}

	
	//-----------------------------rr---------------------------------------------------------------------------------------------------------------
	//Methodes SEANCE
	//--------------------------------------------------------------------------------------------------------------------------------------------

	public function ajouterSeance()
	{

		if($this->input->post('retour'))
		{
			redirect('backoffice_liste/listSeance');
		}


		else
		{
			//vérification du formulaire 
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
      			$this->seance_m->inserer_seance();
      			redirect('backoffice_liste/listSeance');
      		}

      		else
      		{
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
      			$this->load->view('backoffice/ajouter/vue_ajout_seance',$data);
      		}
      	}

	}


	//------------------------------------------------------------------------------------------------------------
	// Methodes LANGUE
	// ---------------------------------------------------------------------------------------------------------------

	public function ajouter_langue()
	{
		if ($this->input->post('retour'))
		{
			redirect('backoffice_liste/list_langue');	
		}

		else
		{
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
		      			
       					if(in_array(ucfirst($this->input->post('GMLA_LANGUE')), $langues))
						{
						    $data['error_same_langue'] = lang('error_same_langue');
						}
						else
						{
							$this->langue_m->inserer_langue();
							redirect("backoffice_liste/list_langue");
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
			      			
	       					if(in_array(ucfirst($this->input->post('GMLA_LANGUE')), $langues))
							{
							    $data['error_same_langue'] = lang('error_same_langue');
							}
							else
							{
								$this->langue_m->inserer_langue();
								redirect("backoffice_liste/list_langue");
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

      			$this->load->view('backoffice/ajouter/vue_ajout_langue', $data);


		}

	}

	//------------------------------------------------------------------------------------------------------------
	// Methodes JURY
	// ---------------------------------------------------------------------------------------------------------------

	public function ajouterJury()
	{
		if ($this->input->post('annuler'))
		{
			redirect('backoffice_liste/listJury');
		}


		else
		{
			$this->form_validation->set_rules('description', 'Description', 'required'); 
     		
      		if($this->form_validation->run() == TRUE)
      		{
      			$this->jury_m->inserer_jury();
      			redirect('backoffice_liste/listJury');
      		}

      		else
      		{
      			$this->load->view('backoffice/ajouter/vue_ajout_jury');
      		}

		}

	}

	
	//------------------------------------------------------------------------------------------------------------
	// Methodes MEMBRE JURY
	// ---------------------------------------------------------------------------------------------------------------

	public function ajouterMembreJury()
	{
		if ($this->input->post('annuler'))
		{
			// ce lien sera remplacé par le bon lien 
      		echo anchor('backoffice/ajouterMembreJury', 'Revenir');		
		}

		else
		{
			$this->form_validation->set_rules('nom', 'Nom', 'required'); 
			$this->form_validation->set_rules('prenom', 'Prenom', 'required');

     		
      		if($this->form_validation->run() == TRUE)
      		{
      			$this->jury_m->inserer_membre_jury();
      			// retour au menu langue
      			$this->load->view('backoffice/vue_ajout_contact_succes');
      		}

      		else
      		{
      			$juryResult = $this->jury_m->getjury();
      			$jurys = array();

      			foreach ($juryResult as $jury) 
      			{
      				$jurys[$jury->GMJU_CODE] = $jury->GMJU_DESCRIPTION;
      			}

      			$data = array('jury' => $jurys);
      			$this->load->view('backoffice/ajouter/vue_ajout_membre_jury', $data);
      		}

		}

	}

	
	//------------------------------------------------------------------------------------------------------------
	// Methodes JURY MEMBRE JURY
	// ---------------------------------------------------------------------------------------------------------------

	public function ajouterJuryMembreJury()
	{
		if ($this->input->post('annuler'))
		{
			// ce lien sera remplacé par le bon lien 
      		echo anchor('backoffice/ajouterJuryMembreJury', 'Revenir');		
		}

		else
		{
			$this->form_validation->set_rules('jury', 'Jury', 'required'); 
			$this->form_validation->set_rules('membrejury', 'Membre du Jury', 'required');
			$this->form_validation->set_rules('statut', 'Statut', 'required');

     		
      		if($this->form_validation->run() == TRUE)
      		{
      			$this->jury_m->inserer_jury_membre_jury();
      			$this->load->view('backoffice/vue_ajout_contact_succes');
      		}

      		else
      		{

      			$juryResult = $this->jury_m->getjury();
      			$membrejuryResult = $this->jury_m->getMembreJury();

      			$jurys = array();
      			$membrejurys = array();

      			foreach ($juryResult as $jury) 
      			{
      				$jurys[$jury->GMJU_CODE] = $jury->GMJU_DESCRIPTION;
      			}

      			foreach ($membrejuryResult as $membrejury) 
      			{
      				$membrejurys[$membrejury->GMMJ_CODE] = $membrejury->membre;
      			}

      			$data = array('jury' => $jurys,
      						'membrejury' => $membrejurys);

      			$this->load->view('backoffice/ajouter/vue_ajout_jury_membre_jury', $data);
      		}

		}

	}

	

	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes PLANNING
	//--------------------------------------------------------------------------------------------------------------------------------------------

	public function ajouterPlanning()
	{
		if($this->input->post('retour'))
		{
			redirect('backoffice_liste/listPlanning');
		}

		else
		{
			$this->form_validation->set_rules('GMANT_CODE', lang('val_antenne'), 'required|alphanumeric|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('GMPL_NOM', lang('val_title_planning'), 'required|alphanumeric|max_length[100]'); 
      		$this->form_validation->set_rules('GMPL_NOMBRE_HEURES', lang('th_nbh'), 'required|numeric');
      		$this->form_validation->set_rules('GMPL_ANNEE', lang('th_annee'),'required|numeric|min_length[4]|max_length[4]');

      		if($this->form_validation->run() == TRUE)
      		{
      			$this->planning_m->inserer_planning();
      			redirect('backoffice_liste/listPlanning');
      		}

      		else
      		{
      			$antenneResult = $this->antenne_m->getAllAntenne();

      			$antennes = array('' => '');

				foreach ($antenneResult as $antenne) 
				{
					$antennes[$antenne->GMANT_CODE] = $antenne->GMANT_VILLE.' ('.$antenne->GMANT_PAYS.')';
				}

				$data = array('antennes' => $antennes);
      			$this->load->view('backoffice/ajouter/vue_ajout_planning', $data);
      		}

		}
	}

	
	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes  COURS PLANNING
	//--------------------------------------------------------------------------------------------------------------------------------------------

	public function ajouterCoursPlanning()
	{
		if($this->input->post('annuler'))
		{
			// ce lien sera remplacé par le bon lien 
      		echo anchor('backoffice/ajouterCoursPlanning', 'Revenir');
		}

		else
		{
			//vérification du formulaire  
      		$this->form_validation->set_rules('planning', 'Planning', 'required');
      		$this->form_validation->set_rules('cours', 'Cours','required');

      		if($this->form_validation->run() == TRUE)
      		{
      			$this->planning_m->inserer_cours_planning();
      			$this->load->view('backoffice/vue_ajout_contact_succes');
      		}

      		else
      		{
      			$planningResult = $this->planning_m->getPlanning();
      			$coursResult = $this->cours_m->getCours();

      			$plannings = array();
      			$courss = array();

      			foreach ($planningResult as $planning) 
      			{
      				$plannings[$planning->GMPL_CODE] = $planning->planning;
      			}

      			foreach ($coursResult as $cours) 
      			{
      				$courss[$cours->GMCO_CODE] = $cours->GMCO_NOM;
      			}

      			$data = array('planning' => $plannings,
      						'cours' => $courss
      						);

      			$this->load->view('backoffice/ajouter/vue_ajout_cours_planning',$data);
      		}

		}
	}

	
	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes  SEANCE PLANNING
	//--------------------------------------------------------------------------------------------------------------------------------------------

	public function ajouterSeancePlanning()
	{
		if($this->input->post('annuler'))
		{
			// ce lien sera remplacé par le bon lien 
      		echo anchor('backoffice/ajouterSeancePlanning', 'Revenir');
		}

		else
		{
			//vérification du formulaire  
      		$this->form_validation->set_rules('planning', 'Planning', 'required');
      		$this->form_validation->set_rules('seances', 'Seance','required');

      		if($this->form_validation->run() == TRUE)
      		{
      			$this->planning_m->inserer_seance_planning();
      			$this->load->view('backoffice/vue_ajout_contact_succes');
      		}

      		else
      		{
      			$planningResult = $this->planning_m->getPlanning();
      			$seanceResult = $this->seance_m->getSeance();

      			$plannings = array();
      			$seances = array();

      			foreach ($planningResult as $planning) 
      			{
      				$plannings[$planning->GMPL_CODE] = $planning->planning;
      			}

      			foreach ($seanceResult as $seance) 
      			{
      				$seances[$seance->GMSEA_CODE] = $seance->seance;
      			}

      			$data = array('planning' => $plannings,
      						'seances' => $seances
      						);

      			$this->load->view('backoffice/ajouter/vue_ajout_seance_planning',$data);
      		}

		}
	}

	
	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes PARAMETRE
	//--------------------------------------------------------------------------------------------------------------------------------------------

	public function ajouterParameter()
	{
		if($this->input->post('retour'))
		{
			redirect('backoffice_liste/listParameter');
		}

		else
		{ 
      		$this->form_validation->set_rules('GMPARA_NOM', lang('val_nom_param'), 'required|alpha_dash|max_length[50]');
      		$this->form_validation->set_rules('GMPARA_VALEUR', lang('val_param'), 'required|max_length[50]');
      		$this->form_validation->set_rules('GMPARA_ANNEE', lang('th_date'),'required|numeric|min_length[4]|max_length[4]');
      		$this->form_validation->set_rules('GMPARA_DESCRIPTION', lang('val_description'), 'min_length[2]|max_length[200]');

      		if($this->form_validation->run() == TRUE)
      		{
      			$this->parametre_m->inserer_parametre();
      			redirect('backoffice_ajout/ajouterParameter');
      		}

      		else
      		{
      			$this->load->view('backoffice/ajouter/vue_ajout_parametre');
      		}

		}
	}

	
	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes QUESTIONNAIRE QUESTION
	//--------------------------------------------------------------------------------------------------------------------------------------------

	public function ajouterQuestionnaire()
	{
		if($this->input->post('retour'))
		{
			redirect('backoffice_liste/list_questionnaire');
		}

		else
		{
			//vérification du formulaire  
      		$this->form_validation->set_rules('GMQQ_NOM', lang('num_question'), 'required');
      		$this->form_validation->set_rules('GMQQ_DESCRIPTION', lang('desc_question'), 'required');
      		$this->form_validation->set_rules('GMQQ_ANNEE', lang('th_annee'), 'required');

      		if($this->form_validation->run() == TRUE)
      		{
      			//echo var_dump($this->input->post());
      			$this->question_m->inserer_questionnaire();
      			//$this->load->view('backoffice/vue_ajout_contact_succes');
      			redirect('backoffice_ajout/ajouterQuestionnaire');
      		}

      		else
      		{
      			$this->load->view('backoffice/ajouter/vue_ajout_questionnaire');
      		}

		}
	}

	
	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes TYPE DE SOUTENANCE
	//--------------------------------------------------------------------------------------------------------------------------------------------

	public function ajouterTypeSoutenance()
	{
		if($this->input->post('annuler'))
		{
			// ce lien sera remplacé par le bon lien 
      		echo anchor('backoffice/ajouterTyepSoutenance', 'Revenir');
		}

		else
		{
			//vérification du formulaire  
      		$this->form_validation->set_rules('type', 'Type', 'required');
      		$this->form_validation->set_rules('description', 'Description', 'required');

      		if($this->form_validation->run() == TRUE)
      		{
      			$this->soutenance_m->inserer_type_soutenance();
      			$this->load->view('backoffice/vue_ajout_contact_succes');
      		}

      		else
      		{
      			$this->load->view('backoffice/vue_ajout_type_soutenance');
      		}

		}
	}

	

	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes PROCEDURE ADMINISTRATIVE
	//--------------------------------------------------------------------------------------------------------------------------------------------

	public function ajouterProcedure()
	{
		if($this->input->post('retour'))
		{
			redirect('backoffice_liste/list_procedure_admin');
		}

		//si on ne cique pas sur "annuler"
		else
		{ 
      		$this->form_validation->set_rules('GMPA_NOM', lang('th_nom'), 'required|max_length[50]');
      		$this->form_validation->set_rules('GMPA_DESCRIPTION', lang('val_description'), 'required|min_length[5]|max_length[1000]');
      		$this->form_validation->set_rules('GMPA_TYPE', lang('th_type'), 'required|alpha_dash|max_length[50]');

      		$data = array();
      		if($this->form_validation->run() == TRUE)
      		{
      			if($_FILES['GMPA_DOCUMENT']['error']==4)
      			{
	       			$this->procedure_m->inserer_procedure();
      				redirect('backoffice_liste/list_procedure_admin');
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
	       					$this->procedure_m->inserer_procedure();
  							redirect('backoffice_liste/list_procedure_admin');
						}
		   				
		   			}
					
					else
					{
						$message = '<p>'.$message.'</p>';

						$data['error_document'] = $message;
					}


       			}
       		 }
      		

      		$this->load->view('backoffice/ajouter/vue_ajout_procedure_admin',$data);
      		

		}
	}


	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes DOCULENT MODELE
	//--------------------------------------------------------------------------------------------------------------------------------------------

	public function ajouter_document_modele()
	{
		if($this->input->post('retour'))
		{
			redirect('backoffice_liste/list_document_modele');
		}

		else
		{
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
       					$this->document_modele_m->inserer_document_modele();
       					redirect("backoffice_liste/list_document_modele");
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
      		
      		$this->load->view('backoffice/ajouter/vue_ajout_document_modele',$data);

		}
	}

	
	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes  INTERVENANT PROCEDURE
	//--------------------------------------------------------------------------------------------------------------------------------------------

	public function ajouterIntervenantProcedure()
	{
		if($this->input->post('annuler'))
		{
			// ce lien sera remplacé par le bon lien 
      		echo anchor('backoffice/ajouterIntervenantProcedure', 'Revenir');
		}

		else
		{
			//vérification du formulaire  
      		$this->form_validation->set_rules('intervenants', 'Intervenant', 'required');
      		$this->form_validation->set_rules('procedures', 'Prodédure','required');

      		if($this->form_validation->run() == TRUE)
      		{
      			$this->procedure_m->inserer_intervenant_procedure();
      			$this->load->view('backoffice/vue_ajout_contact_succes');
      		}

      		else
      		{

      			$intervenantResult = $this->intervenant_m->getIntervenant();
      			$procedureResult = $this->procedure_m->getProcedure();

      			$intervenants = array();
      			$procedures = array();

      			foreach ($intervenantResult as $intervenant) 
      			{
      				$intervenants[$intervenant->GMIN_CODE] = $intervenant->intervenant;
      			}

      			foreach ($procedureResult as $procedure) 
      			{
      				$procedures[$procedure->GMPA_CODE] = $procedure->GMPA_NOM;
      			}

      			$data = array('intervenants' => $intervenants,
      						'procedures' => $procedures
      						);

      			$this->load->view('backoffice/ajouter/vue_intervenant_procedure',$data);
      		}

		}
	}

	

	//--------------------------------------------------------------------------------------------------------------------------------------------
	//Methodes RESEAUX SOCIAUX
	//--------------------------------------------------------------------------------------------------------------------------------------------

	public function ajouterReseausocial()
	{

		if($this->input->post('retour'))
		{
			redirect('backoffice_liste/list_social_networks');
		}

		//si on ne cique pas sur "annuler"
		else
		{
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
						if(in_array(strtolower($this->input->post('GMRS_NOM')), $socialNetworks))
						{
							$data['error_same_network'] = lang('error_same_network');
						}
						else
						{
	       					$this->social_networks_m->inserer_reseau_social();
      						redirect('backoffice_liste/list_social_networks');
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
							if(in_array(strtolower($this->input->post('GMRS_NOM')), $socialNetworks))
							{
								$data['error_same_network'] = lang('error_same_network');
							}
							else
							{
		       					$this->social_networks_m->inserer_reseau_social();
	      						redirect('backoffice_liste/list_social_networks');
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

      			$this->load->view('backoffice/ajouter/vue_ajout_reseau_social', $data);



		}
	}

}