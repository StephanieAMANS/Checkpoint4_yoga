<?php

namespace App\Controller;

use App\Entity\Training;
use App\Repository\TrainingRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrainingController extends AbstractController
{
    /**
     * @Route("/training", name="training")
     */
    public function index(ManagerRegistry $managerRegistry, TrainingRepository $trainingRepository): Response
    {
        $trainingRepository = $managerRegistry->getRepository(Training::class);
        $trainings = $trainingRepository->findAll();
        return $this->render('training/index.html.twig', [
            'trainings' => $trainings,
        ]);
    }

    /**
     * @Route("/training/show/{id}", name="training_show")
     */
    public function show(ManagerRegistry $managerRegistry, Training $training, TrainingRepository $trainingRepository): Response
    {
        return $this->render('training/show.html.twig', [
            'training' => $training,
        ]);
    }

}
