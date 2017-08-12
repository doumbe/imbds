<?php 
	Class emploi_m extends CI_Model
	{

		public function addEmploi()
	    {	
	    	$id_emploi = "GMEM".rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);

	    	$query_exist = $this->db->select('*')->from('GMEmploi')->where('GMEmploi.GMEM_CODE', $id_emploi)->get();

			while($query_exist->num_rows>0)
			{
				$id_emploi = "GMEM".rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
				$query_exist = $this->db->select('*')->from('GMEmploi')->where('GMEmploi.GMEM_CODE', $id_emploi)->get();
			}

			$emploi_exist = $this->db->select('*')->from('GMEmploi')->where('GMEmploi.GMET_CODE', $this->session->userdata('GMET_CODE'))->ORDER_BY('GMEM_NUMERO_ORDRE','DESC')->get();
			$num_ordre=-1;
			if($emploi_exist->num_rows>0)
			{
				$num_ordre=$emploi_exist->result()[0]->GMEM_NUMERO_ORDRE+1;
			}
			else
			{
				$num_ordre=1;
			}
			
			$data = array(
							'GMEM_CODE' => $id_emploi,
							'GMET_CODE' =>  $this->session->userdata('GMET_CODE'),
							'GMEM_FONCTION' =>  mb_strtoupper($this->input->post('GMEM_FONCTION')),
							'GMEM_EMAIL' => $this->input->post('GMEM_EMAIL'),
							'GMEM_TELEPHONE' => $this->input->post('GMEM_TELEPHONE'),
							'GMEM_NOM_ENTREPRISE' =>  ucfirst($this->input->post('GMEM_NOM_ENTREPRISE')),
							'GMEM_TYPE_CONTRAT' => $this->input->post('GMEM_TYPE_CONTRAT'),
							'GMEM_DATE_EMBAUCHE' => $this->input->post('GMEM_DATE_EMBAUCHE'),
							'GMEM_SALAIRE_ANNUEL' => $this->input->post('GMEM_SALAIRE_ANNUEL'),
							'GMEM_ADRESSE' => $this->input->post('GMEM_ADRESSE'),
							'GMEM_CODE_POSTAL' => $this->input->post('GMEM_CODE_POSTAL'),
							'GMEM_VILLE' => ucfirst($this->input->post('GMEM_VILLE')),
							'GMEM_PAYS' => mb_strtoupper($this->input->post('GMEM_PAYS')),
							'GMEM_NUMERO_ORDRE' => $num_ordre,
							'GMEM_ACTUEL' => 1,
							'GMEM_DATE_FIN' => $this->input->post('GMEM_DATE_FIN')					 
    					);
			$today=date('Y-m-d');
			$date_fin =$this->input->post('GMEM_DATE_FIN');
			if(!empty($date_fin) && $date_fin<$today)
			{
				$data['GMEM_ACTUEL'] = 0;
			}
			//echo var_dump($data);
			$this->db->insert('GMEmploi', $data);
		}

		public function editEmploi()
	    {	
			$data = array(
							'GMEM_FONCTION' =>  mb_strtoupper($this->input->post('GMEM_FONCTION')),
							'GMEM_EMAIL' => $this->input->post('GMEM_EMAIL'),
							'GMEM_TELEPHONE' => $this->input->post('GMEM_TELEPHONE'),
							'GMEM_NOM_ENTREPRISE' => ucfirst($this->input->post('GMEM_NOM_ENTREPRISE')),
							'GMEM_TYPE_CONTRAT' => $this->input->post('GMEM_TYPE_CONTRAT'),
							'GMEM_DATE_EMBAUCHE' => $this->input->post('GMEM_DATE_EMBAUCHE'),
							'GMEM_SALAIRE_ANNUEL' => $this->input->post('GMEM_SALAIRE_ANNUEL'),
							'GMEM_ADRESSE' => $this->input->post('GMEM_ADRESSE'),
							'GMEM_CODE_POSTAL' => $this->input->post('GMEM_CODE_POSTAL'),
							'GMEM_VILLE' => ucfirst($this->input->post('GMEM_VILLE')),
							'GMEM_PAYS' => mb_strtoupper($this->input->post('GMEM_PAYS')),
							'GMEM_DATE_FIN' => $this->input->post('GMEM_DATE_FIN')				 
    					);
			$emploi_exist = $this->db->select('*')->from('GMEmploi')->where('GMEmploi.GMEM_CODE', $this->input->post('GMEM_CODE'))->ORDER_BY('GMEM_NUMERO_ORDRE','DESC')->get();
			$num_ordre=-1;
			if($emploi_exist->num_rows>0)
			{
				$data['GMEM_NUMERO_ORDRE']=$emploi_exist->result()[0]->GMEM_NUMERO_ORDRE;
			}
			else
			{
				$num_ordre=1;
			}

			$today=date('Y-m-d');
			$date_fin =$this->input->post('GMEM_DATE_FIN');
			if(!empty($date_fin) && $date_fin<$today)
			{
				$data['GMEM_ACTUEL'] = 0;
			}
			else
			{
				$data['GMEM_ACTUEL'] = 1;
			}
			/*
							'GMEM_NUMERO_ORDRE' => $this->input->post('GMEM_NUMERO_ORDRE'),
							'GMEM_ACTUEL' => $this->input->post('GMEM_ACTUEL'),*/
			$this->db->where('GMEM_CODE', $this->input->post('GMEM_CODE'));
			$this->db->update('GMEmploi', $data);
		}

		public function getAllEmplois($id)
		{
			$where = array ('GMET_CODE' => $id);
			$value = $this->db->select('*')->from('GMEmploi')->where($where)->order_by('GMEM_NUMERO_ORDRE','DESC')->get();
			return $value->result();
		}

		public function getEmploi()
		{
			$where = array ('GMEmploi.GMEM_CODE' => $this->input->post('GMEM_CODE'));
			$value = $this->db->select('*')->from('GMEmploi')->where($where)->get();
			return $value->row();
		}

		public function deleteEmploi()
	    {	
			$where = array(
							'GMEM_CODE' => $this->input->post('GMEM_CODE')		);
			$this->db->delete('GMEmploi', $where);
		}

	}
?>