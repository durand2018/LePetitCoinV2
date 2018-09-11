<?php

namespace LePetitCoin\FrontBundle\Controller;

use LePetitCoin\FrontBundle\Entity\Annonce;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PublierController extends Controller {
    
    /**
     * 
     * @Template
     */
    public function publierAction(Request $request) {
        $annonce = new Annonce;

        $form = $this->createFormBuilder($annonce)
                ->add('categorie', TextType::class)
                ->add('type', TextType::class)
                ->add('marque', TextType::class)
                ->add('ville', TextType::class)
                ->add('email', TextType::class)
                ->add('titre', TextType::class)
                ->add('resume', TextType::class)
                ->add('description', TextType::class)
                ->add('valider',SubmitType::class)
                ->getForm()
                ;
        $form->handleRequest($request);

        if ($form->isValid()) {
            return new Response('Le formulaire est valide.');
        }
        return array('form' => $form->createView());
    }

}
