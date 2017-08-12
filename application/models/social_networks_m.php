<?php 
	Class social_networks_m extends CI_Model
	{


		public function inserer_reseau_social()
		{
			$rand = "01";
			$data = array();
			$data_bis = array();
			$identifiant = "GMRS0000";

			$query_exist =$this->db->select('*')->from('GMReseauxSociaux')->like('GMRS_CODE', $identifiant)->get();
			//echo $identifiant;
			//echo var_dump($query_exist);
			
			if($query_exist->num_rows>0)
			{
				$new_pos = str_split($query_exist->result()[($query_exist->num_rows)-1]->GMRS_CODE,8)[1]+1;
				if($new_pos<=9)
				{
					$new_pos="0".$new_pos;
				}
				$identifiant=$identifiant.$new_pos;
			//	echo var_dump($identifiant);
				
			}
			else
			{
				$identifiant=$identifiant.$rand;
				//echo $identifiant;
			}
			if($_FILES['GMRS_LOGO']['error'] == 0)
			{

	    		$relative_url = 'images/logo/'.$this->upload->file_name;
	    		
	    		$data['GMRS_CODE'] = $identifiant;
	    		$data['GMRS_NOM'] = $this->input->post('GMRS_NOM');

	    		$data_bis['GMRS_LOGO'] = $relative_url;

	    		$this->db->insert('GMReseauxSociaux', $data);

	    		$this->db->where('GMRS_CODE', $identifiant);
	    		$this->db->update('GMReseauxSociaux', $data_bis);
	    	}
	    	if($_FILES['GMRS_LOGO']['error'] == 4)
			{
	    		
	    		$data['GMRS_CODE'] = $identifiant;
	    		$data['GMRS_NOM'] = $this->input->post('GMRS_NOM');
	    		
	    		$this->db->insert('GMReseauxSociaux', $data);
	    	}
	    	
	    	
		}
		public function addSocialNetwork()
	    {	
			$data = array(
							'GMRS_CODE' => $this->input->post('GMRS_CODE'),
							'GMET_CODE' =>  $this->input->post('GMET_CODE'),
							'GMERS_LINK' =>  $this->input->post('GMERS_LINK'),
							'GMERS_STATUT' => "actif" 
    					);
			$this->db->insert('GM_etudiant_reseau_social', $data);
		}

		public function getSocialNetworks()
		{
			$social_networks = $this->db->select('*')->from('GMReseauxSociaux')->get();
			return $social_networks->result();
		}

		public function getAllSocialNetworksById($id)
		{
			$social_networks = $this->db->select('GM_etudiant_reseau_social.GMRS_CODE, GM_etudiant_reseau_social.GMERS_LINK, GM_etudiant_reseau_social.GMERS_STATUT, GMReseauxSociaux.GMRS_NOM, GMReseauxSociaux.GMRS_LOGO')->from('GM_etudiant_reseau_social')->join('GMReseauxSociaux','GM_etudiant_reseau_social.GMRS_CODE = GMReseauxSociaux.GMRS_CODE')->where('GM_etudiant_reseau_social.GMET_CODE', $id)->get();
			return $social_networks->result();
		}

		public function deleteSocialNetwork()
	    {	
			$where = array(
							'GMRS_CODE' => $this->input->post('GMRS_CODE'),
							'GMET_CODE' => $this->input->post('GMET_CODE')
    					);
			$this->db->delete('GM_etudiant_reseau_social', $where);
		}

		public function desactivateSocialNetwork()
		{	
			$where = array(
							'GMRS_CODE' => $this->input->post('GMRS_CODE'),
							'GMET_CODE' => $this->input->post('GMET_CODE'),
							'GMERS_STATUT' => 'actif'
						);
			$data = array(
    						'GMERS_STATUT' => 'desactive'
						);
			$this->db->where($where)->update('GM_etudiant_reseau_social', $data);
		}

		public function activateSocialNetwork()
		{	
			$where = array(
							'GMRS_CODE' => $this->input->post('GMRS_CODE'),
							'GMET_CODE' => $this->input->post('GMET_CODE'),
							'GMERS_STATUT' => 'desactive'
						);
			$data = array(
    						'GMERS_STATUT' => 'actif'
						);
			$this->db->where($where)->update('GM_etudiant_reseau_social', $data);
		}

		public function desactivateAllSocialNetworksById()
		{	
			$where = array(
							'GMET_CODE' => $this->input->post('GMET_CODE'),
							'GMERS_STATUT' => 'actif'
						);
			$data = array(
    						'GMERS_STATUT' => 'desactive'
						);
			$this->db->where($where)->update('GM_etudiant_reseau_social', $data);
		}

		public function activateAllSocialNetworksById()
		{	
			$where = array(
							'GMET_CODE' => $this->input->post('GMET_CODE'),
							'GMERS_STATUT' => 'desactive'
						);
			$data = array(
    						'GMERS_STATUT' => 'actif'
						);
			$this->db->where($where)->update('GM_etudiant_reseau_social', $data);
		}

		public function nombre_social_network()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM GMReseauxSociaux'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}


		public function getByPage_social_network($num_page,$number_parametre_page)
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
												->from('GMReseauxSociaux')
												->order_by("GMRS_NOM", "ASC");

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

		public function recherche_social_network()
		{
			$social_network = $this->input->post('social_network');

			$this->db->distinct()->select('*')->from('GMReseauxSociaux');
			if(!empty($social_network))
			{
				$this->db->like('GMRS_NOM', $this->input->post('social_network'));
			}
			$this->db->order_by("GMRS_NOM", "ASC");

			$query = $this->db->get();

			return $query->result();
		}

		public function edit_social_network()
		{
			$code = $this->input->post('GMRS_CODE');

			$this->GMRS_NOM = $this->input->post('GMRS_NOM');

	        if($_FILES['GMRS_LOGO']['error'] == 0)
			{
    			$relative_url = 'images/logo/'.$this->upload->file_name;
    			$this->GMRS_LOGO = $relative_url;
    		}

			$this->db->where('GMRS_CODE', $code);
			$this->db->update('GMReseauxSociaux', $this);

		}

		public function getSocialNetworkById($id)
		{
			$this->db->select('*')
						->from('GMReseauxSociaux')
						->where('GMRS_CODE', $id);

			$query = $this->db->get();
			return $query->row();
		}

		public function delete_social_network($id)
	    {	
			$where = array(
							'GMRS_CODE' => $id	
    					);
			$this->db->delete('GM_etudiant_reseau_social', $where);
			$this->db->delete('GMReseauxSociaux', $where);
		}

	}
?>
