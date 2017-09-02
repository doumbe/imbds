<?php 
	Class etudiant_m extends CI_Model
	{
		
		public function get_etudiant($id)
		{
			$etudiant = $this->db->get_where('GMEtudiant', array('GMET_CODE' => $id));
			$row = $etudiant->row();
			return $row ;
		}

		public function get_all_etudiants()
		{
			$etudiant = $this->db->get_where('GMEtudiant', array('GMET_CODE' => $id));
			$row = $etudiant->row();
			return $row ;
		}

		public function nombre_etudiant()
		{
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM GMEtudiant');

			$etudiant_total=mysql_fetch_assoc($retour_total);

			$total = $etudiant_total['total'];

			return $total;
		}

		public function getByPage_etudiant($num_page,$number_parametre_page)
		{

			if($num_page>0 and $number_parametre_page>=0)
			{
				if($number_parametre_page == 0)
				{
					$number_parametre_page=1;
				}

				if($number_parametre_page == 1)
				{
					$min = ($num_page+$number_parametre_page)-$num_page-1;
				}
				else
				{
					$min = ($num_page+$number_parametre_page)-$num_page;
				}

				$value = $this->db->distinct()->select('*')
												->from('GMEtudiant')
												->order_by("GMET_NOM", "DESC");

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
					return $message="";
				}
			}
			else
			{
				return $message="Nombre de page ou nombre ancien page egale(s) zéro";
			}
		}

		public function getEtudiant()
		{
			return $this->db->select("GMET_CODE, CONCAT(GMET_NOM, ' ',GMET_PRENOM) AS etudiant", false)
							->get('gmetudiant')
							->result();
		}

		public function rechercheEtudiant($mot) {
			$etudiant = $this->db->like('GMET_NOM', $mot)->select('*
					')->from('gmetudiant')->join('gmdocumentattache','gmetudiant.GMET_CODE=
					gmdocumentattache.GMET_CODE')->get();
			return $etudiant->result();
		}

		
		public function updatePhoto($id)
	    {	
			$data = array();
			if($_FILES['GMET_PHOTO']['error'] == 0)
			{
    			$relative_url = '../public/images/photo_profile/'.$this->upload->file_name;
    			$data['GMET_PHOTO'] = $relative_url;
			}
			$this->db->where('GMET_CODE', $id);
			$this->db->update('GMEtudiant', $data);
		}

		public function editRemarques()
	    {	
			$data = array(
							'GMET_REMARQUES' =>  $_POST['GMET_REMARQUES']				 
    					);
			$this->db->where('GMET_CODE', $_POST['GMET_CODE']);
			$this->db->update('GMEtudiant', $data);
		}

		public function editAddress()
	    {	
			$data = array(
							'GMET_ADRESSE_FRANCE' =>  $_POST['GMET_ADRESSE_FRANCE'],
							'GMET_CODE_POSTAL' =>  $_POST['GMET_CODE_POSTAL'],
							'GMET_VILLE' =>  $_POST['GMET_VILLE'],
							'GMET_PAYS' =>  $_POST['GMET_PAYS']				 
    					);
			$this->db->where('GMET_CODE', $_POST['GMET_CODE']);
			$this->db->update('GMEtudiant', $data);
		}

		public function editMail_tel()
	    {	
			$data = array(
							'GMET_TELEPHONE_DOMICILE' =>  $_POST['GMET_TELEPHONE_DOMICILE'],
							'GMET_TELEPHONE_PORTABLE' =>  $_POST['GMET_TELEPHONE_PORTABLE'],
							'GMET_EMAIL_2' =>  $_POST['GMET_EMAIL_2']				 
    					);
			$this->db->where('GMET_CODE', $_POST['GMET_CODE']);
			$this->db->update('GMEtudiant', $data);
		}

		public function initPhoto($id,$path_photo)
	    {	
			$data = array(
    						'GMET_PHOTO' => $path_photo
						);
			$this->db->where('GMET_CODE', $id);
			$this->db->update('GMEtudiant', $data);
		}
		public function getPhotoBD($id)
		{
			$photo = $this->db->select('GMET_PHOTO')->from('GMEtudiant')->where('GMET_CODE', $id)->get()->row();
			return $photo->GMET_PHOTO;
		}


		//valider les données dans la base de données 
		public function commit($value)
		{
			$data = array(
							'GMET_CIVILITE' => $value['GMET_CIVILITE'],
							'GMET_NOM' => $value['GMET_NOM'],
							'GMET_PRENOM' =>$value['GMET_PRENOM'],
							'GMET_DATE_DE_NAISSANCE' => $value['GMET_DATE_DE_NAISSANCE'],
							'GMET_LIEU_DE_NAISSANCE' => $value['GMET_LIEU_DE_NAISSANCE'],
							'GMET_PAYS_DE_NAISSANCE' => $value['GMET_PAYS_DE_NAISSANCE'],
						    'GMET_NATIONALITE' => $value['GMET_NATIONALITE'],
							'GMET_ADRESSE_FRANCE' => $value['GMET_ADRESSE_FRANCE'],
							'GMET_CODE_POSTAL' => $value['GMET_CODE_POSTAL'],
							'GMET_VILLE' => $value['GMET_VILLE'],
							'GMET_PAYS' => $value['GMET_PAYS'],
							'GMET_TELEPHONE_DOMICILE' => $value['GMET_TELEPHONE_DOMICILE'],
							'GMET_TELEPHONE_PORTABLE' => $value['GMET_TELEPHONE_PORTABLE'],
							'GMET_EMAIL' => $value['GMET_EMAIL'],
							'GMET_EMAIL_2' => $value['GMET_EMAIL_2'],
							'GMET_DERNIER_DIPLOME' => $value['GMET_DERNIER_DIPLOME'],
							'GMET_TITRE_PROJET' => $value['GMET_TITRE_PROJET'],
							'GMET_ENTREPRISE_PROJET' => $value['GMET_ENTREPRISE_PROJET'],
							'GMET_ENTREPRISE_STAGE' => $value['GMET_ENTREPRISE_STAGE'],
							'GMET_RESP_STAGE' => $value['GMET_RESP_STAGE'],
							'GMET_NATURE_STAGE' => $value['GMET_NATURE_STAGE'],
							'GMET_PROMOTION' => $value['GMET_PROMOTION'],
							'GMET_OPTION' => $value['GMET_OPTION'],
							'GMET_SIGLE_OPTION' => $value['GMET_SIGLE_OPTION'],
							'GMET_SIGLE_DIPLOME' => $value['GMET_SIGLE_DIPLOME'],
							'GMET_REMARQUES' => $value['GMET_REMARQUES']
						);

			if (preg_match('/GMET/',$value['GMET_CODE']))
			{
				//We have an ID so we need to update this object because it is not new
				if ($this->db->update("GMEtudiant", $data, array('GMET_CODE' => $value['GMET_CODE'])))
				{
					$message="Base de données modifiée";			
				}
			} 
			else
			{
				$message="l'identifiant n'est pas valide"; 		
			}
		}
	}
?>