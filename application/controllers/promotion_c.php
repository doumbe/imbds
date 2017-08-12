<?php

  class promotion_c extends CI_Controller
  {

    public function __construct()
    {
      parent:: __construct();

      $this->lang->load("etudiant","french");
      $this->lang->load("promotion","french");

      $this->load->model('promotion_m');

      $this->load->helper("url");
      $this->load->helper('language');
      $this->load->helper('form');
    
      $this->load->library("pagination");
      $this->load->library('table');

     // $this->load->liste_ancien();
    }

    function index()
    {
      //$this->load->ancien_annuaire();
    }

    public function promotion_annuaire()
    {
      $data['message'] = 'Promotion';
      $year = $this->promotion_m->getYearLastPromotion()->GMPR_ANNEE;
      $data['year'] = $year;
      $data['promo'] = $this->promotion_m->getPromotionByYear($year);
      $data['villes'] = $this->promotion_m->getCityPromotionByYear($year);
      $this->load->view('promotion/promotion_affichage',$data);
    }

    public function promotion_by_year()
    {
      $data['message'] = 'Promotion';
      $year = $this->promotion_m->getYearLastPromotion()->GMPR_ANNEE;
      if($this->input->post('year'))
      {
        $year = $this->input->post('year'); 
      }
      $data['year'] = $year;
      $data['promo'] = $this->promotion_m->getPromotionByYear($year);
      $data['villes'] = $this->promotion_m->getCityPromotionByYear($year);
      $this->load->view('promotion/promotion_affichage',$data);
    }

    public function etudiant_promotion_by_year($year)
    {
      $data['message'] = 'Promotion';
      $data['year'] = $year;
      $data['promo'] = $this->promotion_m->getPromotionByYear($year);
      $data['villes'] = $this->promotion_m->getCityPromotionByYear($year);
      $this->load->view('promotion/promotion_affichage',$data);
    }

    public function promotion_by_year_and_city($year,$city,$formation)
    {
      if($formation=="DESS-MBDS")
      {
        $formation = str_replace ('-', ' ', $formation);
      }
      else if($formation=="MIAGE-MBDS")
      {
        $formation = str_replace ('-', '/', $formation);
      }
      $data['promo'] = $this->promotion_m->getPromotionByYearCityFormation($year,$city,$formation);
      $this->load->view('promotion/ajax/promo_by_year_and_city',$data);
    }
  }
   
?>