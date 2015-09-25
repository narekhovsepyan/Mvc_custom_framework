<?php
    
    class Auth extends System_controller{
        protected $auth_obj;
        function __construct() {
            parent::__construct();
            $this->auth_obj=new Models_users();
            if(isset($_SESSION['userid'])){
                $this->redirect("/account"); 
            }
            
        }
        public function index(){
            
            if(isset($_POST['sign_in'])){
                if(!empty($_POST['email']) && !empty($_POST['password'])){
                    $email=$_POST['email'];
                    $password=  md5($_POST['password']);
                    $row=$this->auth_obj->getuserpass($email,$password);
                    if(empty($row)){
                        $this->view->error="Wrong password";
                    }else{
                         $_SESSION['userid']=$row['id'];
                         $this->redirect("/account");
                    }
                    
                }else{
                    $this->view->error="Enter email and password";
                }
            }
            $this->view->render("users",false);
            
            
        }
        public function reg(){
            if(isset($_POST['reg'])){
                if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password'])){
                     $f_name=$_POST['first_name'];
                     $l_name=$_POST['last_name'];
                     $email=$_POST['email'];
                     $password=  md5($_POST['password']);
                     $data=array('f_name'=>$f_name,
                                    'l_name'=>$l_name,
                                    'email'=>$email,
                                   'password'=>$password);
                     $result=$this->auth_obj->setuserpass('users',$data);
                     if($result){
                         $this->view->error="Registration successfully completed";
                        
                     }else{
                         $this->view->error="This email is already taken, enter another";
                     }
                }else{
                    $this->view->error="Please fill out all fields";
                }
            }
             $this->view->render('reg',false);
        }
        
             
    }