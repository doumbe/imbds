<?php 
	Class cours_m extends CI_Model
	{
		public function inserer_cours()
		{
	echo $this->input->post('antennes');
			$rand = random_string('numeric', 6);
			$code = "GMCO".$rand;

			$this->GMCO_CODE = $code;
			$this->GMCO_NOM = $this->input->post('GMCO_NOM');
	        $this->GMMA_CODE = $this->input->post('GMMA_CODE');
	        $this->GMCO_HEURES_CM = $this->input->post('GMCO_HEURES_CM');
	        $this->GMCO_HEURES_TD = $this->input->post('GMCO_HEURES_TD');
	        $this->GMCO_HEURES_TP = $this->input->post('GMCO_HEURES_TP');
	        $this->GMCO_HEURES_LIBRES = $this->input->post('GMCO_HEURES_LIBRES');
	        $this->GMCO_RANG = $this->input->post('GMCO_RANG');
	        $this->GMCO_PLANIFIE = $this->input->post('GMCO_PLANIFIE');
	       	$this->GMCO_REALISE = $this->input->post('GMCO_REALISE');
	        $this->GMCO_NOTATION = $this->input->post('GMCO_NOTATION');
	        $this->GMCO_PLAN_OBJECTIFS_GENERAUX = $this->input->post('GMCO_PLAN_OBJECTIFS_GENERAUX');
	        $this->GMCO_PLAN_OBJECTIFS_SPECIFIQUES = $this->input->post('GMCO_PLAN_OBJECTIFS_SPECIFIQUES');
	        $this->GMCO_PLAN_PREREQUIS = $this->input->post('GMCO_PLAN_PREREQUIS');
	        $this->GMCO_PLAN_MODE_EVALUATION = $this->input->post('GMCO_PLAN_MODE_EVALUATION');
	        $this->GMCO_PLAN_LECTURE_RECOMMANDEE = $this->input->post('GMCO_PLAN_LECTURE_RECOMMANDEE');
	       	$this->GMCO_NOMBRE_SEANCES = $this->input->post('GMCO_NOMBRE_SEANCES');

	       	// on insere les info dans la table cours
	        $this->db->insert('gmcours', $this);

	        $data = array('GMCO_CODE' =>$code, 
	        			'GMIN_CODE' =>$this->input->post('GMIN_CODE'),
	        			'GMANT_CODE' =>$this->input->post('GMANT_CODE')
	        			);

	        $this->db->insert('gm_cours_intervenant', $data);
		}

		public function getCours()
		{
			return $this->db->select("GMCO_CODE, GMCO_NOM")
					->get('gmcours')
					->result();
		}

		public function getCoursById($id)
		{
			
			$this->db->select("gmcours.GMCO_CODE,GMCO_NOM,GMCO_RANG,GMMatiere.GMMA_CODE, GMMA_CODE_APOGEE, GMMA_NOM, GMMA_CREDIT_ECTS, GMCO_HEURES_CM,GMCO_HEURES_TD,GMCO_HEURES_TP,GMSEM_CODE_APOGEE, GMSEM_NOM, GMSEM_ANNEE,GMUE_CODE_APOGEE,GMUE_NOM,GMIntervenant.GMIN_NOM,GMIntervenant.GMIN_PRENOM, GMIntervenant.GMIN_CODE, GMCO_NOTATION, GMCO_HEURES_LIBRES, GMCO_PLAN_PREREQUIS, GMCO_NOMBRE_SEANCES, GMCO_PLAN_LECTURE_RECOMMANDEE, GMCO_PLAN_MODE_EVALUATION,GMCO_PLAN_OBJECTIFS_SPECIFIQUES, GMCO_PLAN_OBJECTIFS_GENERAUX, GMCO_PLANIFIE, GMCO_REALISE, GMCI_PLAN_PREREQUIS,GMCI_PLAN_OBJECTIFS_GENERAUX, GMCI_PLAN_MODE_EVALUATION, GMCI_PLAN_OBJECTIFS_SPECIFIQUES, GMCI_PLAN_LECTURE_RECOMMANDEE, GMCI_NOTATION")
						->from('gmcours')
						->where('GMCours.GMCO_CODE', $id)
						->join('gmmatiere', 'gmcours.GMMA_CODE = gmmatiere.GMMA_CODE','left')
						->join('gmue', 'gmmatiere.GMUE_CODE = gmue.GMUE_CODE','left')
						->join('gm_semestre_ue','gmue.GMUE_CODE = gm_semestre_ue.GMUE_CODE','left')
						->join('gmsemestre', 'gm_semestre_ue.GMSEM_CODE = gmsemestre.GMSEM_CODE','left')
						->join('gm_cours_intervenant', 'gmcours.GMCO_CODE = gm_cours_intervenant.GMCO_CODE','left')
						->join('gmintervenant', 'gm_cours_intervenant.GMIN_CODE = gmintervenant.GMIN_CODE','left')
						->join('gmantenne', 'gm_cours_intervenant.GMANT_CODE = gmantenne.GMANT_CODE','left');

			$query = $this->db->get();
			//echo var_dump($query->result());
			return $query->row();

		}


		public function getCoursByIdEtudiant($id)
		{
			$this->db->select('*')
						->from('gmcours')
						->where('gmcours.GMCO_CODE', $id);

			$query = $this->db->get();
			return $query->row();

		}

/*
		public function getCoursIntervenant($id)
		{
			$this->db->select('*')
					 ->from('gmcours')
					 ->join('gm_cours_intervenant', 'gmcours.GMCO_CODE = gm_cours_intervenant.GMCO_CODE', 'left');

			$query = $this->db->get();
			return $query->row();
		}

*/

		public function getCoursMatiere()
		{
			$this->db->select("gmmatiere.GMMA_CODE, gmmatiere.GMMA_NOM")
				->from('gmmatiere')
				->join('gmcours','gmcours.GMMA_CODE = gmmatiere.GMMA_CODE');

			$query = $this->db->get();
			return $query->result;
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
												->join('gm_cours_intervenant', 'gmcours.GMCO_CODE = gm_cours_intervenant.GMCO_CODE','left')
												->join('gmintervenant', 'gm_cours_intervenant.GMIN_CODE = gmintervenant.GMIN_CODE','left')
												->join('gmantenne', 'gm_cours_intervenant.GMANT_CODE = gmantenne.GMANT_CODE','left')
								
												
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

		public function recherche_cours()
		{
			//echo var_dump($this->input->post());
			$nom = $this->input->post('nom');
			$annee = $this->input->post('annee');
			$ue = $this->input->post('ue');
			$semestre = $this->input->post('semestre');
			$matiere = $this->input->post('matiere');

			$this->db->distinct()->select("gmcours.GMCO_CODE,GMCO_NOM,GMCO_RANG,gmmatiere.GMMA_CODE_APOGEE, GMCO_HEURES_CM,GMCO_HEURES_TD,GMCO_HEURES_TP,gmsemestre.GMSEM_CODE_APOGEE,gmue.GMUE_CODE_APOGEE,CONCAT(GMIN_NOM,' ',GMIN_PRENOM) AS intervenant",false)
				->from('GMCours');
			if(!empty($nom))
			{
				$this->db->like('gmcours.GMCO_NOM', $this->input->post('nom'));
			}
			if($matiere != 'aucun')
			{
				$this->db->like('GMMatiere.GMMA_CODE', $this->input->post('matiere'));
			}	
			if(!empty($annee))
			{
				$this->db->like('GMSEM_ANNEE', $this->input->post('annee'));
			}
			if($ue != 'aucun')
			{
				$this->db->like('gmue.GMUE_CODE', $this->input->post('ue'));
			}
			if($semestre != 'aucun')
			{
				$this->db->like('gmsemestre.GMSEM_CODE', $this->input->post('semestre'));
			}	
			$this->db->join('gmmatiere', 'gmcours.GMMA_CODE = gmmatiere.GMMA_CODE','left')
				->join('gmue', 'gmmatiere.GMUE_CODE = gmue.GMUE_CODE','left')
				->join('gm_semestre_ue','gmue.GMUE_CODE = gm_semestre_ue.GMUE_CODE','left')
				->join('gmsemestre', 'gm_semestre_ue.GMSEM_CODE = gmsemestre.GMSEM_CODE','left')
				->join('gm_cours_intervenant', 'gmcours.GMCO_CODE = gm_cours_intervenant.GMCO_CODE','left')
				->join('gmintervenant', 'gm_cours_intervenant.GMIN_CODE = gmintervenant.GMIN_CODE','left')
				->join('gmantenne', 'gm_cours_intervenant.GMANT_CODE = gmantenne.GMANT_CODE','left')
				->order_by("GMCO_NOM", "asc");

			$query = $this->db->get();

			//echo var_dump($query->result());
			return $query->result();
		}


		public function edit_cours()
		{
			$code= $this->input->post('GMCO_CODE');

			$this->GMCO_NOM = $this->input->post('GMCO_NOM');
	        $this->GMMA_CODE = $this->input->post('GMMA_CODE');
	        $this->GMCO_HEURES_CM = $this->input->post('GMCO_HEURES_CM');
	        $this->GMCO_HEURES_TD = $this->input->post('GMCO_HEURES_TD');
	        $this->GMCO_HEURES_TP = $this->input->post('GMCO_HEURES_TP');
	        $this->GMCO_HEURES_LIBRES = $this->input->post('GMCO_HEURES_CM') + $this->input->post('GMCO_HEURES_TD') + $this->input->post('GMCO_HEURES_TP');
	        $this->GMCO_RANG = $this->input->post('GMCO_RANG');
	        $this->GMCO_PLANIFIE = $this->input->post('GMCO_PLANIFIE');
	       	$this->GMCO_REALISE = $this->input->post('GMCO_REALISE');
	        $this->GMCO_NOTATION = $this->input->post('GMCO_NOTATION');
	        $this->GMCO_PLAN_OBJECTIFS_GENERAUX = $this->input->post('GMCO_PLAN_OBJECTIFS_GENERAUX');
	        $this->GMCO_PLAN_OBJECTIFS_SPECIFIQUES = $this->input->post('GMCO_PLAN_OBJECTIFS_SPECIFIQUES');
	        $this->GMCO_PLAN_PREREQUIS = $this->input->post('GMCO_PLAN_PREREQUIS');
	        $this->GMCO_PLAN_MODE_EVALUATION = $this->input->post('GMCO_PLAN_MODE_EVALUATION');
	        $this->GMCO_PLAN_LECTURE_RECOMMANDEE = $this->input->post('GMCO_PLAN_LECTURE_RECOMMANDEE');
	       	$this->GMCO_NOMBRE_SEANCES = $this->input->post('GMCO_NOMBRE_SEANCES');

	        $this->db->where('GMCO_CODE', $code);
			$this->db->update('gmcours', $this);


	        $data = array('GMIN_CODE' =>$this->input->post('GMIN_CODE'),
	        				'GMANT_CODE' =>$this->input->post('GMAN_CODE')
	        			);
	        $this->db->where('GMCO_CODE', $code);
			$this->db->where('GMIN_CODE', $this->input->post('old_intervenant'));
			$this->db->where('GMANT_CODE', $this->input->post('old_antenne'));
	        $this->db->update('gm_cours_intervenant', $data);

		}

		public function delete_cours($id)
		{	

			$where = array('GMCO_CODE' => $id);
			$wheres = array('gm_cours_intervenant.GMCO_CODE' => $id);
			$this->db->delete('gm_cours_intervenant', $wheres);
			$this->db->delete('gmcours', $where);
		}


	}
?>