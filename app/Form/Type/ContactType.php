<?php
/**
 * File: Contact.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Form\Type;

use App\Entities\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('phone', TelType::class)
            ->add('email', EmailType::class);

        parent::buildForm($builder, $options); 
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class
        ]);
        
        parent::configureOptions($resolver);
    }
}
