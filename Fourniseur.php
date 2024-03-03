<?php
class Fourniseur
{
    private $id;
    private $name;
    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    function __get($id)
    {
        if (!isset($this->$id))
            return "erreur";
        else
            return($this->$id);
    }
    function __set($id, $value)
    {
        $this->$id = $value;
    }
    function __isset($id)
    {
        return isset($this->$id);
    }
    public function __toString()
    {
        return "<option value=\"{$this->id}\">{$this->Nom}</option>";
    }
}
$fournisseurr = new Fournisseur(1, "Ali");
echo $fournisseurr;
?>