<?php 
	Class question_m extends CI_Model
	{
		public function random_id_questionnaire($annee)
		{
			$rand = "01";
			$data = array();
			$identifiant = "GMQQ".$annee;

			$query_exist =$this->db->select('*')->from('GMQuestionnaireQuestion')->like('GMQQ_CODE', $identifiant)->order_by('GMQQ_CODE')->get();
			
			if($query_exist->num_rows>0)
			{
				$new_pos = str_split($query_exist->result()[($query_exist->num_rows)-1]->GMQQ_CODE,8)[1]+1;
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

			return $identifiant;

		}

		public function inserer_questionnaire()
		{
			$data = array();

			$id_question = 0;
			
			for ($i=0;$i<count($this->input->post('GMQQ_NOM')); $i++) {
				
				if($i==0){
					$id_question = $this->random_id_questionnaire($this->input->post('GMQQ_ANNEE'));
				}
				else{
					$new_pos=str_split($id_question,8)[1]+1;
					if($new_pos<=9)
					{
						$id_question=str_split($id_question,8)[0].'0'.$new_pos;
					}
					else
					{
						$id_question=str_split($id_question,8)[0].$new_pos;
					}

				}

				$data[] = array(
								'GMQQ_CODE' => $id_question,
								'GMQQ_NOM' => $this->input->post('GMQQ_NOM')[$i],
								'GMQQ_DESCRIPTION' => $this->input->post('GMQQ_DESCRIPTION')[$i],
								'GMQQ_ANNEE' => $this->input->post('GMQQ_ANNEE')
							);
			
			}

			$this->db->insert_batch('GMQuestionnaireQuestion', $data);
		}



		public function nombre_questionnaire()
		{
			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM GMQuestionnaireQuestion'); 
				
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
				
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total'];
				 
			return $total;
		}

		// Pour la liste des matières avec la pagination

		public function getByPage_questionnaire($num_page,$number_questionnaire_page)
		{
			if($num_page>0 and $number_questionnaire_page>=0)
			{
				if($number_questionnaire_page==0)
				{
					$number_questionnaire_page=1;
				}

				if($number_questionnaire_page==1)
				{
					$min = ($num_page+$number_questionnaire_page)-$num_page-1;
				}

				else
				{
					$min = ($num_page+$number_questionnaire_page)-$num_page;
				}
			
				$value = $this->db->distinct()->select('GMQQ_ANNEE')
												->from('GMQuestionnaireQuestion')
												->order_by("GMQQ_ANNEE", "DESC");

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
					return $message="Aucune ligne restituée par la requete";
				}
			}
			else
			{
				return $message="Nombre de page ou nombre ancien page egale(s) zéro";
			}
		}

		public function recherche_questionnaire()
		{
			//echo var_dump($this->input->post());
			$annee = $this->input->post('annee');

			$this->db->distinct()->select('GMQQ_ANNEE')
				->from('GMQuestionnaireQuestion');
			if(!empty($annee))
			{
				$this->db->like('GMQuestionnaireQuestion.GMQQ_ANNEE', $this->input->post('annee'));
			}
			$this->db->order_by("GMQQ_ANNEE", "DESC");

			$query = $this->db->get();

			//echo var_dump($query->result());
			return $query->result();
		}

		public function getQuestionnaireByAnnee($annee)
		{
			$this->db->select('*')
						->from('GMQuestionnaireQuestion')
						->where('GMQuestionnaireQuestion.GMQQ_ANNEE', $annee)
						->order_by('GMQQ_CODE','ASC');

			$query = $this->db->get();
			return $query->result();

		}

		public function edit_questionnaire()
		{
			//echo var_dump($this->input->post());

			$data = array();
			for ($i=0;$i<count($this->input->post('GMQQ_CODE')); $i++)
			{
				$data[] = array(
								'GMQQ_CODE' => $this->input->post('GMQQ_CODE')[$i],
								'GMQQ_NOM' => $this->input->post('GMQQ_NOM')[$i],
								'GMQQ_DESCRIPTION' => $this->input->post('GMQQ_DESCRIPTION')[$i],
								'GMQQ_ANNEE' => $this->input->post('GMQQ_ANNEE')
							);
			}
			
			$this->db->update_batch('GMQuestionnaireQuestion', $data, 'GMQQ_CODE');

		}

		public function delete_questionnaire($annee)
	    {	
			$where = array(
							'GMQQ_ANNEE' => $annee	
    					);

			$this->db->delete('GMQuestionnaireQuestion', $where);
		}

	
	}
?>