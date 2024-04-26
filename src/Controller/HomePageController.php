<?php

namespace App\Controller;

use App\Entity\HomePage;
use App\Form\HomePageType;
use App\Repository\HomePageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\OpeningRepository;
use App\Repository\OpinionRepository;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

#[Route('/')]
class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home_page_index', methods: ['GET'])]
    public function index(HomePageRepository $homePageRepository, OpeningRepository $openingRepository, OpinionRepository $opinionRepository): Response
    {
        $openingHours = $openingRepository->findOneBy(['openingDay' => 'Lundi']);
        $openingHourMorning = $openingHours->getOpeninghourmorning();
        $closingHourMorning = $openingHours->getClosinghourmorning();
        $openingHourAfternoon = $openingHours->getOpeninghourafternoon();
        $closingHourAfternoon = $openingHours->getClosinghourafternoon();

        return $this->render('home_page/index.html.twig', [
            'home_pages' => $homePageRepository->findAll(),
            'opening' => $openingRepository->findAll(),
            'openingHourMorning' => $openingHourMorning,
            'closingHourMorning' => $closingHourMorning,
            'openingHourAfternoon' => $openingHourAfternoon,
            'closingHourAfternoon' => $closingHourAfternoon,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_home_page_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, HomePage $homePage, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException('Accès refusé.');
        }

        $form = $this->createForm(HomePageType::class, $homePage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_home_page_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('home_page/edit.html.twig', [
            'home_page' => $homePage,
            'form' => $form,
        ]);
    }
}
