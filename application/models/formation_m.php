<?php 
	Class formation_m extends CI_Model
	{
			public function inserer_formation()
		{
			$rand = random_string('numeric', 6);

			$this->GMFO_CODE = "GMFO".$rand;
			$this->GMFO_FORMATION = $this->input->post('GMFO_FORMATION');
			$this->GMFO_NOM = $this->input->post('GMFO_NOM');
			$this->GMFO_NIVEAU = $this->input->post('GMFO_NIVEAU');
			$this->GMFO_MENTION = $this->input->post('GMFO_MENTION');
			$this->GMFO_DOMAINE = $this->input->post('GMFO_DOMAINE');
			
			$this->db->insert('gmformation', $this);

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
									->get('gmformation')
									->result();
		}

		public function nombre_formation()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmformation'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}

		// Pour la liste des matières avec la pagination

		public function getByPageFormation($num_page,$number_formation_page)
		{
			if($num_page>0 and $number_formation_page>=0)
			{
				if($number_formation_page==0)
				{
					$number_formation_page=1;
				}

				if($number_formation_page==1)
				{
					$min = ($num_page+$number_formation_page)-$num_page-1;
				}

				else
				{
					$min = ($num_page+$number_formation_page)-$num_page;
				}
			
				$value = $this->db->distinct()->select("GMFO_CODE, GMFO_MENTION, GMFO_DOMAINE,GMFO_NIVEAU,GMFO_FORMATION")
												->from('gmformation')
												->order_by("GMFO_FORMATION", "ASC");

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

		public function recherche_formation()
		{
			//echo var_dump($this->input->post());
			$niveau = $this->input->post('niveau');
			$formation = $this->input->post('formation');

			$this->db->distinct()->select("GMFO_CODE, GMFO_MENTION, GMFO_DOMAINE,GMFO_NIVEAU,GMFO_FORMATION")
				->from('gmformation');
			if(!empty($formation))
			{
				$this->db->like('gmformation.GMFO_FORMATION', $this->input->post('formation'));
			}
			if(!empty($niveau))
			{
				$this->db->like('gmformation.GMFO_NIVEAU', $this->input->post('niveau'));
			}
			$this->db->order_by("GMFO_FORMATION", "ASC");

			$query = $this->db->get();

			//echo var_dump($query->result());
			return $query->result();
		}


		public function getFormationById($id)
		{
			$this->db->select('*')
						->from('gmformation')
						->where('gmformation.GMFO_CODE', $id);

			$query = $this->db->get();
			return $query->row();

		}

		public function edit_formation()
		{
			$code = $this->input->post('GMFO_CODE');

			$this->GMFO_FORMATION = $this->input->post('GMFO_FORMATION');
			$this->GMFO_NOM = $this->input->post('GMFO_NOM');
			$this->GMFO_NIVEAU = $this->input->post('GMFO_NIVEAU');
			$this->GMFO_MENTION = $this->input->post('GMFO_MENTION');
			$this->GMFO_DOMAINE = $this->input->post('GMFO_DOMAINE');

			$this->db->where('GMFO_CODE', $code);
			$this->db->update('gmformation', $this);

		}

		public function delete_formation($id)
	    {	
			$where = array(
							'GMFO_CODE' => $id	
    					);

			$this->db->delete('GM_promotion', $where);

			$this->db->delete('GMFormation', $where);
		}
	
	}
?>