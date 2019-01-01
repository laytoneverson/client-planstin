<?php
/**
 * File: GroupClientAgreementFormType.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Form;


use App\Entities\GroupClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupClientAgreementFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('agreementComplete', CheckboxType::class, [
                'label' => 'I have read the Base Health agreement',
                'label_attr' => ['class' => 'agree-check text-black']
            ]);

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
