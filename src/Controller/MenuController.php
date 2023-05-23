<?php

namespace App\Controller;

use App\Repository\DisheRepository;
use App\Repository\FormuleRepository;
use App\Repository\MenuRepository;
use App\Repository\SheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    #[Route('/menu', name: 'app_menu')]
    public function show(SheduleRepository $sheduleRepository, MenuRepository $menuRepository,DisheRepository $disheRepository, FormuleRepository $formuleRepository): Response
    {

        $visible = 1;
        $shedules = $sheduleRepository->findByShedulesVisible($visible);
        $menus = $menuRepository->findByMenuVisible($visible);
        $dishes = $disheRepository->findByVisible($visible);

        $formules = $formuleRepository->findByVisible($visible);

        return $this->render('menu/show.html.twig', [
            'controller_name' => 'MenuController',
            'shedules' => $shedules,
            'menus' => $menus,
            'formules' => $formules,
            'dishes' => $dishes,

        ]);
    }
}
