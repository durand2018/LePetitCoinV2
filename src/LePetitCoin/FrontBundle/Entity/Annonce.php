<?php

namespace LePetitCoin\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/*
 * @ORM\Entity(repositoryClass="LePetitCoin\FrontBundle\Entity\AnnonceRepository")
 * @ORM\Table()namespace LePetitCoin\FrontBundle\Entity;
 * @author G_Delvallée2018
 */

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Annonce {

    /**
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="idsecu",type="string",length=16)
     * 
     */
    private $idSecu;

    /**
     * @ORM\Column(name="titre",type="string",length=50)
     * 
     */
    private $titre;

    /**
     * @ORM\Column(name="prix",type="float", scale=2)
     *
     */
    private $prix;

    /**
     * @ORM\Column(name="resume",type="text",length=255)
     * 
     */
    private $resume;

    /**
     * @ORM\Column(name="description",type="text",length=800)
     *  
     */
    private $description;

    /**
     * @ORM\Column(name="type",type="string",length=3)
     *
     */
    private $type;

    /**
     * @ORM\Column(name="photo",type="blob")
     *  
     */
    private $photo;

    /**
     * @ORM\Column(name="marque",type="string",length=50)
     * 
     */
    private $marque;

    /**
     * @ORM\Column(name="ville",type="string",length=50)
     * 
     */
    private $ville;

    /**
     * @ORM\Column(name="email",type="string",length=100)
     *
     */
    private $email;

    /**
     * @ORM\Column(name="categorie",type="string",length=50)
     * @ORM\ManyToOne(targetEntity="Categorie",inversedBy="annonces")
     */
    private $categorie;

    /**
     * @ORM\Column(name="date_depot",type="datetime")
     *
     */
    private $dateDepot;

    /**
     * @ORM\Column(name="archive",type="boolean")
     *
     */
    private $archive;

    /**
     * @ORM\Column(name="reprise",type="boolean")
     *
     */
    private $reprise;

    public function getId() {
        return $this->id;
    }

    public function getIdSecu() {
        return $this->idSecu;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getResume() {
        return $this->resume;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getType(){
        return $this->type;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getMarque() {
        return $this->marque;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function getDateDepot() {
        return $this->dateDepot;
    }

    public function getArchive() {
        return $this->archive;
    }

    public function getReprise() {
        return $this->reprise;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdSecu($idSecu) {
        $this->idSecu = $idSecu;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setResume($resume) {
        $this->resume = $resume;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setType(type $type) {
        $this->type = $type;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    public function setDateDepot($dateDepot) {
        $this->dateDepot = $dateDepot;
    }

    public function setArchive($archive) {
        $this->archive = $archive;
    }

    public function setReprise($reprise) {
        $this->reprise = $reprise;
    }

}
