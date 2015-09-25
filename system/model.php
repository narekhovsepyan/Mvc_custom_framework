<?php
    
    class System_model{
        protected $db;
        function __construct() {
            $this->db= new System_database;
        }
    }
