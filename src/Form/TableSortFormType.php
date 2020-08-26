<?php

namespace App\Form;

use App\Entity\OptAdAPI;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class TableSortFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('currency', ChoiceType::class, [
                'choices'   => OptAdAPI::CURRENCIES,
                'label'     => 'Currency',
                'placeholder' => 'Select a value',
            ])
            ->add('startDate', DateType::class, [
                'widget'    => 'choice',
                'label'     => 'Start date',
                'format' => 'yyyy-MM-dd',
                'input' => 'string',
            ])
            ->add('endDate', DateType::class, [
                'widget'    => 'choice',
                'label'     => 'End date',
                'format' => 'yyyy-MM-dd',
                'input' => 'string',
            ])
            ->add('submit', SubmitType::class, [
                'label'     => 'Search',
            ])
        ;
    }
}
