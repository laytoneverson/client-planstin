<?php
/**
 * File: AddressType.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Form\Type;

use App\Entities\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('label' , HiddenType::class)
            ->add('street1', TextType::class)
            ->add('street2', TextType::class, ['required' => false])
            ->add('city', TextType::class)
            ->add('state', StateChoiceType::class)
            ->add('postalCode', TextType::class);

        parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);

        parent::configureOptions($resolver);
    }
}
