<?php

class User
{
    protected $password = 'welkom';
    protected $username = 'admin';
    protected $logedin = false;

    public function getUsername()
    {
        return $this->username;
    }

    public function login()
    {
        if($this->isLogedin())
        {
            $this->logout();
        }
        $this->logedin = true;
        $_SESSION['user'] = $this;
    }

    public function logout()
    {
        $this->logedin = false;
        unset($_SESSION['user']);
    }

    public function check($username, $password)
    {
        if($username !== $this->username || $password !== $this->password)
            return false;
        else
            return true;
    }

    public static function isLogedin()
    {
        return isset($_SESSION['user']);
    }

    /**
     * @return User
     */
    public static function authenticated()
    {
        if( ! self::isLogedin())
        {
            return false;
        }
        return $_SESSION['user'];
    }
}
