<?php

class Account extends System_controller{
    function __construct() {
        parent::__construct();
        if(!isset($_SESSION['userid'])){
            $this->redirect("/");  
        }
        $this->uploadImg();
        
    }

    public function index(){
        
            $id=$_SESSION['userid'];
            $acc_obj=new Models_users(); 
            $row=$acc_obj->getuser($id);
            $this->view->first_name=$row['f_name'];
            $this->view->last_name=$row['l_name'];
            $this->view->email=$row['email'];
            $this->view->img=$row['avatar'];
            $row_friends=$acc_obj->getFriends();
            
            $this->view->friends=$row_friends;
         
            $this->view->render('account');
            
        
    }
    public function logout(){
            unset($_SESSION['userid']);
            $this->redirect("/");
        }
    public function uploadImg() {
         if(isset($_POST['upload'])){
             if(empty($_FILES['file']['name'])){
                 $this->view->error='Error';
             }else{
                 $file_name=$_FILES['file']['name'];
                 $allowExts = array('gif','jpeg','jpg','png');
                 $temp=  explode('.',$file_name);
                 $exansion=end($temp);
                 if($_FILES['file']['size']<2000000000 && in_array($exansion, $allowExts)){
                     $file_name=date("dmyHisB").'.'.$exansion;
                     move_uploaded_file($_FILES['file']['tmp_name'],"public/uploads/".$file_name);
                     $acc_obj=new Models_users();
                     $result=$acc_obj->uploadImg($file_name);
                     if($result){
                        
                         $this->view->error='Ok';
                     }else{
                         $this->view->error='Errorrrrrr';
                     }
                 }
             }
             
         }   
    }
    public function friends($id=FALSE){
        if(!is_numeric($id)){
            $this->view->render('not_found');
            exit;
        }
       
            $acc_obj=new Models_users(); 
            $row=$acc_obj->getuser($id);
        if($row==null){
            $this->view->render('not_found');
            exit;
        }
            $this->view->id=$row['id'];
            $this->view->first_name=$row['f_name'];
            $this->view->last_name=$row['l_name'];
            $this->view->email=$row['email'];
            $this->view->img=$row['avatar'];
            $this->view->render('friends');
    }
    public function chat ($to_id){
       $from_id=$_SESSION['userid'];
       
       $acc_obj=new Models_users(); 
       if(isset($_POST['ajax_message'])){
           $data=array(
            'from_id'=>$from_id,
            'to_id'=>$to_id, 
            'text'=>$_POST['ajax_message'], 
            );
           $res=$acc_obj->sendMess('messages', $data);
           echo $res;
           exit;
       }
       
       if(isset($_POST['ajax_date'])){
           $res=$acc_obj->getMess($to_id,$_POST['ajax_date']);
           echo json_encode($res);
           exit;
       }
       $res=$acc_obj->getMess($to_id);
       $this->view->messages=$res;
        $this->view->render('chat');
    }
}

