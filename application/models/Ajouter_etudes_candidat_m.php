<?php 
	Class Ajouter_etudes_candidat_m extends CI_Model
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
			/*	echo var_dump($this->upload->file_name);
    			$relative_url = 'files/diplomes/'.$this->upload->file_name;
			*/ 	$data['GMES_CODE'] = $id_etude;
				$data['GMES_ETABLISSEMENT'] =  $this->input->post('GMES_ETABLISSEMENT');
				$data['GMES_OPTION'] = $this->input->post('GMES_OPTION');
				$data['GMES_SPECIALISATION'] =  $this->input->post('GMES_SPECIALISATION');
				$data['GMES_DATE_DE_DEBUT'] = $this->input->post('GMES_DATE_DE_DEBUT');
				$data['GMES_DATE_DE_FIN'] = $this->input->post('GMES_DATE_DE_FIN');
				$data['GMES_NOM_DU_DIPLOME'] = $this->input->post('GMES_NOM_DU_DIPLOME');
			//	$data['GMES_DIPLOME'] = $relative_url;
				if($_FILES['GMES_RELEVE_DE_NOTES']['error'] == 0)
				{
					$data['GMES_RELEVE_DE_NOTES'] = $this->input->post('GMES_RELEVE_DE_NOTES');
				}
				$data_bis = array(
								'GMET_CODE' =>  'GMET168817',
								'GMES_CODE' => $id_etude 
							);
				$this->db->insert('GMEtudesSuperieures', $data);
				$this->db->insert('gm_etudiant_etudes_superieures', $data_bis);*/
			}
		}
/*
		public function addEtudescandidat()
	    {
	    	$rand = '00001';
	    	$base= '0';	
	    	$id_stage = "GMSPS";
	    	$query_exist =$this->db->select('*')->from('GMStageProjetSeminaire')->like('GMStageProjetSeminaire.GMSPS_CODE', $id_stage.$base)->order_by('GMSPS_CODE')->get();
			//echo $identifiant;
		
			
			if($query_exist->num_rows>0)
			{
				$new_pos = str_split($query_exist->result()[($query_exist->num_rows)-1]->GMSPS_CODE,5)[1]+1;
				if(strlen($new_pos)<5)
	    		{
	    			$new_pos= str_pad($new_pos, 5, "0", STR_PAD_LEFT);
	    		}

				$id_stage=$id_stage.$new_pos;
				//echo var_dump($query_exist->num_rows);
				//echo var_dump($query_exist->result()[($query_exist->num_rows)-1]->GMSPS_CODE);

				//echo var_dump($id_stage);
				
			}
			else
			{
				$id_stage=$id_stage.$rand;
			//	echo $id_stage;
			}
			
			$data = array(
							'GMSPS_CODE' => $id_stage,
							'GMET_CODE' =>  $this->session->userdata('GMET_CODE'),
							'GMSPS_TITRE' =>  $this->input->post('GMSPS_TITRE'),
							'GMSPS_DESCRIPTION' => $this->input->post('GMSPS_DESCRIPTION'),
							'GMSPS_ENTREPRISE' =>  mb_strtoupper($this->input->post('GMSPS_ENTREPRISE')),
							'GMSPS_RESPONSABLE' => $this->input->post('GMSPS_RESPONSABLE'),
							'GMSPS_DATE_DE_DEBUT' => $this->input->post('GMSPS_DATE_DE_DEBUT'),
							'GMSPS_DATE_DE_FIN' => $this->input->post('GMSPS_DATE_DE_FIN'),
							'GMSPS_NATURE_STAGE' => $this->input->post('GMSPS_NATURE_STAGE'),
							'GMSPS_TYPE' => $this->input->post('GMSPS_TYPE'),
							'GMSPS_PAYS' => mb_strtoupper($this->input->post('GMSPS_PAYS'))
										 
    					);
			$this->db->insert('GMStageProjetSeminaire', $data);
		}

*/		public function editStageProjetSeminaire()
	    {	
	    	echo var_dump($this->input->post());
			$data = array(
							'GMSPS_TITRE' =>  $this->input->post('GMSPS_TITRE'),
							'GMSPS_DESCRIPTION' => $this->input->post('GMSPS_DESCRIPTION'),
							'GMSPS_ENTREPRISE' =>  mb_strtoupper($this->input->post('GMSPS_ENTREPRISE')),
							'GMSPS_RESPONSABLE' => $this->input->post('GMSPS_RESPONSABLE'),
							'GMSPS_DATE_DE_DEBUT' => $this->input->post('GMSPS_DATE_DE_DEBUT'),
							'GMSPS_DATE_DE_FIN' => $this->input->post('GMSPS_DATE_DE_FIN'),
							'GMSPS_NATURE_STAGE' => $this->input->post('GMSPS_NATURE_STAGE'),
							'GMSPS_TYPE' => $this->input->post('GMSPS_TYPE'),
							'GMSPS_PAYS' => mb_strtoupper($this->input->post('GMSPS_PAYS'))			 
    					);
			$this->db->where('GMSPS_CODE', $this->input->post('GMSPS_CODE'));
			$this->db->update('GMStageProjetSeminaire', $data);
		}

		public function getAllStageProjetSeminaire($val)
		{
			$where = array ('GMStageProjetSeminaire.GMET_CODE' => $val);
			$value = $this->db->select('*')->from('GMStageProjetSeminaire')->where($where)->order_by("GMSPS_DATE_DE_FIN","DESC")->get();
			return $value->result();
		}

		public function getStageProjetSeminaire()
		{
			$where = array ('GMStageProjetSeminaire.GMSPS_CODE' => $this->input->post('GMSPS_CODE'));
			$value = $this->db->select('*')->from('GMStageProjetSeminaire')->where($where)->get();
			return $value->row();
		}

		public function deleteStageProjetSeminaire()
	    {	
			$where = array(
							'GMSPS_CODE' => $this->input->post('GMSPS_CODE')	
    					);
			$this->db->delete('GMStageProjetSeminaire', $where);
		}

	}
?>