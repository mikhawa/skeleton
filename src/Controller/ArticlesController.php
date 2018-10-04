<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Users;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/", name="articles")
     */
    public function index()
    {
        
        $util = $this->getDoctrine()
        ->getRepository(Users::class)
        ->find(1);
        return new Response('Check out this great product: '.$util->getLogin());
    }
}
