<?php
/**
 * File: MemberType.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Form\Member;


use App\Entities\Member;
use App\Form\Type\AddressType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prefix', ChoiceType::class, [
                'choices' => [
                    '--' => '',
                    'Jr' => 'Jr',
                    'Sr' => 'Sr',
                ]
            ])
            ->add('firstName', TextType::class, [
                'required' => true,
            ])
            ->add('lastName', TextType::class, [
                'required' => true,
            ])
            ->add('middleInitial', TextType::class, [
                'label' => 'Middle',
            ])
            ->add('socialSecurityNumber', TextType::class, [
                'required' => true,
                'label' => 'SSN / TIN'
            ])
            ->add('birthDate', DateType::class, [
                'widget' => 'text',
                'required' => true,
                'placeholder' => array(
                    'year' => 'YYYY', 'month' => 'MM', 'day' => 'DD',
                )
            ])
            ->add('hireDate', DateType::class, [
                'widget' => 'text',
                'required' => true,
                'placeholder' => array(
                    'year' => 'YYYY', 'month' => 'MM', 'day' => 'DD',
                )
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Male' => 'Male',
                    'Female' => 'Female',
                ],
                'required' => true,
                'label_attr' => ['class' => 'form-check-inline'],
                'choice_attr' => ['class' => 'gnSl']
            ])
            ->add('phone', TelType::class, [
                'required' => true,
            ])
            ->add('address', AddressType::class)
            ->add('email', EmailType::class, [
                'required' => true,
            ])
            ->add('dependents', CollectionType::class, [
                'entry_type' => MemberDependentType::class,
                'allow_add' => true,
            ])
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Member::class,
        ]);
    }
}
