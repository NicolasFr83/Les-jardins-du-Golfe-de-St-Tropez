<?php

namespace App\Controller;

use App\Entity\ServicesPage;
use App\Form\ServicesPageType;
use App\Repository\ServicesPageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/services/page')]
class ServicesPageController extends AbstractController
{
    #[Route('/', name: 'app_services_page_index', methods: ['GET'])]
    public function index(ServicesPageRepository $servicesPageRepository): Response
    {
        return $this->render('services_page/index.html.twig', [
            'services_pages' => $servicesPageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_services_page_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $servicesPage = new ServicesPage();
        $form = $this->createForm(ServicesPageType::class, $servicesPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($servicesPage);
            $entityManager->flush();

            return $this->redirectToRoute('app_services_page_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('services_page/new.html.twig', [
            'services_page' => $servicesPage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_services_page_show', methods: ['GET'])]
    public function show(ServicesPage $servicesPage): Response
    {
        return $this->render('services_page/show.html.twig', [
            'services_page' => $servicesPage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_services_page_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ServicesPage $servicesPage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ServicesPageType::class, $servicesPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_services_page_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('services_page/edit.html.twig', [
            'services_page' => $servicesPage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_services_page_delete', methods: ['POST'])]
    public function delete(Request $request, ServicesPage $servicesPage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$servicesPage->getId(), $request->request->get('_token'))) {
            $entityManager->remove($servicesPage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_services_page_index', [], Response::HTTP_SEE_OTHER);
    }
}
