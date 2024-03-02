<?php
class Article
{
    private $reference;
    private $libelle;
    private $prixAchat;
    private $Quantité;
    function __construct($reference, $libelle, $prix, $Quantité)
    {
        $this->reference = $reference;
        $this->libelle = $libelle;
        $this->prix = $prix;
        $this->Quantité = $Quantité;
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
        <td>{$this->reference}</td>
        <td>{$this->libelle}</td>
        <td>{$this->prix}</td>
        <td>{$this->Quantité}</td>
    </tr>";
    }
}
$article = new Article("223", "pc", 3500, 120);
echo $article;

?>