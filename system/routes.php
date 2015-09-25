<?php 
    
    class System_routes{
        private $parts;
        function __construct($uri) {
           $this->parts=explode("/",$uri);
           $this->run();
           
        }
        private function  run(){
            if(!empty($this->parts[0])){
                $ctrl=$this->parts[0];
                if(file_exists("controllers/".$ctrl.".php")){
                    include "controllers/".$ctrl.".php";
                    if(class_exists($ctrl)){
                        $ctrl_obj=new $ctrl;
                        if(!empty($this->parts[1])){
                            $method=$this->parts[1];
                            if(method_exists($ctrl_obj, $method)){
                                if(!empty($this->parts[2])){
                                    $params=array_slice($this->parts,2);
                                    call_user_func_array(array($ctrl_obj,$method), $params);
                                }else{
                                    $ctrl_obj->$method();
                                }
                        }else{
                               echo "METHOD NOT FOUND!"; 
                            }
                        }else{
                            $ctrl_obj->index();
                           }
                    }else{
                          echo "CLASS NOT FOUND!"; 
                        }
                }else{
                       echo "FILE NOT FOUND!"; 
                    }
                
            }else{
               include "controllers/auth.php";
               $default_obj=new Auth();
               $default_obj->index();
                }
        }
    }