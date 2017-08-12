<?php 
	Class intervenant_m extends CI_Model
	{
		public function inserer_intervenant()
		{
			$rand = random_string('numeric', 6);
			$code = "GMIN".$rand;

			$this->GMIN_CODE = $code;
	        $this->GMIN_NOM = $this->input->post('GMIN_NOM');
	        $this->GMIN_PRENOM = $this->input->post('GMIN_PRENOM');
	        $this->GMIN_EMAIL = $this->input->post('GMIN_EMAIL');
	        $this->GMIN_TEL = $this->input->post('GMIN_TEL');
	        $this->GMIN_TEL_PRO = $this->input->post('GMIN_TEL_PRO');
	        $this->GMIN_FAX = $this->input->post('GMIN_FAX');
	        $this->GMIN_ADRESSE = $this->input->post('GMIN_ADRESSE');
	        $this->GMIN_CODE_POSTAL = $this->input->post('GMIN_CODE_POSTAL');
	        $this->GMIN_VILLE = $this->input->post('GMANT_VILLE');
	        $this->GMIN_PAYS = $this->input->post('GMIN_PAYS');
	        $this->GMIN_DERNIER_DIPLOME = $this->input->post('GMIN_DERNIER_DIPLOME');
	        $this->GMIN_STATUT = $this->input->post('GMIN_STATUT');
	        $this->GMIN_PROFESSION = $this->input->post('GMIN_PROFESSION');
	        $this->GMIN_LIEU_TRAVAIL = $this->input->post('GMIN_LIEU_TRAVAIL');
	        
	        $this->db->insert('gmintervenant', $this);

	        $data = array('GMANT_CODE' => $this->input->post('GMANT_CODE'),
	        			'GMIN_CODE' => $code,
	        			'GMIA_ANNEE' => $this->input->post('GMIA_ANNEE')
	        			);
	        $this->db->insert('gm_intervenant_appartenance_antenne', $data);
		}

		public function edit_intervenant()
		{
			$code = $this->input->post('GMIN_CODE');

			$this->GMIN_CODE = $code;
			$this->GMIN_NOM = $this->input->post('GMIN_NOM');
			$this->GMIN_PRENOM = $this->input->post('GMIN_PRENOM');
			$this->GMIN_EMAIL = $this->input->post('GMIN_EMAIL');
			$this->GMIN_TEL = $this->input->post('GMIN_TEL');
			$this->GMIN_TEL_PRO = $this->input->post('GMIN_TEL_PRO');
			$this->GMIN_FAX = $this->input->post('GMIN_FAX');
			$this->GMIN_ADRESSE = $this->input->post('GMIN_ADRESSE');
			$this->GMIN_CODE_POSTAL = $this->input->post('GMIN_CODE_POSTAL');
			$this->GMIN_VILLE = $this->input->post('GMIN_VILLE');
			$this->GMIN_PAYS = $this->input->post('GMIN_PAYS');
			$this->GMIN_STATUT = $this->input->post('GMIN_STATUT');
			$this->GMIN_PROFESSION = $this->input->post('GMIN_PROFESSION');
			$this->GMIN_LIEU_TRAVAIL = $this->input->post('GMIN_LIEU_TRAVAIL');
			

			$this->db->where('GMIN_CODE', $code);
			$this->db->update('gmintervenant', $this);

			$data = array(
						'GMANT_CODE' => $this->input->post('GMANT_CODE'),
						'GMIA_ANNEE' => $this->input->post('GMIA_ANNEE')
						);

			$this->db->where('GMIN_CODE',$code);
			$this->db->update('gm_intervenant_appartenance_antenne',$data);

		}

		public function getIntervenant()
		{
			return $this->db->select("GMIN_CODE, CONCAT(GMIN_NOM, ' ',GMIN_PRENOM) AS intervenant", false)
							->get('gmintervenant')
							->result();
		}


		public function get_intervenant($id)
		{
			$intervenant = $this->db->get_where('GMIntervenant', array('GMIN_CODE' => $id));
			$row = $intervenant->row();
			return $row ;
		}

		public function getIntervenantById($id)
		{
			$intervenant = $this->db->select('gmintervenant.GMIN_CODE,GMIN_NOM,GMIN_PRENOM,GMIN_EMAIL,GMIN_TEL,GMIN_TEL_PRO,GMIN_FAX,GMIN_ADRESSE,GMIN_CODE_POSTAL,GMIN_VILLE,GMIN_PAYS,GMIN_DERNIER_DIPLOME,GMIN_STATUT,GMIN_PROFESSION,GMIN_LIEU_TRAVAIL,GMANT_VILLE,GMIA_ANNEE,GMANT_PAYS')
				->from('gmintervenant')
				->where('gmintervenant.GMIN_CODE', $id)
				->join('gm_intervenant_appartenance_antenne','gmintervenant.GMIN_CODE = gm_intervenant_appartenance_antenne.GMIN_CODE','left')
				->join('gmantenne','gm_intervenant_appartenance_antenne.GMANT_CODE = gmantenne.GMANT_CODE','left');

			$query = $this->db->get();
			return $query->row();
		}	

		public function recherche_intervenant()
		{
			//echo var_dump($this->input->post());
			$nom = $this->input->post('nom');
			$annee = $this->input->post('annee');
			$statut = $this->input->post('statut');
			$antenne = $this->input->post('antennes');

			//echo "nom : ".empty($nom);
			//echo "annee : ".empty($annee);
			$this->db->select("gmintervenant.GMIN_CODE, GMIN_NOM, GMIN_PRENOM, GMIN_PROFESSION,GMIN_STATUT,gmantenne.GMANT_CODE")
				->from('gmintervenant');
			if(!empty($nom))
			{
				$this->db->like('GMIN_NOM', $this->input->post('nom'));
			}
			if(!empty($annee))
			{
				$this->db->like('GMIA_ANNEE', $this->input->post('annee'));
			}
			if($statut != 'aucun')
			{
				$this->db->like('GMIN_STATUT', $this->input->post('statut'));
			}
			if($antenne != 'aucun')
			{
				$this->db->like('gmantenne.GMANT_CODE', $this->input->post('antennes'));
			}	
			$this->db->join('gm_intervenant_appartenance_antenne','gmintervenant.GMIN_CODE = gm_intervenant_appartenance_antenne.GMIN_CODE')
				->join('gmantenne','gm_intervenant_appartenance_antenne.GMANT_CODE = gmantenne.GMANT_CODE')
				->order_by('GMIN_NOM','asc');

			$query = $this->db->get();

			//echo var_dump($query->result());
			return $query->result();
		}


		public function getStatutIntervenant()
		{
			return $this->db->distinct("GMIN_STATUT")
					->get('gmintervenant');

		}

		public function getStatutDunIntervenant($gmin_code)
		{
			$this->db->select('GMIN_CODE, GMIN_STATUT')
				->from('gmintervenant')
				->where('GMIN_CODE', $gmin_code);

			$query = $this->db->get();
			return $query->row();
		}

		// methode pour avoir le nom et le prenom d'un intervenant pour la matiere (dropdown)
		public function getAllIntervenants()
		{
			$this->db->select("GMIN_CODE, CONCAT(GMIN_NOM,' ',GMIN_PRENOM) AS intervenant",false)
				->from('gmintervenant')
				->order_by("GMIN_NOM", "asc");

			$query = $this->db->get();
			return $query->result();
		}



		public function nombreIntervenant()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmintervenant'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}


		public function getByPageIntervenant($num_page,$number_intervenant_page)
		{
			if($num_page>0 and $number_intervenant_page>=0)
			{
				if($number_intervenant_page==0)
				{
					$number_intervenant_page=1;
				}

				if($number_intervenant_page==1)
				{
					$min = ($num_page+$number_intervenant_page)-$num_page-1;
				}

				else
				{
					$min = ($num_page+$number_intervenant_page)-$num_page;
				}
			
				$value = $this->db->distinct()->select('GMIN_CODE,GMIN_NOM,GMIN_PRENOM,GMIN_PROFESSION,GMIN_STATUT')
									->from('gmintervenant')
									->order_by('GMIN_NOM', 'ASC');

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


		public function delete_intervenant($id)
		{
			$where = array('GMIN_CODE' => $id);
			$wheres = array('gm_intervenant_appartenance_antenne.GMIN_CODE' => $id);
			$this->db->delete('gm_intervenant_appartenance_antenne',$wheres);
			$this->db->delete('gmintervenant', $where);
		}	


		public function getAntenneDunIntervenant($gmin_code)
		{
			$this->db->select('gmantenne.GMANT_CODE, GMANT_VILLE')
					->from('gmantenne')
					->where('gm_intervenant_appartenance_antenne.GMIN_CODE', $gmin_code)
					->join('gm_intervenant_appartenance_antenne','gmantenne.GMANT_CODE = gm_intervenant_appartenance_antenne.GMANT_CODE');
			$query = $this->db->get();
			return $query->row();
		}

		public function getAnneeAntenneDunIntervenant($gmin_code)
		{

			$this->db->select('GMIA_ANNEE')
					->from('gm_intervenant_appartenance_antenne')
					->where('gm_intervenant_appartenance_antenne.GMIN_CODE', $gmin_code);
					
			$query = $this->db->get();
			return $query->row();
		}
	}
?>