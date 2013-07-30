<?php

class User
{
    private $idUser;
    private $userName;
    private $email;
    
    public function __construct($userName, $email) {
        
        $this->setUserName($userName);
        $this->setEmail($email);
    }
    
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
    
    public function getIdUser()
    {
        return $this->idUser;
    }
    
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
