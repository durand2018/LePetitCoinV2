<?php

namespace LePetitCoin\FrontBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    /**
     * @Template
     */
    public function indexAction() {
        $repo = $this->getDoctrine()->getRepository('LePetitCoinFrontBundle:Annonce');
        $posts = $repo->findAll();
        return array('annonces' => $posts);
    }

}
