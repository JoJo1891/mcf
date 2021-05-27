<?php

namespace App\Controller;

use App\Entity\Coifqui;
use App\Form\CoifquiType;
use App\Repository\CoifquiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/coifqui")
 */
class CoifquiController extends AbstractController
{
    /**
     * @Route("/", name="coifqui_index", methods={"GET"})
     */
    public function index(CoifquiRepository $coifquiRepository): Response
    {
        return $this->render('coifqui/index.html.twig', [
            'coifquis' => $coifquiRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="coifqui_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $coifqui = new Coifqui();
        $form = $this->createForm(CoifquiType::class, $coifqui);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($coifqui);
            $entityManager->flush();

            return $this->redirectToRoute('coifqui_index');
        }

        return $this->render('coifqui/new.html.twig', [
            'coifqui' => $coifqui,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="coifqui_show", methods={"GET"})
     */
    public function show(Coifqui $coifqui): Response
    {
        return $this->render('coifqui/show.html.twig', [
            'coifqui' => $coifqui,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="coifqui_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Coifqui $coifqui): Response
    {
        $form = $this->createForm(CoifquiType::class, $coifqui);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('coifqui_index');
        }

        return $this->render('coifqui/edit.html.twig', [
            'coifqui' => $coifqui,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="coifqui_delete", methods={"POST"})
     */
    public function delete(Request $request, Coifqui $coifqui): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coifqui->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($coifqui);
            $entityManager->flush();
        }

        return $this->redirectToRoute('coifqui_index');
    }
}
