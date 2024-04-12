<?php

namespace App\Controller;

use App\Entity\ContactPage;
use App\Form\ContactPageType;
use App\Repository\ContactPageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\OpeningRepository;


#[Route('/contact/page')]
class ContactPageController extends AbstractController
{
    #[Route('/', name: 'app_contact_page_index', methods: ['GET'])]
    public function index(ContactPageRepository $contactPageRepository, OpeningRepository $openingRepository): Response
    {
        $openingHours = $openingRepository->findOneBy(['openingDay' => 'Lundi']);
        $openingHourMorning = $openingHours->getOpeninghourmorning();
        $closingHourMorning = $openingHours->getClosinghourmorning();
        $openingHourAfternoon = $openingHours->getOpeninghourafternoon();
        $closingHourAfternoon = $openingHours->getClosinghourafternoon();

        return $this->render('contact_page/index.html.twig', [
            'contact_pages' => $contactPageRepository->findAll(),
            'opening' => $openingRepository->findAll(),
            'openingHourMorning' => $openingHourMorning,
            'closingHourMorning' => $closingHourMorning,
            'openingHourAfternoon' => $openingHourAfternoon,
            'closingHourAfternoon' => $closingHourAfternoon,
        ]);
    }


    #[Route('/new', name: 'app_contact_page_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contactPage = new ContactPage();
        $form = $this->createForm(ContactPageType::class, $contactPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contactPage);
            $entityManager->flush();

            return $this->redirectToRoute('app_contact_page_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contact_page/new.html.twig', [
            'contact_page' => $contactPage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contact_page_show', methods: ['GET'])]
    public function show(ContactPage $contactPage): Response
    {
        return $this->render('contact_page/show.html.twig', [
            'contact_page' => $contactPage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contact_page_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContactPage $contactPage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContactPageType::class, $contactPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_contact_page_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contact_page/edit.html.twig', [
            'contact_page' => $contactPage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contact_page_delete', methods: ['POST'])]
    public function delete(Request $request, ContactPage $contactPage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contactPage->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contactPage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contact_page_index', [], Response::HTTP_SEE_OTHER);
    }
}
