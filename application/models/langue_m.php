<?php 
	Class langue_m extends CI_Model
	{

		public function inserer_langue()
		{
			$rand = '000001';
			$id_langue="GMLA";

			$query_exist_langue =$this->db->select('*')->from('GMLangue')->like('GMLA_CODE', $id_langue)->order_by('GMLA_CODE')->get();
			
			if($query_exist_langue->num_rows>0)
			{
				//echo var_dump($query_exist_langue->result()[($query_exist_langue->num_rows)-1]);
				$new_pos = (str_split($query_exist_langue->result()[($query_exist_langue->num_rows)-1]->GMLA_CODE,4)[1].str_split($query_exist_langue->result()[($query_exist_langue->num_rows)-1]->GMLA_CODE,4)[2])+1;
				//echo $new_pos;
				if($new_pos<=9)
				{
					$new_pos="00000".$new_pos;
				}
				if(10<=$new_pos && $new_pos<=99)
				{
					$new_pos="0000".$new_pos;
				}
				if(100<=$new_pos && $new_pos<=999)
				{
					$new_pos="000".$new_pos;
				}
				if(1000<=$new_pos && $new_pos<=9999)
				{
					$new_pos="00".$new_pos;
				}
				if(10000<=$new_pos && $new_pos<=99999)
				{
					$new_pos="0".$new_pos;
				}
				$id_langue=$id_langue.$new_pos;
				//echo var_dump($id_langue);
				
			}
			else
			{
				$id_langue=$id_langue.$rand;
				
			}
			if($_FILES['GMLA_DRAPEAU']['error'] == 0)
			{

	    		$relative_url = 'images/logo/pays/'.$this->upload->file_name;

	    		$data['GMLA_CODE'] = $id_langue;
	    		$data['GMLA_LANGUE'] = ucfirst($this->input->post('GMLA_LANGUE'));
	    		
	    		$data_bis['GMLA_DRAPEAU'] = $relative_url;

	    		$this->db->insert('GMLangue', $data);

	    		$this->db->where('GMLA_CODE', $id_langue);
	    		//echo var_dump($data);
	    		//echo var_dump($data_bis);
	    		$this->db->update('GMLangue', $data_bis);
	    	}
	    	elseif($_FILES['GMLA_DRAPEAU']['error'] == 4)
			{
	    		$data['GMLA_CODE'] = $id_langue;
	    		$data['GMLA_LANGUE'] = ucfirst($this->input->post('GMLA_LANGUE'));
	    		//echo var_dump($data);
	    		$this->db->insert('GMLangue', $data);
	    	}
		}

		public function getLangueById($id)
		{
			$this->db->select('*')
						->from('GMLangue')
						->where('GMLA_CODE', $id);

			$query = $this->db->get();
			return $query->row();

		}

		public function addLangue()
	    {	
			$data = array(
							'GMLA_CODE' => $this->input->post('GMLA_CODE'),
							'GMET_CODE' => $this->session->userdata('GMET_CODE'),
							'GMEL_LU' =>  $this->input->post('GMEL_LU'),
							'GMEL_ECRIT' =>  $this->input->post('GMEL_ECRIT'),
							'GMEL_PARLE' =>  $this->input->post('GMEL_PARLE'),
							'GMEL_CERTIFICATION_NOM' =>  $this->input->post('GMEL_CERTIFICATION_NOM'),
							'GMEL_CERTIFICATION_NOTE' =>  $this->input->post('GMEL_CERTIFICATION_NOTE')
    					);
			$this->db->insert('GM_etudiant_langue', $data);
		}
        public function get_GMET_candidat($id){
		{   
			$query=$this->db->select('GMET_CODE')
						->from('gmcandidat_recrutement')
						->where('gmcandidat_recrutement.GMCA_CODE',$id);
			$query = $this->db->get();
		
            if ($query->num_rows() > 0) { return $query->row()->GMET_CODE; }
                   return false; }

		}
		public function getLanguages()
		{
			$langues = $this->db->select('*')->from('GMLangue')->order_by('GMLA_LANGUE','ASC')->get();
			return $langues->result();
		}

		public function getAllLanguesById($id)
		{
			$langues = $this->db->select('GM_etudiant_langue.GMLA_CODE, GM_etudiant_langue.GMEL_LU, GM_etudiant_langue.GMEL_ECRIT, GM_etudiant_langue.GMEL_PARLE, GM_etudiant_langue.GMEL_CERTIFICATION_NOM, GM_etudiant_langue.GMEL_CERTIFICATION_NOTE, GMLangue.GMLA_LANGUE, GMLangue.GMLA_DRAPEAU')->from('GM_etudiant_langue')->join('GMLangue','GM_etudiant_langue.GMLA_CODE = GMLangue.GMLA_CODE')->where('GM_etudiant_langue.GMET_CODE', $id)->get();
			return $langues->result();
		}

		public function editLangueEtu()
	    {	
	    	$where = array(
							'GMLA_CODE' => $this->input->post('GMLA_CODE'),
							'GMET_CODE' => $this->session->userdata('GMET_CODE')
    					);
			$data = array(	
							'GMEL_LU' =>  $this->input->post('GMEL_LU'),
							'GMEL_ECRIT' =>  $this->input->post('GMEL_ECRIT'),
							'GMEL_PARLE' =>  $this->input->post('GMEL_PARLE'),
							'GMEL_CERTIFICATION_NOM' =>  $this->input->post('GMEL_CERTIFICATION_NOM'),
							'GMEL_CERTIFICATION_NOTE' =>  $this->input->post('GMEL_CERTIFICATION_NOTE')		 
    					);
			$this->db->where($where);
			$this->db->update('GM_etudiant_langue', $data);
		}

		public function getLangue()
		{
			$where = array (
							'GM_etudiant_langue.GMLA_CODE' => $this->input->post('GMLA_CODE'),
							'GM_etudiant_langue.GMET_CODE' => $this->input->post('GMET_CODE')
				);
			$value = $this->db->select('*')->from('GM_etudiant_langue')->join('GMLangue','GM_etudiant_langue.GMLA_CODE = GMLangue.GMLA_CODE')->where($where)->get();
			return $value->row();
		}

		public function deleteLangue()
	    {	
			$where = array(
							'GMLA_CODE' => $this->input->post('GMLA_CODE'),
							//'GMET_CODE' => $this->input->post('getAllLanguesById')
    					'GMET_CODE' =>$this->session->userdata('GMET_CODE'));
			$this->db->delete('GM_etudiant_langue', $where);
		}

		public function nombre_langue()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM GMLangue'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}


		public function getByPage_langue($num_page,$number_parametre_page)
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
												->from('GMLangue')
												->order_by("GMLA_LANGUE", "ASC");

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

		public function recherche_langue()
		{
			$langue = $this->input->post('langue');

			$this->db->distinct()->select('*')->from('GMLangue');
			if(!empty($langue))
			{
				$this->db->like('GMLA_LANGUE', $this->input->post('langue'));
			}
			$this->db->order_by("GMLA_LANGUE", "ASC");

			$query = $this->db->get();

			return $query->result();
		}

		public function edit_langue()
		{
			$code = $this->input->post('GMLA_CODE');

			$this->GMLA_LANGUE = ucfirst($this->input->post('GMLA_LANGUE'));

	        if($_FILES['GMLA_DRAPEAU']['error'] == 0)
			{
    			$relative_url = 'images/logo/pays/'.$this->upload->file_name;
    			$this->GMLA_DRAPEAU = $relative_url;
    		}

			$this->db->where('GMLA_CODE', $code);
			$this->db->update('GMLangue', $this);

		}

		public function delete_langue($id)
	    {	
			$where = array(
							'GMLA_CODE' => $id	
    					);
			$this->db->delete('GM_etudiant_langue', $where);
			$this->db->delete('GMLangue', $where);
		}

	}
?>
