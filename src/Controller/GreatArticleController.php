<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GreatArticleController extends AbstractController
{
    /**
     * @Route("/great/article", name="great_article")
     */
    public function index()
    {
        return $this->render('great_article/index.html.twig', [
            'controller_name' => 'GreatArticleController',
        ]);
    }
}
