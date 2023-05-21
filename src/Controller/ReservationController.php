<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ResarvationRepository;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\DependencyInjection\Loader\Configurator\param;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(Request $request, EntityManagerInterface  $em, RestaurantRepository $restaurantRepository, ResarvationRepository $resarvationRepository): Response
    {

        $resa = new Reservation();
        $resa->setValidated(false);
        $form = $this->createForm(ReservationType::class, ($resa)) ;
        $message = null;

        $form-> handlerequest($request);
           if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($resa);
                $em->flush();

               $message = 'Votre réservation a bien été prise en compte !';
           }

        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
            'form' => $form->createView(),
            'resto' => $restaurantRepository->find(1),
            'message' => $message,
        ]);
    }

    #[Route('/reservationvalid', name: 'app_reservation_valid')]
    public function valid(Request $request): Response
    {

        $message = 'Votre réservation a bien été prise en compte !';

        return $this->render('reservation/index.html.twig', [
            'message'=> $message,
        ]);
    }

}
