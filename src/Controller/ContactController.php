<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\RestaurantRepository;;

use App\Repository\SheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormView;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface  $em, RestaurantRepository $restaurantRepository, SheduleRepository $sheduleRepository): Response
    {
        $visible = 1;
        $contact = new Contact();
        $contact->setLu(false);

        $form = $this->createForm(ContactType::class, ($contact))->createView() ;
        $message = null;

        /*$form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($contact);
            $em->flush();

            $message = 'Votre message a bien été envoyé !';
        }*/


        $shedules = $sheduleRepository->findByShedulesVisible($visible);
        $resto = $restaurantRepository->find(1);
        $phone = substr($resto->getPhone(), 1, 9);
        $resto->setPhone($phone);

        return $this->render('contact/index.html.twig', [
            'form' => $form,
            'resto' => $resto,
            'shedules' => $shedules,
        ]);
    }
}
