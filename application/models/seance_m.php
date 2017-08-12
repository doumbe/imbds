<?php 
	//header('Content-Type: text/html; charset=UTF-8');
	Class seance_m extends CI_Model
	{

		public function inserer_seance()
		{
			// on génère un nombre aleatoire de 5 chiffres
			$rand = random_string('numeric', 5);
			$code = "GMSEA".$rand;


			setlocale(LC_CTYPE, "french");
			setlocale(LC_TIME, "french");
			

			$this->GMSEA_CODE = $code;
			$this->GMSEA_TYPE = $this->input->post('GMSEA_TYPE');
			$this->GMSEA_DATE = $this->input->post('GMSEA_DATE');
			$this->GMSEA_JOUR = strftime("%A", strtotime($this->input->post('GMSEA_DATE'))) ;
			$this->GMSEA_HEURE_DEBUT = $this->input->post('GMSEA_HEURE_DEBUT');
			$this->GMSEA_HEURE_FIN = $this->input->post('GMSEA_HEURE_FIN');
			$this->GMSEA_STATUT = $this->input->post('GMSEA_STATUT');
			$this->GMPL_CODE = $this->input->post('GMPL_CODE');
			$this->GMSA_CODE= $this->input->post('GMSA_CODE');
			$this->GMCO_CODE = $this->input->post('GMCO_CODE');
			$this->GMSEA_INFOS_COMPLEMENTAIRES = $this->input->post('GMSEA_INFOS_COMPLEMENTAIRES');
			$this->db->insert('gmseance', $this);
		}

		public function nombre_seance()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gmseance'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}

		public function getSeance()
		{
			return $this->db->select("GMSEA_CODE, GMSEA_DATE, GMSEA_HEURE_DEBUT, GMSEA_HEURE_FIN")
					->get('gmseance')
					->result();
		}

		// Pour la liste des matières avec la pagination

		public function getByPageSeance($num_page,$number_seance_page)
		{
			if($num_page>0 and $number_seance_page>=0)
			{
				if($number_seance_page==0)
				{
					$number_seance_page=1;
				}

				if($number_seance_page==1)
				{
					$min = ($num_page+$number_seance_page)-$num_page-1;
				}

				else
				{
					$min = ($num_page+$number_seance_page)-$num_page;
				}
			
				//var_dump($this->input->post());
				$value = $this->db->distinct()->select("GMSEA_CODE, gmseance.GMSA_CODE, gmseance.GMCO_CODE, gmseance.GMPL_CODE, gmplanning.GMANT_CODE, GMPL_NOM, GMANT_VILLE, GMCO_NOM,  GMMA_CODE_APOGEE, GMSA_NOM, GMSEA_TYPE, GMSEA_DATE, GMSEA_JOUR, GMSEA_HEURE_FIN, GMSEA_HEURE_DEBUT, GMSEA_STATUT, GMSEA_INFOS_COMPLEMENTAIRES")
												->from('gmseance')
												->like('gmplanning.GMPL_CODE', $this->input->post('planning'))
												->join('gmplanning','gmseance.GMPL_CODE = gmplanning.GMPL_CODE','left')
												->join('gmantenne','gmplanning.GMANT_CODE = gmantenne.GMANT_CODE','left')
												->join('gmsalle','gmseance.GMSA_CODE = gmsalle.GMSA_CODE','left')
												->join('gmcours','gmseance.GMCO_CODE = gmcours.GMCO_CODE','left')
												->join('gmmatiere','gmcours.GMMA_CODE = gmmatiere.GMMA_CODE','left')
												->order_by("GMSEA_DATE", "DESC");

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

		public function recherche_seance_par_cours()
		{
			 $this->db->distinct()->select("GMSEA_CODE, gmseance.GMSA_CODE, gmseance.GMCO_CODE, gmseance.GMPL_CODE, gmplanning.GMANT_CODE, GMPL_NOM, GMANT_VILLE, GMCO_NOM,  GMMA_CODE_APOGEE, GMSA_NOM, GMSEA_TYPE, GMSEA_DATE, GMSEA_JOUR, GMSEA_HEURE_FIN, GMSEA_HEURE_DEBUT, GMSEA_STATUT, GMSEA_INFOS_COMPLEMENTAIRES")
				->from('gmseance')
				->like('gmplanning.GMPL_CODE', $this->input->post('selected_planning'))
				->like('gmcours.GMCO_NOM', $this->input->post('cours'))
				->join('gmplanning','gmseance.GMPL_CODE = gmplanning.GMPL_CODE','left')
				->join('gmantenne','gmplanning.GMANT_CODE = gmantenne.GMANT_CODE','left')
				->join('gmsalle','gmseance.GMSA_CODE = gmsalle.GMSA_CODE','left')
				->join('gmcours','gmseance.GMCO_CODE = gmcours.GMCO_CODE','left')
				->join('gmmatiere','gmcours.GMMA_CODE = gmmatiere.GMMA_CODE','left')
				->order_by("GMSEA_DATE", "DESC");
				
			$query = $this->db->get();
			return $query->result();
		}

		public function getSeanceById($id)
		{
			$this->db->select("GMSEA_CODE, gmseance.GMSA_CODE, gmseance.GMCO_CODE, gmseance.GMPL_CODE, gmplanning.GMANT_CODE, GMPL_NOM, GMANT_VILLE, GMCO_NOM,  GMMA_NOM, GMSA_NOM, GMSEA_TYPE, GMSEA_DATE, GMSEA_JOUR, GMSEA_HEURE_FIN, GMSEA_HEURE_DEBUT, GMSEA_STATUT, GMSEA_INFOS_COMPLEMENTAIRES, CONCAT(GMIN_PRENOM,' ', GMIN_NOM) AS intervenant",false)
						->from('gmseance')
						->where('gmseance.GMSEA_CODE', $id)
						->join('gmplanning','gmseance.GMPL_CODE = gmplanning.GMPL_CODE','left')
						->join('gmantenne','gmplanning.GMANT_CODE = gmantenne.GMANT_CODE','left')
						->join('gmsalle','gmseance.GMSA_CODE = gmsalle.GMSA_CODE','left')
						->join('gmcours','gmseance.GMCO_CODE = gmcours.GMCO_CODE','left')
						->join('gmmatiere','gmcours.GMMA_CODE = gmmatiere.GMMA_CODE','left')
						->join('gm_cours_intervenant', 'gmseance.GMCO_CODE = gm_cours_intervenant.GMCO_CODE','left')
						->join('gmintervenant', 'gm_cours_intervenant.GMIN_CODE = gmintervenant.GMIN_CODE','left');

			$query = $this->db->get();
			return $query->row();

		}

		public function edit_seance()
		{
			$code = $this->input->post('GMSEA_CODE');

			setlocale(LC_CTYPE, "french");
			setlocale(LC_TIME, "french");

			$this->GMSEA_TYPE = $this->input->post('GMSEA_TYPE');
			$this->GMSEA_DATE = $this->input->post('GMSEA_DATE');
			$this->GMSEA_JOUR = strftime("%A", strtotime($this->input->post('GMSEA_DATE'))) ;
			$this->GMSEA_HEURE_DEBUT = $this->input->post('GMSEA_HEURE_DEBUT');
			$this->GMSEA_HEURE_FIN = $this->input->post('GMSEA_HEURE_FIN');
			$this->GMSEA_STATUT = $this->input->post('GMSEA_STATUT');
			$this->GMPL_CODE = $this->input->post('GMPL_CODE');
			$this->GMSA_CODE= $this->input->post('GMSA_CODE');
			$this->GMCO_CODE = $this->input->post('GMCO_CODE');
			$this->GMSEA_INFOS_COMPLEMENTAIRES = $this->input->post('GMSEA_INFOS_COMPLEMENTAIRES');

			$this->db->where('GMSEA_CODE', $code);
			$this->db->update('gmseance', $this);

		}

		public function delete_seance($id)
	    {	
			$where = array(
							'GMSEA_CODE' => $id	
    					);


			$this->db->delete('GMSeance', $where);
		}



		public function get_etudiant_by_seance() // renvoie les etudiants participants a une seance dans une matiere.
		{
			$where = array('GM_presence.GMSEA_CODE' => $this->input->post('seance'), 'gmseance.GMCO_CODE' => $this->input->post('cours'));

			$etudiant = $this->db->select("GMEtudiant.GMET_CODE, GMEtudiant.GMET_NOM, GMEtudiant.GMET_PRENOM, GM_presence.GMPRE_STATUT",false)
				->from('GM_presence')
				->join('GMEtudiant', 'GMEtudiant.GMET_CODE = GM_presence.GMET_CODE', 'left outer')
				->join('gmseance', 'gmseance.GMSEA_CODE = GM_presence.GMSEA_CODE', 'left outer')
				->join('gmcours', 'gmcours.GMCO_CODE = gmseance.GMCO_CODE', 'left outer')
				->where($where)
				->group_by(array("GMET_NOM", "GMET_PRENOM", "GMPRE_STATUT"))
				->get()->result();
			

			return $etudiant;

		}
	
	
	}
?>