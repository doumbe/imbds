<?php 
	Class promotion_m extends CI_Model
	{
		public function getPromotion()
		{
			$value = $this->db->select('*')->get('gm_promotion')->result();
		}

		public function getAllPromotion()
		{
		 	$promo = $this->db->select('GMFormation.GMFO_FORMATION, GMFormation.GMFO_NIVEAU, GMFormation.GMFO_CODE, GM_promotion.GMPR_ANNEE, GMAntenne.GMANT_VILLE, GMAntenne.GMANT_CODE')->from('GM_Promotion')->join('GMFormation','GM_promotion.GMFO_CODE = GMFormation.GMFO_CODE')->join('GMAntenne','GM_promotion.GMANT_CODE = GMAntenne.GMANT_CODE')->order_by('GM_promotion.GMPR_ANNEE','DESC')->distinct()->get();
			return $promo->result();	
		}

		public function getNamePromotion()
		{
			$where = array ('GMAN_CODE' => $this->GMAN_CODE, 'GMPR_CODE' => $this->GMAN_PROMOTION);
			$value = $this->db->select('GMPR_NOM')->from('GMPromotion')->join('GMAncien','GMPromotion.GMPR_CODE = GMAncien.GMAN_PROMOTION')->where($where)->get()->row();
			return $value->GMPR_NOM;
		}

		public function getPromotionById($id)
		{
			$where = array ('GMEtudiant.GMET_CODE' => $id);
			$value = $this->db->select('GM_promotion.GMPR_ANNEE, GM_promotion.GMPR_ETAT_ETUDIANT,GMFormation.GMFO_FORMATION , GMFormation.GMFO_NIVEAU,GMAntenne.GMANT_VILLE')->from('GM_promotion')->join('GMEtudiant','GM_promotion.GMET_CODE = GMEtudiant.GMET_CODE')->join('GMFormation','GM_promotion.GMFO_CODE = GMFormation.GMFO_CODE')->join('GMAntenne','GM_promotion.GMANT_CODE = GMAntenne.GMANT_CODE')->where($where)->get();
			return $value->result();
		}


		public function getPromotionByYear($year)
		{
			$where = array ('GM_promotion.GMPR_ANNEE' => $year);
			$value = $this->db->select('GM_promotion.GMPR_ANNEE, GM_promotion.GMPR_ETAT_ETUDIANT,GMFormation.GMFO_FORMATION , GMFormation.GMFO_NIVEAU,GMAntenne.GMANT_VILLE, GMEtudiant.GMET_CODE, GMEtudiant.GMET_NOM, GMEtudiant.GMET_PRENOM, GMEtudiant.GMET_PHOTO')->from('GM_promotion')->join('GMEtudiant','GM_promotion.GMET_CODE = GMEtudiant.GMET_CODE')->join('GMFormation','GM_promotion.GMFO_CODE = GMFormation.GMFO_CODE')->join('GMAntenne','GM_promotion.GMANT_CODE = GMAntenne.GMANT_CODE')->where($where)->order_by('GMEtudiant.GMET_NOM ASC, GMEtudiant.GMET_PRENOM ASC')->get();
			return $value->result();
		}

		public function getYearLastPromotion()
		{
			$value = $this->db->select_max('GM_promotion.GMPR_ANNEE')->distinct()->get('GM_promotion')->row();
			return $value;
		}

		public function getCityPromotionByYear($year)
		{
			$where = array ('GM_promotion.GMPR_ANNEE' => $year);
			$value = $this->db->select('GMAntenne.GMANT_VILLE, GMAntenne.GMANT_PAYS, GMFormation.GMFO_FORMATION , GMFormation.GMFO_NIVEAU,GMAntenne.GMANT_VILLE')->from('GMAntenne')->join('GM_promotion','GMAntenne.GMANT_CODE = GM_promotion.GMANT_CODE','right')->join('GMFormation','GM_promotion.GMFO_CODE = GMFormation.GMFO_CODE')->where($where)->distinct()->get();
			return $value->result();
		}

		public function getPromotionByYearCityFormation($year,$city,$formation)
		{
			$where = array ('GM_promotion.GMPR_ANNEE' => $year, 'GMAntenne.GMANT_VILLE' => $city, 'GMFormation.GMFO_FORMATION' => $formation);
			$value = $this->db->select('GM_promotion.GMPR_ANNEE, GM_promotion.GMPR_ETAT_ETUDIANT,GMFormation.GMFO_FORMATION , GMFormation.GMFO_NIVEAU,GMAntenne.GMANT_VILLE, GMEtudiant.GMET_CODE, GMEtudiant.GMET_NOM, GMEtudiant.GMET_PRENOM, GMEtudiant.GMET_PHOTO')->from('GM_promotion')->join('GMEtudiant','GM_promotion.GMET_CODE = GMEtudiant.GMET_CODE')->join('GMFormation','GM_promotion.GMFO_CODE = GMFormation.GMFO_CODE')->join('GMAntenne','GM_promotion.GMANT_CODE = GMAntenne.GMANT_CODE')->where($where)->order_by('GMEtudiant.GMET_NOM ASC, GMEtudiant.GMET_PRENOM ASC')->get();
			return $value->result();
		}
		
		public function getByPagePromotion($num_page,$number_promotion_page)
		{
			if($num_page>0 and $number_promotion_page>=0)
			{
				if($number_promotion_page==0)
				{
					$number_promotion_page=1;
				}

				if($number_promotion_page==1)
				{
					$min = ($num_page+$number_promotion_page)-$num_page-1;
				}

				else
				{
					$min = ($num_page+$number_promotion_page)-$num_page;
				}
			
				$value = $this->db->distinct()->select('GMFormation.GMFO_FORMATION, GMFormation.GMFO_NIVEAU, GMFormation.GMFO_CODE, GM_promotion.GMPR_ANNEE, GMAntenne.GMANT_VILLE, GMAntenne.GMANT_CODE')
											  ->from('GM_Promotion')
											  ->join('GMFormation','GM_promotion.GMFO_CODE = GMFormation.GMFO_CODE')
											  ->join('GMAntenne','GM_promotion.GMANT_CODE = GMAntenne.GMANT_CODE')
											  ->order_by('GM_promotion.GMPR_ANNEE','DESC');

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
	}
?>