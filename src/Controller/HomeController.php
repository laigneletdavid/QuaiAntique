<?php

namespace App\Controller;

use App\Repository\PhotoRepository;
use App\Repository\SheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PhotoRepository $photoRepository, SheduleRepository $sheduleRepository): Response
    {
        $visible = 1;
        $photos = $photoRepository->findPhotosVisible($visible);
        $shedules = $sheduleRepository->findByShedulesVisible($visible);



        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'photos' => $photos,
            'shedules' => $shedules,
        ]);
    }
}
