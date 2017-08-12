<?php 
	Class contact_m extends CI_Model
	{

		public function inserer_contact()
		{
			$rand = random_string('numeric', 5);
			$code = "GMCON".$rand;

	        $this->GMCON_CODE = $code;
	        $this->GMCON_NOM = $this->input->post('GMCON_NOM');
	        $this->GMCON_PRENOM = $this->input->post('GMCON_PRENOM');
	        $this->GMCON_EMAIL = $this->input->post('GMCON_EMAIL');
	        $this->GMCON_TEL_FIXE = $this->input->post('GMCON_TEL_FIXE');
	        $this->GMCON_TEL_PORTABLE = $this->input->post('GMCON_TEL_PORTABLE');
	        $this->GMCON_FAX = $this->input->post('GMCON_FAX');
	        $this->GMCON_ADRESSE = $this->input->post('GMCON_ADRESSE');
	        $this->GMCON_CODE_POSTAL = $this->input->post('GMCON_CODE_POSTAL');
	        $this->GMCON_VILLE = $this->input->post('GMCON_VILLE');
	        $this->GMCON_PAYS = $this->input->post('GMCON_PAYS');
	        $this->GMCON_FONCTION = $this->input->post('GMCON_FONCTION');

	        $this->db->insert('gmcontact', $this);

	        $data = array('GMEN_CODE' => $this->input->post('GMEN_CODE'),
	        			'GMCON_CODE' => $code,
	        			'GMCE_DATE_PREMIER_CONTACT' => $this->input->post('GMCE_DATE_PREMIER_CONTACT'),
	        			'GMCE_DATE_DEPART_ENTREPRISE' => $this->input->post('GMCE_DATE_DEPART_ENTREPRISE'),
	        			'GMCE_REMARQUES' => $this->input->post('GMCE_REMARQUES')
	        			);

	        $this->db->insert('gm_contact_entreprise', $data);
		}


		public function edit_Contact()
		{
			$code = $this->input->post('GMCON_CODE');
			$entreprise=$this->input->post('entreprises');


			$data_contact = array(
			'GMCON_NOM' => $this->input->post('GMCON_NOM'),
			'GMCON_PRENOM' => $this->input->post('GMCON_PRENOM'),
			'GMCON_EMAIL' => $this->input->post('GMCON_EMAIL'),
			'GMCON_TEL_FIXE' => $this->input->post('GMCON_TEL_FIXE'),
			'GMCON_TEL_PORTABLE' => $this->input->post('GMCON_TEL_PORTABLE'),
			'GMCON_FAX' => $this->input->post('GMCON_FAX'),
			'GMCON_ADRESSE' => $this->input->post('GMCON_ADRESSE'),
			'GMCON_CODE_POSTAL' => $this->input->post('GMCON_CODE_POSTAL'),
			'GMCON_VILLE' => $this->input->post('GMCON_VILLE'),
			'GMCON_PAYS' => $this->input->post('GMCON_PAYS'),
			'GMCON_FONCTION' => $this->input->post('GMCON_FONCTION')
			);
			$this->db->where('GMCON_CODE', $code);
			$this->db->update('gmcontact', $data_contact);
			
			$data = array('GMEN_CODE' => $this->input->post('GMEN_CODE'),
							'GMCE_DATE_PREMIER_CONTACT' =>$this->input->post('GMCE_DATE_PREMIER_CONTACT'),
							'GMCE_DATE_DEPART_ENTREPRISE' =>$this->input->post('GMCE_DATE_DEPART_ENTREPRISE'),
							'GMCE_REMARQUES' =>$this->input->post('GMCE_REMARQUES')
							);
			

			$this->db->where('GMCON_CODE', $code);
			$this->db->where('GMEN_CODE', $this->input->post('old_entreprise'));
			$this->db->update('gm_contact_entreprise', $data);	

		}

		public function nombreContact()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmcontact'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}

		public function getAllContacts()
		{
			$this->db->select("gmcontact.GMCON_CODE, gmcontact.GMCON_NOM, gmcontact.GMCON_PRENOM, GMEN_NOM")
					->from('gmcontact')
					->join('gm_contact_entreprise','gmcontact.GMCON_CODE = gm_contact_entreprise.GMCON_CODE','left')
					->join('gmentreprise','gm_contact_entreprise.GMEN_CODE = gmentreprise.GMEN_CODE','left')
					->order_by("GMCON_NOM", "asc");
		
			$query = $this->db->get();
			return $query->result();
		}	

		public function getContactById($id)
		{
			$where = array('gmcontact.GMCON_CODE'=>$id); 
			$query = $this->db->select('gmcontact.GMCON_CODE,GMCON_NOM,GMCON_PRENOM,GMEN_NOM,GMCON_EMAIL,GMCON_TEL_FIXE,GMCON_TEL_PORTABLE,GMCON_FAX,GMCON_ADRESSE,GMCON_CODE_POSTAL,GMCON_VILLE,GMCON_PAYS,GMCON_FONCTION,GMCE_DATE_PREMIER_CONTACT,GMCE_DATE_DEPART_ENTREPRISE,GMCE_REMARQUES')
				->from('gmcontact')
				->join('gm_contact_entreprise','gmcontact.GMCON_CODE = gm_contact_entreprise.GMCON_CODE','left')
				->join('gmentreprise','gm_contact_entreprise.GMEN_CODE = gmentreprise.GMEN_CODE','left')
				->where($where)
				->get();
			return $query->row();

		}

		// avoir tous les contacts avec la pagination  pareil que getAllContact

		public function getByPageContact($num_page,$number_contact_page)
		{
			if($num_page>0 and $number_contact_page>=0)
			{
				if($number_contact_page==0)
				{
					$number_contact_page=1;
				}

				if($number_contact_page==1)
				{
					$min = ($num_page+$number_contact_page)-$num_page-1;
				}

				else
				{
					$min = ($num_page+$number_contact_page)-$num_page;
				}
			
				$value = $this->db->distinct()->select("gmcontact.GMCON_CODE, gmcontact.GMCON_NOM, gmcontact.GMCON_PRENOM, GMEN_NOM")
												->from('gmcontact')
												->join('gm_contact_entreprise','gmcontact.GMCON_CODE = gm_contact_entreprise.GMCON_CODE','left')
												->join('gmentreprise','gm_contact_entreprise.GMEN_CODE = gmentreprise.GMEN_CODE','left')
												->order_by("GMCON_NOM", "asc");

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

	//pour avoir les contacts qui n'ont pas d'entreprise
		public function getContactSansEntreprise()
		{
			$this->db->distinct()->select("GMCON_CODE, GMCON_NOM, GMCON_PRENOM")
								->from('gmcontact')
								->where_not_in('gmcontact.GMCON_CODE', 'gm_contact_entreprise.GMCON_CODE')
								->order_by("GMCON_NOM", "asc");

			$query = $this->db->get();
			return $query->result();
		}


		public function recherche_contact()
		{
			//echo var_dump($this->input->post());
			$entreprise = $this->input->post('entreprise');
			$nom = $this->input->post('nom');

			$this->db->distinct()->select("gmcontact.GMCON_CODE, gmcontact.GMCON_NOM, gmcontact.GMCON_PRENOM, GMEN_NOM")->from('gmcontact');
			if(!empty($nom))
			{
				$this->db->like('GMCON_NOM', $this->input->post('nom'));
			}
			if($entreprise != 'aucun')
			{
				$this->db->like('gmentreprise.GMEN_CODE', $this->input->post('entreprise'));
			}	
			$this->db->join('gm_contact_entreprise','gmcontact.GMCON_CODE = gm_contact_entreprise.GMCON_CODE','left')
					->join('gmentreprise','gm_contact_entreprise.GMEN_CODE = gmentreprise.GMEN_CODE','left')
					->order_by("GMCON_NOM", "asc");

			$query = $this->db->get();
			return $query->result();
		}

		public function delete_contact($id)
		{	

			$where = array('GMCON_CODE' => $id);
			$wheres = array('gm_contact_entreprise.GMCON_CODE' => $id);
			$this->db->delete('gm_contact_entreprise', $wheres);
			$this->db->delete('gmcontact', $where);
		}



	}
?>