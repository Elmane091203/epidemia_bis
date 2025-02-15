<?php

namespace App;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Entity]
#[ORM\Table('zones')]
class Zone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 255)]
    private string $nom;
    #[ORM\Column(type: "string", length: 30, options: ["verte", "orange", "rouge"])]
    private string $statut;
    #[ORM\Column(type: "integer")]
    private int $nb_habitants;
    #[ORM\Column(type: "integer")]
    private int $nb_symptomatiques;
    #[ORM\Column(type: "integer")]
    private int $nb_positifs;

    #[ManyToOne(targetEntity: Pays::class, cascade: ['persist'], inversedBy: 'zones')]
    #[JoinColumn(name: 'pays_id', referencedColumnName: 'id')]
    private Pays $pays;
    #[ORM\OneToMany(targetEntity: Point::class, cascade: ['persist', 'remove'], mappedBy: "zone")]
    private Collection $points;

    public function __construct()
    {
        $this->points = new ArrayCollection();
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getPays(): Pays
    {
        return $this->pays;
    }

    public function setPays(Pays $pays): void
    {
        $this->pays = $pays;
    }
    public function getPoints()
    {
        return $this->points;
    }
    public function setPoints(Point $point)
    {
        $point->setZone($this);
        $this->points->add($point);
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }

    public function getNbHabitants(): int
    {
        return $this->nb_habitants;
    }


    public function setNbHabitants(int $nb_habitants): void
    {
        $this->nb_habitants = $nb_habitants;
    }

    public function getNbSymptomatiques(): int
    {
        return $this->nb_symptomatiques;
    }

    public function setNbSymptomatiques(int $nb_symptomatiques): void
    {
        $this->nb_symptomatiques = $nb_symptomatiques;
    }

    public function getNbPositifs(): int
    {
        return $this->nb_positifs;
    }

    public function setNbPositifs(int $nb_positifs): void
    {
        $this->nb_positifs = $nb_positifs;
    }
    public function updateFrom(Zone $zone): void
    {
        $this->nom = $zone->getNom();
        $this->statut = $zone->getStatut();
        $this->nb_habitants = $zone->getNbHabitants();
        $this->nb_symptomatiques = $zone->getNbSymptomatiques();
        $this->nb_positifs = $zone->getNbPositifs();

    }
}
