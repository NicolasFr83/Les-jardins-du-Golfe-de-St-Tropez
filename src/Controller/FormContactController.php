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

class FormContactController extends AbstractController
{
    #[Route('/form/contact', name: 'app_form_contact')]
    public function index(Request $request, FormContactRepository $formContactRepository): Response
    {
        $formContact = new FormContact();
        $form = $this->createForm(FormContactType::class, $formContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formContactRepository->save($formContact, true);
        }

        return $this->render('form_contact/index.html.twig', [
            'controller_name' => 'FormContactController',
            'form_contact_contain' => $formContact,
            'form' => $form,
            'formContact' => $form->createView(),
        ]);
    }
}

