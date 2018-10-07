<?php

namespace App\Controller;

use App\Entity\GreatArticle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GreatArticleController extends AbstractController
{
    /**
     * @Route("/great/article", name="great_article")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(GreatArticle::class);
        $repository->findByExampleField(1);
        return $this->render('great_article/index.html.twig', [
            'controller_name' => 'GreatArticleController',
        ]);
    }
}
