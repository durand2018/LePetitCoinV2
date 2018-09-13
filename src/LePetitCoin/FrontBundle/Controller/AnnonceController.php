<?php

namespace LePetitCoin\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnnonceController extends Controller {

    public function indexAction($id) {
        if (!(int) $id || $id < 0) {
            throw $this->createNotFoundException('Aucune annonce trouvée');
        }
        $tabAnnonce = $this
                ->getDoctrine()
                ->getRepository('LePetitCoinFrontBundle:Annonce')
                ->getPost($id)
        ;
        //return new Response('Affichage de l\'article n° '.$id);
        return $this->render('LePetitCoinFrontBundle:Annonce:annonce.html.twig', array('tabAnnonce' => $tabAnnonce));
    }

}
