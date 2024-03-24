<?php

namespace App\Controller;

use App\Entity\Watering;
use App\Form\WateringType;
use App\Repository\WateringRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/watering')]
class WateringController extends AbstractController
{
    #[Route('/', name: 'app_watering_index', methods: ['GET'])]
    public function index(WateringRepository $wateringRepository): Response
    {
        return $this->render('watering/index.html.twig', [
            'waterings' => $wateringRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_watering_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $watering = new Watering();
        $form = $this->createForm(WateringType::class, $watering);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($watering);
            $entityManager->flush();

            return $this->redirectToRoute('app_watering_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('watering/new.html.twig', [
            'watering' => $watering,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_watering_show', methods: ['GET'])]
    public function show(Watering $watering): Response
    {
        return $this->render('watering/show.html.twig', [
            'watering' => $watering,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_watering_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Watering $watering, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(WateringType::class, $watering);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_watering_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('watering/edit.html.twig', [
            'watering' => $watering,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_watering_delete', methods: ['POST'])]
    public function delete(Request $request, Watering $watering, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$watering->getId(), $request->request->get('_token'))) {
            $entityManager->remove($watering);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_watering_index', [], Response::HTTP_SEE_OTHER);
    }
}
