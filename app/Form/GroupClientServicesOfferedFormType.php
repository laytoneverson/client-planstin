<?php
/**
 * File: ClientServicesFormType.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Form;

use App\Entities\InsurancePlan;
use App\Form\Handler\GroupClientServicesOfferedFormHandler;
use LogicException;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class GroupClientServicesOfferedFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (
            !\array_key_exists('handler', $options)
            || !$options['handler'] instanceof GroupClientServicesOfferedFormHandler
        ) {
            throw new LogicException('This form needs a GroupClientServicesOfferedFormHandler passed in ');
        }

        /** @var GroupClientServicesOfferedFormHandler $handler */
        $handler = $options['handler'];

        $builder
            ->add('offeredPlans', ChoiceType::class, [
                'choices' => $handler->getAvailablePlans(),
                'choice_value' => function(InsurancePlan $entity = null) {
                    return $entity ? $entity->getId() : '';
                },
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('isBenefitsClient', CheckboxType::class)
            ->add('isPayrollClient', CheckboxType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GroupClientServicesOfferedFormHandler::class,
            'handler' => null,
        ]);
    }
}
