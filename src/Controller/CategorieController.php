<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Form\PostType;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="categorie")
     * Method({"GET" ,"POST"})
     */
    public function index(Request $request, CategorieRepository $categorieRepository)
    {
        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)->findAll();
        //$post = new Categorie();
        //$form = $this->createForm(CategorieType::class,$post);

        $categoriees = new Categorie();
        $form = $this->createFormBuilder($categoriees)
            ->add('titre', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('motscles', TextareaType::class, array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Enregistre', 'attr' =>
                array('class' => 'btn btn-primary mt-3')))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $categoriees = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoriees);
            $entityManager->flush();
            return $this->redirectToRoute('categorie');
        }

        return $this->render('categorie/categorie.html.twig',
            ['categories' => $categorie, 'form' => $form->createView(),]);

    }

    /**
     * @Route("/categorie/delete/{id}",name="categorie_supprimer")
     *
     */
    public function delete(Request $request,$id,CategorieRepository $categorieRepository )
    {
        $categorie = $categorieRepository->findOneBy(['id'=>$id]);
        //$form = $this->createForm(CategorieType::class,$categorie);

        $form = $this->createFormBuilder($categorie)
            ->add('titre', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('motscles', TextareaType::class, array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Enregistre', 'attr' =>
                array('class' => 'btn btn-primary mt-3')))
            ->getForm();


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $categorie = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categorie);
            $entityManager->flush();
            //$response = new Response();
            return $this->redirectToRoute('categorie');
        }

        $categories = $this->getDoctrine()
            ->getRepository(Categorie::class)->findAll();
        return $this->render('categorie/categorie.html.twig', [
            'form' => $form->createView(null), 'categories' => $categories ]);


    }

    /**
     * @Route ("/categorie/edit/{id}",name="categorie_edit")
     * @param Request $request
     * @param $id
     * @param CategorieRepository $categorieRepository
     */
    public function edit(Request $request,$id,CategorieRepository $categorieRepository)
    {
        $categorie = $categorieRepository->findOneBy(['id'=>$id]);
        //$form = $this->createForm(CategorieType::class,$categorie);
        $form = $this->createFormBuilder($categorie)
            ->add('titre', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('motscles', TextareaType::class, array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Enregistre', 'attr' =>
                array('class' => 'btn btn-primary mt-3')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $categorie = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categorie);
            $entityManager->flush();
            //$response = new Response();
            return $this->redirectToRoute('categorie');
        }
        $categories = $this->getDoctrine()
            ->getRepository(Categorie::class)->findAll();
        return $this->render('categorie/categorie.html.twig', [
            'form' => $form->createView(null), 'categories' => $categories ]);


    }

}
