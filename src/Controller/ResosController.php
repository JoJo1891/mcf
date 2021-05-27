<?php

namespace App\Controller;

use App\Entity\Resos;
use App\Form\ResosType;
use App\Repository\ResosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/resos")
 */
class ResosController extends AbstractController
{
    /**
     * @Route("/", name="resos_index", methods={"GET"})
     */
    public function index(ResosRepository $resosRepository): Response
    {
        return $this->render('resos/index.html.twig', [
            'resos' => $resosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="resos_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reso = new Resos();
        $form = $this->createForm(ResosType::class, $reso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reso);
            $entityManager->flush();

            return $this->redirectToRoute('resos_index');
        }

        return $this->render('resos/new.html.twig', [
            'reso' => $reso,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="resos_show", methods={"GET"})
     */
    public function show(Resos $reso): Response
    {
        return $this->render('resos/show.html.twig', [
            'reso' => $reso,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="resos_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Resos $reso): Response
    {
        $form = $this->createForm(ResosType::class, $reso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resos_index');
        }

        return $this->render('resos/edit.html.twig', [
            'reso' => $reso,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="resos_delete", methods={"POST"})
     */
    public function delete(Request $request, Resos $reso): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reso->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reso);
            $entityManager->flush();
        }

        return $this->redirectToRoute('resos_index');
    }
}
