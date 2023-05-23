<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\RestaurantRepository;;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(RestaurantRepository $restaurantRepository, Request $request, EntityManagerInterface  $em): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, ($contact)) ;

        $form-> handlerequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($contact);
            $em->flush();

            $message = 'Votre réservation a bien été prise en compte !';
        }

        $resto = $restaurantRepository->find(1);
        $phone = substr($resto->getPhone(), 1, 9);
        $resto->setPhone($phone);

        return $this->render('contact/index.html.twig', [
            'form' => $form,
            'resto' => $resto,
        ]);
    }
}
