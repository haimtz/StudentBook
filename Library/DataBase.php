<?php
        #mysqli_connect(host,username,password,dbname); 
        class DataBase
        {
            private $connection = 1;
            private $host =  "localhost:3306";
            private $username = "root";
            private $password = "1234";
            private $dabase_name = "sbdb";
            
            public function __construct() {
                
                $this->connection = mysql_connect($this->host, $this->username, $this->password, $this->dabase_name);
            }
            
            public function insert($query)
            {
                mysql_query($query, $this->connection);
            }
        }
?>
