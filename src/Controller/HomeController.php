<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\Categorie;
use App\Entity\Membre;
use App\Form\PostType;
use App\Form\RechercheType;
use App\Repository\AnnonceRepository;
use App\Repository\CategorieRepository;
use App\Repository\MembreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    //public function index(AnnonceRepository $repository)
    //{
        //$post = new Membre();
       // $form = $this->createForm(PostType::class, $post);
       // return $this->render('membre/membre.html.twig', [
            //'post_form' => $form->createView()
        //]);

        public function index(AnnonceRepository $annonceRepository, CategorieRepository $categorieRepository, MembreRepository $membreRepository)
    {
        $form = $this->createForm(RechercheType::class, null, compact("categorieRepository", "membreRepository"));

        //$annonces = $annonceRepository->findAll();
        $annonces = $this->getDoctrine()->getRepository(Annonce::class)->findAll();
        return $this->render('home/index.html.twig', [
            'form' => $form->createView(null),
            'annonces' => $annonces,
        ]);
    }






        //$categorieRepository = $this->getDoctrine()->getRepository(Categorie::class);
        //$membreRepository = $this->getDoctrine()->getRepository(Membre::class);
        //$form = $this->createForm(RechercheType::class,null,compact("categorieRepository"));

        //return $this->render('home/index.html.twig', [
          //  'form'=> $form->createView(null),
        //]);
        //return $this->render('home/index.html.twig', [  'controller_name' => 'HomeController',]);
    //}
}
