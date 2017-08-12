<?php
class Backoffice_m extends CI_Model
{
	protected $table = 'gmcontact';

	function __construct()
	{
		parent::__construct();
		//connexion a la base de données avec PDO
		$bdd = new PDO('mysql:host=localhost;dbname=imbds','root','');
		//$bdd = new PDO('mysql:host=localhost;dbname=mbds','root','');
	}

	
	public function inserer_contact()
	{
		$rand = random_string('numeric', 5);
		$code = "GMCON".$rand;

        $this->GMCON_CODE = $code;
        $this->GMCON_NOM = $this->input->post('nom');
        $this->GMCON_PRENOM = $this->input->post('prenom');
        $this->GMCON_EMAIL = $this->input->post('email');
        $this->GMCON_TEL_FIXE = $this->input->post('fix');
        $this->GMCON_TEL_PORTABLE = $this->input->post('portable');
        $this->GMCON_FAX = $this->input->post('fax');
        $this->GMCON_ADRESSE = $this->input->post('adresse');
        $this->GMCON_CODE_POSTAL = $this->input->post('codepostal');
        $this->GMCON_VILLE = $this->input->post('ville');
        $this->GMCON_PAYS = $this->input->post('pays');
        $this->GMCON_FONCTION = $this->input->post('fonction');

        $this->db->insert('gmcontact', $this);

        $data = array('GMEN_CODE' => $this->input->post('entreprise'),
        			'GMCON_CODE' => $code,
        			'GMCE_DATE_PREMIER_CONTACT' => $this->input->post('datecontact'),
        			'GMCE_DATE_DEPART_ENTREPRISE' => $this->input->post('dateentreprise'),
        			'GMCE_REMARQUES' => $this->input->post('remarque')
        			);

        $this->db->insert('gm_contact_entreprise', $data);
	}

	public function inserer_entreprise()
	{
		$rand = random_string('numeric', 6);

		$this->GMEN_CODE = "GMEN".$rand;
        $this->GMEN_NOM = $this->input->post('nom');
        $this->GMEN_SIEGE = $this->input->post('siege');
        $this->GMEN_DIRECTEUR = $this->input->post('directeur');
        $this->GMEN_TEL_PORTABLE = $this->input->post('portable');
        $this->GMEN_TEL_FIXE = $this->input->post('fix');
        $this->GMEN_FAX = $this->input->post('fax');
        $this->GMEN_EMAIL = $this->input->post('email');
        $this->GMEN_SITE_WEB = $this->input->post('siteweb');
        $this->GMEN_ADRESSE = $this->input->post('adresse');
        $this->GMEN_CODE_POSTAL = $this->input->post('codepostal');
        $this->GMEN_VILLE = $this->input->post('ville');
        $this->GMEN_PAYS = $this->input->post('pays');
       

        $this->db->insert('gmentreprise', $this);

	}

	public function inserer_intervenant()
	{
		$rand = random_string('numeric', 6);
		$code = "GMIN".$rand;

		$this->GMIN_CODE = $code;
        $this->GMIN_NOM = $this->input->post('nom');
        $this->GMIN_PRENOM = $this->input->post('prenom');
        $this->GMIN_EMAIL = $this->input->post('email');
        $this->GMIN_TEL = $this->input->post('tel');
        $this->GMIN_TEL_PRO = $this->input->post('telpro');
        $this->GMIN_FAX = $this->input->post('fax');
        $this->GMIN_ADRESSE = $this->input->post('adresse');
        $this->GMIN_CODE_POSTAL = $this->input->post('codepostal');
        $this->GMIN_VILLE = $this->input->post('ville');
        $this->GMIN_PAYS = $this->input->post('pays');
        $this->GMIN_DERNIER_DIPLOME = $this->input->post('diplome');
        $this->GMIN_STATUT = $this->input->post('statut');
        $this->GMIN_PROFESSION = $this->input->post('profession');
        $this->GMIN_LIEU_TRAVAIL = $this->input->post('lieutravail');
        
        $this->db->insert('gmintervenant', $this);

        $data = array('GMANT_CODE' => $this->input->post('antenne'),
        			'GMIN_CODE' => $code,
        			'GMIA_ANNEE' => $this->input->post('annee')
        			);
        $this->db->insert('gm_intervenant_appartenance_antenne', $data);
	}

	public function inserer_antenne()
	{
		$rand = random_string('numeric', 5);

		$this->GMANT_CODE = "GMANT".$rand;
		$this->GMANT_VILLE = $this->input->post('ville');
        $this->GMANT_PAYS = $this->input->post('pays');

        // penser a faire un test genre si le pays est vide, mettre france par defau par exemple.

        $this->db->insert('gmantenne', $this);

	}

	public function inserer_formation()
	{
		$rand = random_string('numeric', 6);

		$this->GMFO_CODE = "GMFO".$rand;
		$this->GMFO_FORMATION = $this->input->post('formation');
		$this->GMFO_NOM = $this->input->post('nom');
		$this->GMFO_NIVEAU = $this->input->post('niveau');
		$this->GMFO_MENTION = $this->input->post('mention');
		$this->GMFO_DOMAINE = $this->input->post('domaine');
		
		$this->db->insert('gmformation', $this);

	}

	
	public function inserer_semestre()
	{
		//faire une boucle while pour vérifier si le code générer n'existe pas deja
		//pour ca il faut faire un select de tous les codes puis comparer avec celui génerer
		//s'il existe refaire un autre rand sinon on passe

		// on génère un nombre aleatoire de 5 chiffres
		$rand = random_string('numeric', 5);

		$this->GMSEM_CODE = "GMSEM".$rand;
		$this->GMSEM_NOM = $this->input->post('nom');
		$this->GMFO_CODE = $this->input->post('test');
        $this->GMSEM_ANNEE = $this->input->post('annee');
        $this->GMSEM_DESCRIPTION = $this->input->post('description');
        $this->GMSEM_CODE_APOGEE = $this->input->post('apogee');
        $this->GMSEM_NOMBRE_HEURES_CM = $this->input->post('heurecm');
        $this->GMSEM_NOMBRE_HEURES_TD = $this->input->post('heuretd');
        $this->GMSEM_NOMBRE_HEURES_TP = $this->input->post('heuretp');
        $this->GMSEM_NOMBRE_HEURES_LIBRES = $this->input->post('heurelibre');
        $this->GMSEM_CREDIT_ECTS = $this->input->post('credit');
       
        $this->db->insert('gmsemestre', $this);

	}

	public function inserer_ue()
	{
		$rand = random_string('numeric', 6);

		$code = "GMUE".$rand;
		$this->GMUE_CODE = $code;
		$this->GMUE_NOM = $this->input->post('nom');
        $this->GMUE_DESCRIPTION = $this->input->post('description');
        $this->GMUE_COORDINATEUR1 = $this->input->post('coordinateur1');
        $this->GMUE_COORDINATEUR2 = $this->input->post('coordinateur2');
        $this->GMUE_NOMBRE_HEURES_CM = $this->input->post('heurecm');
        $this->GMUE_NOMBRE_HEURES_TD = $this->input->post('heuretd');
        $this->GMUE_NOMBRE_HEURES_TP = $this->input->post('heuretp');
        $this->GMUE_NOMBRE_HEURES_LIBRES = $this->input->post('heurelibre');
        $this->GMUE_CREDIT_ECTS = $this->input->post('credit');
        $this->GMUE_CODE_APOGEE = $this->input->post('apogee');
       	
       	// on insere les info dans la table ue
        $this->db->insert('gmue', $this);

        // on recupere le code de l'ue et le code du semestre
        $data = array('GMUE_CODE' => $code,
       					 'GMSEM_CODE' => $this->input->post('sem'));

        // on les insere dans la table semestre ue. pour qu'on puisse avoir une trace de quel semestre pour quel ue.
        $this->db->insert('GM_SEMESTRE_UE', $data);

	}

	public function inserer_salle()
	{
		// on génère un nombre aleatoire de 6 chiffres
		$rand = random_string('numeric', 6);

		$this->GMSA_CODE = "GMSA".$rand;
		$this->GMSA_NOM = $this->input->post('nom');
		$this->GMSA_CAPACITE = $this->input->post('capacite');
		$this->GMSA_LIEU = $this->input->post('lieu');

		$this->db->insert('gmsalle', $this);

	}

	public function inserer_seance()
	{
		// on génère un nombre aleatoire de 5 chiffres
		$rand = random_string('numeric', 5);
		$code = "GMSEA".$rand;

		$this->GMSEA_CODE = $code;
		$this->GMSEA_TYPE = $this->input->post('type');
		$this->GMSEA_DATE = $this->input->post('datepicker');
		$this->GMSEA_HEURE_DEBUT = $this->input->post('heuredebut');
		$this->GMSEA_HEURE_FIN = $this->input->post('heurefin');
		$this->GMSEA_STATUT = $this->input->post('statut');

		$this->db->insert('gmseance', $this);

		$data = array('GMSEA_CODE' => $code,
        			 'GMSA_CODE' => $this->input->post('salles')
        			);

        $this->db->insert('gm_salle_seance',$data);
	}

	public function inserer_matiere()
	{
		$rand = random_string('numeric', 6);

		$this->GMMA_CODE = "GMMA".$rand;
		$this->GMMA_NOM = $this->input->post('nom');
		$this->GMUE_CODE = $this->input->post('ue');
		$this->GMIN_CODE = $this->input->post('intervenant');
        $this->GMMA_DESCRIPTION = $this->input->post('description');
        $this->GMMA_CREDIT_ECTS = $this->input->post('credit');
        $this->GMMA_CODE_APOGEE = $this->input->post('apogee');
        $this->GMMA_NOMBRE_HEURES_CM = $this->input->post('heurecm');
        $this->GMMA_NOMBRE_HEURES_TD = $this->input->post('heuretd');
        $this->GMMA_NOMBRE_HEURES_TP = $this->input->post('heuretp');
        $this->GMMA_NOMBRE_HEURES_LIBRES = $this->input->post('heurelibre');
        $this->GMMA_NOMBRE_SPECIALITE = $this->input->post('specialite');
 
       	
       	// on insere les info dans la table matiere
        $this->db->insert('gmmatiere', $this);
	}


	public function inserer_cours()
	{
echo $this->input->post('antennes');
		$rand = random_string('numeric', 6);
		$code = "GMCO".$rand;

		$this->GMCO_CODE = $code;
		$this->GMCO_NOM = $this->input->post('nom');
        $this->GMMA_CODE = $this->input->post('matieres');
        $this->GMCO_HEURES_CM = $this->input->post('heurecm');
        $this->GMCO_HEURES_TD = $this->input->post('heuretd');
        $this->GMCO_HEURES_TP = $this->input->post('heuretp');
        $this->GMCO_HEURES_LIBRES = $this->input->post('heurelibre');
        $this->GMCO_RANG = $this->input->post('rang');
        $this->GMCO_PLANIFIE = $this->input->post('planifie');
       	$this->GMCO_REALISE = $this->input->post('realise');
        $this->GMCO_NOTATION = $this->input->post('notation');
        $this->GMCO_PLAN_OBJECTIFS_GENERAUX = $this->input->post('generaux');
        $this->GMCO_PLAN_OBJECTIFS_SPECIFIQUES = $this->input->post('specifique');
        $this->GMCO_PLAN_PREREQUIS = $this->input->post('prerequis');
        $this->GMCO_PLAN_MODE_EVALUATION = $this->input->post('evaluation');
        $this->GMCO_PLAN_LECTURE_RECOMMANDEE = $this->input->post('lecture');
       	$this->GMCO_NOMBRE_SEANCES = $this->input->post('seance');

       	// on insere les info dans la table cours
        $this->db->insert('gmcours', $this);

        $data = array('GMCO_CODE' =>$code,
        			'GMIN_CODE' =>$this->input->post('intervenant'),
        			'GMANT_CODE' =>$this->input->post('antennes')
        			);

        $this->db->insert('gm_cours_intervenant_antenne', $data);
	}


	public function inserer_langue()
	{
		$rand = random_string('numeric', 6);

		$this->GMLA_CODE = "GMLA".$rand;
		$this->GMLA_LANGUE = $this->input->post('langue');

		$this->db->insert('gmlangue', $this);
	}


	public function inserer_jury()
	{
		$rand = random_string('numeric', 6);
		$code = "GMJU".$rand;

		$this->GMJU_CODE = $code;
		$this->GMJU_DESCRIPTION = $this->input->post('description');
		
		$this->db->insert('gmjury', $this);

	}


	public function inserer_membre_jury()
	{
		$rand = random_string('numeric', 6);
		$code = "GMMJ".$rand;

		$this->GMMJ_CODE = $code;
		$this->GMMJ_NOM = $this->input->post('nom');
		$this->GMMJ_PRENOM = $this->input->post('prenom');
		$this->GMMJ_ENTREPRISE = $this->input->post('entreprise');
		
		$this->db->insert('gmmembre_jury', $this);
	}


	public function inserer_jury_membre_jury()
	{
		$data = array('GMMJ_CODE' =>$this->input->post('membrejury'),
					'GMJU_CODE' => $this->input->post('jury'),
					'GMJMJ_STATUT'=> $this->input->post('statut'));

		$this->db->insert('gm_jury_membre_jury', $data);
	}


	public function inserer_planning()
	{
		$rand = random_string('numeric', 6);

		$this->GMPL_CODE = "GMPL".$rand;
		$this->GMPL_NOM = $this->input->post('nom');
		$this->GMPL_NOMBRE_HEURES = $this->input->post('heure');
		$this->GMPL_ANNEE = $this->input->post('annee');

		$this->db->insert('gmplanning', $this);
	}


	public function inserer_cours_planning()
	{
		$this->GMCO_CODE = $this->input->post('cours');
		$this->GMPL_CODE = $this->input->post('planning');

		$this->db->insert('gm_cours_planning', $this);
	}


	public function inserer_seance_planning()
	{
		$this->GMSEA_CODE = $this->input->post('seances');
		$this->GMPL_CODE = $this->input->post('planning');

		$this->db->insert('gm_seance_planning', $this);
	}



	public function inserer_parametre()
	{
		$rand = random_string('numeric', 4);

		$this->GMPARA_CODE = "GMPARA".$rand;
		$this->GMPARA_NOM = $this->input->post('nom');
		$this->GMPARA_VALEUR = $this->input->post('valeur');
		$this->GMPARA_DESCRIPTION = $this->input->post('description');
		$this->GMPARA_ANNEE = $this->input->post('annee');

		$this->db->insert('gmparametres', $this);
	}

	public function inserer_procedure()
	{
		$rand = random_string('numeric', 6);
		if($_FILES['GMPA_DOCUMENT']['error'] == 0)
		{

    		$relative_url = '../public/procedureadmin/'.$this->upload->file_name;
    		$this->GMPA_CODE = "GMPA".$rand;
    		$this->GMPA_NOM = $this->input->post('nom');
    		$this->GMPA_DESCRIPTION = $this->input->post('description');
    		$this->GMPA_TYPE = $this->input->post('type');
    		$this->GMPA_DOCUMENT = $relative_url;

    		$this->db->insert('gmprocedureadministrative', $this);
    	}
    	
	}


	public function inserer_document_modele()
	{
		$rand = random_string('numeric', 6);
		if($_FILES['GMDM_DOCUMENT']['error'] == 0)
		{

    		$relative_url = '../public/documentmodele/'.$this->upload->file_name;
    		$this->GMDM_CODE = "GMDM".$rand;
    		$this->GMDM_NOM = $this->input->post('nom');
    		$this->GMDM_TYPE = $this->input->post('type');
    		$this->GMDM_FORMAT = $this->input->post('format');
    		$this->GMDM_ANNEE = $this->input->post('annee');
    		$this->GMDM_DOCUMENT = $relative_url;

    		$this->db->insert('gmdocumentmodele', $this);
    	}
    	
	}


	public function inserer_questionnaire()
	{
		$rand = random_string('numeric', 6);

		$this->GMQQ_CODE = "GMQQ".$rand;
		$this->GMQQ_NOM = $this->input->post('nom');
		$this->GMQQ_DESCRIPTION = $this->input->post('description');

		$this->db->insert('gmquestionnairequestion', $this);
	}


	public function inserer_type_soutenance()
	{
		$rand = random_string('numeric', 6);

		$this->GMTS_CODE = "GMTS".$rand;
		$this->GMTS_TYPE = $this->input->post('type');
		$this->GMTS_DESCRIPTION = $this->input->post('description');

		$this->db->insert('gmtypesoutenance', $this);
	}


	public function inserer_intervenant_procedure()
	{
		$this->GMPA_CODE = $this->input->post('procedures');
		$this->GMIN_CODE = $this->input->post('intervenants');
		
		$this->db->insert('gm_intervenant_procedure', $this);
	}


	public function inserer_reseau_social()
	{
		$rand = random_string('numeric', 6);
		if($_FILES['GMRS_LOGO']['error'] == 0)
		{

    		$relative_url = '../public/reseausocial/'.$this->upload->file_name;
    		$this->GMRS_CODE = "GMRS".$rand;
    		$this->GMRS_NOM = $this->input->post('nom');
    		$this->GMRS_LOGO = $relative_url;

    		$this->db->insert('gmreseauxsociaux', $this);
    	}
    	
	}


	public function edit_Contact($valeurs)
	{
		$code = $valeurs['GMCON_CODE'];

		$this->GMCON_CODE = $code;
		$this->GMCON_NOM = $valeurs['GMCON_NOM'];
		$this->GMCON_PRENOM = $valeurs['GMCON_PRENOM'];
		$this->GMCON_EMAIL = $valeurs['GMCON_EMAIL'];
		$this->GMCON_TEL_FIXE = $valeurs['GMCON_TEL_FIXE'];
		$this->GMCON_TEL_PORTABLE = $valeurs['GMCON_TEL_PORTABLE'];
		$this->GMCON_FAX = $valeurs['GMCON_FAX'];
		$this->GMCON_ADRESSE = $valeurs['GMCON_ADRESSE'];
		$this->GMCON_CODE_POSTAL = $valeurs['GMCON_CODE_POSTAL'];
		$this->GMCON_VILLE = $valeurs['GMCON_VILLE'];
		$this->GMCON_PAYS = $valeurs['GMCON_PAYS'];
		$this->GMCON_FONCTION = $valeurs['GMCON_FONCTION'];

		$this->db->where('GMCON_CODE', $code);
		$this->db->update('gmcontact', $this);

		$data = array('GMEN_CODE' => $valeurs['entreprises'],
						'GMCE_DATE_PREMIER_CONTACT' =>$valeurs['GMCE_DATE_PREMIER_CONTACT'],
						'GMCE_DATE_DEPART_ENTREPRISE' =>$valeurs['GMCE_DATE_DEPART_ENTREPRISE'],
						'GMCE_REMARQUES' =>$valeurs['GMCE_REMARQUES']
						);
		

		$this->db->where('GMCON_CODE', $code);
		$this->db->update('gm_contact_entreprise', $data);	

	}

// mise a jour après modification d'une entreprise
	public function edit_entreprise($valeurs)
	{
		$code = $valeurs['GMEN_CODE'];
		$this->GMEN_CODE = $code;
		$this->GMEN_NOM = $valeurs['GMEN_NOM'];
		$this->GMEN_SIEGE = $valeurs['GMEN_SIEGE'];
		$this->GMEN_DIRECTEUR = $valeurs['GMEN_DIRECTEUR'];
		$this->GMEN_TEL_PORTABLE = $valeurs['GMEN_TEL_PORTABLE'];
		$this->GMEN_TEL_FIXE = $valeurs['GMEN_TEL_FIXE'];
		$this->GMEN_FAX = $valeurs['GMEN_FAX'];
		$this->GMEN_EMAIL = $valeurs['GMEN_EMAIL'];
		$this->GMEN_SITE_WEB = $valeurs['GMEN_SITE_WEB'];
		$this->GMEN_ADRESSE = $valeurs['GMEN_ADRESSE'];
		$this->GMEN_CODE_POSTAL = $valeurs['GMEN_CODE_POSTAL'];
		$this->GMEN_VILLE = $valeurs['GMEN_VILLE'];
		$this->GMEN_PAYS = $valeurs['GMEN_PAYS'];

		$this->db->where('GMEN_CODE', $code);
		$this->db->update('gmentreprise', $this);

	}

	// mise a jour après modification d'un intervenant
	public function edit_intervenant($valeurs)
	{
		$code = $valeurs['GMIN_CODE'];
		$this->GMIN_CODE = $code;
		$this->GMIN_NOM = $valeurs['GMIN_NOM'];
		$this->GMIN_PRENOM = $valeurs['GMIN_PRENOM'];
		$this->GMIN_EMAIL = $valeurs['GMIN_EMAIL'];
		$this->GMIN_TEL = $valeurs['GMIN_TEL'];
		$this->GMIN_TEL_PRO = $valeurs['GMIN_TEL_PRO'];
		$this->GMIN_FAX = $valeurs['GMIN_FAX'];
		$this->GMIN_ADRESSE = $valeurs['GMIN_ADRESSE'];
		$this->GMIN_CODE_POSTAL = $valeurs['GMIN_CODE_POSTAL'];
		$this->GMIN_VILLE = $valeurs['GMIN_VILLE'];
		$this->GMIN_PAYS = $valeurs['GMIN_PAYS'];
		$this->GMIN_STATUT = $valeurs['statut'];
		$this->GMIN_PROFESSION = $valeurs['GMIN_PROFESSION'];
		$this->GMIN_LIEU_TRAVAIL = $valeurs['GMIN_LIEU_TRAVAIL'];
		

		$this->db->where('GMIN_CODE', $code);
		$this->db->update('gmintervenant', $this);

		$data = array(
					'GMANT_CODE' => $this->input->post('antenne'),
					'GMIA_ANNEE' => $this->input->post('annee')
					);

		$this->db->where('GMIN_CODE',$code);
		$this->db->update('gm_intervenant_appartenance_antenne',$data);

	}

	// pour la pagination

	public function nombreContact()
	{
		//Nous récupérons le contenu de la requête dans $retour_total
		$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmcontact'); 
			
		//On range retour sous la forme d'un tableau.
		$donnees_total=mysql_fetch_assoc($retour_total); 
			
		//On récupère le total pour le placer dans la variable $total.
		$total=$donnees_total['total'];
			 
		return $total;
	}




	public function getSemestre()
	{
		return $this->db->select("GMSEM_CODE, GMSEM_CODE_APOGEE, CONCAT(GMSEM_NOM,' ',GMSEM_ANNEE) AS semestre", false)
						->get('gmsemestre')
						->result();
	}


	public function getFormation()
	{
		/*
		une requete qui va nous permettre de récupérer la nom de la formation et le niveau
		as formation_niveau: on renome ce qu'on récupère pour ne pas avoir à ecrire GMFO_FORMATION et GMFO_NIVEAU
		CONCAT: Pour concatener la formation et le niveau
		'' pour mettre un espace entre eux
		false: pour que codeigniter ne change pas le code. 
		 */
		return $this->db->select("GMFO_CODE,CONCAT(GMFO_NIVEAU,' ',GMFO_FORMATION) AS formation_niveau",false)
								-> get('gmformation')
								->result();
	}

	public function getUe()
	{
		return $this->db->distinct()->select('GMUE_CODE, GMUE_NOM')
						->get('gmue')
						->result();
	}

// methodes pour cours

	public function getIntervenant()
	{
		return $this->db->select("GMIN_CODE, CONCAT(GMIN_NOM, ' ',GMIN_PRENOM) AS intervenant", false)
						->get('gmintervenant')
						->result();
	}


	public function getMatiere()
	{
		return $this->db->select('GMMA_CODE,GMMA_NOM')
						->order_by('GMMA_NOM')
						->get('gmmatiere')
						->result();
	}

	public function getAllAntenne()
	{
		return $this->db->select("GMANT_CODE, GMANT_VILLE")
						->order_by('GMANT_VILLE')
						->get('gmantenne')
						->result();
	}

// methodes pour contact

	/*public function getEntreprise()
	{
		return $this->db->select("GMEN_CODE, CONCAT(GMEN_NOM,' ',GMEN_VILLE) AS entreprise", false)
						->get('gmentreprise');

	}*/

	

// methodes pour cours
	
	public function getSalle()
	{
		return $this->db->select("GMSA_CODE,CONCAT(GMSA_NOM,' ',GMSA_LIEU) AS salle", false)
						->get('gmsalle')
						->result();
	}

	// methodes pour jury_membre_jury

	public function getJury()
	{
		return $this->db->select("GMJU_CODE, GMJU_DESCRIPTION")
				->get('gmjury')
				->result();
	}

	public function getMembreJury()
	{
		return $this->db->select("GMMJ_CODE, CONCAT(GMMJ_NOM,' ',GMMJ_PRENOM) AS membre", false)
				->get('gmmembre_jury')
				->result();
	}


	//methodes pour cours_planning

	public function getCours()
	{
		return $this->db->select("GMCO_CODE, GMCO_NOM")
				->get('gmcours')
				->result();
	}

	public function getPlanning()
	{
		return $this->db->select("GMPL_CODE, CONCAT(GMPL_NOM,' ',GMPL_ANNEE) AS planning", false)
				->get('gmplanning')
				->result();
	}

	public function getCoursMatiere()
	{
		$this->db->select("gmmatiere.GMMA_CODE, gmmatiere.GMMA_NOM")
			->from('gmmatiere')
			->join('gmcours','gmcours.GMMA_CODE = gmmatiere.GMMA_CODE');

		$query = $this->db->get();
		return $query->result;
	}

	//methodes pour seanceplaning

	public function getSeance()
	{
		return $this->db->select("GMSEA_CODE, CONCAT(GMSEA_TYPE,' ',GMSEA_DATE) AS seance", false)
				->get('gmseance')
				->result();
	}

	//methodes pour langue
	public function getLangue()
	{
		return $this->db->select('GMLA_LANGUE')
					->get('gmlangue')
					->result();
	}

	public function getProcedure()
	{
		return $this->db->select("GMPA_CODE, GMPA_NOM")
					->get("gmprocedureadministrative")
					->result();
	}

	
	public function getEntreprise()
	{
		return $this->db->select("GMEN_CODE, GMEN_NOM")
						->order_by("GMEN_NOM", "asc")
						->get('gmentreprise');

	}

	// methodes pour entreprise liste

	public function getAllEntreprises()
	{
		$this->db->select("GMEN_CODE, GMEN_NOM, GMEN_VILLE, GMEN_PAYS")
			->from('gmentreprise')
			->where_not_in('GMEN_CODE', 'GMEN455572')
			->order_by("GMEN_NOM", "asc");
		$query = $this->db->get();
		return $query->result();
	}


	public function getAllContacts()
	{
		$this->db->select("gmcontact.GMCON_CODE, gmcontact.GMCON_NOM, gmcontact.GMCON_PRENOM, GMEN_NOM")
				->from('gmcontact')
				->join('gm_contact_entreprise','gmcontact.GMCON_CODE = gm_contact_entreprise.GMCON_CODE','left')
				->join('gmentreprise','gm_contact_entreprise.GMEN_CODE = gmentreprise.GMEN_CODE','left')
				->order_by("GMCON_NOM", "asc");
	
		$query = $this->db->get();
		return $query->result();
	}	

	public function getContactById($id)
	{
		$where = array('gmcontact.GMCON_CODE'=>$id); 
		$query = $this->db->select('gmcontact.GMCON_CODE,GMCON_NOM,GMCON_PRENOM,GMEN_NOM,GMCON_EMAIL,GMCON_TEL_FIXE,GMCON_TEL_PORTABLE,GMCON_FAX,GMCON_ADRESSE,GMCON_CODE_POSTAL,GMCON_VILLE,GMCON_PAYS,GMCON_FONCTION,GMCE_DATE_PREMIER_CONTACT,GMCE_DATE_DEPART_ENTREPRISE,GMCE_REMARQUES')
			->from('gmcontact')
			->join('gm_contact_entreprise','gmcontact.GMCON_CODE = gm_contact_entreprise.GMCON_CODE','left')
			->join('gmentreprise','gm_contact_entreprise.GMEN_CODE = gmentreprise.GMEN_CODE','left')
			->where($where)
			->get();
		return $query->row();

	}

	// avoir tous les contacts avec la pagination  pareil que getAllContact

	public function getByPageContact($num_page,$number_contact_page)
	{
		if($num_page>0 and $number_contact_page>=0)
		{
			if($number_contact_page==0)
			{
				$number_contact_page=1;
			}

			if($number_contact_page==1)
			{
				$min = ($num_page+$number_contact_page)-$num_page-1;
			}

			else
			{
				$min = ($num_page+$number_contact_page)-$num_page;
			}
		
			$value = $this->db->distinct()->select("gmcontact.GMCON_CODE, gmcontact.GMCON_NOM, gmcontact.GMCON_PRENOM, GMEN_NOM")
											->from('gmcontact')
											->join('gm_contact_entreprise','gmcontact.GMCON_CODE = gm_contact_entreprise.GMCON_CODE','left')
											->join('gmentreprise','gm_contact_entreprise.GMEN_CODE = gmentreprise.GMEN_CODE','left')
											->order_by("GMCON_NOM", "asc");

			$query = $this->db->limit($num_page,$min)->get();

			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					$data[] = $row;
				}
				return $data;
			}
			else
			{
				return $message="Aucune ligne restituée par la requete";
			}
		}
		else
		{
			return $message="Nombre de page ou nombre ancien page egale(s) zéro";
		}
	}

//pour avoir les contacts qui n'ont pas d'entreprise
	public function getContactSansEntreprise()
	{
		$this->db->distinct()->select("GMCON_CODE, GMCON_NOM, GMCON_PRENOM")
							->from('gmcontact')
							->where_not_in('gmcontact.GMCON_CODE', 'gm_contact_entreprise.GMCON_CODE')
							->order_by("GMCON_NOM", "asc");

		$query = $this->db->get();
		return $query->result();
	}

	// les informations sur une seule entreprise pour la modification et la fiche.
	public function getEntrepriseById($id)
	{
		$this->db->select('*')
			->from('gmentreprise')
			->where('GMEN_CODE', $id);

		$query = $this->db->get();
		return $query->row();
	}



	public function getEntrepriseDunContact($gmcon_code)
	{
		$this->db->select('gmentreprise.GMEN_CODE,GMEN_NOM')
			->from('gmentreprise')
			->where('gm_contact_entreprise.GMCON_CODE', $gmcon_code)
			->join('gm_contact_entreprise','gmentreprise.GMEN_CODE = gm_contact_entreprise.GMEN_CODE');
		$query = $this->db->get();
		return $query->row();
	}


	public function recherche_par_contact()
	{
		$this->db->select('gmcontact.GMCON_CODE, GMCON_NOM,GMCON_PRENOM, GMEN_NOM')
			->from('gmcontact')
			->like('GMCON_NOM', $this->input->post('nom'))
			->join('gm_contact_entreprise','gmcontact.GMCON_CODE = gm_contact_entreprise.GMCON_CODE','left')
			->join('gmentreprise','gm_contact_entreprise.GMEN_CODE = gmentreprise.GMEN_CODE','left');

		$query = $this->db->get();
		return $query->result();
	}

	public function delete_contact($id)
	{	

		$where = array('GMCON_CODE' => $id);
		$wheres = array('gm_contact_entreprise.GMCON_CODE' => $id);
		$this->db->delete('gm_contact_entreprise', $wheres);
		$this->db->delete('gmcontact', $where);
	}


	public function recherche_par_entreprise()
	{
		$this->db->select('gmcontact.GMCON_CODE, GMCON_NOM,GMCON_PRENOM,gmentreprise.GMEN_CODE, GMEN_NOM')
			->from('gmcontact')
			->like('gmentreprise.GMEN_CODE', $this->input->post('entreprise'))
			->join('gm_contact_entreprise','gmcontact.GMCON_CODE = gm_contact_entreprise.GMCON_CODE','left')
			->join('gmentreprise','gm_contact_entreprise.GMEN_CODE = gmentreprise.GMEN_CODE','left');

		$query = $this->db->get();
		return $query->result();
	}

	public function recherche_entreprise_par_nom()
	{
		$this->db->select("GMEN_CODE, GMEN_NOM, GMEN_VILLE, GMEN_PAYS")
			->from('gmentreprise')
			->like('GMEN_CODE', $this->input->post('entreprise'));

		$query = $this->db->get();
		return $query->result();
	}

	public function recherche_entreprise_par_ville()
	{
		$this->db->select("GMEN_CODE, GMEN_NOM, GMEN_VILLE, GMEN_PAYS")
			->from('gmentreprise')
			->like('GMEN_VILLE', $this->input->post('ville'))
			->order_by('GMEN_NOM', 'asc');

		$query = $this->db->get();
		return $query->result();
	}

	public function recherche_entreprise_par_pays()
	{
		$this->db->select("GMEN_CODE, GMEN_NOM, GMEN_VILLE, GMEN_PAYS")
			->from('gmentreprise')
			->like('GMEN_PAYS', $this->input->post('pays'))
			->order_by('GMEN_NOM', 'asc');

		$query = $this->db->get();
		return $query->result();
	}

	public function getByPageEntreprise($num_page,$number_entreprise_page)
	{
		if($num_page>0 and $number_entreprise_page>=0)
		{
			if($number_entreprise_page==0)
			{
				$number_entreprise_page=1;
			}

			if($number_entreprise_page==1)
			{
				$min = ($num_page+$number_entreprise_page)-$num_page-1;
			}

			else
			{
				$min = ($num_page+$number_entreprise_page)-$num_page;
			}
		
			$value = $this->db->distinct()->select("GMEN_CODE, GMEN_NOM, GMEN_VILLE, GMEN_PAYS")
										->from('gmentreprise')
										->where_not_in('GMEN_CODE', 'GMEN963852')
										->order_by("GMEN_NOM", "asc");

			$query = $this->db->limit($num_page,$min)->get();

			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					$data[] = $row;
				}
				return $data;
			}
			else
			{
				return $message="Aucune ligne restituée par la requete";
			}
		}
		else
		{
			return $message="Nombre de page ou nombre ancien page egale(s) zéro";
		}
	}

	// pour la pagination

	public function nombreEntreprise()
	{
		//Nous récupérons le contenu de la requête dans $retour_total
		$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmentreprise'); 
			
		//On range retour sous la forme d'un tableau.
		$donnees_total=mysql_fetch_assoc($retour_total); 
			
		//On récupère le total pour le placer dans la variable $total.
		$total=$donnees_total['total'];
			 
		return $total;
	}	

	public function delete_entreprise($id)
	{	
		// on dit que l'id de l'entreprise est maintenant celui de AUCUN
		// on MAJ losque on efface l'entreprise pour que le contact qui travaillait 
		// dans cette entreprise soit en mode Entreprise AUCUN. 
		
		$this->GMEN_CODE = 'GMEN963852';

		$this->db->where('gm_contact_entreprise.GMEN_CODE', $id);
		$this->db->update('gm_contact_entreprise', $this);

		$where = array('GMEN_CODE' => $id);
		$wheres = array('gm_contact_entreprise.GMEN_CODE' => $id);

		$this->db->delete('gm_contact_entreprise', $wheres);
		$this->db->delete('gmentreprise', $where);
	}


	public function getIntervenantById($id)
	{
		$this->db->select('gmintervenant.GMIN_CODE,GMIN_NOM,GMIN_PRENOM,GMIN_EMAIL,GMIN_TEL,GMIN_TEL_PRO,GMIN_FAX,GMIN_ADRESSE,GMIN_CODE_POSTAL,GMIN_VILLE,GMIN_PAYS,GMIN_DERNIER_DIPLOME,GMIN_STATUT,GMIN_PROFESSION,GMIN_LIEU_TRAVAIL,GMANT_VILLE,GMIA_ANNEE,GMANT_PAYS')
			->from('gmintervenant')
			->where('gmintervenant.GMIN_CODE', $id)
			->join('gm_intervenant_appartenance_antenne','gmintervenant.GMIN_CODE = gm_intervenant_appartenance_antenne.GMIN_CODE','left')
			->join('gmantenne','gm_intervenant_appartenance_antenne.GMANT_CODE = gmantenne.GMANT_CODE','left');

		$query = $this->db->get();
		return $query->row();
	}	

	public function recherche_intervenant_par_nom()
	{
		$this->db->select("GMIN_CODE, GMIN_NOM, GMIN_PRENOM, GMIN_PROFESSION,GMIN_STATUT")
			->from('gmintervenant')
			->like('GMIN_NOM', $this->input->post('nom'))
			->order_by('GMIN_NOM','asc');

		$query = $this->db->get();
		return $query->result();
	}

	public function recherche_intervenant_par_statut()
	{
		$this->db->select("GMIN_CODE, GMIN_NOM, GMIN_PRENOM, GMIN_PROFESSION,GMIN_STATUT")
			->from('gmintervenant')
			->like('GMIN_STATUT', $this->input->post('statut'))
			->order_by('GMIN_NOM','asc');

		$query = $this->db->get();
		return $query->result();
	}

	public function recherche_intervenant_par_antenne()
	{
		$this->db->select("gmintervenant.GMIN_CODE, GMIN_NOM, GMIN_PRENOM, GMIN_PROFESSION,GMIN_STATUT,gmantenne.GMANT_CODE")
			->from('gmintervenant')
			->like('gmantenne.GMANT_CODE', $this->input->post('antennes'))
			->join('gm_intervenant_appartenance_antenne','gmintervenant.GMIN_CODE = gm_intervenant_appartenance_antenne.GMIN_CODE')
			->join('gmantenne','gm_intervenant_appartenance_antenne.GMANT_CODE = gmantenne.GMANT_CODE')
			->order_by('GMIN_NOM','asc');


		$query = $this->db->get();
		return $query->result();
	}

	public function getStatutIntervenant()
	{
		return $this->db->distinct("GMIN_STATUT")
				->get('gmintervenant');

	}

	public function getStatutDunIntervenant($gmin_code)
	{
		$this->db->select('GMIN_CODE, GMIN_STATUT')
			->from('gmintervenant')
			->where('GMIN_CODE', $gmin_code);

		$query = $this->db->get();
		return $query->row();
	}

	// methode pour avoir le nom et le prenom d'un intervenant pour la matiere (dropdown)
	public function getAllIntervenants()
	{
		$this->db->select("GMIN_CODE, CONCAT(GMIN_NOM,' ',GMIN_PRENOM) AS intervenant",false)
			->from('gmintervenant')
			->order_by("GMIN_NOM", "asc");

		$query = $this->db->get();
		return $query->result();
	}



	public function nombreIntervenant()
	{
		//Nous récupérons le contenu de la requête dans $retour_total
		$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmintervenant'); 
			
		//On range retour sous la forme d'un tableau.
		$donnees_total=mysql_fetch_assoc($retour_total); 
			
		//On récupère le total pour le placer dans la variable $total.
		$total=$donnees_total['total'];
			 
		return $total;
	}


	public function getByPageIntervenant($num_page,$number_intervenant_page)
	{
		if($num_page>0 and $number_intervenant_page>=0)
		{
			if($number_intervenant_page==0)
			{
				$number_intervenant_page=1;
			}

			if($number_intervenant_page==1)
			{
				$min = ($num_page+$number_intervenant_page)-$num_page-1;
			}

			else
			{
				$min = ($num_page+$number_intervenant_page)-$num_page;
			}
		
			$value = $this->db->distinct()->select('GMIN_CODE,GMIN_NOM,GMIN_PRENOM,GMIN_PROFESSION,GMIN_STATUT')
								->from('gmintervenant')
								->order_by('GMIN_NOM', 'ASC');

			$query = $this->db->limit($num_page,$min)->get();

			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					$data[] = $row;
				}
				return $data;
			}
			else
			{
				return $message="Aucune ligne restituée par la requete";
			}
		}
		else
		{
			return $message="Nombre de page ou nombre ancien page egale(s) zéro";
		}
	}


	public function delete_intervenant($id)
	{
		$where = array('GMIN_CODE' => $id);
		$wheres = array('gm_intervenant_appartenance_antenne.GMIN_CODE' => $id);
		$this->db->delete('gm_intervenant_appartenance_antenne',$wheres);
		$this->db->delete('gmintervenant', $where);
	}	


	// l'entenne dans laquelle l'intevenant appartient
	public function getAntenneDunIntervenant($gmin_code)
	{
		$this->db->select('gmantenne.GMANT_CODE, GMANT_VILLE')
				->from('gmantenne')
				->where('gm_intervenant_appartenance_antenne.GMIN_CODE', $gmin_code)
				->join('gm_intervenant_appartenance_antenne','gmantenne.GMANT_CODE = gm_intervenant_appartenance_antenne.GMANT_CODE');
		$query = $this->db->get();
		return $query->row();
	}

	public function getAnneeAntenneDunIntervenant($gmin_code)
	{

		$this->db->select('GMIA_ANNEE')
				->from('gm_intervenant_appartenance_antenne')
				->where('gm_intervenant_appartenance_antenne.GMIN_CODE', $gmin_code);
				
		$query = $this->db->get();
		return $query->row();
	}

	// METHODES MATIERES
	

	public function nombre_matiere()
	{
		//Nous récupérons le contenu de la requête dans $retour_total
		$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmmatiere'); 
			
		//On range retour sous la forme d'un tableau.
		$donnees_total=mysql_fetch_assoc($retour_total); 
			
		//On récupère le total pour le placer dans la variable $total.
		$total=$donnees_total['total'];
			 
		return $total;
	}

	// Pour la liste des matières avec la pagination

	public function getByPageMatiere($num_page,$number_matiere_page)
	{
		if($num_page>0 and $number_matiere_page>=0)
		{
			if($number_matiere_page==0)
			{
				$number_matiere_page=1;
			}

			if($number_matiere_page==1)
			{
				$min = ($num_page+$number_matiere_page)-$num_page-1;
			}

			else
			{
				$min = ($num_page+$number_matiere_page)-$num_page;
			}
		
			$value = $this->db->distinct()->select("gmmatiere.GMMA_CODE,GMMA_NOM,gmmatiere.GMMA_CODE_APOGEE, GMMA_NOMBRE_HEURES_CM,GMMA_NOMBRE_HEURES_TD,GMMA_NOMBRE_HEURES_TP,gmsemestre.GMSEM_CODE_APOGEE,gmue.GMUE_CODE_APOGEE,CONCAT(GMIN_NOM,' ',GMIN_PRENOM) AS intervenant",false)
											->from('gmmatiere')
											->join('gmintervenant', 'gmmatiere.GMIN_CODE = gmintervenant.GMIN_CODE','left')
											->join('gmue','gmmatiere.GMUE_CODE = gmue.GMUE_CODE','left')
											->join('gm_semestre_ue','gmue.GMUE_CODE = gm_semestre_ue.GMUE_CODE','left')
											->join('gmsemestre', 'gm_semestre_ue.GMSEM_CODE = gmsemestre.GMSEM_CODE','left')
											->order_by("GMMA_NOM", "asc");

			$query = $this->db->limit($num_page,$min)->get();

			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					$data[] = $row;
				}
				return $data;
			}
			else
			{
				return $message="Aucune ligne restituée par la requete";
			}
		}
		else
		{
			return $message="Nombre de page ou nombre ancien page egale(s) zéro";
		}
	}

	public function delete_matiere($id)
	{	

		$where = array('GMMA_CODE' => $id);

		
		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries
		
		$return = $this->db->delete('gmmatiere', $where);

		$this->db->db_debug = $db_debug; 
		
		/*if(! empty($this->db->_error_message())){
			$nomMatiere = $this->getMatiereById($id);

			$string = "";
			/*
			foreach ($liste_cours as $cour) {
				$string .= $cours->GMCO_NOM . ",";
			}
			
			
			return "Impossible de supprimer la matière \"".$nomMatiere->GMMA_NOM."\" qui contient les cours ".$string;
		}else{
			return "";
		}*/
	}


	public function recherche_matiere_par_nom()
	{
		 $this->db->distinct()->select("gmmatiere.GMMA_CODE,GMMA_NOM,gmmatiere.GMMA_CODE_APOGEE, GMMA_NOMBRE_HEURES_CM,GMMA_NOMBRE_HEURES_TD,GMMA_NOMBRE_HEURES_TP,gmsemestre.GMSEM_CODE_APOGEE,gmue.GMUE_CODE_APOGEE,CONCAT(GMIN_NOM,' ',GMIN_PRENOM) AS intervenant",false)
			->from('gmmatiere')
			->like('gmmatiere.GMMA_NOM', $this->input->post('nom'))
			->join('gmintervenant', 'gmmatiere.GMIN_CODE = gmintervenant.GMIN_CODE','left')
			->join('gmue','gmmatiere.GMUE_CODE = gmue.GMUE_CODE','left')
			->join('gm_semestre_ue','gmue.GMUE_CODE = gm_semestre_ue.GMUE_CODE','left')
			->join('gmsemestre', 'gm_semestre_ue.GMSEM_CODE = gmsemestre.GMSEM_CODE','left')
			->order_by("GMMA_NOM", "asc");
			
		$query = $this->db->get();
		return $query->result();
	}

	public function recherche_matiere_par_apogee()
	{
		 $this->db->distinct()->select("gmmatiere.GMMA_CODE,GMMA_NOM,gmmatiere.GMMA_CODE_APOGEE, GMMA_NOMBRE_HEURES_CM,GMMA_NOMBRE_HEURES_TD,GMMA_NOMBRE_HEURES_TP,gmsemestre.GMSEM_CODE_APOGEE,gmue.GMUE_CODE_APOGEE,CONCAT(GMIN_NOM,' ',GMIN_PRENOM) AS intervenant",false)
			->from('gmmatiere')
			->like('gmmatiere.GMMA_CODE_APOGEE', $this->input->post('apogee'))
			->join('gmintervenant', 'gmmatiere.GMIN_CODE = gmintervenant.GMIN_CODE','left')
			->join('gmue','gmmatiere.GMUE_CODE = gmue.GMUE_CODE','left')
			->join('gm_semestre_ue','gmue.GMUE_CODE = gm_semestre_ue.GMUE_CODE','left')
			->join('gmsemestre', 'gm_semestre_ue.GMSEM_CODE = gmsemestre.GMSEM_CODE','left')
			->order_by("GMMA_NOM", "asc");
			
		$query = $this->db->get();
		return $query->result();
	}

	public function recherche_matiere_par_ue()
	{
		 $this->db->distinct()->select("gmmatiere.GMMA_CODE,GMMA_NOM,gmmatiere.GMMA_CODE_APOGEE, GMMA_NOMBRE_HEURES_CM,GMMA_NOMBRE_HEURES_TD,GMMA_NOMBRE_HEURES_TP,gmsemestre.GMSEM_CODE_APOGEE,gmue.GMUE_CODE_APOGEE,CONCAT(GMIN_NOM,' ',GMIN_PRENOM) AS intervenant",false)
			->from('gmmatiere')
			->like('gmue.GMUE_CODE', $this->input->post('ue'))
			->join('gmintervenant', 'gmmatiere.GMIN_CODE = gmintervenant.GMIN_CODE','left')
			->join('gmue','gmmatiere.GMUE_CODE = gmue.GMUE_CODE','left')
			->join('gm_semestre_ue','gmue.GMUE_CODE = gm_semestre_ue.GMUE_CODE','left')
			->join('gmsemestre', 'gm_semestre_ue.GMSEM_CODE = gmsemestre.GMSEM_CODE','left')
			->order_by("GMMA_NOM", "asc");
			
		$query = $this->db->get();
		return $query->result();
	}

	public function recherche_matiere_par_semestre()
	{
		 $this->db->distinct()->select("gmmatiere.GMMA_CODE,GMMA_NOM,gmmatiere.GMMA_CODE_APOGEE, GMMA_NOMBRE_HEURES_CM,GMMA_NOMBRE_HEURES_TD,GMMA_NOMBRE_HEURES_TP,gmsemestre.GMSEM_CODE_APOGEE,gmue.GMUE_CODE_APOGEE,CONCAT(GMIN_NOM,' ',GMIN_PRENOM) AS intervenant",false)
			->from('gmmatiere')
			->like('gmsemestre.GMSEM_CODE', $this->input->post('semestre'))
			->join('gmintervenant', 'gmmatiere.GMIN_CODE = gmintervenant.GMIN_CODE','left')
			->join('gmue','gmmatiere.GMUE_CODE = gmue.GMUE_CODE','left')
			->join('gm_semestre_ue','gmue.GMUE_CODE = gm_semestre_ue.GMUE_CODE','left')
			->join('gmsemestre', 'gm_semestre_ue.GMSEM_CODE = gmsemestre.GMSEM_CODE','left')
			->order_by("GMMA_NOM", "asc");
			
		$query = $this->db->get();
		return $query->result();
	}


	public function getMatiereById($id)
	{
		$this->db->select('*')
					->from('gmmatiere')
					->where('gmmatiere.GMMA_CODE', $id)
					->join('gmintervenant', 'gmmatiere.GMIN_CODE = gmintervenant.GMIN_CODE','left')
					->join('gmue','gmmatiere.GMUE_CODE = gmue.GMUE_CODE','left')
					->join('gm_semestre_ue','gmue.GMUE_CODE = gm_semestre_ue.GMUE_CODE','left')
					->join('gmsemestre', 'gm_semestre_ue.GMSEM_CODE = gmsemestre.GMSEM_CODE','left');

		$query = $this->db->get();
		return $query->row();

	}

	/*public function getSemestreDuneMatiere($gmma_code)
	{
		$this->db->select("gmsemestre.GMSEM_CODE, CONCAT(GMSEM_NOM,' ',GMSEM_ANNEE) AS semestre",false)
					->from('gmsemestre')
					->where('gmmatiere.GMMA_CODE',$gmma_code)
					->join('gm_semestre_ue', 'gmsemestre.GMSEM_CODE = gm_semestre_ue.GMSEM_CODE')
					->join('gmue', 'gm_semestre_ue.GMUE_CODE = gmue.GMUE_CODE')
					->join('gmmatiere', 'gmue.GMUE_CODE = gmmatiere.GMUE_CODE');
		$query = $this->db->get();
		return $query->row();
	}*/

	// mise a jour après modification d'une entreprise
	public function edit_matiere($valeurs)
	{
		$code = $valeurs['GMMA_CODE'];
		$this->GMMA_CODE = $code;
		$this->GMMA_NOM = $valeurs['GMMA_NOM'];
		$this->GMUE_CODE = $valeurs['ue'];
		$this->GMIN_CODE = $valeurs['intervenant'];
        $this->GMMA_DESCRIPTION = $valeurs['GMMA_DESCRIPTION'];
        $this->GMMA_CREDIT_ECTS = $valeurs['GMMA_CREDIT_ECTS'];
        $this->GMMA_CODE_APOGEE = $valeurs['GMMA_CODE_APOGEE'];
        $this->GMMA_NOMBRE_HEURES_CM = $valeurs['GMMA_NOMBRE_HEURES_CM'];
        $this->GMMA_NOMBRE_HEURES_TD = $valeurs['GMMA_NOMBRE_HEURES_TD'];
        $this->GMMA_NOMBRE_HEURES_TP = $valeurs['GMMA_NOMBRE_HEURES_TP'];
        $this->GMMA_NOMBRE_HEURES_LIBRES = $valeurs['GMMA_NOMBRE_HEURES_LIBRES'];
        $this->GMMA_NOMBRE_SPECIALITE = $valeurs['GMMA_NOMBRE_SPECIALITE'];
		$this->db->where('GMMA_CODE', $code);
		$this->db->update('gmmatiere', $this);

	}


	public function nombre_cours()
	{
		//Nous récupérons le contenu de la requête dans $retour_total
		$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmcours'); 
			
		//On range retour sous la forme d'un tableau.
		$donnees_total=mysql_fetch_assoc($retour_total); 
			
		//On récupère le total pour le placer dans la variable $total.
		$total=$donnees_total['total'];
			 
		return $total;
	}


		// Pour la liste des matières avec la pagination

	public function getByPageCours($num_page,$number_cours_page)
	{
		if($num_page>0 and $number_cours_page>=0)
		{
			if($number_cours_page==0)
			{
				$number_cours_page=1;
			}

			if($number_cours_page==1)
			{
				$min = ($num_page+$number_cours_page)-$num_page-1;
			}

			else
			{
				$min = ($num_page+$number_cours_page)-$num_page;
			}
		
			$value = $this->db->distinct()->select("gmcours.GMCO_CODE,GMCO_NOM,GMCO_RANG,gmmatiere.GMMA_CODE_APOGEE, GMCO_HEURES_CM,GMCO_HEURES_TD,GMCO_HEURES_TP,gmsemestre.GMSEM_CODE_APOGEE,gmue.GMUE_CODE_APOGEE,CONCAT(GMIN_NOM,' ',GMIN_PRENOM) AS intervenant",false)
											->from('gmcours')
											->join('gmmatiere', 'gmcours.GMMA_CODE = gmmatiere.GMMA_CODE','left')
											->join('gmue', 'gmmatiere.GMUE_CODE = gmue.GMUE_CODE','left')
											->join('gm_semestre_ue','gmue.GMUE_CODE = gm_semestre_ue.GMUE_CODE','left')
											->join('gmsemestre', 'gm_semestre_ue.GMSEM_CODE = gmsemestre.GMSEM_CODE','left')
											->join('gm_cours_intervenant_antenne', 'gmcours.GMCO_CODE = gm_cours_intervenant_antenne.GMCO_CODE','left')
											->join('gmintervenant', 'gm_cours_intervenant_antenne.GMIN_CODE = gmintervenant.GMIN_CODE','left')
											->join('gmantenne', 'gm_cours_intervenant_antenne.GMANT_CODE = gmantenne.GMANT_CODE','left')
							
											
											->order_by("GMCO_NOM", "asc");

			$query = $this->db->limit($num_page,$min)->get();

			if ($query->num_rows() > 0)
			{
				foreach ($query->result() as $row)
				{
					$data[] = $row;
				}
				return $data;
			}
			else
			{
				return $message="Aucune ligne restituée par la requete";
			}
		}
		else
		{
			return $message="Nombre de page ou nombre ancien page egale(s) zéro";
		}
	}

	


	
		

}