<?php
class Entreprise_liste extends CI_Controller
{


// le constructeur pour charger tout ce dont on aura besoin
  public function __construct()
    {
    parent:: __construct();

    $this->lang->load("entreprise","french");

    $this->load->helper("url");
    $this->load->helper('language');
    $this->load->helper('form');

    $this->load->library('form_validation');
    $this->load->library('pagination');

    $this->load->model('antenne_m');
    $this->load->model('contact_m');
    $this->load->model('cours_m');
    $this->load->model('document_attache_m');
    $this->load->model('document_modele_m');
    $this->load->model('emploi_m');
    $this->load->model('entreprise_m');
    $this->load->model('etudes_superieures_m');
    $this->load->model('etudiant_m');
    $this->load->model('semestre_m');
    $this->load->model('intervenant_m');
    $this->load->model('jury_m');
    $this->load->model('langue_m');
    $this->load->model('matiere_m');
    $this->load->model('note_m');
    $this->load->model('parametre_m');
    $this->load->model('planning_m');
    $this->load->model('procedure_m');
    $this->load->model('promotion_m');
    $this->load->model('question_m');
    $this->load->model('salle_m');
    $this->load->model('seance_m');
    $this->load->model('formation_m');
    $this->load->model('social_networks_m');
    $this->load->model('soutenance_m');
    $this->load->model('stage_projet_seminaire_m');
    $this->load->model('ue_m');
    }

  public function list_procedure_admin()
  {
    $config = array();
        $config["base_url"] = base_url(). "entreprise_liste/list_procedure_admin";
      $config["total_rows"] = $this->procedure_m->nombre_procedure_administrative();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
     
        $this->pagination->initialize($config);
      
      $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
      $procedure_administrativeResult = $this->procedure_m->getByPage_procedure_administrative($config["per_page"],$start);
        $link = $this->pagination->create_links();

    // on charge des données dans un tableau pour la vue 
    $data['procedure_administrative'] = $procedure_administrativeResult;
    $data['link'] = $link;
      $data['entreprise'] = $this->entreprise_m->getEntrepriseById('GMEN637764');


    // on appel la vue avec le tableau des contacts et des entreprises
    $this->load->view('entreprise/liste/vue_liste_procedure_administrative',$data); 
  }
 /*********************************************************************/

    public function recherche_procedure_administrative()
      {
        
        $data['procedure_administrative'] = $this->procedure_m->recherche_procedure_administrative();

        $this->load->view('entreprise/liste/vue_liste_procedure_administrative',$data);
          
      }

  	public function recherche_etudiant(){
      	$data['entreprise'] = $this->entreprise_m->getEntrepriseById('GMEN637764');

      	$data['etudiant'] = array();
        if(isset($_POST) && isset($_POST['nom'])) {
        	$mot = strtoupper($_POST['nom']);
        	$data['etudiant'] = $this->etudiant_m->rechercheEtudiant($mot);
        }


        $this->load->view('entreprise/liste/vue_liste_etudiant',$data);
          
      }


  public function list_etudiant()
  {
    $config = array();
        $config["base_url"] = base_url(). "entreprise_liste/list_etudiant";
      // $config["total_rows"] = $this->procedure_m->nombre_etudiant();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
     
        $this->pagination->initialize($config);
      
      $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
      $list_etudiantResult = $this->etudiant_m->getByPage_etudiant($config["per_page"],$start);
        $link = $this->pagination->create_links();

    // on charge des données dans un tableau pour la vue 
    $data['list_etudiant'] = $list_etudiantResult;
    $data['link'] = $link;
    $data['entreprise'] = $this->entreprise_m->getEntrepriseById('GMEN637764');

    // on appel la vue avec le tableau des contacts et des entreprises
    $this->load->view('entreprise/liste/vue_liste_etudiant',$data); 
  }
} 
?>