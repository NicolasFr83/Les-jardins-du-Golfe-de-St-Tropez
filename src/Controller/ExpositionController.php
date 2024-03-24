<?php

namespace App\Controller;

use App\Entity\Exposition;
use App\Form\ExpositionType;
use App\Repository\ExpositionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/exposition')]
class ExpositionController extends AbstractController
{
    #[Route('/', name: 'app_exposition_index', methods: ['GET'])]
    public function index(ExpositionRepository $expositionRepository): Response
    {
        return $this->render('exposition/index.html.twig', [
            'expositions' => $expositionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_exposition_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $exposition = new Exposition();
        $form = $this->createForm(ExpositionType::class, $exposition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($exposition);
            $entityManager->flush();

            return $this->redirectToRoute('app_exposition_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('exposition/new.html.twig', [
            'exposition' => $exposition,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_exposition_show', methods: ['GET'])]
    public function show(Exposition $exposition): Response
    {
        return $this->render('exposition/show.html.twig', [
            'exposition' => $exposition,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_exposition_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Exposition $exposition, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExpositionType::class, $exposition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_exposition_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('exposition/edit.html.twig', [
            'exposition' => $exposition,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_exposition_delete', methods: ['POST'])]
    public function delete(Request $request, Exposition $exposition, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$exposition->getId(), $request->request->get('_token'))) {
            $entityManager->remove($exposition);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_exposition_index', [], Response::HTTP_SEE_OTHER);
    }
}
