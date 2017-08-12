<?php

/**
  * Layout Library
  *
  * Description
  * 
  *
  *
  * @author  Harris Dahon <hd@groupe-flyover.com>
  *
  * @since 2.0
  * 
  */

class Layout
{
   
    private $data = array();
    private $template = 'layouts/main';
    private $CI;
    
    public function __construct()
    {
       
        $this->CI = &get_instance();
        $this->data['meta_title'] = 'Videos Aeriennes - ';
        $this->data['meta_description'] = '';
        
    }
    
    
    
    /**
     * Charge le template, par defaut situé dans application/views/layouts/
     * 
     * @param type $template 
     */
    
    public function setTemplate($template)
    {
        
        $this->template = $template;
        
    }
    
    
    /**
     * 
     * Charge une variable de template 
     * possibilité de passer soit un variable ex : setData('nom','dupont)
     * ou un tableau de variable :
     * $data = array('nom'=>'dupont','prenom'=>'jean'); setData($data);
     * 
     * 
     * @param type $data
     * @param type $value 
     */
    public function setData($data,$value = '')
    {
        
        if(is_array($data)){
            
            foreach($data as $key=>$value){
                
                 $this->data[$key] = $value;
                
            }
            
        }
        else{
            
            $this->data[$data] = $value;
        }
    }
    
    
    
    /**
     * Affiche le template avec sa vue associée.
     * la vue est injecté dans $content : 
     * <html>
     * <head>
     * </head>
     * <body>
     * <?php echo $content;?>
     * </body>
     * </html>
     * 
     * 
     * @param type $view 
     */
    public function render($view,$data = '')
    {
        if($data != ''){
            $this->setData($data);
        }
        $this->data['content'] = $this->CI->load->view($view,  $this->data,true);
        $this->CI->load->view($this->template,$this->data);
    }
    
    
    
    public function addSrc($type,$url){
        
       $this->data['src'][$type][] = $url;
        
    }
    
    
    public function renderCssSrc(){
        
        foreach($this->data['src']['css'] as $src){
            
            
            
        }
    }
    
    
    
    
    public function addJqueryReady($script){
        
        $this->data['jquery_ready'][] = $script;
        
    }
    
    public function renderJqueryReady(){
        
        echo '$(document).ready(function() {';
        
        
        foreach ($this->data['jquery_ready'] as $script){
            echo $script."\n";
        }
        
        echo '});';
    }
    
}