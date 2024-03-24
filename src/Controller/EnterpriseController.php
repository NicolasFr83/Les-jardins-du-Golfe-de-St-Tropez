<?php

namespace App\Controller;

use App\Entity\Enterprise;
use App\Form\EnterpriseType;
use App\Repository\EnterpriseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/enterprise')]
class EnterpriseController extends AbstractController
{
    #[Route('/', name: 'app_enterprise_index', methods: ['GET'])]
    public function index(EnterpriseRepository $enterpriseRepository): Response
    {
        return $this->render('enterprise/index.html.twig', [
            'enterprises' => $enterpriseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_enterprise_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $enterprise = new Enterprise();
        $form = $this->createForm(EnterpriseType::class, $enterprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($enterprise);
            $entityManager->flush();

            return $this->redirectToRoute('app_enterprise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('enterprise/new.html.twig', [
            'enterprise' => $enterprise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_enterprise_show', methods: ['GET'])]
    public function show(Enterprise $enterprise): Response
    {
        return $this->render('enterprise/show.html.twig', [
            'enterprise' => $enterprise,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_enterprise_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Enterprise $enterprise, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EnterpriseType::class, $enterprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_enterprise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('enterprise/edit.html.twig', [
            'enterprise' => $enterprise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_enterprise_delete', methods: ['POST'])]
    public function delete(Request $request, Enterprise $enterprise, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$enterprise->getId(), $request->request->get('_token'))) {
            $entityManager->remove($enterprise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_enterprise_index', [], Response::HTTP_SEE_OTHER);
    }
}
