<?php 
	Class document_attache_m extends CI_Model
	{
		public function insertFile()
	    {	
	    	$id_file = "GMDA".rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
	    	if($this->db->select('*')->from('GMDocumentAttache')->where('GMDocumentAttache.GMDA_CODE', $id_file)->get())
	    	{
	    		$id_file = "GMDA".rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
	    	}
			$data = array();
			if($_FILES['GMDA_DOCUMENT']['error'] == 0)
			{
    			$relative_url = 'files/document_attache/'.$this->upload->file_name;
    			$data['GMDA_DOCUMENT'] = $relative_url;
    			$data['GMDA_NOM'] =  $_POST['GMDA_NOM'];
    			$data['GMDA_LANGUE'] =  $_POST['GMDA_LANGUE'];
    			$data['GMDA_STATUT'] = "actif" ;
    			if($_POST['GMET_CODE'])
    			{
    				$data['GMET_CODE'] = $_POST['GMET_CODE'];
    			}
    			else if($_POST['GMIN_CODE'])
    			{
    				$data['GMIN_CODE'] = $_POST['GMIN_CODE'];
    			}
    			$data['GMDA_CODE'] =  $id_file;
			}
			$this->db->insert('GMDocumentAttache', $data);
		}


		public function inserer_document_attache() // methode pour inserer un cours dans la bd
		{
			$rand = "01";
			$data = array();
			$data_bis = array();
			$identifiant = "GMDA".$this->input->post('GMDA_ANNEE');

			$query_exist = $this->db->select('*')->from('GMDocumentattache')->like('GMDA_CODE', $identifiant)->order_by('GMDA_CODE')->get();

			if($query_exist->num_rows>0)
			{
				$new_pos = str_split($query_exist->result()[($query_exist->num_rows)-1]->GMDA_CODE,8)[1]+1;
				if($new_pos<=9)
				{
					$new_pos="0".$new_pos;
				}
				$identifiant=$identifiant.$new_pos;
			}
			else
			{
				$identifiant = $identifiant.$rand;
			}
			if($_FILES['GMDA_DOCUMENT']['error'] == 0)
			{

				$relative_url = 'files/document_attache/'.$this->input->post("GMDA_ANNEE").'/'.$this->upload->file_name;

				$data['GMDA_CODE'] = $identifiant;
				$data['GMDA_NOM'] = $this->input->post('GMDA_NOM');
				$data['GMDA_TYPE'] = $this->input->post('GMDA_TYPE');
				$data['GMDA_FORMAT'] = $this->input->post('GMDA_FORMAT');
	    		$data['GMDA_ANNEE'] = $this->input->post('GMDA_ANNEE');

	    		$data_bis['GMDA_DOCUMENT'] = $relative_url;

	    		$this->db->insert('GMDocumentattache', $data);

	    		$this->db->where('GMDA_CODE', $identifiant);
	    		$this->db->update('GMDocumentattache', $data_bis);
			}
		}


		public function recherche_document_attache() // recherche un document dans la table
		{
			

			$nom = $this->input->post('nom');
			$annee = $this->input->post('annee');

			$this->db->distinct()->select('*')
				->from('GMDocumentattache');
				if(!empty($nom))
				{
					$this->db->like('GMDA_NOM', $this->input->post('nom'));
				}
				if(!empty($annee))
				{
					$this->db->like('GMDA_ANNEE', $this->input->post('annee'));
				}
				$this->db->order_by("GMDA_ANNEE", "DESC");

				$query = $this->db->get();

				return $query->result();
		}


		public function getAllFilesById($id)
		{
			$file = $this->db->select('*')->from('GMDocumentAttache')->where('GMDocumentAttache.GMET_CODE', $id)->get();
			return $file->result();
		}


		public function get_document_attacheById($id) // recupere le document attache avec son identifiant
		{
			$this->db->select('*')
					 ->from('GMDocumentAttache')
					 ->where('GMDA_CODE', $id);

			$query = $this->db->get();
			return $query->row();
		}


		public function edit_document_attache() // fonction pour modifier un document attache
		{
			$code = $this->input->post('GMDA_CODE');

	        $this->GMDA_NOM = $this->input->post('GMDA_NOM');
			$this->GMDA_TYPE = $this->input->post('GMDA_TYPE');
			$this->GMDA_FORMAT = $this->input->post('GMDA_FORMAT');
			$this->GMDA_ANNEE = $this->input->post('GMDA_ANNEE');

			if($_FILES['GMDA_DOCUMENT']['error'] == 0)
			{
    			$relative_url = 'files/document_attache/'.$this->input->post('GMDA_ANNEE').'/'.$this->upload->file_name;
    			$this->GMDA_DOCUMENT = $relative_url;
    		}

			$this->db->where('GMDA_CODE', $code);
			$this->db->update('GMDocumentAttache', $this);
		}



		public function delete_document_attache($id) // supprimer un document attache
		{
			$where = array(
								'GMDA_CODE' => $id
						);
			
			$this->db->delete('GMDocumentattache', $where);
		}


		public function nombre_document_attache()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM GMDocumentAttache'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}


		public function getAllFilesByIdIntervenant($id)
		{
			$file = $this->db->select('*')->from('GMDocumentAttache')->where('GMDocumentAttache.GMIN_CODE', $id)->get();
			return $file->result();
		}

		public function desactivateFile()
		{	
			$where = array(
							'GMDA_CODE' => $_POST['GMDA_CODE'],
							'GMDA_STATUT' => 'actif'
						);
			$data = array(
    						'GMDA_STATUT' => 'desactive'
						);
			$this->db->where($where)->update('GMDocumentAttache', $data);
		}

		public function activateFile()
		{	
			$where = array(
							'GMDA_CODE' => $_POST['GMDA_CODE'],
							'GMDA_STATUT' => 'desactive'
						);
			$data = array(
    						'GMDA_STATUT' => 'actif'
						);
			$this->db->where($where)->update('GMDocumentAttache', $data);
		}

		public function desactivateAllFilesById()
		{	
			$where = array(
							'GMET_CODE' => $_POST['GMET_CODE'],
							'GMDA_STATUT' => 'actif'
						);
			$data = array(
    						'GMDA_STATUT' => 'desactive'
						);
			$this->db->where($where)->update('GMDocumentAttache', $data);
		}


		public function dasactiveAllFilesByIdIntervenant()
		{
			$where = array(
							'GMIN_CODE' => $_POST['GMIN_CODE'],
							'GMDA_STATUT' => 'actif'
						);
			$data = array(
    						'GMDA_STATUT' => 'desactive'
						);
			$this->db->where($where)->update('GMDocumentAttache', $data);
		}




		public function activateAllFilesById()
		{	
			$where = array(
							'GMET_CODE' => $_POST['GMET_CODE'],
							'GMDA_STATUT' => 'desactive'
						);
			$data = array(
    						'GMDA_STATUT' => 'actif'
						);
			$this->db->where($where)->update('GMDocumentAttache', $data);
		}


		public function activateAllFilesByIdIntervenant()
		{
			$where = array(
							'GMIN_CODE' => $_POST['GMIN_CODE'],
							'GMDA_STATUT' => 'desactive'
						);
			$data = array(
    						'GMDA_STATUT' => 'actif'
						);
			$this->db->where($where)->update('GMDocumentAttache', $data);
		}

		
		public function deleteFile()
	    {	
			$where = array(
							'GMDA_CODE' => $_POST['GMDA_CODE']	
    					);
			$this->db->delete('GMDocumentAttache', $where);
		}

		public function getByPage_document_attache($num_page,$number_parametre_page)
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
												->from('GMDocumentAttache')
												->order_by("GMDA_ANNEE", "DESC");

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