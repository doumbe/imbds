<?php 
	Class jury_m extends CI_Model
	{
		public function inserer_jury()
		{
			$rand = random_string('numeric', 6);
			$code = "GMJU".$rand;

			$this->GMJU_CODE = $code;
			$this->GMJU_DESCRIPTION = $this->input->post('description');
			
			$this->db->insert('gmjury', $this);

		}


		public function inserer_membre_jury()
		{
			$rand = random_string('numeric', 6);
			$code = "GMMJ".$rand;

			$this->GMMJ_CODE = $code;
			$this->GMMJ_NOM = $this->input->post('nom');
			$this->GMMJ_PRENOM = $this->input->post('prenom');
			$this->GMMJ_ENTREPRISE = $this->input->post('entreprise');
			
			$this->db->insert('gmmembre_jury', $this);

			$data = array('GMMJ_CODE' =>$this->input->post('membrejury'),
						'GMJU_CODE' => $this->input->post('jury'),
						'GMJMJ_STATUT'=> $this->input->post('statut'));

			$this->db->insert('gm_jury_membre_jury', $data);
		}


		public function inserer_jury_membre_jury()
		{
			

			$this->db->insert('gm_jury_membre_jury', $data);
		}

	
	}
?>