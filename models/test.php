<?php

    class Models_test extends System_model{
        
        function getall(){
            $result=$this->db->select("SELECT * FROM testoop");
            return $result;
            
        }
    }
