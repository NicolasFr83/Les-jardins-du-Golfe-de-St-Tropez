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
use App\Repository\OpeningRepository;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

#[Route('/services')]
class ServicesPageController extends AbstractController
{
    #[Route('/', name: 'app_services_page_index', methods: ['GET'])]
    public function index(ServicesPageRepository $servicesPageRepository, OpeningRepository $openingRepository): Response
    {
        $openingHours = $openingRepository->findOneBy(['openingDay' => 'Lundi']);
        $openingHourMorning = $openingHours->getOpeninghourmorning();
        $closingHourMorning = $openingHours->getClosinghourmorning();
        $openingHourAfternoon = $openingHours->getOpeninghourafternoon();
        $closingHourAfternoon = $openingHours->getClosinghourafternoon();

        return $this->render('services_page/index.html.twig', [
            'services_pages' => $servicesPageRepository->findAll(),
            'opening' => $openingRepository->findAll(),
            'openingHourMorning' => $openingHourMorning,
            'closingHourMorning' => $closingHourMorning,
            'openingHourAfternoon' => $openingHourAfternoon,
            'closingHourAfternoon' => $closingHourAfternoon,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_services_page_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ServicesPage $servicesPage, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException('Accès refusé.');
        }

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
}
