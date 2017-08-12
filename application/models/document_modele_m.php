<?php 
	Class document_modele_m extends CI_Model
	{
		public function inserer_document_modele()
		{
			$rand = "01";
			$data = array();
			$data_bis = array();
			$identifiant = "GMDM".$this->input->post('GMDM_ANNEE');

			$query_exist =$this->db->select('*')->from('GMDocumentModele')->like('GMDM_CODE', $identifiant)->order_by('GMDM_CODE')->get();
			//echo $identifiant;
			
			if($query_exist->num_rows>0)
			{
				$new_pos = str_split($query_exist->result()[($query_exist->num_rows)-1]->GMDM_CODE,8)[1]+1;
				if($new_pos<=9)
				{
					$new_pos="0".$new_pos;
				}
				$identifiant=$identifiant.$new_pos;
				//echo var_dump($identifiant);
				
			}
			else
			{
				$identifiant=$identifiant.$rand;
				//echo $identifiant;
			}
			if($_FILES['GMDM_DOCUMENT']['error'] == 0)
			{

	    		$relative_url = 'files/document_modele/'.$this->input->post("GMDM_ANNEE").'/'.$this->upload->file_name;

	    		$data['GMDM_CODE'] = $identifiant;
	    		$data['GMDM_NOM'] = $this->input->post('GMDM_NOM');
	    		$data['GMDM_TYPE'] = $this->input->post('GMDM_TYPE');
	    		$data['GMDM_FORMAT'] = $this->input->post('GMDM_FORMAT');
	    		$data['GMDM_ANNEE'] = $this->input->post('GMDM_ANNEE');
	    		
	    		$data_bis['GMDM_DOCUMENT'] = $relative_url;

	    		$this->db->insert('GMDocumentmodele', $data);

	    		$this->db->where('GMDM_CODE', $identifiant);
	    		$this->db->update('GMDocumentmodele', $data_bis);
	    	}
	    	
		}

		public function getAll_document_modele()
		{
			return $this->db->select("*")
							->get('GMDocumentmodele')
							->result();
		}

		public function nombre_document_modele()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM GMDocumentmodele'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}


		public function getByPage_document_modele($num_page,$number_parametre_page)
		{
			if($num_page>0 and $number_parametre_page>=0)
			{
				if($number_parametre_page==0)
				{
					$number_parametre_page=1;
				}

				if($number_parametre_page==1)
				{
					$min = ($num_page+$number_parametre_page)-$num_page-1;
				}

				else
				{
					$min = ($num_page+$number_parametre_page)-$num_page;
				}
			
				$value = $this->db->distinct()->select('*')
												->from('GMDocumentmodele')
												->order_by("GMDM_ANNEE", "DESC");

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

		public function recherche_document_modele()
		{
			//echo var_dump($this->input->post());
			$nom = $this->input->post('nom');
			$annee = $this->input->post('annee');

			$this->db->distinct()->select('*')
				->from('GMDocumentmodele');
			if(!empty($nom))
			{
				$this->db->like('GMDM_NOM', $this->input->post('nom'));
			}
			if(!empty($annee))
			{
				$this->db->like('GMDM_ANNEE', $this->input->post('annee'));
			}
			$this->db->order_by("GMDM_ANNEE", "DESC");

			$query = $this->db->get();

			//echo var_dump($query->result());
			return $query->result();
		}


		public function get_document_modeleById($id)
		{
			$this->db->select('*')
						->from('GMDocumentmodele')
						->where('GMDM_CODE', $id);

			$query = $this->db->get();
			return $query->row();

		}

		public function edit_document_modele()
		{
			$code = $this->input->post('GMDM_CODE');

	        $this->GMDM_NOM = $this->input->post('GMDM_NOM');
			$this->GMDM_TYPE = $this->input->post('GMDM_TYPE');
			$this->GMDM_FORMAT = $this->input->post('GMDM_FORMAT');
			$this->GMDM_ANNEE = $this->input->post('GMDM_ANNEE');

			if($_FILES['GMDM_DOCUMENT']['error'] == 0)
			{
    			$relative_url = 'files/document_modele/'.$this->input->post('GMDM_ANNEE').'/'.$this->upload->file_name;
    			$this->GMDM_DOCUMENT = $relative_url;
    		}

			$this->db->where('GMDM_CODE', $code);
			$this->db->update('GMDocumentModele', $this);

		}

		public function delete_document_modele($id)
	    {	
			$where = array(
							'GMDM_CODE' => $id	
    					);

			$this->db->delete('GMDocumentmodele', $where);
		}
	
	}
?>