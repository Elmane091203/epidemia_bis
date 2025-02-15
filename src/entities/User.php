<?php
namespace App;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('utilisateurs')]
class User{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private int $id;
    
    #[ORM\Column(type:"string", length:255)]
    private string $nom_prenom;
    
    #[ORM\Column(type:"string", length:20,unique:true)]
    private string $login;
    
    #[ORM\Column(type:"string", length:255)]
    private string $mdp;

    #[ORM\Column(type:"string",options:["Administrateur","Agent"])]
    private string $role;

    public function __construct() {
    }

    
    public function getId(): int {
        return $this->id;
    }
    
    public function getNomPrenom(): string {
        return $this->nom_prenom;
    }
    
    public function setNomPrenom(string $nom): void {
        $this->nom_prenom = $nom;
    }
    
    public function getLogin(): string {
        return $this->login;
    }
    
    public function setLogin(string $nom): void {
        $this->login = $nom;
    }
    
    public function getMdp(): string {
        return $this->mdp;
    }
    
    public function setMdp(string $nom): void {
        $this->mdp = $nom;
    }
    public function getRole(): string {
        return $this->role;
    }
    
    public function setRole(string $nom): void {
        $this->role = $nom;
    }

}