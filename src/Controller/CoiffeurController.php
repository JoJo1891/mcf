<?php

namespace App\Controller;

use App\Entity\Coiffeur;
use App\Form\CoiffeurType;
use App\Repository\CoiffeurRepository;
use App\Repository\StylecoifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/coiffeur")
 */
class CoiffeurController extends AbstractController
{
    /**
     * @Route("/", name="coiffeur_index", methods={"GET"})
     */
    public function index(CoiffeurRepository $coiffeurRepository): Response
    {
        return $this->render('coiffeur/index.html.twig', [
            'coiffeurs' => $coiffeurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="coiffeur_new", methods={"GET","POST"})
     */
    public function new(Request $request, StylecoifRepository $stylecoifRepository): Response
    {
        $styleCoif = $stylecoifRepository->findAll();
        $coiffeur = new Coiffeur();
        $form = $this->createForm(CoiffeurType::class, $coiffeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($coiffeur);
            $entityManager->flush();

            return $this->redirectToRoute('coiffeur_index');
        }

        return $this->render('coiffeur/new.html.twig', [
            'coiffeur' => $coiffeur,
            'form' => $form->createView(),
            'stylecoif' => $styleCoif,
        ]);
    }

    /**
     * @Route("/{id}", name="coiffeur_show", methods={"GET"})
     */
    public function show(Coiffeur $coiffeur): Response
    {
        return $this->render('coiffeur/show.html.twig', [
            'coiffeur' => $coiffeur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="coiffeur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Coiffeur $coiffeur): Response
    {
        $form = $this->createForm(CoiffeurType::class, $coiffeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('coiffeur_index');
        }

        return $this->render('coiffeur/edit.html.twig', [
            'coiffeur' => $coiffeur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="coiffeur_delete", methods={"POST"})
     */
    public function delete(Request $request, Coiffeur $coiffeur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coiffeur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($coiffeur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('coiffeur_index');
    }
}
