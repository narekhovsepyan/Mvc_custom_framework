<?php
    
    class Models_users extends System_model{
        public function getuserpass($email,$password){
            $result=$this->db->select("SELECT id FROM users WHERE email='$email' AND password='$password'")->first();
            return $result;  
        }
        public function setuserpass($tbl_name,$data){
            $row=$this->unique($data['email']);
            if($row==0){
                $result=$this->db->insert($tbl_name,$data);
                return $result;
            }
                else{
                  return false;  
                }
        }
        public function getuser($id){
            $result=$this->db->select("SELECT * FROM users WHERE id='$id'")->first();
            return $result;
        }
         public function unique($param){
            $result=$this->db->select("SELECT email FROM users WHERE email='$param'")->unique();
            return $result;
        }
        public function uploadImg($file_name){
            $id=$_SESSION['userid'];
            $data=array(
                        'avatar'=>$file_name,
                    );
            $result=$this->db->update('users',$data,$id);
            return $result;
        }
        public function getFriends() {
            $id=$_SESSION['userid'];
            $result=$this->db->select("SELECT * FROM users WHERE id!='$id'")->all();
            return $result;
        }
        public function getMess($to_id,$date=0){
            $from_id=$_SESSION['userid'];
            $result=$this->db->select("SELECT messages.*, users.f_name, users.l_name FROM messages LEFT JOIN users ON (users.id=messages.from_id)  WHERE ((from_id='$from_id' AND to_id='$to_id') OR (from_id='$to_id' AND to_id='$from_id')) AND date>'$date' ORDER BY date ASC")->all();
            return $result;
            
        }
        public function sendMess($tbl_name,$data){
            $result=$this->db->insert($tbl_name,$data);
            return $result;
        }
    }

