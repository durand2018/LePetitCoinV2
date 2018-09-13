<?php
namespace LePetitCoin\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AnnonceRepository extends EntityRepository {
    
    public function getLastPosts($nbAnnonces){
        $em= $this->getEntityManager();
        $dql='SELECT a FROM LePetitCoinFrontBundle:Annonce a';
        $query=$em->createQuery($dql);
        $query->setMaxResults($nbAnnonces);
        return $query->getResult();
    }
    
    
}


