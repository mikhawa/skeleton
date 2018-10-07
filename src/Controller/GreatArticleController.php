<?php

namespace App\Controller;

use App\Entity\GreatArticle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GreatArticleController extends AbstractController {

    /**
     * @Route("/", name="Accueil")
     */
    public function index() {
        $repository = $this->getDoctrine()->getRepository(GreatArticle::class);
        $articles = $repository->findAll();
        return $this->render('great_article/index.html.twig', [
                    'controller_name' => 'GreatArticleController',
                    'affiche' => $articles,
        ]);
    }

    /**
     * @Route("/article/{id}", name="voir")
     */
    public function show(GreatArticle $product) {
        // use the Product!
        // ...
    }

}
