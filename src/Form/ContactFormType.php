<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre du message',
                'mapped' => false,
            ])

            ->add('description', TextType::class, [
                'label' => 'Votre message',
                'mapped' => false,
            ])

            ->add('email', TextType::class, [
                'label' => 'Votre email',
                'mapped' => false,
            ])

            ->add('confirmation', CheckboxType::class, [
                'mapped' => false,
                'label' => "Je confirme l'envoi de mon message",
                'constraints' => [
                    new IsTrue(message : "Veuillez cocher la case pour envoyer votre message."),
                ]
            ])
    
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactFormType::class,
        ]);
    }
}
