<?php 
	Class soutenance_m extends CI_Model
	{
		
		public function inserer_type_soutenance()
		{
			$rand = random_string('numeric', 6);

			$this->GMTS_CODE = "GMTS".$rand;
			$this->GMTS_TYPE = $this->input->post('type');
			$this->GMTS_DESCRIPTION = $this->input->post('description');

			$this->db->insert('gmtypesoutenance', $this);
		}

	
	}
?>