<?php

    class System_view{
        public $img;
        function __get($name) {
            $this->$name=false;
        }
        public function render($name,$layout=true){
            if(file_exists('views/'.$name.'.php')){
                if($layout){include 'views/layout/header.php';}
                include 'views/'.$name.'.php';
                if($layout){include 'views/layout/footer.php';}
            }
            
        }
    }
