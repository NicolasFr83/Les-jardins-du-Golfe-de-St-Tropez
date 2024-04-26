<?php

namespace App\Controller;

use App\Entity\Topics;
use App\Form\TopicsType;
use App\Repository\CategoryRepository;
use App\Repository\ExposureRepository;
use App\Repository\OpeningRepository;
use App\Repository\TopicsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

#[Route('/sujets')]
class TopicsController extends AbstractController
{
    #[Route('/', name: 'app_topics_index', methods: ['GET', 'POST'])]
    public function index(
        TopicsRepository $topicsRepository,
        CategoryRepository $categoryRepository,
        ExposureRepository $exposureRepository,
        OpeningRepository $openingRepository,
        Request $request
    ): Response {

        $page = (int)$request->query->get('page', 1);

        $limit = 3;

        $filtersCategories = $request->get('categories');

        $filtersExposures = $request->get('exposures');

        $topics = $topicsRepository->getPaginatedAllTopics($page, $limit, $filtersCategories, $filtersExposures);

        $total = $topicsRepository->countAllTopics($filtersCategories, $filtersExposures);

        $categories = $categoryRepository->findAll();
        $exposures = $exposureRepository->findAll();

        $openingHours = $openingRepository->findOneBy(['openingDay' => 'Lundi']);
        $openingHourMorning = $openingHours->getOpeninghourmorning();
        $closingHourMorning = $openingHours->getClosinghourmorning();
        $openingHourAfternoon = $openingHours->getOpeninghourafternoon();
        $closingHourAfternoon = $openingHours->getClosinghourafternoon();


        if ($request->get('ajax')) {
            if (!$topics) {
                return new JsonResponse([
                    'content' => $this->renderView('topics/_no_topics_found.html.twig'),
                ]);
            } else {
                return new JsonResponse([
                    'content' => $this->renderView('topics/_topics.html.twig', [
                        'topics' => $topics,
                        'total' => $total,
                        'limit' => $limit,
                        'page' => $page,
                        'categories' => $categories,
                        'exposures' => $exposures,
                    ]),
                ]);
            }
        }

        return $this->render('topics/index.html.twig', [
            'topics' => $topics,
            'total' => $total,
            'limit' => $limit,
            'page' => $page,
            'categories' => $categories,
            'exposures' => $exposures,
            'opening' => $openingRepository->findAll(),
            'openingHourMorning' => $openingHourMorning,
            'closingHourMorning' => $closingHourMorning,
            'openingHourAfternoon' => $openingHourAfternoon,
            'closingHourAfternoon' => $closingHourAfternoon,
        ]);
    }

    #[Route('/new', name: 'app_topics_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException('Accès refusé.');
        }

        $topic = new Topics();
        $form = $this->createForm(TopicsType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($topic);
            $entityManager->flush();

            return $this->redirectToRoute('app_topics_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('topics/new.html.twig', [
            'topic' => $topic,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_topics_show', methods: ['GET'])]
    public function show(Topics $topic, OpeningRepository $openingRepository): Response
    {
        $openingHours = $openingRepository->findOneBy(['openingDay' => 'Lundi']);
        $openingHourMorning = $openingHours->getOpeninghourmorning();
        $closingHourMorning = $openingHours->getClosinghourmorning();
        $openingHourAfternoon = $openingHours->getOpeninghourafternoon();
        $closingHourAfternoon = $openingHours->getClosinghourafternoon();
        
        return $this->render('topics/show.html.twig', [
            'topic' => $topic,
            'opening' => $openingRepository->findAll(),
            'openingHourMorning' => $openingHourMorning,
            'closingHourMorning' => $closingHourMorning,
            'openingHourAfternoon' => $openingHourAfternoon,
            'closingHourAfternoon' => $closingHourAfternoon,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_topics_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Topics $topic, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException('Accès refusé.');
        }

        $form = $this->createForm(TopicsType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_topics_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('topics/edit.html.twig', [
            'topic' => $topic,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_topics_delete', methods: ['POST'])]
    public function delete(Request $request, Topics $topic, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException('Accès refusé.');
        }

        if ($this->isCsrfTokenValid('delete'.$topic->getId(), $request->request->get('_token'))) {
            $entityManager->remove($topic);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_topics_index', [], Response::HTTP_SEE_OTHER);
    }
}
