<?php 
	Class cursus_m extends CI_Model
	{
		public function get_cursus_by_year_and_formation()
		{
			$where = array ('GMSemestre.GMFO_CODE' => $this->input->post('formation'), 'GMSemestre.GMSEM_ANNEE' => $this->input->post('annee'));

			//echo var_dump($this->input->post());


			$cursus_resume = $this->db->select("GMFormation.GMFO_CODE, GMFO_FORMATION, GMSemestre.GMSEM_CODE, GMSEM_NOM, GMSEM_ANNEE, GMSEM_CREDIT_ECTS, (GMSEM_NOMBRE_HEURES_CM + GMSEM_NOMBRE_HEURES_TD + GMSEM_NOMBRE_HEURES_TP) AS GMSEM_NBH_TOTAL, GMUE.GMUE_CODE, GMUE_NOM, GMUE_DESCRIPTION, GMUE_COORDINATEUR1, GMUE_COORDINATEUR2, GMUE_CREDIT_ECTS, (GMUE_NOMBRE_HEURES_CM + GMUE_NOMBRE_HEURES_TD + GMUE_NOMBRE_HEURES_TP) AS GMUE_NBH_TOTAL,GMMatiere.GMMA_CODE, GMMA_CODE_APOGEE, GMMA_NOM, GMIN_NOM, GMIN_PRENOM, GMIN_LIEU_TRAVAIL, GMMA_NOMBRE_SPECIALITE, (GMMA_NOMBRE_HEURES_CM + GMMA_NOMBRE_HEURES_TD + GMMA_NOMBRE_HEURES_TP)  AS GMMA_NBH_TOTAL", false)
				->from('GMFormation')
				->join('GMSemestre','GMFormation.GMFO_CODE = GMSemestre.GMFO_CODE', 'left outer')
				->join('GM_semestre_ue','GMSemestre.GMSEM_CODE = GM_semestre_ue.GMSEM_CODE','left outer')
				->join('GMUE','GM_semestre_ue.GMUE_CODE = GMUE.GMUE_CODE','left outer')
				->join('GMMatiere','GMUE.GMUE_CODE = GMMatiere.GMUE_CODE','left outer')
				->join('GMIntervenant','GMMatiere.GMIN_CODE = GMIntervenant.GMIN_CODE','left outer')
				->where($where)
				->group_by(array("GMSEM_NOM", "GMUE_NOM","GMMA_CODE_APOGEE"))
				->get()->result();


			return $cursus_resume;

		}


		public function get_cursus_detail_by_year_and_formation()
		{
			$where = array ('GMSemestre.GMFO_CODE' => $this->input->post('formation'), 'GMSemestre.GMSEM_ANNEE' => $this->input->post('annee'));

			//echo var_dump($this->input->post());


			$cursus_resume = $this->db->select("GMFormation.GMFO_CODE, GMFO_FORMATION, GMSemestre.GMSEM_CODE, GMSEM_NOM, GMSEM_ANNEE, GMSEM_CREDIT_ECTS, GMSEM_NOMBRE_HEURES_CM, GMSEM_NOMBRE_HEURES_TD, GMSEM_NOMBRE_HEURES_TP, (GMSEM_NOMBRE_HEURES_CM + GMSEM_NOMBRE_HEURES_TD + GMSEM_NOMBRE_HEURES_TP) AS GMSEM_NBH_TOTAL, GMSEM_NOMBRE_HEURES_LIBRES,GMUE.GMUE_CODE ,GMUE_CODE_APOGEE, GMUE_NOM, GMUE_DESCRIPTION, GMUE_COORDINATEUR1, GMUE_COORDINATEUR2, GMUE_CREDIT_ECTS, GMUE_NOMBRE_HEURES_CM, GMUE_NOMBRE_HEURES_TD, GMUE_NOMBRE_HEURES_TP,(GMUE_NOMBRE_HEURES_CM + GMUE_NOMBRE_HEURES_TD + GMUE_NOMBRE_HEURES_TP) AS GMUE_NBH_TOTAL, GMUE_NOMBRE_HEURES_LIBRES, GMMatiere.GMMA_CODE, GMMA_CODE_APOGEE, GMMA_NOM, CONCAT(GMMA_RESPONSABLE.GMIN_NOM,' ',GMMA_RESPONSABLE.GMIN_PRENOM) AS GMMA_NOM_RESPONSABLE, CONCAT(GMCO_INTERVENANT.GMIN_NOM,' ',GMCO_INTERVENANT.GMIN_PRENOM) AS GMCO_NOM_INTERVENANT, GMCO_INTERVENANT.GMIN_EMAIL, GMCO_INTERVENANT.GMIN_LIEU_TRAVAIL, GMMA_NOMBRE_SPECIALITE, GMMA_CREDIT_ECTS, GMMA_NOMBRE_HEURES_CM, GMMA_NOMBRE_HEURES_TD, GMMA_NOMBRE_HEURES_TP, (GMMA_NOMBRE_HEURES_CM + GMMA_NOMBRE_HEURES_TD + GMMA_NOMBRE_HEURES_TP)  AS GMMA_NBH_TOTAL, GMMA_NOMBRE_HEURES_LIBRES, GMCours.GMCO_CODE, GMCO_NOM, GMCO_RANG, GMCO_PLANIFIE, GMCO_REALISE, GMCO_HEURES_CM, GMCO_HEURES_TD, GMCO_HEURES_TP, (GMCO_HEURES_CM + GMCO_HEURES_TD + GMCO_HEURES_TP)  AS GMCO_NBH_TOTAL, GMCO_HEURES_LIBRES, GMCO_NOTATION", false)
				->from('GMFormation')
				->join('GMSemestre','GMFormation.GMFO_CODE = GMSemestre.GMFO_CODE', 'left outer')
				->join('GM_semestre_ue','GMSemestre.GMSEM_CODE = GM_semestre_ue.GMSEM_CODE','left outer')
				->join('GMUE','GM_semestre_ue.GMUE_CODE = GMUE.GMUE_CODE','left outer')
				->join('GMMatiere','GMUE.GMUE_CODE = GMMatiere.GMUE_CODE','left outer')
				->join('GMCours','GMMatiere.GMMA_CODE = GMCours.GMMA_CODE','left outer')
				->join('GM_cours_intervenant','GMCours.GMCO_CODE = GM_cours_intervenant.GMCO_CODE','left outer')
				->join('GMIntervenant AS GMMA_RESPONSABLE','GMMatiere.GMIN_CODE = GMMA_RESPONSABLE.GMIN_CODE','left outer')
				->join('GMIntervenant AS GMCO_INTERVENANT','GM_cours_intervenant.GMIN_CODE = GMCO_INTERVENANT.GMIN_CODE','left outer')
				->where($where)
				->group_by(array("GMSEM_NOM", "GMUE_NOM","GMMA_CODE_APOGEE","GMCO_NOM"))
				->get()->result();


				/*
				SELECT GMFormation.GMFO_CODE, GMFO_FORMATION, GMSemestre.GMSEM_CODE, GMSEM_NOM, GMSEM_ANNEE, GMSEM_CREDIT_ECTS, GMSEM_NOMBRE_HEURES_CM, GMSEM_NOMBRE_HEURES_TD, GMSEM_NOMBRE_HEURES_TP, (GMSEM_NOMBRE_HEURES_CM + GMSEM_NOMBRE_HEURES_TD + GMSEM_NOMBRE_HEURES_TP) AS GMSEM_NBH_TOTAL, GMSEM_NOMBRE_HEURES_LIBRES, GMUE.GMUE_CODE, GMUE_CODE_APOGEE, GMUE_NOM, GMUE_DESCRIPTION, GMUE_COORDINATEUR1, GMUE_COORDINATEUR2, GMUE_CREDIT_ECTS, GMUE_NOMBRE_HEURES_CM, GMUE_NOMBRE_HEURES_TD, GMUE_NOMBRE_HEURES_TP, (GMUE_NOMBRE_HEURES_CM + GMUE_NOMBRE_HEURES_TD + GMUE_NOMBRE_HEURES_TP) AS GMUE_NBH_TOTAL, GMUE_NOMBRE_HEURES_LIBRES, GMMatiere.GMMA_CODE, GMMA_CODE_APOGEE, GMMA_NOM, CONCAT(GMMA_RESPONSABLE.GMIN_NOM,' ',GMMA_RESPONSABLE.GMIN_PRENOM) AS GMMA_NOM_RESPONSABLE, CONCAT(GMCO_INTERVENANT.GMIN_NOM,' ',GMCO_INTERVENANT.GMIN_PRENOM) AS GMCO_NOM_INTERVENANT, GMCO_INTERVENANT.GMIN_EMAIL, GMCO_INTERVENANT.GMIN_LIEU_TRAVAIL, GMMA_NOMBRE_SPECIALITE, GMMA_NOMBRE_HEURES_CM, GMMA_NOMBRE_HEURES_TD, GMMA_NOMBRE_HEURES_TP, (GMMA_NOMBRE_HEURES_CM + GMMA_NOMBRE_HEURES_TD + GMMA_NOMBRE_HEURES_TP) AS GMMA_NBH_TOTAL, GMMA_NOMBRE_HEURES_LIBRES, GMCours.GMCO_CODE, GMCO_NOM, GMCO_RANG, GMCO_PLANIFIE, GMCO_REALISE, GMCO_HEURES_CM, GMCO_HEURES_TD, GMCO_HEURES_TP, (GMCO_HEURES_CM + GMCO_HEURES_TD + GMCO_HEURES_TP) AS GMCO_NBH_TOTAL, GMCO_HEURES_LIBRES, GMCO_NOTATION

				FROM `GMFormation`
				LEFT OUTER JOIN `GMSemestre` ON `GMFormation`.`GMFO_CODE` = `GMSemestre`.`GMFO_CODE`
				LEFT OUTER JOIN `GM_semestre_ue` ON `GMSemestre`.`GMSEM_CODE` = `GM_semestre_ue`.`GMSEM_CODE`
				LEFT OUTER JOIN `GMUE` ON `GM_semestre_ue`.`GMUE_CODE` = `GMUE`.`GMUE_CODE`
				LEFT OUTER JOIN `GMMatiere` ON `GMUE`.`GMUE_CODE` = `GMMatiere`.`GMUE_CODE`
				LEFT OUTER JOIN `GMCours` ON `GMMatiere`.`GMMA_CODE` = `GMCours`.`GMMA_CODE`
				LEFT OUTER JOIN `GM_cours_intervenant` ON `GMCours`.`GMCO_CODE` = `GM_cours_intervenant`.`GMCO_CODE` 
				LEFT OUTER JOIN `GMIntervenant` AS `GMCO_INTERVENANT` ON `GM_cours_intervenant`.`GMIN_CODE` = `GMCO_INTERVENANT`.`GMIN_CODE`
				LEFT OUTER JOIN `GMIntervenant` AS `GMMA_RESPONSABLE` ON `GMMatiere`.`GMIN_CODE` = `GMMA_RESPONSABLE`.`GMIN_CODE`  
				WHERE `GMSemestre`.`GMFO_CODE` = 'GMFO574424' AND `GMSemestre`.`GMSEM_ANNEE` = '2015' 
				GROUP BY `GMSEM_NOM`, `GMUE_NOM`, `GMMA_CODE_APOGEE`, `GMCO_NOM`;
	



				 */
//->join('users', 'mailsystem.recipent = modtager.id AND mailsystem.sender = afsender.id', 'left')

			return $cursus_resume;

		}


		public function get_enseignant_permanent_by_matiere()
		{

			$where = array ('GMSemestre.GMFO_CODE' => $this->input->post('formation'), 'GMSemestre.GMSEM_ANNEE' => $this->input->post('annee'), 'GMIN_STATUT' => "permanent");

			$enseignant_matiere = $this->db->select("GMUE.GMUE_CODE, GMUE_DESCRIPTION,GMUE_CODE_APOGEE, GMMatiere.GMMA_CODE, GMMA_CODE_APOGEE, GMMA_NOM, GMCO_NOM, GMIN_NOM, GMIN_PRENOM, GMIN_PROFESSION, GMCO_HEURES_CM, GMCO_HEURES_TD, GMCO_HEURES_TP, (GMCO_HEURES_CM + GMCO_HEURES_TD + GMCO_HEURES_TP)  AS GMMA_NBH_TOTAL", false)
				->from('GMMatiere')
				->join('GMCours','GMCours.GMMA_CODE = GMMatiere.GMMA_CODE','left outer')
				->join('GM_cours_intervenant','GMCours.GMCO_CODE = GM_cours_intervenant.GMCO_CODE','left outer')
				->join('GMIntervenant','GM_cours_intervenant.GMIN_CODE = GMIntervenant.GMIN_CODE','left outer')
				->join('GMUE','GMMatiere.GMUE_CODE = GMUE.GMUE_CODE','left outer')
				->join('GM_semestre_ue','GMUE.GMUE_CODE = GM_semestre_ue.GMUE_CODE','left outer')
				->join('GMSemestre','GM_semestre_ue.GMSEM_CODE = GMSemestre.GMSEM_CODE', 'left outer')
				->join('GMFormation','GMSemestre.GMFO_CODE = GMFormation.GMFO_CODE','left outer')
				->where($where)
				->group_by(array("GMIN_NOM", "GMIN_PRENOM","GMMA_NOM", "GMCO_NOM"))
				->get()->result();


			return $enseignant_matiere;

		}


		public function get_etudiant_by_matiere() // renvoie les etudiants participants a une matière
		{
			$where = array('GM_note_cours.GMCO_CODE' => $this->input->post('cours'), 'GMSemestre.GMSEM_ANNEE' => $this->input->post('annee'));

			$etudiant = $this->db->select("GMEtudiant.GMET_CODE, GMEtudiant.GMET_NOM, GMEtudiant.GMET_PRENOM, GM_note_cours.GMNO_CONTROLE_CONTINU, GM_note_cours.GMNO_PROJET, GM_note_cours.GMNO_EXAMEN, GM_note_cours.GMNO_FINALE",false)
				->from('GM_note_cours')
				->join('GMEtudiant', 'GMEtudiant.GMET_CODE = GM_note_cours.GMET_CODE', 'left outer')
				->join('GM_note_semestre', 'GM_note_semestre.GMET_CODE = GM_note_cours.GMET_CODE', 'left outer')
				->join('GMSemestre', 'GMSemestre.GMSEM_CODE = GM_note_semestre.GMSEM_CODE', 'left outer')
				->where($where)
				->group_by(array("GMET_NOM", "GMET_PRENOM"))
				->get()->result();
			

			return $etudiant;

		}



		




		public function get_enseignant_vacataire_by_matiere()
		{

			$where = array ('GMSemestre.GMFO_CODE' => $this->input->post('formation'), 'GMSemestre.GMSEM_ANNEE' => $this->input->post('annee'), 'GMIN_STATUT' => "vacataire");

			$enseignant_matiere = $this->db->select("GMUE.GMUE_CODE, GMUE_DESCRIPTION,GMUE_CODE_APOGEE, GMMatiere.GMMA_CODE, GMMA_CODE_APOGEE, GMMA_NOM, GMCO_NOM, GMIN_NOM, GMIN_PRENOM, GMIN_PROFESSION, GMIN_LIEU_TRAVAIL, GMCO_HEURES_CM, GMCO_HEURES_TD, GMCO_HEURES_TP, (GMCO_HEURES_CM + GMCO_HEURES_TD + GMCO_HEURES_TP)  AS GMMA_NBH_TOTAL", false)
				->from('GMMatiere')
				->join('GMCours','GMCours.GMMA_CODE = GMMatiere.GMMA_CODE','left outer')
				->join('GM_cours_intervenant','GMCours.GMCO_CODE = GM_cours_intervenant.GMCO_CODE','left outer')
				->join('GMIntervenant','GM_cours_intervenant.GMIN_CODE = GMIntervenant.GMIN_CODE','left outer')
				->join('GMUE','GMMatiere.GMUE_CODE = GMUE.GMUE_CODE','left outer')
				->join('GM_semestre_ue','GMUE.GMUE_CODE = GM_semestre_ue.GMUE_CODE','left outer')
				->join('GMSemestre','GM_semestre_ue.GMSEM_CODE = GMSemestre.GMSEM_CODE', 'left outer')
				->join('GMFormation','GMSemestre.GMFO_CODE = GMFormation.GMFO_CODE','left outer')
				->where($where)
				->group_by(array("GMIN_NOM", "GMIN_PRENOM","GMMA_NOM", "GMCO_NOM"))
				->get()->result();


			return $enseignant_matiere;

		}

	
	}
?>