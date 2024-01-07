<?php

namespace App\Controller;

use App\Entity\Cereale;
use App\Form\CerealeType;
use App\Repository\CerealeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cereale")
 */
class CerealeController extends AbstractController
{
    /**
     * @Route("/index", name="cereale_index", methods={"GET"})
     */
    public function index(CerealeRepository $cerealeRepository): Response
    {
        return $this->render('cereale/index.html.twig', [
            'cereales' => $cerealeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cereale_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cereale = new Cereale();
        $form = $this->createForm(CerealeType::class, $cereale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cereale);
            $entityManager->flush();

            return $this->redirectToRoute('cereale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cereale/new.html.twig', [
            'cereale' => $cereale,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="cereale_show", methods={"GET"})
     */
    public function show(Cereale $cereale): Response
    {
        return $this->render('cereale/show.html.twig', [
            'cereale' => $cereale,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cereale_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Cereale $cereale, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CerealeType::class, $cereale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('cereale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cereale/edit.html.twig', [
            'cereale' => $cereale,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="cereale_delete", methods={"POST"})
     */
    public function delete(Request $request, Cereale $cereale, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cereale->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cereale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cereale_index', [], Response::HTTP_SEE_OTHER);
    }
}
