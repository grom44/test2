<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('lastName')
            ->add('phone', TelType::class)
            ->add('email', EmailType::class)
            ->add('gender', ChoiceType::class, [
                'choices'  => [
                    'Male' => 'm',
                    'Female' => 'f'
                ],
            ])
            ->add('active', ChoiceType::class, [
                'choices'  => [
                    'Active' => 1,
                    'Not active' => 0
                ],
            ])
            ->add('dateOfBirth', DateType::class, [
                'years' => range(date('Y'), date('Y') - 115)
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
