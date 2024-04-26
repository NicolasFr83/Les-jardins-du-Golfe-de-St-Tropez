<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Repository\OpeningRepository;

class SecurityController extends AbstractController
{
    #[Route(path: '/app/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, OpeningRepository $openingRepository): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        $openingHours = $openingRepository->findOneBy(['openingDay' => 'Lundi']);
        $openingHourMorning = $openingHours->getOpeninghourmorning();
        $closingHourMorning = $openingHours->getClosinghourmorning();
        $openingHourAfternoon = $openingHours->getOpeninghourafternoon();
        $closingHourAfternoon = $openingHours->getClosinghourafternoon();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'opening' => $openingRepository->findAll(),
            'openingHourMorning' => $openingHourMorning,
            'closingHourMorning' => $closingHourMorning,
            'openingHourAfternoon' => $openingHourAfternoon,
            'closingHourAfternoon' => $closingHourAfternoon
        ]);
    }

    #[Route(path: '/app/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
