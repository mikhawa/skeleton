<?php

namespace App\Controller;

use App\Entity\GreatArticle;
use App\Form\GreatArticleType;
use App\Repository\GreatArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



/**
 * @Route("/")
 */
class GreatArticleController extends AbstractController
{


    /**
     * @Route("/", name="Accueil")
     */
    public function index2() {
        $repository = $this->getDoctrine()->getRepository(GreatArticle::class);
        $articles = $repository->findAll();
        return $this->render('great_article/index2.html.twig', [
            'controller_name' => 'GreatArticleController',
            'affiche' => $articles,
        ]);
    }

    /**
     * @Route("/article/{id}", name="voir")
     */
    public function show2(GreatArticle $product) {
        return $this->render('great_article/detailArticle.html.twig', [
            'controller_name' => 'GreatArticleController',
            'affiche' => $product,
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    /**
     * @Route("/admin", name="great_article_index", methods="GET")
     */
    public function index(GreatArticleRepository $greatArticleRepository): Response
    {
        return $this->render('great_article/index.html.twig', ['great_articles' => $greatArticleRepository->findAll()]);
    }

    /**
     * @Route("/admin/new", name="great_article_new", methods="GET|POST")
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
     * @Route("/admin/{id}", name="great_article_show", methods="GET")
     */
    public function show(GreatArticle $greatArticle): Response
    {
        return $this->render('great_article/show.html.twig', ['great_article' => $greatArticle]);
    }

    /**
     * @Route("/admin/{id}/edit", name="great_article_edit", methods="GET|POST")
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
     * @Route("/admin/{id}", name="great_article_delete", methods="DELETE")
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
