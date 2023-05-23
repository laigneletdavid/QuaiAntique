<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\SheduleRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user', name: 'app_user_')]
#[IsGranted('ROLE_USER')]
class UserController extends AbstractController
{



    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Request $request, UserRepository $userRepository, SheduleRepository $sheduleRepository): Response
    {
        $visible = 1;
        $shedules = $sheduleRepository->findByShedulesVisible($visible);

        $user = $userRepository->find($request->get('id'));
        return $this->render('user/show.html.twig', [
            'user' => $user,
            'shedules' => $shedules,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasher, SheduleRepository $sheduleRepository): Response
    {
        $user = $userRepository->find($request->get('id'));
        $visible = 1;
        $shedules = $sheduleRepository->findByShedulesVisible($visible);

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $userRepository->save($user, true);

            return $this->redirectToRoute('app_home');
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
            'shedules' => $shedules,
        ]);
    }


}