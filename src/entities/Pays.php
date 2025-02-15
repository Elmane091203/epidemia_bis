<?php

namespace App;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'pays')]
class Pays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;
    #[ORM\Column(type: "string")]
    private string $nom;
    #[ORM\OneToMany(targetEntity: Zone::class, cascade: ['persist', 'remove'], mappedBy: "pays")]
    private Collection $zones;

    public function __construct()
    {
        $this->zones = new ArrayCollection();
    }
    // getters et setters
    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }
    public function getZones(): Collection
    {
        return $this->zones;
    }

    public function setZones(Zone $zone)
    {
        $zone->setPays($this);
        $this->zones->add($zone);
    }
}
