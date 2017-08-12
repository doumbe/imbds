<?php 
	Class planning_m extends CI_Model
	{

		public function inserer_planning()
		{
			$rand = random_string('numeric', 6);

			$this->GMPL_CODE = "GMPL".$rand;
			$this->GMANT_CODE = $this->input->post('GMANT_CODE');
			$this->GMPL_NOM = $this->input->post('GMPL_NOM');
			$this->GMPL_NOMBRE_HEURES = $this->input->post('GMPL_NOMBRE_HEURES');
			$this->GMPL_ANNEE = $this->input->post('GMPL_ANNEE');

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


		public function getAllPlanning()
		{
			return $this->db->select("GMPL_CODE, GMPL_NOM, GMPL_ANNEE")
							->order_by('GMPL_NOM')
							->get('gmplanning')
							->result();
		}

		public function getPlanningByYear()
		{
			$annee = date('Y');
			return $this->db->select("GMPL_CODE, GMPL_NOM, GMPL_ANNEE")
							->where('GMPL_ANNEE', $annee)
							->order_by('GMPL_NOM')
							->get('gmplanning')
							->result();
		}

		public function nombre_planning()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmplanning'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}

		// Pour la liste des matières avec la pagination

		public function getByPagePlanning($num_page,$number_planning_page)
		{
			if($num_page>0 and $number_planning_page>=0)
			{
				if($number_planning_page==0)
				{
					$number_planning_page=1;
				}

				if($number_planning_page==1)
				{
					$min = ($num_page+$number_planning_page)-$num_page-1;
				}

				else
				{
					$min = ($num_page+$number_planning_page)-$num_page;
				}
			
				$value = $this->db->distinct()->select("GMPL_CODE, gmplanning.GMANT_CODE, GMPL_ANNEE, GMPL_NOM, GMPL_NOMBRE_HEURES, CONCAT(GMANT_VILLE,' - ',GMANT_PAYS) AS antenne", false)
												->from('gmplanning')
												->join('gmantenne','gmplanning.GMANT_CODE = gmantenne.GMANT_CODE','left')
												->order_by("GMPL_ANNEE, GMPL_NOM", "ASC");

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

		public function recherche_planning()
		{
			//echo var_dump($this->input->post());
			$antenne = $this->input->post('antenne');
			$annee = $this->input->post('annee');

			$this->db->distinct()->select("GMPL_CODE, gmplanning.GMANT_CODE, GMPL_ANNEE, GMPL_NOM, GMPL_NOMBRE_HEURES, CONCAT(GMANT_VILLE,' - ',GMANT_PAYS) AS antenne", false)
				->from('gmplanning');
			if(!empty($annee))
			{
				$this->db->like('GMPL_ANNEE', $this->input->post('annee'));
			}
			if($antenne != 'aucun')
			{
				$this->db->like('gmplanning.GMANT_CODE', $this->input->post('antenne'));
			}	
			$this->db->join('gmantenne','gmplanning.GMANT_CODE = gmantenne.GMANT_CODE','left')
				->order_by("GMPL_ANNEE, GMPL_NOM", "ASC");

			$query = $this->db->get();
			return $query->result();
		}

		public function getPlanningById($id)
		{
			$this->db->select("GMPL_CODE, gmplanning.GMANT_CODE, GMPL_ANNEE, GMPL_NOM, GMPL_NOMBRE_HEURES, CONCAT(GMANT_VILLE,' - ',GMANT_PAYS) AS antenne", false)
						->from('gmplanning')
						->join('gmantenne','gmplanning.GMANT_CODE = gmantenne.GMANT_CODE','left')
						->where('gmplanning.GMPL_CODE', $id);

			$query = $this->db->get();
			return $query->row();

		}

		public function edit_planning()
		{
			$code = $this->input->post('GMPL_CODE');

			$this->GMPL_NOM = $this->input->post('GMPL_NOM');
			$this->GMANT_CODE = $this->input->post('GMANT_CODE');
			$this->GMPL_NOMBRE_HEURES = $this->input->post('GMPL_NOMBRE_HEURES');
	        $this->GMPL_ANNEE = $this->input->post('GMPL_ANNEE');

			$this->db->where('GMPL_CODE', $code);
			$this->db->update('gmplanning', $this);

		}

		public function delete_planning($id)
	    {	
			$where = array(
							'GMPL_CODE' => $id	
    					);

			//$this->db->delete('GM_seance', $where);

			$this->db->delete('GMPlanning', $where);
		}

	
	}
?>