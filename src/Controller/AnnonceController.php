<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonce", name="annonce")
     *
     */
    public function index(AnnonceRepository $annonceRepository)
    {
        $annonce = $this->getDoctrine()
            ->getRepository(Annonce::class)->findAll();
        return $this->render('annonce/annonce_list.html.twig',
            ['annonces'=> $annonce]);

    }
    /**
     * @Route("/annonce/new", name="newannonce")
     *  Method({"GET" ,"POST"})
     */

    public function new(Request $request, AnnonceRepository $annonceRepository)
    {
        $annonce = new Annonce();
        $form = $this->createFormBuilder($annonce)
            ->add('titre', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('descriptioncourte', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('descriptionlongue', TextareaType::class, array('attr' => array('class' => 'form-control')))
            ->add('prix', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('photo', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('pays', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('ville', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('adresse', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('cp', IntegerType::class, array('attr' => array('class' => 'form-control')))
            ->add('Category_id', IntegerType::class, array('attr' => array('class' => 'form-control')))
            ->add('photo', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Enregistre', 'attr' =>
                array('class' => 'btn btn-primary mt-3')))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $annonce = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();
        }
            return $this->render('annonce/annonce.html.twig', [
                'form' => $form->createView()]);




    }


}
