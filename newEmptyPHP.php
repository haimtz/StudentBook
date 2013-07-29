<?php
    include_once './Library/DataBase.php';
?>

<?php
    $db = new DataBase();
    
    $username = 'new user';
    $email = 'mew email';
    $query = 'INSERT INTO sbdb.users (username, email) VALUES ("'.$username.'", "'.$email.'")';
    
    $db->insert($query);
    
    die('Error: OOOO');
?>
