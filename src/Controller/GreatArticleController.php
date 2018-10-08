<?php

namespace App\Controller;

use App\Entity\GreatArticle;
use App\Form\GreatArticleType;
use App\Repository\GreatArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/great/article")
 */
class GreatArticleController extends AbstractController
{
    /**
     * @Route("/", name="great_article_index", methods="GET")
     */
    public function index(GreatArticleRepository $greatArticleRepository): Response
    {
        return $this->render('great_article/index.html.twig', ['great_articles' => $greatArticleRepository->findAll()]);
    }

    /**
     * @Route("/new", name="great_article_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $greatArticle = new GreatArticle();
        $form = $this->createForm(GreatArticleType::class, $greatArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($greatArticle);
            $em->flush();

            return $this->redirectToRoute('great_article_index');
        }

        return $this->render('great_article/new.html.twig', [
            'great_article' => $greatArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="great_article_show", methods="GET")
     */
    public function show(GreatArticle $greatArticle): Response
    {
        return $this->render('great_article/show.html.twig', ['great_article' => $greatArticle]);
    }

    /**
     * @Route("/{id}/edit", name="great_article_edit", methods="GET|POST")
     */
    public function edit(Request $request, GreatArticle $greatArticle): Response
    {
        $form = $this->createForm(GreatArticleType::class, $greatArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('great_article_edit', ['id' => $greatArticle->getId()]);
        }

        return $this->render('great_article/edit.html.twig', [
            'great_article' => $greatArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="great_article_delete", methods="DELETE")
     */
    public function delete(Request $request, GreatArticle $greatArticle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$greatArticle->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($greatArticle);
            $em->flush();
        }

        return $this->redirectToRoute('great_article_index');
    }
}
