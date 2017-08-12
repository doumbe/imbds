<?php 
	Class semestre_m extends CI_Model
	{
		public function inserer_semestre()
		{
			//faire une boucle while pour vérifier si le code générer n'existe pas deja
			//pour ca il faut faire un select de tous les codes puis comparer avec celui génerer
			//s'il existe refaire un autre rand sinon on passe

			// on génère un nombre aleatoire de 5 chiffres
			$rand = random_string('numeric', 5);

			$this->GMSEM_CODE = "GMSEM".$rand;
			$this->GMSEM_NOM = $this->input->post('GMSEM_NOM');
			$this->GMFO_CODE = $this->input->post('GMFO_CODE');
	        $this->GMSEM_ANNEE = $this->input->post('GMSEM_ANNEE');
	        $this->GMSEM_DESCRIPTION = $this->input->post('GMSEM_DESCRIPTION');
	        $this->GMSEM_CODE_APOGEE = $this->input->post('GMSEM_CODE_APOGEE');
	        $this->GMSEM_NOMBRE_HEURES_CM = $this->input->post('GMSEM_NOMBRE_HEURES_CM');
	        $this->GMSEM_NOMBRE_HEURES_TD = $this->input->post('GMSEM_NOMBRE_HEURES_TD');
	        $this->GMSEM_NOMBRE_HEURES_TP = $this->input->post('GMSEM_NOMBRE_HEURES_TP');
	        $this->GMSEM_NOMBRE_HEURES_LIBRES = $this->input->post('GMSEM_NOMBRE_HEURES_LIBRES');
	        $this->GMSEM_CREDIT_ECTS = $this->input->post('GMSEM_CREDIT_ECTS');
	       
	        $this->db->insert('gmsemestre', $this);

		}

		public function getSemestre()
		{
			return $this->db->select("GMSEM_CODE, GMSEM_CODE_APOGEE, CONCAT(GMSEM_NOM,' ',GMSEM_ANNEE) AS semestre", false)
							->get('gmsemestre')
							->result();
		}
		

		public function nombre_semestre()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmsemestre'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}

		// Pour la liste des matières avec la pagination

		public function getByPageSemestre($num_page,$number_semestre_page)
		{
			if($num_page>0 and $number_semestre_page>=0)
			{
				if($number_semestre_page==0)
				{
					$number_semestre_page=1;
				}

				if($number_semestre_page==1)
				{
					$min = ($num_page+$number_semestre_page)-$num_page-1;
				}

				else
				{
					$min = ($num_page+$number_semestre_page)-$num_page;
				}
			
				$value = $this->db->distinct()->select("gmsemestre.GMSEM_CODE,GMSEM_NOM,GMSEM_CODE_APOGEE, GMSEM_ANNEE, GMSEM_NOMBRE_HEURES_CM, GMSEM_NOMBRE_HEURES_TD, GMSEM_NOMBRE_HEURES_TP, GMSEM_CREDIT_ECTS, CONCAT(GMFO_NIVEAU,' ',GMFO_FORMATION) AS formation_niveau",false)
												->from('gmsemestre')
												->join('gmformation','gmsemestre.GMFO_CODE = gmformation.GMFO_CODE','left')
												->order_by("GMSEM_ANNEE", "DESC");

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

		public function recherche_semestre()
		{
			//echo var_dump($this->input->post());
			$nom = $this->input->post('nom');
			$apogee = $this->input->post('apogee');
			$annee = $this->input->post('annee');
			$formation = $this->input->post('formation');

			$this->db->distinct()->select("gmsemestre.GMSEM_CODE,GMSEM_NOM,GMSEM_CODE_APOGEE, GMSEM_ANNEE, GMSEM_NOMBRE_HEURES_CM, GMSEM_NOMBRE_HEURES_TD, GMSEM_NOMBRE_HEURES_TP, GMSEM_CREDIT_ECTS, CONCAT(GMFO_NIVEAU,' ',GMFO_FORMATION) AS formation_niveau",false)
				->from('GMSemestre');
			if(!empty($nom))
			{
				$this->db->like('gmsemestre.GMSEM_NOM', $this->input->post('nom'));
			}
			if(!empty($apogee))
			{
				$this->db->like('gmsemestre.GMSEM_CODE_APOGEE', $this->input->post('apogee'));
			}	
			if(!empty($annee))
			{
				$this->db->like('GMSEM_ANNEE', $this->input->post('annee'));
			}
			if($formation != 'aucun')
			{
				$this->db->like('gmformation.GMFO_CODE', $this->input->post('formation'));
			}
			$this->db->join('gmformation','gmsemestre.GMFO_CODE = gmformation.GMFO_CODE','left')
				->order_by("GMSEM_ANNEE", "DESC");

			$query = $this->db->get();

			//echo var_dump($query->result());
			return $query->result();
		}


		public function getSemestreById($id)
		{
			$this->db->select('*')
						->from('gmsemestre')
						->where('gmsemestre.GMSEM_CODE', $id)
						->join('gmformation', 'gmsemestre.GMFO_CODE = gmformation.GMFO_CODE','left');

			$query = $this->db->get();
			return $query->row();

		}

		public function edit_semestre()
		{
			$code = $this->input->post('GMSEM_CODE');

			$this->GMSEM_NOM = $this->input->post('GMSEM_NOM');
			$this->GMFO_CODE = $this->input->post('GMFO_CODE');
	        $this->GMSEM_ANNEE = $this->input->post('GMSEM_ANNEE');
	        $this->GMSEM_DESCRIPTION = $this->input->post('GMSEM_DESCRIPTION');
	        $this->GMSEM_CODE_APOGEE = $this->input->post('GMSEM_CODE_APOGEE');
	        $this->GMSEM_NOMBRE_HEURES_CM = $this->input->post('GMSEM_NOMBRE_HEURES_CM');
	        $this->GMSEM_NOMBRE_HEURES_TD = $this->input->post('GMSEM_NOMBRE_HEURES_TD');
	        $this->GMSEM_NOMBRE_HEURES_TP = $this->input->post('GMSEM_NOMBRE_HEURES_TP');
	        $this->GMSEM_NOMBRE_HEURES_LIBRES = $this->input->post('GMSEM_NOMBRE_HEURES_LIBRES');
	        $this->GMSEM_CREDIT_ECTS = $this->input->post('GMSEM_CREDIT_ECTS');

			$this->db->where('GMSEM_CODE', $code);
			$this->db->update('gmsemestre', $this);

		}

		public function delete_semestre($id)
	    {	
			$where = array(
							'GMSEM_CODE' => $id	
    					);

			$this->db->delete('GM_semestre_ue', $where);

			$this->db->delete('GMSemestre', $where);
		}

	
	}
?>