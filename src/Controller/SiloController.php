<?php

namespace App\Controller;
use App\Entity\PropertySearch;
use App\Entity\Silo;
use App\Form\SiloType;
use App\Repository\SiloRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/silo")
 */
class SiloController extends AbstractController
{
    /**
     * @Route("/index", name="silo_index", methods={"GET"})
     */
    public function index(SiloRepository $siloRepository): Response
    {
        return $this->render('silo/index.html.twig', [
            'silos' => $siloRepository->findAll(),
        ]);
    }
    /**
     * @Route("/new", name="silo_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $silo = new Silo();
        $form = $this->createForm(SiloType::class, $silo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($silo);
            $entityManager->flush();

            return $this->redirectToRoute('silo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('silo/new.html.twig', [
            'silo' => $silo,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="silo_show", methods={"GET"})
     */
    public function show(Silo $silo): Response
    {
        return $this->render('silo/show.html.twig', [
            'silo' => $silo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="silo_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Silo $silo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SiloType::class, $silo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('silo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('silo/edit.html.twig', [
            'silo' => $silo,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="silo_delete", methods={"POST"})
     */
    public function delete(Request $request, Silo $silo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$silo->getId(), $request->request->get('_token'))) {
            $entityManager->remove($silo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('silo_index', [], Response::HTTP_SEE_OTHER);
    }
}
