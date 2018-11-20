<?php
/**
 * File: NewClient.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Form;

use App\Entities\Business;
use App\Form\Type\AddressType;
use App\Form\Type\ContactType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BusinessFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('dba', TextType::class)
            ->add('website', UrlType::class)
            ->add('phone', TelType::class)
            ->add('taxId', TextType::class)
            ->add('mailingAddress', AddressType::class)
            ->add('physicalAddress', AddressType::class)
            ->add('primaryContact', ContactType::class)
            ->add('billingContact', ContactType::class);

        parent::buildForm($builder, $options);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Business::class,
        ]);

        parent::configureOptions($resolver); // TODO: Change the autogenerated stub
    }
}