<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    /**
     * @Route("/teacher", name="teacher")
     */
    public function index(UserRepository $userRepository): Response
    {
        $teachers = [];
        foreach($userRepository->findAll() as $teacher) {
            if (in_array('ROLE_TEACHER', $teacher->getRoles())) {
                $teachers[] = $teacher;
            }
        }
        return $this->render('teacher/index.html.twig', [
            'teachers' => $teachers,
        ]);
    }
}
