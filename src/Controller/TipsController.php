<?php

namespace App\Controller;

use App\Entity\Tips;
use App\Form\TipsType;
use App\Repository\OpeningRepository;
use App\Repository\TipsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

#[Route('/tutos')]
class TipsController extends AbstractController
{
    #[Route('/', name: 'app_tips_index', methods: ['GET'])]
    public function index(TipsRepository $tipsRepository, OpeningRepository $openingRepository): Response
    {
        $openingHours = $openingRepository->findOneBy(['openingDay' => 'Lundi']);
        $openingHourMorning = $openingHours->getOpeninghourmorning();
        $closingHourMorning = $openingHours->getClosinghourmorning();
        $openingHourAfternoon = $openingHours->getOpeninghourafternoon();
        $closingHourAfternoon = $openingHours->getClosinghourafternoon();

        if ($this->isGranted('ROLE_USER')) {
            return $this->render('tips/index.html.twig', [
                'tips' => $tipsRepository->findAll(),
                'opening' => $openingRepository->findAll(),
                'openingHourMorning' => $openingHourMorning,
                'closingHourMorning' => $closingHourMorning,
                'openingHourAfternoon' => $openingHourAfternoon,
                'closingHourAfternoon' => $closingHourAfternoon,
            ]);
        } else {
            return $this->redirectToRoute('app_login');
        }
    }

    #[Route('/new', name: 'app_tips_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException('Accès refusé.');
        }

        $tip = new Tips();
        $form = $this->createForm(TipsType::class, $tip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tip);
            $entityManager->flush();

            return $this->redirectToRoute('app_tips_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tips/new.html.twig', [
            'tip' => $tip,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tips_show', methods: ['GET'])]
    public function show(Tips $tip, OpeningRepository $openingRepository): Response
    {
        $openingHours = $openingRepository->findOneBy(['openingDay' => 'Lundi']);
        $openingHourMorning = $openingHours->getOpeninghourmorning();
        $closingHourMorning = $openingHours->getClosinghourmorning();
        $openingHourAfternoon = $openingHours->getOpeninghourafternoon();
        $closingHourAfternoon = $openingHours->getClosinghourafternoon();

        return $this->render('tips/show.html.twig', [
            'tip' => $tip,
            'opening' => $openingRepository->findAll(),
            'openingHourMorning' => $openingHourMorning,
            'closingHourMorning' => $closingHourMorning,
            'openingHourAfternoon' => $openingHourAfternoon,
            'closingHourAfternoon' => $closingHourAfternoon,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tips_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tips $tip, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException('Accès refusé.');
        }

        $form = $this->createForm(TipsType::class, $tip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_tips_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tips/edit.html.twig', [
            'tip' => $tip,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tips_delete', methods: ['POST'])]
    public function delete(Request $request, Tips $tip, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException('Accès refusé.');
        }

        if ($this->isCsrfTokenValid('delete'.$tip->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tip);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_tips_index', [], Response::HTTP_SEE_OTHER);
    }
}
