<?php

namespace App\Controller;

use App\Entity\FormContact;
use App\Form\FormContactType;
use App\Repository\FormContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/form/contact')]
class FormContactController extends AbstractController
{
    #[Route('/', name: 'app_form_contact_index', methods: ['GET'])]
    public function index(FormContactRepository $formContactRepository): Response
    {
        return $this->render('form_contact/index.html.twig', [
            'form_contacts' => $formContactRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_form_contact_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $formContact = new FormContact();
        $form = $this->createForm(FormContactType::class, $formContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($formContact);
            $entityManager->flush();

            return $this->redirectToRoute('app_form_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('form_contact/new.html.twig', [
            'form_contact' => $formContact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_form_contact_show', methods: ['GET'])]
    public function show(FormContact $formContact): Response
    {
        return $this->render('form_contact/show.html.twig', [
            'form_contact' => $formContact,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_form_contact_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FormContact $formContact, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FormContactType::class, $formContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_form_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('form_contact/edit.html.twig', [
            'form_contact' => $formContact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_form_contact_delete', methods: ['POST'])]
    public function delete(Request $request, FormContact $formContact, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formContact->getId(), $request->request->get('_token'))) {
            $entityManager->remove($formContact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_form_contact_index', [], Response::HTTP_SEE_OTHER);
    }
}
