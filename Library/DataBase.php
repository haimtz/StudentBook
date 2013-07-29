<?php
        #mysqli_connect(host,username,password,dbname); 
        
        $connection;
        
        function connect()
        {
            global $connection;
            $host = "localhost:3306";
            $username = "root";
            $password = "1234";
            $dabase_name = "sbdb";
            
            $connection = mysql_connect($host, $username, $password, $dabase_name);
        }
        
        function close()
        {
            global $connection;
            
            #$connection->close();
        }
        
        function insert()
        {
            global $connection;
            mysql_query('INSERT INTO users (username, email) VALUES ("abc33", "host@gmail.com")', $connection);
            #$connection->query("INSERT INTO users (username, email) VALUES ('abc 2', 'host@gmail.com')")
        }
?>
