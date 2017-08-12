<?php 
	Class note_m extends CI_Model
	{


		public function initNotes($annee)
		{
			$semestreInit=array(
					'GMNOSE_NOTE_FINALE' => -1,
					'GMNOSE_RANG_FINAL' => -1
				);

			$ueInit=array(
					'GMNOUE_NOTE_1' => -1,
					'GMNOUE_NOTE_2' => -1,
					'GMNOUE_NOTE_3' => -1,
					'GMNOUE_NOTE_FINALE' => -1,
					'GMNOUE_RANG_FINAL' => -1
				);

			$matiereInit=array(
					'GMNOMA_NOTE_FINALE' => -1,
					'GMNOMA_RANG_FINAL' => -1
				);

			$coursInit=array(
					'GMNO_CONTROLE_CONTINU' => -1,
					'GMNO_PROJET' => -1,
					'GMNO_EXAMEN' => -1,
					'GMNO_FINALE' => -1,
					'GMNO_RANG' => -1
				);
			$where=array(
							'GMPR_ANNEE' => $annee
						);

			$enseignements = $this->db->distinct()->select('GMFormation.GMFO_CODE, GMSemestre.GMSEM_CODE, GMUE.GMUE_CODE, GMMatiere.GMMA_CODE, GMCours.GMCO_CODE')->from('GM_promotion')->join('GMFormation','GM_promotion.GMFO_CODE = GMFormation.GMFO_CODE','left outer')->join('GMSemestre','GMFormation.GMFO_CODE = GMSemestre.GMFO_CODE','left outer')->join('GM_semestre_ue','GMSemestre.GMSEM_CODE = GM_semestre_ue.GMSEM_CODE','left outer')->join('GMUE','GM_semestre_ue.GMUE_CODE = GMUE.GMUE_CODE','left outer')->join('GMMatiere','GMUE.GMUE_CODE = GMMatiere.GMUE_CODE','left outer')->join('GMCours','GMMatiere.GMMA_CODE = GMCours.GMMA_CODE','left outer')->where($where)->like('GMSemestre.GMSEM_CODE', "GMSEM".substr($annee, 2), "after")->group_by('GMFormation.GMFO_CODE, GMSemestre.GMSEM_CODE, GMUE.GMUE_CODE, GMMatiere.GMMA_CODE, GMCours.GMCO_CODE')->get()->result();
			$etudiants = $this->db->select('GMET_CODE, GMPR_ANNEE')->from('GM_promotion')->where(array('GMPR_ANNEE' => $annee))->get()->result();
			//echo var_dump($etudiant);
			//
			//
			
			$value_SEM = "";
			$value_UE = "";
			$value_MA = ""; 
			foreach ($etudiants as $etu)
			{
				foreach($enseignements as $enseignement)
				{
					if($value_SEM!= $enseignement->GMSEM_CODE)
					{
						if($this->db->select('*')->from('GM_note_semestre')->where(array('GMET_CODE' => $etu->GMET_CODE, 'GMSEM_CODE' => $enseignement->GMSEM_CODE))->get()->num_rows()==0)
						{
							$semestreInit['GMSEM_CODE'] = $enseignement->GMSEM_CODE;
							$semestreInit['GMET_CODE'] = $etu->GMET_CODE;

							$this->db->insert('GM_note_semestre', $semestreInit);
						}
					}

					if($value_UE!= $enseignement->GMUE_CODE)
					{
						if($this->db->select('*')->from('GM_note_ue')->where(array('GMET_CODE' => $etu->GMET_CODE, 'GMUE_CODE' => $enseignement->GMUE_CODE))->get()->num_rows()==0)
						{
							$ueInit['GMUE_CODE'] = $enseignement->GMUE_CODE;
							$ueInit['GMET_CODE'] = $etu->GMET_CODE;

							$this->db->insert('GM_note_ue', $ueInit);
						}
					}

					if($value_MA!= $enseignement->GMMA_CODE and !is_null($enseignement->GMMA_CODE))
					{
						if($this->db->select('*')->from('GM_note_matiere')->where(array('GMET_CODE' => $etu->GMET_CODE, 'GMMA_CODE' => $enseignement->GMMA_CODE))->get()->num_rows()==0)
						{
							$matiereInit['GMMA_CODE'] = $enseignement->GMMA_CODE;
							$matiereInit['GMET_CODE'] = $etu->GMET_CODE;

							$this->db->insert('GM_note_matiere', $matiereInit);
						}
					}

					if(!is_null($enseignement->GMCO_CODE))
					{
						if($this->db->select('*')->from('GM_note_cours')->where(array('GMET_CODE' => $etu->GMET_CODE, 'GMCO_CODE' => $enseignement->GMCO_CODE))->get()->num_rows()==0)
						{
							$coursInit['GMCO_CODE'] = $enseignement->GMCO_CODE;
							$coursInit['GMET_CODE'] = $etu->GMET_CODE;

							$this->db->insert('GM_note_cours', $coursInit);
						}
					}

					$value_SEM = $enseignement->GMSEM_CODE;
					$value_UE = $enseignement->GMUE_CODE;
					$value_MA = $enseignement->GMMA_CODE;
				}
			}
		}

		public function addNoteCours()
		{

			$data = array(
							'GMCO_CODE' => $this->input->post('GMCO_CODE'),
							'GMET_CODE' =>  $this->input->post('GMET_CODE')
    					);
			switch ($this->input->post('typeNote'))
			{
				case "CC":
					$data["GMNO_CONTROLE_CONTINU"]=$this->input->post('GMNO_CONTROLE_CONTINU');
					break;
				case "P":
					$data["GMNO_PROJET"]=$this->input->post('GMNO_PROJET');
					break;	
				case "EX":
					$data["GMNO_EXAMEN"]=$this->input->post('GMNO_EXAMEN');
					break;	
			}

			$this->db->insert('GM_note_cours', $data);
		}



		public function edit_note_etudiant() // fonction qui modifie la ou les notes d'un etudiant
		{
			$etudiant = $this->input->post('GMET_CODE');

			$this->GMNO_CONTROLE_CONTINU = $this->input->post('GMNO_CONTROLE_CONTINU');
			$this->GMNO_PROJET = $this->input->post('GMNO_PROJET');
			$this->GMNO_EXAMEN = $this->input->post('GMNO_EXAMEN');
			$this->GMNO_FINALE = $this->input->post('GMNO_FINALE');

			$this->db->where('GMET_CODE', $etudiant);
			$this->db->update('GM_note_cours', $this);
		}

		public function calculNoteFinaleCours($cours, $etudiant, $annee)
		{
			$where = array ('GMET_CODE' => $etudiant, 'GMCO_CODE' => $cours);
			$notesEtuCours = $this->db->select('GMNO_CONTROLE_CONTINU, GMNO_PROJET, GMNO_EXAMEN')->from('GM_note_cours')->where($where)->get()->row();

			$paramEval1 = $this->db->select('GMPARA_VALEUR')->from('GMParametres')->where(array('GMPARA_NOM' => "Poids Eval 1 sur 3", 'GMPARA_ANNEE' => $annee))->get()->row()->GMPARA_VALEUR;
			$paramEval2 = $this->db->select('GMPARA_VALEUR')->from('GMParametres')->where(array('GMPARA_NOM' => "Poids Eval 2 sur 3", 'GMPARA_ANNEE' => $annee))->get()->row()->GMPARA_VALEUR;
			$paramEval2 = str_replace(",",".",$paramEval2);
			$paramEval2 = floatval($paramEval2);
			$paramEval3CC = $this->db->select('GMPARA_VALEUR')->from('GMParametres')->where(array('GMPARA_NOM' => "Poids CC3", 'GMPARA_ANNEE' => $annee))->get()->row()->GMPARA_VALEUR;
			$paramEval3CC= str_replace(",",".",$paramEval3CC);
			$paramEval3CC = floatval($paramEval3CC);
			$paramEval3Projet = $this->db->select('GMPARA_VALEUR')->from('GMParametres')->where(array('GMPARA_NOM' => "Poids Projet3", 'GMPARA_ANNEE' => $annee))->get()->row()->GMPARA_VALEUR;
			$paramEval3Projet = str_replace(",",".",$paramEval3Projet);
			$paramEval3Projet = floatval($paramEval3Projet);
			$paramEval3Exam = $this->db->select('GMPARA_VALEUR')->from('GMParametres')->where(array('GMPARA_NOM' => "Poids Examen3", 'GMPARA_ANNEE' => $annee))->get()->row()->GMPARA_VALEUR;
			$paramEval3Exam = str_replace(",",".",$paramEval3Exam);
			$paramEval3Exam = floatval($paramEval3Exam);
			$value = array();
			$count = 3;

			if($notesEtuCours->GMNO_CONTROLE_CONTINU=="-1")
				$count--;
			else $value['GMNO_CONTROLE_CONTINU']=$notesEtuCours->GMNO_CONTROLE_CONTINU;
			if($notesEtuCours->GMNO_PROJET=="-1")
				$count--;
			else $value['GMNO_PROJET']=$notesEtuCours->GMNO_PROJET;
			if($notesEtuCours->GMNO_EXAMEN=="-1")
				$count--;
			else $value['GMNO_EXAMEN']=$notesEtuCours->GMNO_EXAMEN;

			$moyenne=0;
			switch ($count)
			{
				case 1:
					foreach ($value as $val)
					{
						$moyenne+=($val) * $paramEval1;
					}
					break;
				case 2:
					foreach ($value as $val)
					{
						$moyenne+= $val*$paramEval2;
					}
					break;	
				case 3:
					$moyenne=$value["GMNO_CONTROLE_CONTINU"]*$paramEval3CC+$value['GMNO_PROJET']*$paramEval3Projet+$value['GMNO_EXAMEN']*$paramEval3Exam;
					break;
				default:
					$moyenne=-1;
					break;
			}

			$data = array(
							'GMNO_FINALE' => $moyenne				 
    					);
			$this->db->where($where);
			$this->db->update('GM_note_cours', $data);

		}

		public function calculNoteMatiere($matiere, $etudiant)
		{	
			$where = array ('GM_note_cours.GMET_CODE' => $etudiant, 'GMCours.GMMA_CODE' => $matiere);
			$notesEtuMatiere = $this->db->select('GM_note_cours.GMNO_FINALE, GM_note_cours.GMCO_CODE, GM_note_cours.GMET_CODE, GMCours.GMMA_CODE')->from('GM_note_cours')->join('GMCours','GM_note_cours.GMCO_CODE = GMCours.GMCO_CODE')->where($where)->get()->result();
			$count = 0;

			foreach ($notesEtuMatiere as $val)
			{
				echo var_dump($val);
				if($val->GMNO_FINALE!=-1)
				{
					$count++;
				}
			}
		
			$moyenne=0;
			switch ($count)
			{
				case 0:
					$moyenne=-1;
					break;
				default:
					foreach ($notesEtuMatiere as $val)
					{
						if($val->GMNO_FINALE!=-1)
						{
							$moyenne+=$val->GMNO_FINALE;
						}
					}
					$moyenne/= $count;
					$moyenne =  (float) number_format($moyenne, 2, '.', '');
					echo $moyenne;
					break;
			}

			$test= $this->db->where(array('GM_note_matiere.GMET_CODE' => $etudiant, 'GM_note_matiere.GMMA_CODE' => $matiere))->get('GM_note_matiere');
			$data=array();
			if ( $test->num_rows() > 0 )
			{
				$data['GMNOMA_NOTE_FINALE']=$moyenne;
				echo $data['GMNOMA_NOTE_FINALE'];
				//printf($etudiant." - ".$matiere." - ".$moyenne."\n");
				$this->db->where(array('GM_note_matiere.GMET_CODE' => $etudiant, 'GM_note_matiere.GMMA_CODE' => $matiere))->update('GM_note_matiere', $data);
				$lalala = $this->db->select('*')->from('GM_note_matiere')->where(array('GM_note_matiere.GMET_CODE' => $etudiant, 'GM_note_matiere.GMMA_CODE' => $matiere))->get()->row();
				echo var_dump($lalala);
			}
			else
			{
				$data['GMET_CODE'] = $etudiant;
				$data['GMMA_CODE'] = $matiere;
				$data['GMNOMA_NOTE_FINALE'] = $moyenne;
				$this->db->insert('GM_note_matiere', $data);
			}
		}

		public function calculNoteUE($ue, $etudiant)
		{	
			$where = array ('GM_note_matiere.GMET_CODE' => $etudiant, 'GMMatiere.GMUE_CODE' => $ue);
			$notesEtuUE = $this->db->select('GM_note_matiere.GMNOMA_NOTE_FINALE, GM_note_matiere.GMMA_CODE, GM_note_matiere.GMET_CODE, GMMatiere.GMUE_CODE')->from('GM_note_matiere')->join('GMMatiere','GM_note_matiere.GMMA_CODE = GMMatiere.GMMA_CODE')->where($where)->get()->result();
			$count = 0;

			foreach ($notesEtuUE as $val)
			{
				//echo var_dump($val);
				if($val->GMNOMA_NOTE_FINALE!=-1)
				{
					$count++;
				}
			}
		
			$moyenne=0;
			switch ($count)
			{
				case 0:
					$moyenne=-1;
					break;
				default:
					foreach ($notesEtuUE as $val)
					{
						if($val->GMNOMA_NOTE_FINALE!=-1)
						{
							$moyenne+=$val->GMNOMA_NOTE_FINALE;
						}
					}
					$moyenne/= $count;
					$moyenne =  (float) number_format($moyenne, 2, '.', '');
					//echo $moyenne;
					break;
			}

			$test= $this->db->where(array('GM_note_ue.GMET_CODE' => $etudiant, 'GM_note_ue.GMUE_CODE' => $ue))->get('GM_note_ue');
			$data=array();
			if ( $test->num_rows() > 0 )
			{
				$data['GMNOUE_NOTE_FINALE']=$moyenne;
				//echo $data['GMNOUE_NOTE_FINALE'];
				//printf($etudiant." - ".$matiere." - ".$moyenne."\n");
				$this->db->where(array('GM_note_ue.GMET_CODE' => $ue, 'GM_note_ue.GMUE_CODE' => $ue))->update('GM_note_ue', $data);
				//$lalala = $this->db->select('*')->from('GM_note_ue')->where(array('GM_note_ue.GMET_CODE' => $etudiant, 'GM_note_ue.GMUE_CODE' => $ue))->get()->row();
				//echo var_dump($lalala);
			}
			else
			{
				$data['GMET_CODE'] = $etudiant;
				$data['GMUE_CODE'] = $ue;
				$data['GMNOUE_NOTE_FINALE'] = $moyenne;
				//echo var_dump($data);
				$this->db->insert('GM_note_ue', $data);
			}
		}

		public function calculNoteUEwithoutMatiere($ue, $etudiant)
		{
			$where = array('GMMA_CODE' => NULL,'GMET_CODE' => $etudiant,'GM_note_ue.GMUE_CODE' =>$ue);
			$notesEtuUE = $this->db->select('GMNOUE_NOTE_1, GMNOUE_NOTE_2, GMNOUE_NOTE_3, GMMA_CODE')->from('GM_note_ue')->join('GMUE','GM_note_ue.GMUE_CODE = GMUE.GMUE_CODE','left outer')->join('GMMatiere','GMUE.GMUE_CODE = GMMatiere.GMUE_CODE','left outer')->where($where)->get()->result();
			$value = array();
			$count = 0;

			echo var_dump($notesEtuUE);

			//if(empty($notesEtuUE)) return false;

			if($notesEtuUE->GMNOUE_NOTE_1!="-1")
			{
				$count++;
				$value['GMNOUE_NOTE_1']=$notesEtuUE->GMNOUE_NOTE_1;
			}

			if($notesEtuUE->GMNOUE_NOTE_2!="-1")
			{
				$count++;
				$value['GMNOUE_NOTE_2']=$notesEtuUE->GMNOUE_NOTE_2;
			}

			if($notesEtuUE->GMNOUE_NOTE_3!="-1")
			{
				$count++;
				$value['GMNOUE_NOTE_3']=$notesEtuUE->GMNOUE_NOTE_3;
			}

			
			switch ($count)
			{
				case 0:
					$moyenne=-1;
					break;

				default:
					$moyenne=0;
					foreach ($value as $val)
					{
						$moyenne+= $val;
					}
					$moyenne/=$count;
					break;	
			}

			$data = array(
							'GMNOUE_NOTE_FINALE' => $moyenne				 
    					);
			//echo var_dump($data);
			//$this->db->where($where);
			//$this->db->update('GM_note_ue', $data);


		}

		public function calculNoteSemestre($semestre, $etudiant)
		{	
			$where = array ('GM_note_UE.GMET_CODE' => $etudiant, 'GM_semestre_ue.GMSEM_CODE' => $semestre);
			$notesEtuSemestre = $this->db->select('GM_note_ue.GMNOUE_NOTE_1, GM_note_ue.GMNOUE_NOTE_2, GM_note_ue.GMNOUE_NOTE_3, GM_note_ue.GMNOUE_NOTE_FINALE, GM_note_ue.GMUE_CODE, GM_note_ue.GMET_CODE, GMUE.GMUE_CODE, GMUE_CREDIT_ECTS, GMSEM_CREDIT_ECTS')->from('GM_note_ue')->join('GMUE','GM_note_ue.GMUE_CODE = GMUE.GMUE_CODE')->join('GM_semestre_ue','GMUE.GMUE_CODE = GM_semestre_ue.GMUE_CODE')->join('GMSemestre','GM_semestre_ue.GMSEM_CODE = GMSemestre.GMSEM_CODE')->where($where)->get()->result();
			echo var_dump($notesEtuSemestre);





			$count = 0;

			foreach ($notesEtuSemestre as $val)
			{
				//echo var_dump($val);
				if($val->GMNOUE_NOTE_FINALE!=-1)
				{
					$count++;
				}
			}
		
			$moyenne=0;
			$coef=0;
			switch ($count)
			{
				case 0:
					$moyenne=-1;
					break;
				default:
					foreach ($notesEtuSemestre as $val)
					{
						if($val->GMNOUE_NOTE_FINALE!=-1)
						{
							$moyenne+=$val->GMNOUE_NOTE_FINALE*$val->GMUE_CREDIT_ECTS;
							$coef+=$val->GMUE_CREDIT_ECTS;
						}
					}
					$moyenne/= $coef;
					$moyenne =  (float) number_format($moyenne, 2, '.', '');
					//echo $moyenne;
					break;
			}

			$test= $this->db->where(array('GM_note_semestre.GMET_CODE' => $etudiant, 'GM_note_semestre.GMSEM_CODE' => $semestre))->get('GM_note_semestre');
			$data=array();
			if ( $test->num_rows() > 0 )
			{
				$data['GMNOSE_NOTE_FINALE']=$moyenne;
				//echo $data['GMNOUE_NOTE_FINALE'];
				//printf($etudiant." - ".$matiere." - ".$moyenne."\n");
				//$this->db->where(array('GM_note_semestre.GMET_CODE' => $etudiant, 'GM_note_semestre.GMSEM_CODE' => $semestre))->update('GM_note_semestre', $data);
				//$lalala = $this->db->select('*')->from('GM_note_ue')->where(array('GM_note_ue.GMET_CODE' => $etudiant, 'GM_note_ue.GMUE_CODE' => $ue))->get()->row();
				//echo var_dump($lalala);
			}
			else
			{
				$data['GMET_CODE'] = $etudiant;
				$data['GMSEM_CODE'] = $semestre;
				$data['GMNOSE_NOTE_FINALE'] = $moyenne;
				//echo var_dump($data);
				//$this->db->insert('GM_note_semestre', $data);
			}
		}

		public function calculAllNotes($annee)
		{
			$anneeTrunc="GMCO".substr($annee, 2);
			$resultCours=$this->db->select('GM_note_cours.GMCO_CODE, GM_note_cours.GMET_CODE')->from('GM_note_cours')->like('GM_note_cours.GMCO_CODE', $anneeTrunc, "after")->get()->result();
			foreach ($resultCours as $res)
			{
				$this->calculNoteFinaleCours($res->GMCO_CODE, $res->GMET_CODE, $annee);
			}


		}

		public function calculAllMatiereNotes($annee)
		{
			$anneeTrunc="GMCO".substr($annee, 2);
			$resultCours=$this->db->select('GM_note_cours.GMET_CODE, GMMatiere.GMMA_CODE')->from('GM_note_cours')->join('GMCours','GM_note_cours.GMCO_CODE = GMCours.GMCO_CODE')->join('GMMatiere','GMCours.GMMA_CODE = GMMatiere.GMMA_CODE')->like('GM_note_cours.GMCO_CODE', $anneeTrunc, "after")->group_by(array("GM_note_cours.GMET_CODE", "GMMatiere.GMMA_CODE"))->get()->result();
			$oldMatiere="";
			foreach ($resultCours as $res)
			{
				if($oldMatiere!=$res->GMMA_CODE)
				{
					//echo var_dump($res);
					$this->calculNoteMatiere($res->GMMA_CODE,$res->GMET_CODE);
				}
				
				$oldMatiere=$res->GMMA_CODE;
			}


		}

		public function calculAllUENotes($annee)
		{
			$anneeTrunc="GMMA".substr($annee, 2);
			$resultUE=$this->db->select('GM_note_matiere.GMET_CODE, GMUE.GMUE_CODE')->from('GM_note_matiere')->join('GMMatiere','GM_note_matiere.GMMA_CODE = GMMatiere.GMMA_CODE')->join('GMUE','GMMatiere.GMUE_CODE = GMUE.GMUE_CODE')->like('GM_note_matiere.GMMA_CODE', $anneeTrunc, "after")->group_by(array("GM_note_matiere.GMET_CODE", "GMUE.GMUE_CODE"))->get()->result();
			$oldUE="";
			foreach ($resultUE as $res)
			{
				if($oldUE!=$res->GMUE_CODE)
				{
					//echo var_dump($res);
					$this->calculNoteUE($res->GMUE_CODE,$res->GMET_CODE);
					$this->calculNoteUEwithoutMatiere($res->GMUE_CODE,$res->GMET_CODE);
				}
				
				$oldUE=$res->GMUE_CODE;
			}


		}

		public function calculAllSemestreNotes($annee)
		{
			$anneeTrunc="GMUE".substr($annee, 2);
			$resultSemestre=$this->db->select('GM_note_ue.GMET_CODE, GMSemestre.GMSEM_CODE')->from('GM_note_ue')->join('GMUE','GM_note_ue.GMUE_CODE = GMUE.GMUE_CODE')->join('GM_semestre_ue','GMUE.GMUE_CODE = GM_semestre_ue.GMUE_CODE')->join('GMSemestre','GM_semestre_ue.GMSEM_CODE = GMSemestre.GMSEM_CODE')->like('GM_note_ue.GMUE_CODE', $anneeTrunc, "after")->group_by(array("GM_note_ue.GMET_CODE", "GMSemestre.GMSEM_CODE"))->get()->result();
			$oldSemestre="";
			foreach ($resultSemestre as $res)
			{
				if($oldSemestre!=$res->GMSEM_CODE)
				{
					//echo var_dump($res);
					$this->calculNoteSemestre($res->GMSEM_CODE,$res->GMET_CODE);
				}
				
				$oldSemestre=$res->GMSEM_CODE;
			}


		}


		public function getAllNotesbyEtudiant($etudiant)
		{
			$where = array ('GM_note_cours.GMET_CODE' => $etudiant, 'GM_promotion.GMET_CODE' => $etudiant, 'GM_note_matiere.GMET_CODE' => $etudiant , 'GM_note_ue.GMET_CODE' => $etudiant );


			$notesEtu = $this->db->distinct()->select('GMSEM_NOM, GMSEM_ANNEE, GMNOSE_NOTE_FINALE, GMNOSE_RANG_FINAL, GMUE_DESCRIPTION, GMNOUE_NOTE_1, GMNOUE_NOTE_2, GMNOUE_NOTE_3, GMNOUE_NOTE_FINALE, GMNOUE_RANG_FINAL, GMMA_NOM, GMNOMA_NOTE_FINALE, GMNOMA_RANG_FINAL, GM_note_cours.GMCO_CODE, GMCO_NOM, GMNO_CONTROLE_CONTINU, GMNO_PROJET, GMNO_EXAMEN, GMNO_FINALE,GMNO_RANG')->from('GM_promotion')->join('GMFormation','GM_promotion.GMFO_CODE = GMFormation.GMFO_CODE','left outer')->join('GMSemestre','GMFormation.GMFO_CODE = GMSemestre.GMFO_CODE', 'left outer')->join('GM_semestre_ue','GMSemestre.GMSEM_CODE = GM_semestre_ue.GMSEM_CODE','left outer')->join('GMUE','GM_semestre_ue.GMUE_CODE = GMUE.GMUE_CODE','left outer')->join('GMMatiere','GMUE.GMUE_CODE = GMMatiere.GMUE_CODE','left outer')->join('GMCours','GMMatiere.GMMA_CODE = GMCours.GMMA_CODE', 'left outer')->join('GM_note_semestre','GMSemestre.GMSEM_CODE = GM_note_semestre.GMSEM_CODE','left outer')->join('GM_note_ue','GMUE.GMUE_CODE = GM_note_ue.GMUE_CODE','left outer')->join('GM_note_matiere','GMMatiere.GMMA_CODE = GM_note_matiere.GMMA_CODE','left outer')->join('GM_note_cours','GMCours.GMCO_CODE = GM_note_cours.GMCO_CODE')->where($where)->group_by(array("GM_promotion.GMFO_CODE", "GMSEM_NOM", "GMUE_NOM","GMMA_NOM","GMCO_NOM"))->get()->result();

			$where2 = array ('GM_promotion.GMET_CODE' => $etudiant, 'GM_note_ue.GMET_CODE' => $etudiant, 'GM_note_semestre.GMET_CODE' => $etudiant );

			$notesEtu2 =  $this->db->distinct()->select('GMSEM_NOM, GMSEM_ANNEE, GMNOSE_NOTE_FINALE, GMNOSE_RANG_FINAL, GMUE_DESCRIPTION, GMNOUE_NOTE_1, GMNOUE_NOTE_2, GMNOUE_NOTE_3, GMNOUE_NOTE_FINALE, GMNOUE_RANG_FINAL, NULL as GMMA_NOM, NULL as GMNOMA_NOTE_FINALE, NULL as GMNOMA_RANG_FINAL, NULL as GMCO_CODE, NULL as GMCO_NOM, NULL as GMNO_CONTROLE_CONTINU, NULL as GMNO_PROJET, NULL as GMNO_EXAMEN, NULL as GMNO_FINALE, NULL as GMNO_RANG', false)->from('GM_promotion')->join('GMFormation','GM_promotion.GMFO_CODE = GMFormation.GMFO_CODE','left outer')->join('GMSemestre','GMFormation.GMFO_CODE = GMSemestre.GMFO_CODE', 'left outer')->join('GM_semestre_ue','GMSemestre.GMSEM_CODE = GM_semestre_ue.GMSEM_CODE','left outer')->join('GMUE','GM_semestre_ue.GMUE_CODE = GMUE.GMUE_CODE','left outer')->join('GM_note_semestre','GMSemestre.GMSEM_CODE = GM_note_semestre.GMSEM_CODE','left outer')->join('GM_note_ue','GMUE.GMUE_CODE = GM_note_ue.GMUE_CODE','left outer')->where($where2)->group_by(array("GM_promotion.GMFO_CODE","GMSEM_NOM", "GMUE_NOM"))->get()->result();

			$notesAll = array_merge($notesEtu, $notesEtu2);

			return $notesAll;
		}


		public function getNoteByEtudiantId($id)
		{
			$this->db->select('*')
					 ->from('GM_note_cours','GMEtudiant')
					 ->where('GMET_CODE', $id);

			$query = $this->db->get();

			return $query->row();
		}

	}
?>