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

		public function consulter_etudiant($id){
			return $this->db->select('gmmatiere.gmue_code, gmmatiere.gmma_nom,gm_presence.gmpre_statut, gmseance.gmsea_date,gmseance.gmsea_heure_debut, gmseance.gmsea_heure_fin')
				->from('gmseance')->join('gmcours','gmcours.gmco_code=gmseance.gmco_code')
				->join('gmmatiere','gmmatiere.gmma_code=gmcours.gmma_code')
				->join('gmue','gmue.gmue_code=gmmatiere.gmue_code')
				->join('gm_presence', 'gm_presence.gmsea_code=gmseance.gmsea_code')
				->where(array('gm_presence.gmet_code' => $id))->get()->result();
		}

		public function deposer_justificatif_absence($et_code, $sea_code,$excuse, $nomFic) {
			$data = array('GMET_CODE'=>$et_code,
					'GMSEA_CODE'=>$sea_code,
					'GMPRE_STATUT'=>'Non',
					'GMPRE_EXCUSE_JUSTIFICATIF'=>$excuse,
					'GMPRE_EXCUSE_DOCUMENT_JUSTIFICATIF'=>$nomFic,
					'GMPRE_EXCUSE_VALIDEE'=>0,
					'GMPRE_EXCUSE_RAISON_REFUS'=>'');
			return $this->db->insert('GM_presence',$data);
		}


	}



?>