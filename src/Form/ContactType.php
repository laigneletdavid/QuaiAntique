<?php

namespace App\Form;

use App\Entity\Contact;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',TextType::class, [
                'attr' => [
                    'class' => 'form-control mt-3 mb-3',
                ],
                'label' => 'Votre email'])
            ->add('full_name', TextType::class, [
                'attr' => [
                    'class' => 'form-control mt-3 mb-3',
                ],
                'label' => 'Votre nom complet'])
            ->add('subject', TextType::class, [
                'attr' => [
                    'class' => 'form-control mt-3 mb-3',
                ],
                'label' => 'Sujet de votre message'])
            ->add('content', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control mt-3 mb-3',
                ],
                'label' => 'Contenu de votre message'])

           /* ->add('lu', ChoiceType::class, [
                'choices' => [
                    'oui' => true,
                    'non' => false,
                    ],
                'expanded' => true,
                'multiple' => false,
                'label' => 'Contenu de votre message'])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
