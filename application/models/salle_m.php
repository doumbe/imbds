<?php 
	Class salle_m extends CI_Model
	{
		public function inserer_salle()
		{
			// on génère un nombre aleatoire de 6 chiffres
			$rand = random_string('numeric', 6);

			$this->GMSA_CODE = "GMSA".$rand;
			$this->GMSA_NOM = $this->input->post('GMSA_NOM');
			$this->GMSA_CAPACITE = $this->input->post('GMSA_CAPACITE');
			$this->GMSA_LIEU = $this->input->post('GMSA_LIEU');

			$this->db->insert('gmsalle', $this);

		}

		public function getSalle()
		{
			return $this->db->select("GMSA_CODE,CONCAT(GMSA_NOM,' ',GMSA_LIEU) AS salle", false)
							->get('gmsalle')
							->result();
		}

		public function nombre_salle()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmsalle'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}

		// Pour la liste des matières avec la pagination

		public function getByPageSalle($num_page,$number_salle_page)
		{
			if($num_page>0 and $number_salle_page>=0)
			{
				if($number_salle_page==0)
				{
					$number_salle_page=1;
				}

				if($number_salle_page==1)
				{
					$min = ($num_page+$number_salle_page)-$num_page-1;
				}

				else
				{
					$min = ($num_page+$number_salle_page)-$num_page;
				}
			
				$value = $this->db->distinct()->select('*')
												->from('gmsalle')
												->order_by("GMSA_NOM, GMSA_CAPACITE", "ASC");

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

		public function recherche_salle()
		{
			//echo var_dump($this->input->post());
			$nom = $this->input->post('nom');
			$lieu = $this->input->post('lieu');

			$this->db->distinct()->select('*')
				->from('GMSalle');
			if(!empty($nom))
			{
				$this->db->like('gmsalle.GMSA_NOM', $this->input->post('nom'));
			}
			if(!empty($lieu))
			{
				$this->db->like('gmsalle.GMSA_LIEU', $this->input->post('lieu'));
			}
			$this->db->order_by("GMSA_NOM, GMSA_CAPACITE", "ASC");

			$query = $this->db->get();

			//echo var_dump($query->result());
			return $query->result();
		}


		public function getSalleById($id)
		{
			$this->db->select('*')
						->from('gmsalle')
						->where('gmsalle.GMSA_CODE', $id);

			$query = $this->db->get();
			return $query->row();

		}

		public function edit_salle()
		{
			$code = $this->input->post('GMSA_CODE');

			$this->GMSA_NOM = $this->input->post('GMSA_NOM');
	        $this->GMSA_LIEU = $this->input->post('GMSA_LIEU');
	        $this->GMSA_CAPACITE = $this->input->post('GMSA_CAPACITE');

			$this->db->where('GMSA_CODE', $code);
			$this->db->update('gmsalle', $this);

		}

		public function delete_salle($id)
	    {	
			$where = array(
							'GMSA_CODE' => $id	
    					);

			//$this->db->delete('GM_seance', $where);

			$this->db->delete('GMSalle', $where);
		}

	
	}
?>