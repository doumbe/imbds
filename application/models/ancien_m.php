<?php 
	Class ancien_m extends CI_Model
	{
		public function connexion()
		{
			//connexion à la base de données 
			$bdd = new PDO('mysql:host=localhost;dbname=imbds','root','root');
		}


		public function calcul_ancien()
		{
			//connexion pour Rosa
			$bdd = new PDO('mysql:host=localhost;dbname=imbds','root','');

			//connexion 
			//$bdd = new PDO('mysql:host=134.59.152.116:4822;dbname=imbds','imbds','Cb85QVPtHpb2QrFG');


			//Nous récupérons le contenu de la requête dans $retour_total
			$retour_total=mysql_query('SELECT COUNT(*) AS total FROM GMEtudiant WHERE GMET_ETAT="ancien"'); 
			
			//On range retour sous la forme d'un tableau.
			$donnees_total=mysql_fetch_assoc($retour_total); 
			
			//On récupère le total pour le placer dans la variable $total.
			$total=$donnees_total['total']; 
			return $total;
		}	


		// fonction pour calculer ...
		public function getStart($num_page,$number_ancien_page)
		{
			$min = ($num_page*$number_ancien_page)-($number_ancien_page+1);
			return $min;
		}
        public function getByPageOrderByAnnee($num_page,$number_ancien_page){

        		if($num_page>0 and $number_ancien_page>=0)
			{
				if($number_ancien_page==0)
				{
					$number_ancien_page=1;
				}
				if($number_ancien_page==1)
				{
					$min = ($num_page+$number_ancien_page)-$num_page-1;
				}
				else
				{
					$min = ($num_page+$number_ancien_page)-$num_page;
				}
				$where = "GMEtudiant.GMET_ETAT = 'ancien'";
				$value = $this->db->distinct()->select('GM_promotion.GMPR_ANNEE, GMEtudiant.GMET_CODE, GMEtudiant.GMET_NOM, GMEtudiant.GMET_PRENOM, GMDocumentAttache.GMDA_DOCUMENT, GMDocumentAttache.GMDA_NOM, GMDocumentAttache.GMDA_LANGUE, GMDocumentAttache.GMDA_STATUT, GM_etudiant_reseau_social.GMERS_LINK,GM_etudiant_reseau_social.GMERS_STATUT, GMReseauxSociaux.GMRS_NOM, GMReseauxSociaux.GMRS_LOGO')->from('GMEtudiant')->join('GM_promotion','GM_promotion.GMET_CODE = GMEtudiant.GMET_CODE')->join('GMFormation','GMFormation.GMFO_CODE = GM_promotion.GMFO_CODE','left outer')->join('GMAntenne','GMAntenne.GMANT_CODE = GM_promotion.GMANT_CODE','left outer')->join('GMDocumentAttache','GMEtudiant.GMET_CODE = GMDocumentAttache.GMET_CODE','left outer')->join('GM_etudiant_reseau_social','GM_etudiant_reseau_social.GMET_CODE = GMEtudiant.GMET_CODE','left outer')->join('GMReseauxSociaux','GMReseauxSociaux.GMRS_CODE = GM_etudiant_reseau_social.GMRS_CODE','left outer')->where($where)->order_by('GM_promotion.GMPR_ANNEE DESC,GMEtudiant.GMET_NOM ASC');

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

		public function getByPage($num_page,$number_ancien_page)
		{
			if($num_page>0 and $number_ancien_page>=0)
			{
				if($number_ancien_page==0)
				{
					$number_ancien_page=1;
				}
				if($number_ancien_page==1)
				{
					$min = ($num_page+$number_ancien_page)-$num_page-1;
				}
				else
				{
					$min = ($num_page+$number_ancien_page)-$num_page;
				}
				$where = "GMEtudiant.GMET_ETAT = 'ancien'";
				$value = $this->db->distinct()->select('GM_promotion.GMPR_ANNEE, GMEtudiant.GMET_CODE, GMEtudiant.GMET_NOM, GMEtudiant.GMET_PRENOM, GMDocumentAttache.GMDA_DOCUMENT, GMDocumentAttache.GMDA_NOM, GMDocumentAttache.GMDA_LANGUE, GMDocumentAttache.GMDA_STATUT, GM_etudiant_reseau_social.GMERS_LINK,GM_etudiant_reseau_social.GMERS_STATUT, GMReseauxSociaux.GMRS_NOM, GMReseauxSociaux.GMRS_LOGO')->from('GMEtudiant')->join('GM_promotion','GM_promotion.GMET_CODE = GMEtudiant.GMET_CODE')->join('GMFormation','GMFormation.GMFO_CODE = GM_promotion.GMFO_CODE','left outer')->join('GMAntenne','GMAntenne.GMANT_CODE = GM_promotion.GMANT_CODE','left outer')->join('GMDocumentAttache','GMEtudiant.GMET_CODE = GMDocumentAttache.GMET_CODE','left outer')->join('GM_etudiant_reseau_social','GM_etudiant_reseau_social.GMET_CODE = GMEtudiant.GMET_CODE','left outer')->join('GMReseauxSociaux','GMReseauxSociaux.GMRS_CODE = GM_etudiant_reseau_social.GMRS_CODE','left outer')->where($where)->order_by('GMEtudiant.GMET_NOM ASC, GMEtudiant.GMET_PRENOM ASC');

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