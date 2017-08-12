<?php 
	Class candidature_m extends CI_Model
	{


 
public function get_etat_preinscription($id){
   {
      $query = $this->db->select('GMCA_CONFIRMATION')
            ->from('gmcandidat_recrutement')
            ->where('gmcandidat_recrutement.GMCA_CODE',$id);
      $query = $this->db->get();
 if ($query->num_rows() > 0) { return $query->row()->GMCA_CONFIRMATION; }
                   return false; }
}
 public function insert_confirmation_preinscription($id){
 
     	$data=array(  

     	             'GMCA_CONFIRMATION'=>'1');
					$this->db->where('GMCA_CODE',$id); 
					$this->db->update('gmcandidat_recrutement', $data);
     }

public function get_GMET_CODE($id)
    {
      $query = $this->db->select('GMET_CODE')
            ->from('gmetudiant')
            ->where('gmetudiant.GMCA_CODE',$id);
      $query = $this->db->get();
 if ($query->num_rows() > 0) { return $query->row()->GMET_CODE; }
                   return false; }
     public function insert_infos_visa($id){
 
     	$data=array(  

     	                    'GMET_NUMERO_VISA'=>$this->input->post('Numero_du_visa'),
							'GMET_DATE_OBTENTION_VISA' =>  $this->input->post('GMET_DATE_OBTENTION_VISA'),
							'GMET_PAYS_VISA_DELIVRE' => $this->input->post('Pays'));
					$this->db->where('GMET_CODE',$this->get_GMET_CODE($id)); 
					$this->db->update('gmetudiant', $data);
     }

public function get_avis_jury_by_id($id){
			$this->db->select('GMCA_AVIS_JURY')
						->from('GMCandidat_Recrutement')
						->where('GMCandidat_Recrutement.GMCA_CODE', $id);
			$query = $this->db->get();
		
if ($query->num_rows() > 0) { return $query->row()->GMCA_AVIS_JURY; }
                   return false; }

public function get_etat_demande_attestaion_by_id($id){
			$this->db->select('GMCA_DEMANDE_ATTESTAION')
						->from('GMCandidat_Recrutement')
						->where('GMCandidat_Recrutement.GMCA_CODE', $id);
			$query = $this->db->get();
		
if ($query->num_rows() > 0) { return $query->row()->GMCA_DEMANDE_ATTESTAION; }
                   return false; }

 public function insert_demande_attestation_by_id($id){

     	$data=array(  

     	                    'GMCA_DEMANDE_ATTESTAION'=>'1');
					//		'GMET_DATE_OBTENTION_VISA' =>  $this->input->post('Prenom'),
					//		'GMET_PAYS_VISA_DELIVRE' => $this->input->post('Sexe'));
					$this->db->where('GMCA_CODE', $id); 
					$this->db->update('GMCandidat_Recrutement', $data);
     }


		
        public function get_etat_visa($id){
		{
			$this->db->select('GMET_NUMERO_VISA')
						->from('GMCandidat_Recrutement')
						->where('GMCandidat_Recrutement.GMCA_CODE', $id)
						->join('GMEtudiant', 'GMCandidat_Recrutement.GMET_CODE = GMEtudiant.GMET_CODE','left');
			$query = $this->db->get();
		
if ($query->num_rows() > 0) { return $query->row()->GMET_NUMERO_VISA; }
                   return false; }

		}
	  public function get_id_by_login($login){
			 $query=$this->db->select('GMCA_CODE')
						->from('gmetudiant')
						->where('gmetudiant.GMET_EMAIL',$login)
                    ;
                    $query = $this->db->get();
             if ($query->num_rows() > 0)
                 { return $query->row()->GMCA_CODE; }
                   return false; }	
		
		 public function get_etat_candidat($id){
		{   
			$GMCA_CODE=$this->get_id_by_login($id);   
			$query=$this->db->select('GMET_ETAT')
						->from('GMEtudiant')
						->where('GMEtudiant.GMCA_CODE',$GMCA_CODE);
			$query = $this->db->get();
		
if ($query->num_rows() > 0) { return $query->row()->GMET_ETAT; }
                   return false; }

		}


        public function confirmation_obtention_visa(){

        $GMET_DATE_OBTENTION_VISA=$this->input->post('Date_obtention');
        $GMET_NUMERO_VISA=$this->input->post('Numero_du_visa');
        $GMET_PAYS_VISA_DELIVRE=$this->input->post('Pays');
        $GMET_CODE ='GMET456789';

     
			$this->db->where('GMET_CODE',$GMET_CODE);  
			$this->db->SET ('GMET_DATE_OBTENTION_VISA',$GMET_DATE_OBTENTION_VISA) ;
			$this->db->SET ('GMET_NUMERO_VISA',$GMET_NUMERO_VISA) ;
			$this->db->SET ('GMET_PAYS_VISA_DELIVRE' ,$GMET_PAYS_VISA_DELIVRE ) ;
			$this->db->UPDATE ('gmetudiant') ;

        } 
       
/*
        public function insert_infos_recente_candidat(){
        $data = array(
							'GMCA_CODE' => 'aaa555',
							'NOM' =>  $this->input->post('Nom'),
							'PRENOM' =>  $this->input->post('Prenom'),
							'SEXE' => $this->input->post('Sexe'),
							'DATE_DE_NAISSANCCE' =>  $this->input->post('Date_de_naissance'),
							'EMAIL' => $this->input->post('Email'),
							'TELEPHONE' => $this->input->post('Telephone'),
							'CODE_POSTAL' => $this->input->post('Code_postal'),
							'VILLE' => $this->input->post('Ville'),
							'PAYS' => $this->input->post('Pays'),
							'NATIONALITE' => $this->input->post('Nationalite'),
							'DERNIER_DIPLOME_OBTENU' => $this->input->post('Dernier_diplome_obtenu'));
			$this->db->insert('gm_infos_récente_candidat', $data);
		}
*/


		public function insert_infos_candidat($numero_etape_inscription){
        

//		$GMET_CODE = "GMET".rand (100000,999999);
//		$GMCA_CODE = "GMCA".rand (100000,999999);

                         
             if($numero_etape_inscription==1){
                     $data = array(                                
							'GMCA_CODE' =>  $this->session->userdata('GMCA_CODE'),
							'GMET_CODE' =>  $this->session->userdata('GMET_CODE'),
							'GMCA_RESIDANT_FRANCE' =>  $this->input->post('Resident_en_france'),
							'GMCA_FORMATION_PRINCIPAL' => $this->input->post('Formation_principal'),
							'GMCA_CLASSEMENT_DERNIER_DIPLOME_NIVEAU' =>  $this->input->post('Classement_diplome'),
							'GMCA_NOM_UNIVERSITE_DIPLOME_NIVEAU' => $this->input->post(''),
							'GMCA_ANNEE_CANDIDATURE' =>  date('Y'),
							'GMCA_AVIS_JURY' => 'NT',
							'GMCA_CONFIRMATION' => '',
							'GMCA_COPIE_CARTE_IDENTITE' => '',
							'GMCA_CV' => '',
							'GMCA_LETTRES_RECOMMANDATION' =>'',
							'GMCA_ACCORD_CONFIDENTIALITE' => '',
							'GMCA_CONTRAT_CONFIRMATION' => 'NULL',
							'GMCA_EXPERIENCE_PROFESSIONNELLE_TICS' =>'',
							'GMCA_COMPETENCES_TECHNIQUES' => '',
							'GMCA_DATE_CANDIDATURE' =>date('Y-m-d'),
					        'GMCA_MOT_DE_PASSE' =>$this->session->userdata('GMCA_MOT_DE_PASSE')
							);
        $data_etudiant['GMET_CODE']=$this->session->userdata('GMET_CODE');
        $data_etudiant['GMCA_CODE']=$this->session->userdata('GMCA_CODE');
        $data_etudiant['GMET_NUMERO_ETUDIANT']='';
        $data_etudiant['GMET_CIVILITE']=$this->input->post('Civilite');
        $data_etudiant['GMET_NOM']=$this->input->post('Nom');
        $data_etudiant['GMET_PRENOM']=$this->input->post('Prenom');
        $data_etudiant['GMET_PHOTO']='';
        $data_etudiant['GMET_NATIONALITE']=$this->input->post('Nationalite');
        $data_etudiant['GMET_TELEPHONE_DOMICILE']=$this->input->post('Tel');
        $data_etudiant['GMET_TELEPHONE_PORTABLE']=$this->input->post('Tel');
        $data_etudiant['GMET_EMAIL']=$this->input->post('Email');
        $data_etudiant['GMET_EMAIL_2']='';
        $data_etudiant['GMET_DATE_NAISSANCE']=$this->input->post('Date_de_naissance');
        $data_etudiant['GMET_LIEU_NAISSANCE']=$this->input->post('Lieu_de_naissance');
        $data_etudiant['GMET_DEPARTEMENT_NAISSANCE']=$this->input->post('Departement');
        $data_etudiant['GMET_PAYS_NAISSANCE']=$this->input->post('Pays');
        $data_etudiant['GMET_DERNIER_DIPLOME']=$this->input->post('Dernier_diplome');
        $data_etudiant['GMET_NUMERO_SEC_SOCIALE']=$this->input->post('Numero_S_Social');
        $data_etudiant['GMET_ADRESSE_FRANCE']=$this->input->post('Adresse_en_france');
        $data_etudiant['GMET_CODE_POSTAL']=$this->input->post('Code_postal');
        $data_etudiant['GMET_VILLE']=$this->input->post('Ville');
        $data_etudiant['GMET_PAYS']=$this->input->post('Pays');
        $data_etudiant['GMET_ADRESSE_ETRANGER']=$this->input->post('');
        $data_etudiant['GMET_VILLE_ETRANGER']=$this->input->post('Ville1');
        $data_etudiant['GMET_PAYS_ETRANGER']=$this->input->post('');
        $data_etudiant['GMET_NUMERO_CAMPUS_FRANCE']=$this->input->post('Numero_campus_France');
        $data_etudiant['GMET_POSSIBILITE_APPRENTISSAGE']=$this->input->post('Apprentissage');
        $data_etudiant['GMET_STATUT']=$this->input->post('');
        $data_etudiant['GMET_REMARQUES']=$this->input->post('Remarque');
        $data_etudiant['GMET_ETAT']='candidat';
     

		$this->db->insert('gmetudiant', $data_etudiant);
		$this->db->insert('gmcandidat_recrutement', $data);
         }
         if($numero_etape_inscription==2){

                                           
						$GMCA_COPIE_CARTE_IDENTITE =$this->input->post('c_i');
						$GMCA_CV = $this->input->post('cv');
					    $GMCA_LETTRES_RECOMMANDATION =$this->input->post('lr_1');
		    	
			$this->db->where('GMCA_CODE',$this->session->userdata('GMCA_CODE'));  
		    	
		//	$this->db->SET ('GMCA_CONFIRMATION',$GMCA_CONFIRMATION) ;
			$this->db->SET ('GMCA_COPIE_CARTE_IDENTITE',$GMCA_COPIE_CARTE_IDENTITE) ;
			$this->db->SET ('GMCA_CV',$GMCA_CV) ;
			$this->db->SET ('GMCA_LETTRES_RECOMMANDATION' ,$GMCA_LETTRES_RECOMMANDATION ) ;
			$this->db->UPDATE ('gmcandidat_recrutement') ;


        }

		}
/*		public function insert_infos_etudiant(){
        
        //$data_etudiant['GMET_CODE']='GMET888142';
        
        $data_etudiant['GMET_CODE']='GMET456789';
        $data_etudiant['GMCA_CODE']='';
        $data_etudiant['GMET_NUMERO_ETUDIANT']='21458749';
        $data_etudiant['GMET_CIVILITE']=$this->input->post('Civilite');
        $data_etudiant['GMET_NOM']=$this->input->post('Nom');
        $data_etudiant['GMET_PRENOM']=$this->input->post('Prenom');
        $data_etudiant['GMET_PHOTO']='';
        $data_etudiant['GMET_NATIONALITE']=$this->input->post('Nationalite');
        $data_etudiant['GMET_TELEPHONE_DOMICILE']=$this->input->post('Tel');
        $data_etudiant['GMET_TELEPHONE_PORTABLE']=$this->input->post('Tel');
        $data_etudiant['GMET_EMAIL']=$this->input->post('Email');
        $data_etudiant['GMET_EMAIL_2']='';
        $data_etudiant['GMET_DATE_NAISSANCE']=$this->input->post('Date_de_naissance');
        $data_etudiant['GMET_LIEU_NAISSANCE']=$this->input->post('Lieu_de_naissance');
        $data_etudiant['GMET_DEPARTEMENT_NAISSANCE']=$this->input->post('Departement');
        $data_etudiant['GMET_PAYS_NAISSANCE']=$this->input->post('Pays');
        $data_etudiant['GMET_DERNIER_DIPLOME']=$this->input->post('Dernier_diplome');
        $data_etudiant['GMET_NUMERO_SEC_SOCIALE']=$this->input->post('Numero_S_Social');
        $data_etudiant['GMET_ADRESSE_FRANCE']=$this->input->post('Adresse_en_france');
        $data_etudiant['GMET_CODE_POSTAL']=$this->input->post('Code_postal');
        $data_etudiant['GMET_VILLE']=$this->input->post('Ville');
        $data_etudiant['GMET_PAYS']=$this->input->post('Pays');
        $data_etudiant['GMET_ADRESSE_ETRANGER']=$this->input->post('');
        $data_etudiant['GMET_VILLE_ETRANGER']=$this->input->post('Ville1');
        $data_etudiant['GMET_PAYS_ETRANGER']=$this->input->post('');
        $data_etudiant['GMET_NUMERO_CAMPUS_FRANCE']=$this->input->post('Numero_campus_France');
        $data_etudiant['GMET_POSSIBILITE_APPRENTISSAGE']=$this->input->post('Apprentissage');
        $data_etudiant['GMET_STATUT']=$this->input->post('');
        $data_etudiant['GMET_REMARQUES']=$this->input->post('Remarque');
        $data_etudiant['GMET_ETAT']='candidat';




		$this->db->insert('gmetudiant', $data_etudiant);


		}
*/		public function insert_document_candidat(){
      
	//						'GMCA_CODE' => '',
	//						'GMET_CODE' =>  '',
	//						'GMCA_RESIDANT_FRANCE' => '',
	//						'GMCA_FORMATION_PRINCIPAL' => '',
	//						'GMCA_CLASSEMENT_DERNIER_DIPLOME_NIVEAU' =>  '',
	//						'GMCA_NOM_UNIVERSITE_DIPLOME_NIVEAU' =>'',
	//						'GMCA_ANNEE_CANDIDATURE' =>  '',
	//						'GMCA_AVIS_JURY' => '',
	//						'GMCA_CONFIRMATION' => '',
        	        /*        'GMCA_CODE' => 'aaa111',
							'GMET_CODE' =>  $this->input->post('Nom'),
							'GMCA_RESIDANT_FRANCE' =>  $this->input->post('Resident_en_france'),
							'GMCA_FORMATION_PRINCIPAL' => $this->input->post('Formation_principal'),
							'GMCA_CLASSEMENT_DERNIER_DIPLOME_NIVEAU' =>  $this->input->post(''),
							'GMCA_NOM_UNIVERSITE_DIPLOME_NIVEAU' => $this->input->post(''),
							'GMCA_ANNEE_CANDIDATURE' =>  date('Y'),
							'GMCA_AVIS_JURY' => 'En attente',
					*/	
						$GMCA_COPIE_CARTE_IDENTITE =$this->input->post('c_i');
						$GMCA_CV = $this->input->post('cv');
					    $GMCA_LETTRES_RECOMMANDATION =$this->input->post('lr_1');
					    $GMCA_CONFIRMATION='NULL';
					    $GMCA_CODE='GMCA987654';
					//	$GMCA_ACCORD_CONFIDENTIALITE = '',
					//		GMCA_CONTRAT_CONFIRMATION' => '',
					//		'GMCA_EXPERIENCE_PROFESSIONNELLE_TICS' =>'',
					//		'GMCA_COMPETENCES_TECHNIQUES' => '',
			$GMCA_DATE_CANDIDATURE =date('Y-m-d');
		    	
			$this->db->where('GMCA_CODE',$GMCA_CODE);  
			$this->db->SET ('GMCA_CONFIRMATION',$GMCA_CONFIRMATION) ;
			$this->db->SET ('GMCA_COPIE_CARTE_IDENTITE',$GMCA_COPIE_CARTE_IDENTITE) ;
			$this->db->SET ('GMCA_CV',$GMCA_CV) ;
			$this->db->SET ('GMCA_DATE_CANDIDATURE',$GMCA_DATE_CANDIDATURE) ;
			$this->db->SET ('GMCA_LETTRES_RECOMMANDATION' ,$GMCA_LETTRES_RECOMMANDATION ) ;
			$this->db->UPDATE ('gmcandidat_recrutement') ;
}
        
		
	
	//	$this->db->insert('gmetudiant', $data_etudiant);

			     
			     
		//	$this->db->where('GMANT_CODE', $code);
		//	$this->db->update('gmantenne', $this);
	

		
//UPDATE table
//SET nom_colonne_1 = 'nouvelle valeur'
//WHERE condition 

       //    $this->db->insert('GMDocumentAttache', $data_cv);

	    //	$this->db->where('GMDA_CODE', $data_cv['GMDA_CODE']);
	   // 	$this->db->update('GMDocumentAttache', $data_cv_doc);

//INSERT INTO `gmcandidat_recrutement` (`GMCA_COPIE_CARTE_IDENTITE`, `GMCA_CV`, `GMCA_LETTRES_RECOMMANDATION`, `GMCA_ACCORD_CONFIDENTIALITE`, `GMCA_CONTRAT_CONFIRMATION`,
// `GMCA_EXPERIENCE_PROFESSIONNELLE_TICS`, `GMCA_COMPETENCES_TECHNIQUES`, `GMCA_DATE_CANDIDATURE`) VALUES ('', 'CV_ESSIKA_ JAOUAD.pdf', 'CV_Job .pdf', '', '', '', '', '')
     	
	public function insert_dossier_candidature()
		{
			$rand = "0001";
			$data_etudiant=array();
			$data_candidat=array();
			$data_etudiant_sn=array();

			$annee = str_split($this->input->post('GMCA_ANNEE_CANDIDATURE'),2)[1];
			$id_etu = "GMET".$annee;
			$id_cand = "GMCA".$annee;

			$query_exist_cand =$this->db->select('*')->from('GMCandidat_recrutement')->like('GMCA_CODE', $id_cand)->order_by('GMCA_CODE')->get();
			$query_exist_etu =$this->db->select('*')->from('GMEtudiant')->like('GMET_CODE', $id_etu)->order_by('GMET_CODE')->get();
			echo $id_cand.' '.$id_etu;
			//
			
			
			if($query_exist_cand->num_rows>0)
			{
				$new_pos = str_split($query_exist_cand->result()[($query_exist_cand->num_rows)-1]->GMCA_CODE,6)[1]+1;
				if($new_pos<=9)
				{
					$new_pos="000".$new_pos;
				}
				if(10<=$new_pos && $new_pos<=99)
				{
					$new_pos="00".$new_pos;
				}
				if(100<=$new_pos && $new_pos<=999)
				{
					$new_pos="0".$new_pos;
				}
				$id_cand=$id_cand.$new_pos;
				//echo var_dump($identifiant);
				
			}
			else
			{
				$id_cand=$id_cand.$rand;
				//echo $identifiant;
			}


			if($query_exist_etu->num_rows>0)
			{
				//echo var_dump($query_exist_etu->result()[($query_exist_etu->num_rows)-1]);
				$new_pos = str_split($query_exist_etu->result()[($query_exist_etu->num_rows)-1]->GMET_CODE,6)[1]+1;
				if($new_pos<=9)
				{
					$new_pos="000".$new_pos;
				}
				if(10<=$new_pos && $new_pos<=99)
				{
					$new_pos="00".$new_pos;
				}
				if(100<=$new_pos && $new_pos<=999)
				{
					$new_pos="0".$new_pos;
				}
				$id_etu=$id_etu.$new_pos;
				//echo var_dump($identifiant);
				
			}
			else
			{
				$id_etu=$id_etu.$rand;
				//echo $identifiant;
			}

			$data_etudiant['GMET_CODE'] = $id_etu;
			$data_etudiant['GMCA_CODE'] = $id_cand;
			
			$data_candidat['GMCA_CODE'] = $id_cand;
			$data_candidat['GMET_CODE'] = $id_etu;
			//echo $id_cand.' '.$id_etu;

			$data_candidat['GMCA_RESIDANT_FRANCE'] = $this->input->post('GMCA_RESIDANT_FRANCE');
			$data_candidat['GMCA_FORMATION_PRINCIPAL'] = $this->input->post('GMCA_FORMATION_PRINCIPAL');

			$data_candidat['GMCA_CLASSEMENT_DERNIER_DIPLOME_NIVEAU'] = $this->input->post('GMCA_CLASSEMENT_DERNIER_DIPLOME_NIVEAU');
			$data_candidat['GMCA_NOM_UNIVERSITE_DIPLOME_NIVEAU'] = $this->input->post('GMCA_NOM_UNIVERSITE_DIPLOME_NIVEAU');

			$data_candidat['GMCA_ANNEE_CANDIDATURE'] = $this->input->post('GMCA_ANNEE_CANDIDATURE');

			$data_candidat['GMCA_AVIS_JURY'] = "NT";
			$data_candidat['GMCA_CONFIRMATION'] = null;
			$data_candidat['GMCA_DATE_CANDIDATURE'] = date('Y-m-d');

			$data_etudiant['GMET_NOM'] = $this->input->post('GMET_NOM');
			$data_etudiant['GMET_PRENOM'] = $this->input->post('GMET_PRENOM');

			$data_etudiant['GMET_EMAIL'] = $this->input->post('GMET_EMAIL');
			$data_etudiant['GMET_NATIONALITE'] = $this->input->post('GMET_NATIONALITE');
			$data_etudiant['GMET_DATE_NAISSANCE'] = $this->input->post('GMET_DATE_NAISSANCE');
			$data_etudiant['GMET_LIEU_NAISSANCE'] = $this->input->post('GMET_LIEU_NAISSANCE');
			$data_etudiant['GMET_DEPARTEMENT_NAISSANCE'] = $this->input->post('GMET_DEPARTEMENT_NAISSANCE');
			$data_etudiant['GMET_PAYS_NAISSANCE'] = $this->input->post('GMET_PAYS_NAISSANCE');
			$data_etudiant['GMET_TELEPHONE_PORTABLE'] = $this->input->post('GMET_TELEPHONE_PORTABLE');
			
			$data_etudiant['GMET_DERNIER_DIPLOME'] = $this->input->post('GMET_DERNIER_DIPLOME');
			$data_etudiant['GMET_POSSIBILITE_APPRENTISSAGE'] = 0;
			$data_etudiant['GMET_ETAT'] = "candidat";

			$age = $data_candidat['GMCA_DATE_CANDIDATURE'] - $data_etudiant['GMET_DATE_NAISSANCE'];

			//echo ' '.explode('-',$data_candidat['GMCA_DATE_CANDIDATURE'])[1].' '.explode('-',$data_etudiant['GMET_DATE_NAISSANCE'])[1].' ';
			//echo ' '.explode('-',$data_candidat['GMCA_DATE_CANDIDATURE'])[2].' '.explode('-',$data_etudiant['GMET_DATE_NAISSANCE'])[2].' ';
			if(explode('-',$data_candidat['GMCA_DATE_CANDIDATURE'])[1]>= explode('-',$data_etudiant['GMET_DATE_NAISSANCE'])[1])
			{
				if(explode('-',$data_candidat['GMCA_DATE_CANDIDATURE'])[2]>= explode('-',$data_etudiant['GMET_DATE_NAISSANCE'])[2]){}
				else
				{
					$age--;
				}

			}
			else
			{
				$age--;
			}
			echo $age;

			if($this->input->post('GMCA_RESIDANT_FRANCE')==1)
			{
				$data_etudiant['GMET_ADRESSE_FRANCE'] = $this->input->post('GMET_ADRESSE_FRANCE');
				$data_etudiant['GMET_CODE_POSTAL'] = $this->input->post('GMET_CODE_POSTAL');
				$data_etudiant['GMET_VILLE'] = $this->input->post('GMET_VILLE');
				$data_etudiant['GMET_PAYS'] = $this->input->post('GMET_PAYS');
				$data_etudiant['GMET_NUMERO_SEC_SOCIALE'] = $this->input->post('GMET_NUMERO_SEC_SOCIALE');

				
				
			}
			else
			{
				$data_etudiant['GMET_ADRESSE_ETRANGER'] = $this->input->post('GMET_ADRESSE_ETRANGER');
				$data_etudiant['GMET_VILLE_ETRANGER'] = $this->input->post('GMET_VILLE_ETRANGER');
				$data_etudiant['GMET_PAYS_ETRANGER'] = $this->input->post('GMET_PAYS_ETRANGER');
				$data_etudiant['GMET_NUMERO_CAMPUS_FRANCE'] = $this->input->post('GMET_NUMERO_CAMPUS_FRANCE');


			}

			if($age<26 && $this->input->post('PRIM_ARRIVANT')==0)
			{
				$data_etudiant['GMET_POSSIBILITE_APPRENTISSAGE'] = 1;
			}

			$query_exist_etu_sn =$this->db->select('*')->from('GMReseauxSociaux')->like('GMRS_NOM', 'skype')->get();
			$data_etudiant_sn['GMET_CODE'] = $id_etu;
			$data_etudiant_sn['GMRS_CODE'] = $query_exist_etu_sn->row()->GMRS_CODE;
			$data_etudiant_sn['GMERS_LINK'] = $this->input->post('GMET_SKYPE');
			$data_etudiant_sn['GMERS_STATUT'] = "active";


			//echo var_dump($data_etudiant);
			//echo var_dump($data_etudiant_sn);
			//echo var_dump($data_candidat);
			$this->db->insert('GMCandidat_Recrutement', $data_candidat);
			

			$this->db->insert('GMEtudiant', $data_etudiant);
			
			$this->db->insert('gm_etudiant_reseau_social', $data_etudiant_sn);

			$data_candidat_infos = array();
			$data_candidat_infos['login'] = $data_etudiant['GMET_EMAIL'];
			$data_candidat_infos['password'] = $id_cand;
			$data_candidat_infos['nom'] = $data_etudiant['GMET_NOM'];
			$data_candidat_infos['prenom'] = $data_etudiant['GMET_PRENOM'];
			$data_candidat_infos['formation'] = $data_candidat['GMCA_FORMATION_PRINCIPAL'];
			$data_candidat_infos['annee'] = $data_candidat['GMCA_ANNEE_CANDIDATURE'];

			return $data_candidat_infos;
			

		}

		public function add_documents_dossier_candidature()
		{

		}

		public function get_id_candidat_by_id_etu($id)
		{
			$query = $this->db->select('GMCA_CODE')
						->from('GMCandidat_Recrutement')
						->where('GMCandidat_Recrutement.GMET_CODE', $id)
						->get();
			return $query->row()->GMCA_CODE;

		}
		public function get_candidat_by_id($id)
		{
			$this->db->select('*')
						->from('GMCandidat_Recrutement')
						->where('GMCandidat_Recrutement.GMCA_CODE', $id)
						->join('GMEtudiant', 'GMCandidat_Recrutement.GMET_CODE = GMEtudiant.GMET_CODE','left')
						->join('gm_etudiant_reseau_social','GMCandidat_Recrutement.GMET_CODE = gm_etudiant_reseau_social.GMET_CODE','left')
						->join('GMReseauxSociaux','gm_etudiant_reseau_social.GMRS_CODE = GMReseauxSociaux.GMRS_CODE','left')
						->join('gm_etudiant_etudes_superieures','GMCandidat_Recrutement.GMET_CODE = gm_etudiant_etudes_superieures.GMET_CODE','left')
						->join('gm_etudiant_langue','GMCandidat_Recrutement.GMET_CODE = gm_etudiant_langue.GMET_CODE','left')
						->join('GMLangue','gm_etudiant_langue.GMLA_CODE = GMLangue.GMLA_CODE','left')
						->join('GMEmploi','GMCandidat_Recrutement.GMET_CODE = GMEmploi.GMET_CODE','left')
						->join('GMStageProjetSeminaire','GMCandidat_Recrutement.GMET_CODE = GMStageProjetSeminaire.GMET_CODE','left')
						->join('GMDocumentAttache','GMCandidat_Recrutement.GMET_CODE = GMDocumentAttache.GMET_CODE','left')
						->join('GMEtudesSuperieures','gm_etudiant_etudes_superieures.GMES_CODE = GMEtudesSuperieures.GMES_CODE','left');

			$query = $this->db->get();
			return $query->row();

		}

		public function modify_infos_resume($id)
		{
			$data_candidat = array();
			$data_candidat['GMCA_CLASSEMENT_DERNIER_DIPLOME_NIVEAU'] = $this->input->post('GMCA_CLASSEMENT_DERNIER_DIPLOME_NIVEAU');
		    $data_candidat['GMCA_CLASSEMENT_DERNIER_DIPLOME_NIVEAU'] = $this->input->post('GMCA_CLASSEMENT_DERNIER_DIPLOME_NIVEAU');
		    $data_candidat['GMCA_NOM_UNIVERSITE_DIPLOME_NIVEAU'] = $this->input->post('GMCA_NOM_UNIVERSITE_DIPLOME_NIVEAU');
		    $data_candidat['GMCA_EXPERIENCE_PROFESSIONNELLE_TICS'] = $this->input->post('GMCA_EXPERIENCE_PROFESSIONNELLE_TICS');
		    $data_candidat['GMCA_COMPETENCES_TECHNIQUES'] = $this->input->post('GMCA_COMPETENCES_TECHNIQUES');
		    
			$data_etudiant['GMET_NUMERO_SEC_SOCIALE'] = $this->input->post('GMET_NUMERO_SEC_SOCIALE');
			$data_etudiant['GMET_NUMERO_CAMPUS_FRANCE'] = $this->input->post('GMET_NUMERO_CAMPUS_FRANCE');
			$data_etudiant['GMET_CIVILITE'] = $this->input->post('GMET_CIVILITE');
			$data_etudiant['GMET_REMARQUES'] = sprintf(lang('candidat_infos_resume_comp_remarques'),$this->input->post('GMCA_SITUATION'),$this->input->post('GMCA_FONGECIF'),$this->input->post('GMCA_CONTRAT_PRO'));

			$this->db->where('GMCA_CODE', $id);
			$this->db->update('GMCandidat_Recrutement', $data_candidat);
			$this->db->update('GMEtudiant', $data_etudiant);
		}

		public function upload_id_card()
		{

			if($_FILES['GMCA_COPIE_CARTE_IDENTITE']['error'] == 0)
			{
	    		
	    		$relative_url = 'files/candidatures/'.$this->input->post("GMCA_ANNEE_CANDIDATURE").'/'.strtoupper($this->input->post("GMET_NOM")).'_'.ucfirst($this->input->post("GMET_PRENOM")).'/'.$this->upload->file_name;

	   
	    		$data['GMCA_COPIE_CARTE_IDENTITE'] = $relative_url;
	    	}

	    	$this->db->where('GMCA_CODE', $this->input->post('GMCA_CODE'));
	    	$this->db->update('GMCandidat_Recrutement', $data);
		}

		public function upload_cv()
		{

			$data_cv=array();
			$data_cv_doc=array();

			if($_FILES['GMCA_CV']['error'] == 0)
			{
	    		
	    		$relative_url = 'files/candidatures/'.$this->input->post("GMCA_ANNEE_CANDIDATURE").'/'.strtoupper($this->input->post("GMET_NOM")).'_'.ucfirst($this->input->post("GMET_PRENOM")).'/'.$this->upload->file_name;

	   
	    		$data['GMCA_CV'] = $relative_url;
	    	}

	    	$this->db->where('GMCA_CODE', $this->input->post('GMCA_CODE'));
	    	$this->db->update('GMCandidat_Recrutement', $data);

	    	$id_etu = $this->db->select('GMET_CODE')->from('GMCandidat_recrutement')->where('GMCA_CODE', $this->input->post('GMCA_CODE'))->get()->row()->GMET_CODE;

	    	$query_exist =$this->db->select_max('GMDA_CODE')->from('GMDocumentAttache')->get()->row()->GMDA_CODE;
	    	$suf = str_split($query_exist,4)[1].str_split($query_exist,4)[2];
	    	$suf= $suf+1;
	    	if(strlen($suf)<6)
	    	{
	    		$suf= str_pad($suf, 6, "0", STR_PAD_LEFT);
	    	}
	    	$id_da = str_split($query_exist,4)[0].$suf;

	    	$data_cv['GMDA_CODE'] = $id_da;
	    	$data_cv['GMET_CODE'] = $id_etu;
	    	$data_cv['GMDA_NOM'] = 'CV';
	    	$data_cv['GMDA_LANGUE'] = 'francais';
	    	$data_cv_doc['GMDA_DOCUMENT'] = $relative_url;
	    	$data_cv['GMDA_STATUT'] = 'actif';

	    	$this->db->insert('GMDocumentAttache', $data_cv);

	    	$this->db->where('GMDA_CODE', $data_cv['GMDA_CODE']);
	    	$this->db->update('GMDocumentAttache', $data_cv_doc);



		}

		public function upload_photo()
		{

			if($_FILES['GMET_PHOTO']['error'] == 0)
			{
	    		
	    		$relative_url = 'files/candidatures/'.$this->input->post("GMCA_ANNEE_CANDIDATURE").'/'.strtoupper($this->input->post("GMET_NOM")).'_'.ucfirst($this->input->post("GMET_PRENOM")).'/'.$this->upload->file_name;

	   
	    		$data['GMET_PHOTO'] = $relative_url;
	    	}

	    	$this->db->where('GMCA_CODE', $this->input->post('GMCA_CODE'));
	    	$this->db->update('GMEtudiant', $data);
		}

		public function upload_lettre()
		{

			if($_FILES['GMCA_LETTRES_RECOMMANDATION']['error'] == 0)
			{
	    		
	    		$relative_url = 'files/candidatures/'.$this->input->post("GMCA_ANNEE_CANDIDATURE").'/'.strtoupper($this->input->post("GMET_NOM")).'_'.ucfirst($this->input->post("GMET_PRENOM")).'/'.$this->upload->file_name;

	   
	    		$data['GMCA_LETTRES_RECOMMANDATION'] = $relative_url;
	    	}

	    	$this->db->where('GMCA_CODE', $this->input->post('GMCA_CODE'));
	    	$this->db->update('GMCandidat_Recrutement', $data);
		}


	}
?>