<?php
namespace App;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Entity]
#[ORM\Table('points')]
class Point{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private int $id;
    
    #[ORM\Column(type:"string", length:255)]
    private string $nom;
    
    #[ManyToOne(targetEntity: Zone::class,cascade: ['persist'], inversedBy: 'points')]
    #[JoinColumn(name: 'zone_id', referencedColumnName: 'id')]
    private Zone $zone ; 

    public function __construct() {
    }

    
    public function getId(): int {
        return $this->id;
    }
    
    public function getNom(): string {
        return $this->nom;
    }
    
    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getZone(): Zone {
        return $this->zone;
    }
    
    public function setZone(Zone $zone): void {
        $this->zone = $zone;
    }
    public function toJson(): array {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'zone_id' => $this->zone->getId(),
            'zone_nom' => $this->zone->getNom(),
            'nb_zone_points' => count($this->zone->getPoints()),
            'pays'=>$this->zone->getPays()->getNom(),
        ];
    }
    
}