<?php 
	Class authentification_m extends CI_Model
	{


/*    public function get_mot_de_passe ($id)
		{
			$query = $this->db->select('GMET_MOT_DE_PASSE')
						->from('gmetudiant')
						->where('gmetudiant.GMET_LOGIN',$id)
						->get();
			return $query;
	}
*/	 



/*
	public function get_mot_de_passe ($id)
		{
			$query = $this->db->select('GMET_MOT_DE_PASSE')
						->from('gmetudiant')
						->where('gmetudiant.GMET_LOGIN',$id);
			$query = $this->db->get();
 if ($query->num_rows() > 0) { return $query->row()->GMET_MOT_DE_PASSE; }
                   return false; }


*/

	function get_GMCA_CODE_by_login($login){
		$query = $this->db->select('GMCA_CODE')
						->from('gmetudiant')
						->where('gmetudiant.GMET_EMAIL',$login);
			$query = $this->db->get();
             if ($query->num_rows() > 0)
                 { 
                 	return $query->row()->GMCA_CODE; }
                   return false; }


  public function setMotDEpasse($nouveauMOTdePASSE,$login){
   $GMCA_CODE=$this->get_GMCA_CODE_by_login($login);
   $data_candidat['GMCA_MOT_DE_PASSE']=$nouveauMOTdePASSE;
   $this->db->where('GMCA_CODE',$GMCA_CODE);
   $this->db->update('GMCandidat_Recrutement',$data_candidat);
  } 	
  public function get_mot_de_passe_by_login ($login)
		{   $GMCA_CODE=$this->get_GMCA_CODE_by_login($login);
			$query = $this->db->select('GMCA_MOT_DE_PASSE')
						->from('gmcandidat_recrutement')
						->where('gmcandidat_recrutement.GMCA_CODE',$GMCA_CODE);				
//						->join('GMEtudiant', 'GMCandidat_Recrutement.GMET_CODE = GMEtudiant.GMET_CODE','left');
			$query = $this->db->get();
 if ($query->num_rows() > 0) { return $query->row()->GMCA_MOT_DE_PASSE; }
                   return false; }

  public function get_etat_candidat($login){
		{   
			$query=$this->db->select('GMET_ETAT')
						->from('GMEtudiant')
						->where('GMEtudiant.GMET_EMAIL',$login);
			$query = $this->db->get();
		
if ($query->num_rows() > 0) { return $query->row()->GMET_ETAT; }
                   return false; }

		}               
 public function verification_existence_candidat($email){
    	
    // $query=$this->get_GMCA_CODE_by_login($login);
    	$query =$this->db->select('GMET_EMAIL')
                              ->from ('GMEtudiant');
    	 $query = $this->db->get();
    	  Foreach ( $query -> result () as $user ){
    	  	if($user->GMET_EMAIL==$email){
    	  		$existe=1;
    	  	    break;}else {$existe=0;}
    }
   return $existe;
    }               
  public function get_nom_candidat($id){
    	$query =$this->db->select('GMET_NOM')
                     ->from('gmetudiant')  
                     ->where('gmetudiant.GMCA_CODE',$id);
                          $query = $this->db->get();

        if ($query->num_rows() > 0) { return $query->row()->GMET_NOM; }
                   return false; }
public function get_prenom_candidat($id){
    	$query =$this->db->select('GMET_PRENOM')
                     ->from('gmetudiant')  
                     ->where('gmetudiant.GMCA_CODE',$id);
                          $query = $this->db->get();

        if ($query->num_rows() > 0) { return $query->row()->GMET_PRENOM; }
                   return false; }
  public function get_email_by_login($login)
		{

			$query = $this->db->select('GMET_EMAIL')
						->from('gmetudiant')
						->where('gmetudiant.GMCA_CODE',$login);
			$query = $this->db->get();
 if ($query->num_rows() > 0) { return $query->row()->GMET_EMAIL; }
                   return false; }


  public function get_id_by_login($login){
			 $query=$this->db->select('GMCA_CODE')
						->from('gmetudiant')
						->where('gmetudiant.GMET_EMAIL',$login)
                    ;
                    $query = $this->db->get();
             if ($query->num_rows() > 0)
                 { return $query->row()->GMCA_CODE; }
                   return false; }


              //Ensure that there is at lea
    /*      if ($query->num_rows() > 0) { $row = $query->row(); echo $row->weight; } 

             return $gmca;
		//if ($id->num_rows() == 1) { return $id['0']; }else   return 'eeeeeeee'; 
      */  // }						




	}
	


?>

