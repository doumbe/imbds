<?php 
	Class ue_m extends CI_Model
	{

		public function inserer_ue()
		{
			$rand = random_string('numeric', 6);

			$code = "GMUE".$rand;
			$this->GMUE_CODE = $code;
			$this->GMUE_NOM = $this->input->post('GMUE_NOM');
	        $this->GMUE_DESCRIPTION = $this->input->post('GMUE_DESCRIPTION');
	        $this->GMUE_COORDINATEUR1 = $this->input->post('GMUE_COORDINATEUR1');
	        $this->GMUE_COORDINATEUR2 = $this->input->post('GMUE_COORDINATEUR2');
	        $this->GMUE_NOMBRE_HEURES_CM = $this->input->post('GMUE_NOMBRE_HEURES_CM');
	        $this->GMUE_NOMBRE_HEURES_TD = $this->input->post('GMUE_NOMBRE_HEURES_TD');
	        $this->GMUE_NOMBRE_HEURES_TP = $this->input->post('GMUE_NOMBRE_HEURES_TP');
	        $this->GMUE_NOMBRE_HEURES_LIBRES = $this->input->post('GMUE_NOMBRE_HEURES_LIBRES');
	        $this->GMUE_CREDIT_ECTS = $this->input->post('GMUE_CREDIT_ECTS');
	        $this->GMUE_CODE_APOGEE = $this->input->post('GMUE_CODE_APOGEE');
	       	
	       	// on insere les info dans la table ue
	        $this->db->insert('gmue', $this);

	        // on recupere le code de l'ue et le code du semestre
	        $data['GMUE_CODE'] = $code;
	       	$data['GMSEM_CODE'] = $this->input->post('GMSEM_CODE');

	        // on les insere dans la table semestre ue. pour qu'on puisse avoir une trace de quel semestre pour quel ue.
	        $this->db->insert('GM_SEMESTRE_UE', $data);

		}

		public function getUe()
		{
			return $this->db->distinct()->select('GMUE_CODE, GMUE_NOM')
							->get('gmue')
							->result();
		}

		public function nombre_ue()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmue'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}

		// Pour la liste des matières avec la pagination

		public function getByPageUE($num_page,$number_ue_page)
		{
			if($num_page>0 and $number_ue_page>=0)
			{
				if($number_ue_page==0)
				{
					$number_ue_page=1;
				}

				if($number_ue_page==1)
				{
					$min = ($num_page+$number_ue_page)-$num_page-1;
				}

				else
				{
					$min = ($num_page+$number_ue_page)-$num_page;
				}
			
				$value = $this->db->distinct()->select("gmue.GMUE_CODE,GMUE_DESCRIPTION,GMSEM_CODE_APOGEE, gmsemestre.GMSEM_CODE, GMUE_NOMBRE_HEURES_CM, GMUE_NOMBRE_HEURES_TD, GMUE_NOMBRE_HEURES_TP, GMUE_CREDIT_ECTS,GMUE_CODE_APOGEE")
												->from('gmue')
												->join('gm_semestre_ue','gmue.GMUE_CODE = gm_semestre_ue.GMUE_CODE','left')
												->join('gmsemestre','gm_semestre_ue.GMSEM_CODE = gmsemestre.GMSEM_CODE','left')
												->order_by("GMUE_NOM", "ASC");

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

		public function recherche_ue()
		{
			//echo var_dump($this->input->post());
			$nom = $this->input->post('nom');
			$apogee = $this->input->post('apogee');
			$annee = $this->input->post('annee');
			$semestre = $this->input->post('semestre');

			$this->db->distinct()->select("gmue.GMUE_CODE,GMUE_DESCRIPTION,GMSEM_CODE_APOGEE, gmsemestre.GMSEM_CODE, GMUE_NOMBRE_HEURES_CM, GMUE_NOMBRE_HEURES_TD, GMUE_NOMBRE_HEURES_TP, GMUE_CREDIT_ECTS,GMUE_CODE_APOGEE")
				->from('GMUE');
			if(!empty($nom))
			{
				$this->db->like('gmue.GMUE_NOM', $this->input->post('nom'));
			}
			if(!empty($apogee))
			{
				$this->db->like('gmue.GMUE_CODE_APOGEE', $this->input->post('apogee'));
			}
			if(!empty($annee))
			{
				$this->db->like('GMSEM_ANNEE', $this->input->post('annee'));
			}
			if($semestre != 'aucun')
			{
				$this->db->like('gmsemestre.GMSEM_CODE', $this->input->post('semestre'));
			}	
			$this->db->join('gm_semestre_ue','gmue.GMUE_CODE = gm_semestre_ue.GMUE_CODE','left')
				->join('gmsemestre','gm_semestre_ue.GMSEM_CODE = gmsemestre.GMSEM_CODE','left')
				->order_by("GMUE_NOM", "ASC");

			$query = $this->db->get();

			//echo var_dump($query->result());
			return $query->result();
		}



		public function getUEById($id)
		{
			$this->db->select('*')
						->from('gmue')
						->where('gmue.GMUE_CODE', $id)
						->join('gm_semestre_ue','gmue.GMUE_CODE = gm_semestre_ue.GMUE_CODE','left')
						->join('gmsemestre','gm_semestre_ue.GMSEM_CODE = gmsemestre.GMSEM_CODE','left');

			$query = $this->db->get();
			return $query->row();

		}

		public function edit_ue()
		{
			$code = $this->input->post('GMUE_CODE');

			$this->GMUE_NOM = $this->input->post('GMUE_NOM');
	        $this->GMUE_DESCRIPTION = $this->input->post('GMUE_DESCRIPTION');
	        $this->GMUE_COORDINATEUR1 = $this->input->post('GMUE_COORDINATEUR1');
	        $this->GMUE_COORDINATEUR2 = $this->input->post('GMUE_COORDINATEUR2');
	        $this->GMUE_NOMBRE_HEURES_CM = $this->input->post('GMUE_NOMBRE_HEURES_CM');
	        $this->GMUE_NOMBRE_HEURES_TD = $this->input->post('GMUE_NOMBRE_HEURES_TD');
	        $this->GMUE_NOMBRE_HEURES_TP = $this->input->post('GMUE_NOMBRE_HEURES_TP');
	        $this->GMUE_NOMBRE_HEURES_LIBRES = $this->input->post('GMUE_NOMBRE_HEURES_LIBRES');
	        $this->GMUE_CREDIT_ECTS = $this->input->post('GMUE_CREDIT_ECTS');
	        $this->GMUE_CODE_APOGEE = $this->input->post('GMUE_CODE_APOGEE');

			$this->db->where('GMUE_CODE', $code);
			$this->db->update('gmue', $this);
		}

		public function delete_ue($id)
	    {	
			$where = array(
							'GMUE_CODE' => $id	
    					);

			$this->db->delete('gm_semestre_ue', $where);	

			$this->db->delete('GMUE', $where);
		}
	
	}
?>