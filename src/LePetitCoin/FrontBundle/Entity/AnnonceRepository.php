<?php

namespace LePetitCoin\FrontBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AnnonceRepository extends EntityRepository {

    public function getLastPosts($nbAnnonces) {
        $em = $this->getEntityManager();
        $dql = 'SELECT a FROM LePetitCoinFrontBundle:Annonce a';
        $query = $em->createQuery($dql);
        $query->setMaxResults($nbAnnonces);
        return $query->getResult();
    }

    public function getPost($numPost) {
        $em = $this->getEntityManager();
        $dql = 'SELECT art FROM LePetitCoinFrontBundle:Annonce art WHERE art.id= :id';
        $query = $em->createQuery($dql);
        $query->setParameter('id', $numPost);
        return $query->getOneOrNullResult();
    }

}
