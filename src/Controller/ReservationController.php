<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\User;
use App\Form\ReservationType;
use App\Repository\ResarvationRepository;
use App\Repository\RestaurantRepository;
use App\Repository\SheduleRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(Request $request, SheduleRepository $sheduleRepository, UserRepository $userRepository, EntityManagerInterface  $em, RestaurantRepository $restaurantRepository, ResarvationRepository $resarvationRepository): Response
    {
        $resa = new Reservation();
        $resa->setValidated(false);

        /** @var User $user */
        $user = $this->getUser();

        if ($user !== null){
            $resa->setCustomerName($user->getFullName() ?? '');
            $resa->setAllergy($user->getAllergy() ?? '');
            $resa->setNbrReservation($user->getNbrResa() ?? 0);
        }

        $form = $this->createForm(ReservationType::class, ($resa)) ;
        $message = null;

        $form-> handlerequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($resa);
            $em->flush();
           $message = 'Votre réservation a bien été prise en compte !';
        }

        $visible = 1;
        $shedules = $sheduleRepository->findByShedulesVisible($visible);

        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
            'form' => $form->createView(),
            'resto' => $restaurantRepository->find(1),
            'message' => $message,
            'shedules' => $shedules,
        ]);
    }



}
