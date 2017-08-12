 <?php
class Candidat_c extends CI_Controller
 {
   public function Candidat_Formulaire_Inscription(){ 
      

     $data['candidat'] = $this->candidat ;

      $this->form_validation->set_rules('Nom', lang('Candidat_Nom'), 'required');
      $this->form_validation->set_rules('Prenom',lang('Prenom'), 'required'); 
      $this->form_validation->set_rules('Sexe',lang('Candidat_Sexe'), 'required'); 
      $this->form_validation->set_rules('Date_de_naissance',lang('Candidat_Date_de_naissance'),'required');
      $this->form_validation->set_rules('Email',lang('Candidat_Email'), 'required|valid_email'); 
      $this->form_validation->set_rules('Code_postal',lang('Candidat_Code_postal'),'required');
      $this->form_validation->set_rules('Telephone', lang('Candidat_Telephone'),'required');
      $this->form_validation->set_rules('Ville',lang('Candidat_Ville'),'required');
      $this->form_validation->set_rules('Pays',lang('Candidat_Pays'),'required');
      $this->form_validation->set_rules('Nationalite',lang('Nationalite'),'required');
      $this->form_validation->set_rules('Dernier_diplome_obtenu',lang('Dernier_diplome_obtenu'),'required');

          if ($this->form_validation->run() == FALSE){

          $this->load->view('etudiant_candidat/Candidat_Fiche_Information_Personnel',$data);
                                                     }
          else
                                                     {

          $this->Candidature_m->Insert_Infos_Recente_Candidat();


          $this->load->view('etudiant_candidat/Formsuccess_Infos_Recente.php',$data);
                                                     
       }                                              
}
}