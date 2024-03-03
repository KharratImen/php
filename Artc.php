<?php
class Artc
{
    private $reference;
    private $libelle;
    private $prix;
    private $qte;
    function __construct($reference, $libelle, $prix, $qte)
    {
        $this->reference = $reference;
        $this->libelle = $libelle;
        $this->prix = $prix;
        $this->point = $qte;
    }
    public function __get($reference)
    {
        if (!isset($this->$reference))
            return "erreur de reference";
        else
            return($this->$reference);
    }
    public function __set($reference, $value)
    {
        $this->$reference = $value;
    }
    public function __isset($reference)
    {
        return isset($this->$reference);
    }
    public function __toString()
    {
        return "<tr>
        <td>{$this->reference}<td/>
        <td>{$this->libelle}<td/>      
        <td>{$this->prix}<td/>
        <td>{$this->qte}<td/>
      <tr/>";
    }
}
$Art = new Artc("001", "tel", 1200, 20);
echo $Art;
?>