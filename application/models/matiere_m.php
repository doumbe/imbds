<?php 
	Class matiere_m extends CI_Model
	{
		public function inserer_matiere()
		{
			$rand = random_string('numeric', 6);

			$this->GMMA_CODE = "GMMA".$rand;
			$this->GMMA_NOM = $this->input->post('GMMA_NOM');
			$this->GMUE_CODE = $this->input->post('GMUE_CODE');
			$this->GMIN_CODE = $this->input->post('GMIN_CODE');
	        $this->GMMA_DESCRIPTION = $this->input->post('GMMA_DESCRIPTION');
	        $this->GMMA_CREDIT_ECTS = $this->input->post('GMMA_CREDIT_ECTS');
	        $this->GMMA_CODE_APOGEE = $this->input->post('GMMA_CODE_APOGEE');
	        $this->GMMA_NOMBRE_HEURES_CM = $this->input->post('GMMA_NOMBRE_HEURES_CM');
	        $this->GMMA_NOMBRE_HEURES_TD = $this->input->post('GMMA_NOMBRE_HEURES_TD');
	        $this->GMMA_NOMBRE_HEURES_TP = $this->input->post('GMMA_NOMBRE_HEURES_TP');
	        $this->GMMA_NOMBRE_HEURES_LIBRES = $this->input->post('GMMA_NOMBRE_HEURES_LIBRES');
	        $this->GMMA_NOMBRE_SPECIALITE = $this->input->post('GMMA_NOMBRE_SPECIALITE');
	 
	       	
	       	// on insere les info dans la table matiere
	        $this->db->insert('gmmatiere', $this);
		}


		public function getMatiere()
		{
			return $this->db->select('GMMA_CODE,GMMA_NOM')
							->order_by('GMMA_NOM')
							->get('gmmatiere')
							->result();
		}


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

		public function recherche_matiere()
		{
			//echo var_dump($this->input->post());
			$nom = $this->input->post('nom');
			$apogee = $this->input->post('apogee');
			$annee = $this->input->post('annee');
			$ue = $this->input->post('ue');
			$semestre = $this->input->post('semestre');

			$this->db->distinct()->select("gmmatiere.GMMA_CODE,GMMA_NOM,gmmatiere.GMMA_CODE_APOGEE, GMMA_NOMBRE_HEURES_CM,GMMA_NOMBRE_HEURES_TD,GMMA_NOMBRE_HEURES_TP,gmsemestre.GMSEM_CODE_APOGEE,gmue.GMUE_CODE_APOGEE,CONCAT(GMIN_NOM,' ',GMIN_PRENOM) AS intervenant",false)
				->from('GMMatiere');
			if(!empty($nom))
			{
				$this->db->like('gmmatiere.GMMA_NOM', $this->input->post('nom'));
			}
			if(!empty($apogee))
			{
				$this->db->like('gmmatiere.GMMA_CODE_APOGEE', $this->input->post('apogee'));
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
			$this->db->join('gmintervenant', 'gmmatiere.GMIN_CODE = gmintervenant.GMIN_CODE','left')
				->join('gmue','gmmatiere.GMUE_CODE = gmue.GMUE_CODE','left')
				->join('gm_semestre_ue','gmue.GMUE_CODE = gm_semestre_ue.GMUE_CODE','left')
				->join('gmsemestre', 'gm_semestre_ue.GMSEM_CODE = gmsemestre.GMSEM_CODE','left')
				->order_by("GMMA_NOM", "asc");

			$query = $this->db->get();

			//echo var_dump($query->result());
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
		public function edit_matiere()
		{
			$code= $this->input->post('GMMA_CODE');

			$this->GMMA_NOM = $this->input->post('GMMA_NOM');
			$this->GMUE_CODE = $this->input->post('GMUE_CODE');
			$this->GMIN_CODE = $this->input->post('GMIN_CODE');
	        $this->GMMA_DESCRIPTION = $this->input->post('GMMA_DESCRIPTION');
	        $this->GMMA_CREDIT_ECTS = $this->input->post('GMMA_CREDIT_ECTS');
	        $this->GMMA_CODE_APOGEE = $this->input->post('GMMA_CODE_APOGEE');
	        $this->GMMA_NOMBRE_HEURES_CM = $this->input->post('GMMA_NOMBRE_HEURES_CM');
	        $this->GMMA_NOMBRE_HEURES_TD = $this->input->post('GMMA_NOMBRE_HEURES_TD');
	        $this->GMMA_NOMBRE_HEURES_TP = $this->input->post('GMMA_NOMBRE_HEURES_TP');
	        $this->GMMA_NOMBRE_HEURES_LIBRES = $this->input->post('GMMA_NOMBRE_HEURES_CM') + $this->input->post('GMMA_NOMBRE_HEURES_TD') + $this->input->post('GMMA_NOMBRE_HEURES_TP');
	        $this->GMMA_NOMBRE_SPECIALITE = $this->input->post('GMMA_NOMBRE_SPECIALITE');

			$this->db->where('GMMA_CODE', $code);
			$this->db->update('gmmatiere', $this);

		}
	}
?>