<?php

namespace LePetitCoin\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Categorie {

    /**
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="libelle",type="string",length=50)
     * 
     */
    private $libelle;

    /**
     * @ORM\Column(name="annonces",type="array")
     * @ORM\OneToMany(targetEntity="Annonce",mappedBy="categorie",cascade={"persist"}) 
     */
    private $annonces;

    public function getId() {
        return $this->id;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function getAnnonces() {
        return $this->annonces;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    public function setAnnonces($annonces) {
        $this->annonces = $annonces;
    }

}
