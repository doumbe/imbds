<?php 
	Class stage_projet_seminaire_m extends CI_Model
	{

		public function addStageProjetSeminaire()
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

		public function editStageProjetSeminaire()
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

		public function calcul_afficher()
		{
			$this->db->select("COUNT(*)")->from("GMStageProjetSeminaire")->get()->result();
		}

		public function getByPage($num_page,$number_parametre_page)
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
												->from('GMStageProjetSeminaire')
												->order_by("GMET_CODE", "DESC");

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

	}
?>