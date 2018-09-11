<?php

namespace LePetitCoin\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PublierController extends Controller
{
    public function publierAction()
    {
        return $this->render('LePetitCoinFrontBundle:Publier:publier.html.twig');
    }
}
