<?php

    class System_database{
        private $conn;
        private $select;
        
        function __construct(){
            $this->conn=new Mysqli("localhost","root","","test");
            if($this->conn->connect_error){
                echo $this->conn->connect_error;
            }    
        }
        public function select($param){
            $this->select=$this->conn->query($param);
           
            return $this;
        }
        public function all(){
            $res=[];
             if($this->select){   
                while($row=$this->select->fetch_assoc() ){
                    $res[]=$row;
                }
             }
            return $res;
        }
        public function first(){
            if($this->select){   
                return $this->select->fetch_assoc();
            }
            else{
                return [];
            }
        }
        public function unique(){
            if($this->select){   
                return $this->select->num_rows;
            }
            else{
                return [];
            }
            
        }

        public function insert($tbl_name,$data){
            $keys=array_keys($data);
            $keys=join(",",$keys);
            $vals=array_values($data);
            $vals=join("','",$vals);
            $str="INSERT INTO ".$tbl_name." (".$keys.") VALUES ('".$vals."')";
            $res=$this->conn->query($str);
            return $res;
        }
        public function update($tbl_name,$data,$id){
            $fild_values="";
            foreach($data as $key=>$value){
                $fild_values.=$key."='".$value."',";
            }
            $fild_values=substr($fild_values, 0, -1);
            $str="UPDATE ".$tbl_name." SET ".$fild_values." WHERE id='".$id."'";
            $res=$this->conn->query($str);
            return $res;
        }
        
        
        
    }