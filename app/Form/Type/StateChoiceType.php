<?php
/**
 * File: StateSelectType.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StateChoiceType extends AbstractType
{
    protected $states = [];

    public function __construct()
    {
        $this->states = config('states.states_array');
    }

    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults([
            'choices' => \array_flip($this->states),
        ]);

        parent::configureOptions($resolver); // TODO: Change the autogenerated stub
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}
