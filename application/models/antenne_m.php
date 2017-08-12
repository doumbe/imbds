<?php 
	Class antenne_m extends CI_Model
	{

		public function inserer_antenne()
		{
			$rand = random_string('numeric', 5);

			$this->GMANT_CODE = "GMANT".$rand;
			$this->GMANT_VILLE = $this->input->post('GMANT_VILLE');
	        $this->GMANT_PAYS = $this->input->post('GMANT_PAYS');

	        // penser a faire un test genre si le pays est vide, mettre france par defau par exemple.

	        $this->db->insert('gmantenne', $this);

		}

		public function getAllAntenne()
		{
			return $this->db->select("*")
							->order_by('GMANT_VILLE')
							->get('gmantenne')
							->result();
		}

		public function nombre_antenne()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmantenne'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}

		// Pour la liste des matières avec la pagination

		public function getByPageAntenne($num_page,$number_antenne_page)
		{
			if($num_page>0 and $number_antenne_page>=0)
			{
				if($number_antenne_page==0)
				{
					$number_antenne_page=1;
				}

				if($number_antenne_page==1)
				{
					$min = ($num_page+$number_antenne_page)-$num_page-1;
				}

				else
				{
					$min = ($num_page+$number_antenne_page)-$num_page;
				}
			
				$value = $this->db->distinct()->select('*')
												->from('gmantenne')
												->order_by("GMANT_PAYS, GMANT_VILLE", "ASC");

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

		public function recherche_antenne()
		{
			//echo var_dump($this->input->post());
			$pays = $this->input->post('pays');
			$ville = $this->input->post('ville');

			$this->db->distinct()->select('*')
				->from('GMAntenne');
			if(!empty($pays))
			{
				$this->db->like('gmantenne.GMANT_PAYS', $this->input->post('pays'));
			}
			if(!empty($ville))
			{
				$this->db->like('gmantenne.GMANT_VILLE', $this->input->post('ville'));
			}
			$this->db->order_by("GMANT_PAYS, GMANT_VILLE", "ASC");

			$query = $this->db->get();

			//echo var_dump($query->result());
			return $query->result();
		}


		public function getAntenneById($id)
		{
			$this->db->select('*')
						->from('gmantenne')
						->where('gmantenne.GMANT_CODE', $id);

			$query = $this->db->get();
			return $query->row();

		}

		public function edit_antenne()
		{
			$code = $this->input->post('GMANT_CODE');

			$this->GMANT_VILLE = $this->input->post('GMANT_VILLE');
	        $this->GMANT_PAYS = $this->input->post('GMANT_PAYS');

			$this->db->where('GMANT_CODE', $code);
			$this->db->update('gmantenne', $this);

		}

		public function delete_antenne($id)
	    {	
			$where = array(
							'GMANT_CODE' => $id	
    					);

			$this->db->delete('GM_promotion', $where);

			$this->db->delete('GMAntenne', $where);
		}
	
	}
?>