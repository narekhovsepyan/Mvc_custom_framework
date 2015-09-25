<?php
    
    class System_controller{
        protected $view;
        function __construct() {
            $this->view=new System_view();
        }
        public function redirect($url){
            header("Location: $url");
        }
    }