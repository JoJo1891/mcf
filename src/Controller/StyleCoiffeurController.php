<?php

namespace App\Controller;

use App\Entity\StyleCoiffeur;
use App\Form\StyleCoiffeurType;
use App\Repository\StyleCoiffeurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/style/coiffeur")
 */
class StyleCoiffeurController extends AbstractController
{
    /**
     * @Route("/", name="style_coiffeur_index", methods={"GET"})
     */
    public function index(StyleCoiffeurRepository $styleCoiffeurRepository): Response
    {
        return $this->render('style_coiffeur/index.html.twig', [
            'style_coiffeurs' => $styleCoiffeurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="style_coiffeur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $styleCoiffeur = new StyleCoiffeur();
        $form = $this->createForm(StyleCoiffeurType::class, $styleCoiffeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($styleCoiffeur);
            $entityManager->flush();

            return $this->redirectToRoute('style_coiffeur_index');
        }

        return $this->render('style_coiffeur/new.html.twig', [
            'style_coiffeur' => $styleCoiffeur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/addorchange", name="style_coiffeur_addorchange", methods={"GET","POST"})
     */
    public function addorchange(Request $request, $idUser, $idStyle, $etat): Response
    {
        //Si client et style de coiffure existe en base
        if (isset($idUser) && isset($idStyle)){
            $exist = findOneByIduserIdstyle($idUser, $idStyle);
            var_dump($exist);
            exit();
        }
        $styleCoiffeur = new StyleCoiffeur();
        $form = $this->createForm(StyleCoiffeurType::class, $styleCoiffeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($styleCoiffeur);
            $entityManager->flush();

            return $this->redirectToRoute('style_coiffeur_index');
        }

        return $this->render('style_coiffeur/new.html.twig', [
            'style_coiffeur' => $styleCoiffeur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="style_coiffeur_show", methods={"GET"})
     */
    public function show(StyleCoiffeur $styleCoiffeur): Response
    {
        return $this->render('style_coiffeur/show.html.twig', [
            'style_coiffeur' => $styleCoiffeur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="style_coiffeur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StyleCoiffeur $styleCoiffeur): Response
    {
        $form = $this->createForm(StyleCoiffeurType::class, $styleCoiffeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('style_coiffeur_index');
        }

        return $this->render('style_coiffeur/edit.html.twig', [
            'style_coiffeur' => $styleCoiffeur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="style_coiffeur_delete", methods={"POST"})
     */
    public function delete(Request $request, StyleCoiffeur $styleCoiffeur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$styleCoiffeur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($styleCoiffeur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('style_coiffeur_index');
    }
}
