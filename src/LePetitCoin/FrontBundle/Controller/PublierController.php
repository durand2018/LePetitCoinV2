<?php

namespace LePetitCoin\FrontBundle\Controller;

use DateTime;
use DateTimeZone;
use LePetitCoin\FrontBundle\Entity\Annonce;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class PublierController extends Controller {

    /**
     * @Template
     */
    public function publierAction(Request $request) {
        $annonce = new Annonce;

        $titleOptions = array('label' => 'Titre*',
            'constraints' => array(new NotBlank,
                new Length(array('min' => 5, 'max' => 20))));

        $formulaireAnnonce = $this->createFormBuilder($annonce)
                ->add('categorie', ChoiceType::class, array(
                    'choices' => array(
                        '1' => 'Bricolage',
                        '2' => 'Jardinage',
                        '3' => 'Gros Œuvre',
                        '4' => 'Décoration'),
                    'constraints' => array(
                        new NotBlank),
                    'placeholder' => 'Choisir catégorie',
                    'label' => 'Catégorie*'))
                ->add('type', ChoiceType::class, array(
                    'choices' => array(
                        'loc' => 'loc',
                        'ven' => 'ven',
                        'pre' => 'pre'),
                    'constraints' => array(
                        new NotBlank),
                    'placeholder' => 'Choisir type',
                    'label' => 'Type*'))
                ->add('marque', TextType::class, array(
                    'constraints' => array(
                        new NotBlank),
                    'label' => 'Marque*'
                ))
                ->add('ville', TextType::class, array(
                    'constraints' => array(
                        new NotBlank),
                    'label' => 'Ville*'
                ))
                ->add('email', EmailType::class, array(
                    'constraints' => array(
                        new NotBlank),
                    'label' => 'Email*'
                ))
                ->add('titre', TextType::class, $titleOptions)
                ->add('resume', TextType::class, array(
                    'constraints' => array(
                        new NotBlank),
                    'label' => 'Résumé*'
                ))
                ->add('description', TextareaType::class, ['attr' => ['style' => 'height:100px;'],
                    'constraints' => array(
                        new NotBlank),
                    'label' => 'Description*'
                        ]
                )
                ->add('valider', SubmitType::class)
                ->getForm();
        $formulaireAnnonce->handleRequest($request);

        if ($formulaireAnnonce->isValid()) {
            $repoCat = $this->getDoctrine()->getRepository('LePetitCoinFrontBundle:Categorie');
            $categorie = $repoCat->find($annonce->getCategorie());
            $annonce->setCategorie($categorie);
            $now = new DateTime(null, new DateTimeZone('Europe/Paris'));
            $now->setTimestamp(time());
            $annonce->setDateDepot($now);


            $rep = $this->ajoutAction($annonce);
            //réaffichage de la page vierge
            return $this->redirect($this->generateUrl('publier'))

            //réaffiche formulaire rempli avec message reçu de la fonction ajoutAction
            /* array('message' => $rep,
              'formulaireAnnonce' => $formulaireAnnonce->createView(),
              ) */;
        }
        return array('formulaireAnnonce' => $formulaireAnnonce->createView(),
            'message' => '');
    }

    public function ajoutAction(Annonce $annonce) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($annonce);
        $em->flush();
        return new Response('Insertion réussie !');
    }

}
