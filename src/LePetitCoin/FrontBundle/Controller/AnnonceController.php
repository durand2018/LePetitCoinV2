<?php

namespace LePetitCoin\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnnonceController extends Controller {

    public function indexAction() {
        return $this->render('LePetitCoinFrontBundle:Annonce:annonce.html.twig');
    }

}
