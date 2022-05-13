<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;


class AccessFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $constraints = ['constraints' => [new NotBlank()]];

        $builder
            ->add('kam', TextType::class, $constraints)
            ->add('client_name', TextType::class, $constraints)
            ->add('access_type', ChoiceType::class, ['choices' => ['FTP' => 'ftp', 'SSH' => 'ssh']])
            ->add('host', TextType::class, $constraints)
            ->add('user_name', TextType::class, $constraints)
            ->add('password', TextType::class, $constraints)
            ->add('port', IntegerType::class, ['constraints' => [new NotBlank(), new Length(['min' => 2])]])
            ->add('submit', SubmitType::class, ['label' => 'Check access']);
    }
}