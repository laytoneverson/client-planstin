<?php
/**
 * File: NewClient.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Form;

use App\Entities\GroupClient;
use App\Form\Type\AddressType;
use App\Form\Type\ContactType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupClientFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('taxId', TextType::class)
            ->add('dba', TextType::class)
            ->add('profileImageUpload', FileType::class, [
                'required' => false,
            ])
            ->add('shippingAddress', AddressType::class)
            ->add('primaryContact', ContactType::class);

        parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GroupClient::class,
        ]);

        parent::configureOptions($resolver);
    }
}
