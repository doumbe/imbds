<?php 
	Class entreprise_m extends CI_Model
	{

		public function inserer_entreprise()
		{
			$rand = random_string('numeric', 6);

			$this->GMEN_CODE = "GMEN".$rand;
	        $this->GMEN_NOM = $this->input->post('GMEN_NOM');
	        $this->GMEN_SIEGE = $this->input->post('GMEN_SIEGE');
	        $this->GMEN_DIRECTEUR = $this->input->post('GMEN_DIRECTEUR');
	        $this->GMEN_TEL_PORTABLE = $this->input->post('GMEN_TEL_PORTABLE');
	        $this->GMEN_TEL_FIXE = $this->input->post('GMEN_TEL_FIXE');
	        $this->GMEN_FAX = $this->input->post('GMEN_FAX');
	        $this->GMEN_EMAIL = $this->input->post('GMEN_EMAIL');
	        $this->GMEN_SITE_WEB = $this->input->post('GMEN_SITE_WEB');
	        $this->GMEN_ADRESSE = $this->input->post('GMEN_ADRESSE');
	        $this->GMEN_CODE_POSTAL = $this->input->post('GMEN_CODE_POSTAL');
	        $this->GMEN_VILLE = $this->input->post('GMEN_VILLE');
	        $this->GMEN_PAYS = $this->input->post('GMEN_PAYS');
	        $this->GMEN_EFFECTIF = $this->input->post('GMEN_EFFECTIF');
	        $this->GMEN_SECTEUR_ACTIVITE = $this->input->post('GMEN_SECTEUR');
	        $this->GMEN_CHIFFRE_AFFAIRE = $this->input->post('GMEN_CHIFFRE_AFFAIRE');
	       

	        $this->db->insert('gmentreprise', $this);

		}

		public function edit_entreprise()
		{
			$code = $this->input->post('GMEN_CODE');

			$this->GMEN_NOM = $this->input->post('GMEN_NOM');
			$this->GMEN_SIEGE = $this->input->post('GMEN_SIEGE');
			$this->GMEN_DIRECTEUR = $this->input->post('GMEN_DIRECTEUR');
			$this->GMEN_TEL_PORTABLE = $this->input->post('GMEN_TEL_PORTABLE');
			$this->GMEN_TEL_FIXE = $this->input->post('GMEN_TEL_FIXE');
			$this->GMEN_FAX = $this->input->post('GMEN_FAX');
			$this->GMEN_EMAIL = $this->input->post('GMEN_EMAIL');
			$this->GMEN_SITE_WEB = $this->input->post('GMEN_SITE_WEB');
			$this->GMEN_ADRESSE = $this->input->post('GMEN_ADRESSE');
			$this->GMEN_CODE_POSTAL = $this->input->post('GMEN_CODE_POSTAL');
			$this->GMEN_VILLE = $this->input->post('GMEN_VILLE');
			$this->GMEN_PAYS = $this->input->post('GMEN_PAYS');

			$this->db->where('GMEN_CODE', $code);
			$this->db->update('gmentreprise', $this);

		}

		public function getEntreprise()
		{
			return $this->db->select("GMEN_NOM, GMEN_SECTEUR_ACTIVITE, GMEN_EFFECTIF, GMEN_CHIFFRE_AFFAIRE, GMEN_SITE_WEB, GMEN_VILLE")
							->order_by("GMEN_NOM", "asc")
							->get('gmentreprise');

		}

		// methodes pour entreprise liste

		public function getAllEntreprises()
		{
			$this->db->select("GMEN_CODE, GMEN_NOM, GMEN_VILLE, GMEN_PAYS")
				->from('gmentreprise')
				->where_not_in('GMEN_CODE', 'GMEN455572')
				->order_by("GMEN_NOM", "asc");
			$query = $this->db->get();
			return $query->result();
		}

		// les informations sur une seule entreprise pour la modification et la fiche.
		public function getEntrepriseById($id)
		{
			$entreprise = $this->db->get_where('GMEntreprise', array('GMEN_CODE' =>$id));
			$row = $entreprise->row();
			return $row;
			/*$this->db->select('*')
				->from('gmentreprise')
				->where('GMEN_CODE', $id);

			$query = $this->db->get();
			return $query->row();*/
		}

		public function getEntrepriseDunContact($gmcon_code)
		{
			$this->db->select('gmentreprise.GMEN_CODE,GMEN_NOM')
				->from('gmentreprise')
				->where('gm_contact_entreprise.GMCON_CODE', $gmcon_code)
				->join('gm_contact_entreprise','gmentreprise.GMEN_CODE = gm_contact_entreprise.GMEN_CODE');
			$query = $this->db->get();
			return $query->row();
		}

		public function recherche_entreprise()
		{
			//echo var_dump($this->input->post());
			$entreprise = $this->input->post('entreprise');
			$pays = $this->input->post('pays');
			$ville = $this->input->post('ville');

			$this->db->distinct()->select("GMEN_CODE, GMEN_NOM, GMEN_VILLE, GMEN_PAYS")
						->from('gmentreprise');
			if(!empty($ville))
			{
				$this->db->like('GMEN_VILLE', $this->input->post('ville'));
			}
			if(!empty($pays))
			{
				$this->db->like('GMEN_PAYS', $this->input->post('pays'));
			}
			if(!empty($entreprise))
			{
				$this->db->like('GMEN_NOM', $this->input->post('entreprise'));
			}	
			$this->db->order_by("GMEN_NOM", "asc");

			$query = $this->db->get();
			return $query->result();
		}

		public function getByPageEntreprise($num_page,$number_entreprise_page)
		{
			if($num_page>0 and $number_entreprise_page>=0)
			{
				if($number_entreprise_page==0)
				{
					$number_entreprise_page=1;
				}

				if($number_entreprise_page==1)
				{
					$min = ($num_page+$number_entreprise_page)-$num_page-1;
				}

				else
				{
					$min = ($num_page+$number_entreprise_page)-$num_page;
				}
			
				$value = $this->db->distinct()->select("GMEN_NOM, GMEN_SECTEUR_ACTIVITE, GMEN_EFFECTIF, GMEN_CHIFFRE_DAFFAIRE, GMEN_SITE_WEB, GMEN_VILLE")
											->from('gmentreprise')
											->where_not_in('GMEN_CODE', 'GMEN963852')
											->order_by("GMEN_NOM", "asc");

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

		// pour la pagination

		public function nombreEntreprise()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmentreprise'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}	

		public function delete_entreprise($id)
		{	
			// on dit que l'id de l'entreprise est maintenant celui de AUCUN
			// on MAJ losque on efface l'entreprise pour que le contact qui travaillait 
			// dans cette entreprise soit en mode Entreprise AUCUN. 
			
			$this->GMEN_CODE = 'GMEN963852';

			$this->db->where('gm_contact_entreprise.GMEN_CODE', $id);
			$this->db->update('gm_contact_entreprise', $this);

			$where = array('GMEN_CODE' => $id);
			$wheres = array('gm_contact_entreprise.GMEN_CODE' => $id);

			$this->db->delete('gm_contact_entreprise', $wheres);
			$this->db->delete('gmentreprise', $where);
		}

	}
?>