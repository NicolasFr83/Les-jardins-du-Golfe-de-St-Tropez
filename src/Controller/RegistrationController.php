<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\OpeningRepository;
use App\Security\AppCustomAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use App\Repository\UserRepository;

#[Route('/inscription')]
class RegistrationController extends AbstractController
{
    #[Route('/', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        UserAuthenticatorInterface $userAuthenticator,
        AppCustomAuthenticator $authenticator,
        EntityManagerInterface $entityManager,
        OpeningRepository $openingRepository,
        MailerInterface $mailer
    ): Response
    {
        $user = new User();
        
        $openingHours = $openingRepository->findOneBy(['openingDay' => 'Lundi']);
        $openingHourMorning = $openingHours->getOpeninghourmorning();
        $closingHourMorning = $openingHours->getClosinghourmorning();
        $openingHourAfternoon = $openingHours->getOpeninghourafternoon();
        $closingHourAfternoon = $openingHours->getClosinghourafternoon();

        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            $email = (new TemplatedEmail())
                ->from('les-jardins-du-golfe-administration@les-jardins-du-golfe.tech')
                ->to($user->getEmail())
                ->subject('Inscription aux Jardins du Golfe')
                ->htmlTemplate('registration/email_registration.html.twig')
                ->context([
                    'user' => $user,
                ]);

            $mailer->send($email);

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );

            return $this->redirectToRoute('app_home_page_index');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
            'opening' => $openingRepository->findAll(),
            'openingHourMorning' => $openingHourMorning,
            'closingHourMorning' => $closingHourMorning,
            'openingHourAfternoon' => $openingHourAfternoon,
            'closingHourAfternoon' => $closingHourAfternoon,
        ]);
    }
}
