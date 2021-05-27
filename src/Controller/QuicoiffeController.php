<?php

namespace App\Controller;

use App\Entity\Quicoiffe;
use App\Form\QuicoiffeType;
use App\Repository\QuicoiffeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/quicoiffe")
 */
class QuicoiffeController extends AbstractController
{
    /**
     * @Route("/", name="quicoiffe_index", methods={"GET"})
     */
    public function index(QuicoiffeRepository $quicoiffeRepository): Response
    {
        return $this->render('quicoiffe/index.html.twig', [
            'quicoiffes' => $quicoiffeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="quicoiffe_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $quicoiffe = new Quicoiffe();
        $form = $this->createForm(QuicoiffeType::class, $quicoiffe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($quicoiffe);
            $entityManager->flush();

            return $this->redirectToRoute('quicoiffe_index');
        }

        return $this->render('quicoiffe/new.html.twig', [
            'quicoiffe' => $quicoiffe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="quicoiffe_show", methods={"GET"})
     */
    public function show(Quicoiffe $quicoiffe): Response
    {
        return $this->render('quicoiffe/show.html.twig', [
            'quicoiffe' => $quicoiffe,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="quicoiffe_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Quicoiffe $quicoiffe): Response
    {
        $form = $this->createForm(QuicoiffeType::class, $quicoiffe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('quicoiffe_index');
        }

        return $this->render('quicoiffe/edit.html.twig', [
            'quicoiffe' => $quicoiffe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="quicoiffe_delete", methods={"POST"})
     */
    public function delete(Request $request, Quicoiffe $quicoiffe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$quicoiffe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($quicoiffe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('quicoiffe_index');
    }
}
