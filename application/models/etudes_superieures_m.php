<?php 
	Class etudes_superieures_m extends CI_Model
	{

		public function addEtudesSuperieures()
	    {	
	    	$id_etude = "GMES".rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
	    	if($this->db->select('*')->from('GMEtudesSuperieures')->where('GMEtudesSuperieures.GMES_CODE', $id_etude)->get())
	    	{
	    		$id_etude = "GMES".rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
	    	}

	    	$data = array ();
	    	if($_FILES['GMES_DIPLOME']['error'] == 0)
			{
				echo var_dump($this->upload->file_name);
    			$relative_url = 'files/diplomes/'.$this->upload->file_name;
			 	$data['GMES_CODE'] = $id_etude;
				$data['GMES_ETABLISSEMENT'] =  $this->input->post('GMES_ETABLISSEMENT');
				$data['GMES_OPTION'] = $this->input->post('GMES_OPTION');
				$data['GMES_SPECIALISATION'] =  $this->input->post('GMES_SPECIALISATION');
				$data['GMES_DATE_DE_DEBUT'] = $this->input->post('GMES_DATE_DE_DEBUT');
				$data['GMES_DATE_DE_FIN'] = $this->input->post('GMES_DATE_DE_FIN');
				$data['GMES_NOM_DU_DIPLOME'] = $this->input->post('GMES_NOM_DU_DIPLOME');
				$data['GMES_DIPLOME'] = $relative_url;
				if($_FILES['GMES_RELEVE_DE_NOTES']['error'] == 0)
				{
					$data['GMES_RELEVE_DE_NOTES'] = $this->input->post('GMES_RELEVE_DE_NOTES');
				}
				$data_bis = array(
								'GMET_CODE' =>  $this->input->post('GMET_CODE'),
								'GMES_CODE' => $id_etude 
							);
				/*$this->db->insert('GMEtudesSuperieures', $data);
				$this->db->insert('gm_etudiant_etudes_superieures', $data_bis);*/
			}
		}

		public function editEtudesSuperieures()
	    {	
			$data = array(
							'GMES_ETABLISSEMENT' =>  $this->input->post('GMES_ETABLISSEMENT'),
							'GMES_OPTION' => $this->input->post('GMES_OPTION'),
							'GMES_SPECIALISATION' =>  $this->input->post('GMES_SPECIALISATION'),
							'GMES_DATE_DE_DEBUT' => $this->input->post('GMES_DATE_DE_DEBUT'),
							'GMES_DATE_DE_FIN' => $this->input->post('GMES_DATE_DE_FIN'),
							'GMES_NOM_DU_DIPLOME' => $this->input->post('GMES_NOM_DU_DIPLOME'),
							'GMES_DIPLOME' => $this->input->post('GMES_DIPLOME'),
							'GMES_RELEVE_DE_NOTES' => $this->input->post('GMES_RELEVE_DE_NOTES')				 
    					);
			$this->db->where('GMES_CODE', $this->input->post('GMES_CODE'));
			$this->db->update('GMEtudesSuperieures', $data);
		}

		public function getAllEtudesSuperieures($val)
		{
			$where = array ('gm_etudiant_etudes_superieures.GMET_CODE' => $val);
			$value = $this->db->select('GMEtudesSuperieures.GMES_CODE, GMEtudesSuperieures.GMES_ETABLISSEMENT, GMEtudesSuperieures.GMES_OPTION, GMEtudesSuperieures.GMES_SPECIALISATION, GMEtudesSuperieures.GMES_DATE_DE_DEBUT, GMEtudesSuperieures.GMES_DATE_DE_FIN, GMEtudesSuperieures.GMES_NOM_DU_DIPLOME, GMEtudesSuperieures.GMES_DIPLOME, GMEtudesSuperieures.GMES_RELEVE_DE_NOTES')->from('GMEtudesSuperieures')->join('gm_etudiant_etudes_superieures','gm_etudiant_etudes_superieures.GMES_CODE = GMEtudesSuperieures.GMES_CODE')->where($where)->order_by('GMEtudesSuperieures.GMES_DATE_DE_FIN','DESC')->get();
			return $value->result();
		}

		public function getEtudesSuperieures()
		{
			$where = array ('GMEtudesSuperieures.GMES_CODE' => $this->input->post('GMES_CODE'));
			$value = $this->db->select('*')->from('GMEtudesSuperieures')->where($where)->get();
			return $value->row();
		}

		public function deleteEtudesSuperieures()
	    {	
			$where = array(
							'GMES_CODE' => $this->input->post('GMES_CODE')	
    					);
			$this->db->delete('gm_etudiant_etudes_superieures', $where);
			$this->db->delete('GMEtudesSuperieures', $where);
		}

	}
?>