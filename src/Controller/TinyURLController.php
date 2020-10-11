<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\TinyURL;
use App\Form\TinyURLType;
use App\Repository\TinyURLRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TinyURLController extends AbstractController
{
    /**
     * List url
     *
     * @Route("/", name="homepage", methods={"GET"})
     */
    public function index(TinyURLRepository $tinyURLRepository): Response
    {
        return $this->render('tiny_url/index.html.twig', [
            'tiny_u_r_ls' => $tinyURLRepository->findAll(),
        ]);
    }

    /**
     * Create a new url
     *
     * @Route("/new", name="tiny_url_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tinyURL = new TinyURL();
        $form    = $this->createForm(TinyURLType::class, $tinyURL);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tinyURL);
            $entityManager->flush();

            return $this->redirectToRoute('tiny_u_r_l_index');
        }

        return $this->render('tiny_url/new.html.twig', [
            'tiny_u_r_l' => $tinyURL,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Show url by id
     *
     * @Route("/{id}", name="tiny_url_show", methods={"GET"})
     */
    public function show(TinyURL $tinyURL): Response
    {
        return $this->render('tiny_url/show.html.twig', ['tiny_u_r_l' => $tinyURL]);
    }

    /**
     * Edit url
     *
     * @Route("/{id}/edit", name="tiny_url_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TinyURL $tinyURL): Response
    {
        $form = $this->createForm(TinyURLType::class, $tinyURL);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tiny_u_r_l_index');
        }

        return $this->render('tiny_url/edit.html.twig', [
            'tiny_u_r_l' => $tinyURL,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Delete url
     *
     * @Route("/{id}", name="tiny_u_]rl_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TinyURL $tinyURL): Response
    {
        if ($this->isCsrfTokenValid('delete' . $tinyURL->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tinyURL);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tiny_u_r_l_index');
    }
}
