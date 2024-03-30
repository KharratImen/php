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
            return($this->$GT);
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
    function connect()
    {
        include 'Connection.php';
        $sql = $bdd->query("SELECT * FROM users WHERE Login ='$this->login' and Password='$this->password'");
        $user = $sql->fetch(PDO::FETCH_OBJ);
        if ($sql->rowCount() > 0) {
            echo "Login : " . $user->login . "</br>";
        } else {
            header("Location:authentification.html");
        }
    }
}
?>