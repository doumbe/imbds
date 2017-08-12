<?php 
	Class parametre_m extends CI_Model
	{
		
		public function inserer_parametre()
		{
			$rand = random_string('numeric', 2);

			$this->GMPARA_CODE = "GMPARA".str_split(date('Y'),2)[1].$rand;
			$this->GMPARA_NOM = $this->input->post('GMPARA_NOM');
			$this->GMPARA_VALEUR = $this->input->post('GMPARA_VALEUR');
			$this->GMPARA_DESCRIPTION = $this->input->post('GMPARA_DESCRIPTION');
			$this->GMPARA_ANNEE = $this->input->post('GMPARA_ANNEE');

			$this->db->insert('GMParametres', $this);
		}

		public function getAllParameters()
		{
			return $this->db->select("*")
							->get('GMParametres')
							->result();
		}

		public function nombre_parameter()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM GMParametres'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}


		public function getByPageParameter($num_page,$number_parametre_page)
		{
			if($num_page>0 and $number_parametre_page>=0)
			{
				if($number_parametre_page==0)
				{
					$number_parametre_page=1;
				}

				if($number_parametre_page==1)
				{
					$min = ($num_page+$number_parametre_page)-$num_page-1;
				}

				else
				{
					$min = ($num_page+$number_parametre_page)-$num_page;
				}
			
				$value = $this->db->distinct()->select('*')
												->from('GMParametres')
												->order_by("GMPARA_ANNEE", "DESC");

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

		public function recherche_parameter()
		{
			//echo var_dump($this->input->post());
			$nom = $this->input->post('nom');
			$annee = $this->input->post('annee');

			$this->db->distinct()->select('*')
				->from('GMParametres');
			if(!empty($nom))
			{
				$this->db->like('GMPARA_NOM', $this->input->post('nom'));
			}
			if(!empty($annee))
			{
				$this->db->like('GMPARA_ANNEE', $this->input->post('annee'));
			}
			$this->db->order_by("GMPARA_ANNEE", "DESC");

			$query = $this->db->get();

			//echo var_dump($query->result());
			return $query->result();
		}


		public function getParameterById($id)
		{
			$this->db->select('*')
						->from('GMParametres')
						->where('GMPARA_CODE', $id);

			$query = $this->db->get();
			return $query->row();

		}

		public function edit_parameter()
		{
			$code = $this->input->post('GMPARA_CODE');

	        $this->GMPARA_NOM = $this->input->post('GMPARA_NOM');
			$this->GMPARA_VALEUR = $this->input->post('GMPARA_VALEUR');
			$this->GMPARA_DESCRIPTION = $this->input->post('GMPARA_DESCRIPTION');
			$this->GMPARA_ANNEE = $this->input->post('GMPARA_ANNEE');

			$this->db->where('GMPARA_CODE', $code);
			$this->db->update('GMParametres', $this);

		}

		public function delete_parameter($id)
	    {	
			$where = array(
							'GMPARA_CODE' => $id	
    					);

			$this->db->delete('GMParametres', $where);
		}

	}
?>