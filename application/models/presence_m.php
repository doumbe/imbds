<?php 
	
	Class presence_m extends CI_Model
	{

		public function edit_statut_presence_etudiant($statut)
		{
			//$etudiant = $this->input->post('GMET_CODE');

			$this->GMPRE_STATUT = $statut;

			//$this->db->where('GMET_CODE', $etudiant);
			$this->db->update('GM_presence', $this);
		}


		public function getStatutEtudiant($id)
		{
			$this->db->select('*')
					 ->from('GM_presence','GMEtudiant')
					 ->where('GMET_CODE', $id);

			$query = $this->db->get();

			return $query->row();
		}
/*
		public function getEtudiantBySeance($id)
		{
			$etudiant = $this->db->get_where('gm_presence', array('GMET_CODE' => $id));
			$row = $etudiant->row();
			return $row ;
		}
*/

		public function edit_statut_etudiant() // fonction qui modifie le statut d'un etudiant
		{
			$etudiant = $this->input->post('GMET_CODE');

			$this->GMPRE_STATUT = $this->input->post('GMPRE_STATUT');
			

			$this->db->where('GMET_CODE', $etudiant);
			$this->db->update('GM_presence', $this);

			
		}


	}



?>