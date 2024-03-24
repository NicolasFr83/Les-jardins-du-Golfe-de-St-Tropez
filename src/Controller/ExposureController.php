<?php

namespace App\Controller;

use App\Entity\Exposure;
use App\Form\ExposureType;
use App\Repository\ExposureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/exposure')]
class ExposureController extends AbstractController
{
    #[Route('/', name: 'app_exposure_index', methods: ['GET'])]
    public function index(ExposureRepository $exposureRepository): Response
    {
        return $this->render('exposure/index.html.twig', [
            'exposures' => $exposureRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_exposure_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $exposure = new Exposure();
        $form = $this->createForm(ExposureType::class, $exposure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($exposure);
            $entityManager->flush();

            return $this->redirectToRoute('app_exposure_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('exposure/new.html.twig', [
            'exposure' => $exposure,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_exposure_show', methods: ['GET'])]
    public function show(Exposure $exposure): Response
    {
        return $this->render('exposure/show.html.twig', [
            'exposure' => $exposure,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_exposure_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Exposure $exposure, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExposureType::class, $exposure);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_exposure_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('exposure/edit.html.twig', [
            'exposure' => $exposure,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_exposure_delete', methods: ['POST'])]
    public function delete(Request $request, Exposure $exposure, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$exposure->getId(), $request->request->get('_token'))) {
            $entityManager->remove($exposure);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_exposure_index', [], Response::HTTP_SEE_OTHER);
    }
}
