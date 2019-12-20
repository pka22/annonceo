<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Form\PostType;
use App\Repository\MembreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
//use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class MembreController extends AbstractController
{

/**
     * @Route("/membre", name="membre")
     * Method({"GET" ,"POST"})
     */
    public function index( Request $request, MembreRepository $membreRepository)
    {
        $membre = $this->getDoctrine()
            ->getRepository(Membre::class)->findAll();
        //$post = new Categorie();
        //$form = $this->createForm(CategorieType::class,$post);



        $membres = new Membre();
        $form = $this->createFormBuilder($membres)
            ->add('pseudo',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('mdp',PasswordType::class,array('attr'=>array('class'=>'form-control')))
            ->add('nom',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('prenom',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('telephone',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('email',EmailType::class,array('attr'=>array('class'=>'form-control')))
            ->add('civilite',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('statut',TextType::class,array('attr'=>array('class'=>'form-control')))
            //->add('date_enregistrement',DateIntervalType::class,array('attr'=>array('class'=>'form-control')))
            //->add('m',TextareaType::class,array('required'=>false,'attr'=>array('class'=>'form-control')))
            ->add('save',SubmitType::class,array('label'=>'Enregistre','attr'=>
                array('class'=>'btn btn-primary mt-3')))
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $membres=$form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($membres);
            $entityManager->flush();
            return $this->redirectToRoute('membre');
        }



        return $this->render('membre/membre.html.twig',
            ['membress'=> $membre,'form'=> $form->createView(),]);





    }


    /**
     * @Route("/membre/delete/{id}",name="membre_supprimer")
     *
     */
    public function delete(Request $request,$id,MembreRepository $membreRepository)
    {
        $membre = $membreRepository->findOneBy(['id'=>$id]);


        $form = $this->createFormBuilder($membre)
            ->add('pseudo',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('mdp',PasswordType::class,array('attr'=>array('class'=>'form-control')))
            ->add('nom',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('prenom',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('telephone',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('email',EmailType::class,array('attr'=>array('class'=>'form-control')))
            ->add('civilite',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('statut',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Enregistre', 'attr' =>
                array('class' => 'btn btn-primary mt-3')))
            ->getForm();


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $membre= $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($membre);
            $entityManager->flush();
            //$response = new Response();
            return $this->redirectToRoute('membre');
        }

        $membre = $this->getDoctrine()
            ->getRepository(Membre::class)->findAll();
        return $this->render('membre/membre.html.twig', [
            'form' => $form->createView(null), 'membress' => $membre ]);


    }

    /**
     * @Route ("/membre/edit/{id}",name="membre_edit")
     * @param Request $request
     * @param $id
     * @param MembreRepository $membreRepository
     */
    public function edit(Request $request,$id,MembreRepository $membreRepository)
    {
        $membre = $membreRepository->findOneBy(['id'=>$id]);
        //$form = $this->createForm(CategorieType::class,$categorie);
        $form = $this->createFormBuilder($membre)
            ->add('pseudo',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('mdp',PasswordType::class,array('attr'=>array('class'=>'form-control')))
            ->add('nom',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('prenom',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('telephone',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('email',EmailType::class,array('attr'=>array('class'=>'form-control')))
            ->add('civilite',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('statut',TextType::class,array('attr'=>array('class'=>'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Enregistre', 'attr' =>
                array('class' => 'btn btn-primary mt-3')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $membre = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($membre);
            $entityManager->flush();
            //$response = new Response();
            return $this->redirectToRoute('membre');
        }
        $membre = $this->getDoctrine()
            ->getRepository(Membre::class)->findAll();
        return $this->render('membre/membre.html.twig', [
            'form' => $form->createView(null), 'membress' => $membre ]);


    }


}
