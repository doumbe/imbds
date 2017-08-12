<?php 
	Class procedure_m extends CI_Model
	{
		public function inserer_procedure()
		{
			$data = array();
			$data_bis = array();

			$rand = '000001';
			$identifiant="GMPA";

			$query_exist_langue =$this->db->select('*')->from('GMProcedureadministrative')->like('GMPA_CODE', $identifiant)->order_by('GMPA_CODE')->get();
			
			if($query_exist_langue->num_rows>0)
			{
				$new_pos = (str_split($query_exist_langue->result()[($query_exist_langue->num_rows)-1]->GMPA_CODE,4)[1].str_split($query_exist_langue->result()[($query_exist_langue->num_rows)-1]->GMPA_CODE,4)[2])+1;
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
				$identifiant=$identifiant.$new_pos;
				
			}
			else
			{
				$identifiant=$identifiant.$rand;
				
			}

			if($_FILES['GMPA_DOCUMENT']['error'] == 0)
			{

	    		$relative_url = 'files/procedures/'.$this->upload->file_name;

	    		$data['GMPA_CODE'] = $identifiant;
	    		$data['GMPA_NOM'] = $this->input->post('GMPA_NOM');
	    		$data['GMPA_DESCRIPTION'] = $this->input->post('GMPA_DESCRIPTION');
	    		$data['GMPA_TYPE'] = $this->input->post('GMPA_TYPE');
	    		
	    		$data_bis['GMPA_DOCUMENT'] = $relative_url;

	    		$this->db->insert('GMProcedureadministrative', $data);;

	    		$this->db->where('GMPA_CODE', $data['GMPA_CODE']);
	    		//echo var_dump($data);
	    		//echo var_dump($data_bis);
	    		$this->db->update('GMProcedureadministrative', $data_bis);
	    	}
	    	elseif($_FILES['GMPA_DOCUMENT']['error'] == 4)
			{
	    		$data['GMPA_CODE'] = $identifiant;
	    		$data['GMPA_NOM'] = $this->input->post('GMPA_NOM');
	    		$data['GMPA_DESCRIPTION'] = $this->input->post('GMPA_DESCRIPTION');
	    		$data['GMPA_TYPE'] = $this->input->post('GMPA_TYPE');
	    		//echo var_dump($data);
	    		$this->db->insert('GMProcedureadministrative', $data);
	    	}
/*
    		if(!is_null($this->input->post('GMIN_CODE')))
    		{
    			$data['GMIN_CODE'] = $this->input->post('GMIN_CODE');
		
				$this->db->insert('gm_intervenant_procedure', $this);
    		}
*/
		}

		public function getAll_procedure_administrative()
		{
			return $this->db->select("*")
							->get('GMProcedureadministrative')
							->result();
		}

		public function nombre_procedure_administrative()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM GMProcedureadministrative'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}
/*

		public function nombre_procedure_administrative_intervenant()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM gm_intervenant_procedures'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}

*/
		public function getByPage_procedure_administrative($num_page,$number_parametre_page)
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
												->from('GMProcedureadministrative')
												->order_by("GMPA_NOM", "ASC");

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


		// procedure administrative intervenant

		public function getByPage_procedure_administrative_intervenant($num_page,$number_parametre_page)
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
												->from('gm_intervenant_procedure')
												->order_by("GMPA_CODE", "ASC");

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

		public function recherche_procedure_administrative()
		{
			//echo var_dump($this->input->post());
			$nom = $this->input->post('nom');

			$this->db->distinct()->select('*')
				->from('GMProcedureadministrative', 'gm_intervenant_procedure');
			if(!empty($nom))
			{
				$this->db->like('GMPA_NOM', $this->input->post('nom'));
			}
			$this->db->order_by("GMPA_NOM", "ASC");

			$query = $this->db->get();

			//echo var_dump($query->result());
			return $query->result();
		}


		public function get_procedure_administrativeById($id)
		{
			$this->db->select('*')
						->from('GMProcedureadministrative')
						->where('GMPA_CODE', $id);

			$query = $this->db->get();
			return $query->row();

		}

		public function edit_procedure_administrative()
		{
			$code = $this->input->post('GMPA_CODE');

	        $this->GMPA_NOM = $this->input->post('GMPA_NOM');
			$this->GMPA_TYPE = $this->input->post('GMPA_TYPE');
			$this->GMPA_DESCRIPTION = $this->input->post('GMPA_DESCRIPTION');

			if($_FILES['GMPA_DOCUMENT']['error'] == 0)
			{
    			$relative_url = 'files/procedures/'.$this->upload->file_name;
    			$this->GMPA_DOCUMENT = $relative_url;
    		}

			$this->db->where('GMPA_CODE', $code);
			$this->db->update('GMProcedureadministrative', $this);

		}

		public function delete_procedure_administrative($id)
	    {	
			$where = array(
							'GMPA_CODE' => $id	
    					);

			$this->db->delete('GMProcedureadministrative', $where);
		}
	
		
	}
?>