<?php
    
    class Home extends System_controller{
        public function index(){
            echo "home->index";
        }
        public function login($param1=false,$param2=false){
            echo "$param1,$param2";
        }
        public function users(){
            $model_obj=new Models_test();
            $data=$model_obj->getall();
            var_dump($data);
        }
        public function testview(){
            $this->view->render('test',false);
        }
    }
