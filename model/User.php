<?php

class User
{
    private $userName;
    private $email;
    
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
    
    public function getUserName()
    {
        return $this->userName;
    }
}
?>
