<?php

namespace LePetitCoin\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LePetitCoinFrontBundle:Default:index.html.twig');
    }
}
