<?php
/**
 * File: MemberDependentType.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Form\Member;

use App\Entities\MemberDependent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberDependentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'required' => true,
                'label' => 'First Name',
                'block_name' => 'first_name'
            ])
            ->add('middleName', TextType::class)
            ->add('lastName', TextType::class, [
                'required' => true,
            ])
            ->add('prefix', ChoiceType::class, [
                'choices' => [
                    '----' => '',
                    'Jr' => 'Jr',
                    'Sr' => 'Sr',
                ]
            ])
            ->add('dependentRelation', ChoiceType::class, [
                'choices' => [
                    'Spouse' => 'Spouse',
                    'Child' => 'Child',
                ],
                'multiple' => false,
                'required' => true,
                'label' => 'Relationship To You'
            ])
            ->add('socialSecurityNumber', TextType::class, [
                'required' => true,
            ])
            ->add('dob', DateType::class, [
                'widget' => 'text'
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Male' => 'Male',
                    'Female' => 'Female',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MemberDependent::class,
        ]);
    }
}
