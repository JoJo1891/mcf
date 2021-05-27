<?php

namespace App\Controller;

use App\Entity\Stylecoif;
use App\Form\StylecoifType;
use App\Repository\StylecoifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/stylecoif")
 */
class StylecoifController extends AbstractController
{
    /**
     * @Route("/", name="stylecoif_index", methods={"GET"})
     */
    public function index(StylecoifRepository $stylecoifRepository): Response
    {
        return $this->render('stylecoif/index.html.twig', [
            'stylecoifs' => $stylecoifRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="stylecoif_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $stylecoif = new Stylecoif();
        $form = $this->createForm(StylecoifType::class, $stylecoif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stylecoif);
            $entityManager->flush();

            return $this->redirectToRoute('stylecoif_index');
        }

        return $this->render('stylecoif/new.html.twig', [
            'stylecoif' => $stylecoif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stylecoif_show", methods={"GET"})
     */
    public function show(Stylecoif $stylecoif): Response
    {
        return $this->render('stylecoif/show.html.twig', [
            'stylecoif' => $stylecoif,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="stylecoif_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Stylecoif $stylecoif): Response
    {
        $form = $this->createForm(StylecoifType::class, $stylecoif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stylecoif_index');
        }

        return $this->render('stylecoif/edit.html.twig', [
            'stylecoif' => $stylecoif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stylecoif_delete", methods={"POST"})
     */
    public function delete(Request $request, Stylecoif $stylecoif): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stylecoif->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($stylecoif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('stylecoif_index');
    }
}
