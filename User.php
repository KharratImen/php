<?php
class user
{
    private $Login;
    private $Password;
    function __construct($Login, $Password)
    {
        $this->Login = $Login;
        $this->Password = $Password;
    }
    public function __get($GT)
    {
        if (!isset($this->$GT))
            return "erreur";
        else
            return ($this->$GT);
    }
    public function __set($GT, $value)
    {
        $this->$GT = $value;
    }
    public function __isset($GT)
    {
        return isset($this->$GT);
    }
    public function __toString()
    {
        $s = "Félicitation la login : " . $this->Login . "est ajoute avec succé";
        return $s;
    }
    function correct()
    {
        if ($this->Login === 'admin' && $this->Password === 'admin') {
            return 'true';
        } else
            return 'false';
    }
}
?>