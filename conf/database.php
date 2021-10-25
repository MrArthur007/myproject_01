<?php

    class DB {
        
        private $db_host;
        private $db_user;
        private $db_pass;
        private $db_name;
        private $charset;
        

        public function connected () {
            $this->db_host ="localhost";
            $this->db_user ="root";
            $this->db_pass ="";
            $this->db_name ="web_db";
            $this->charset ="utf8mb4";
            
            try {

                $dsn = "mysql:host={$this->db_host};dbname={$this->db_name};charset={$this->charset}";
                $db = new PDO($dsn , $this->db_user, $this->db_pass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                return $db;

            } catch(PDOException $e) {

                echo "Failed to connected" . $e->getMessage();

            }
        }

    }

        

  
     


?>
