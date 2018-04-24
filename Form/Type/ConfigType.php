<?php
/**
 * Created by PhpStorm.
 * User: nbush
 * Date: 4/19/18
 * Time: 1:25 PM
 */

namespace MauticPlugin\MauticUSStateNormalizerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ConfigType
 */
class ConfigType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'store_as',
                'choice',
                [
                    'choices' => [
                        'mautic.plugin.usstatenormalizer.option.opt_name' => 'properName',
                        'mautic.plugin.usstatenormalizer.option.opt_abrv' => 'abbreviation',
                    ],
                    'choices_as_values' => true,
                    //'choice_attr' => ['class' => 'radio'],
                    'data'  => $options['data']['store_as'],
                    'label' => 'mautic.plugin.usstatenormalizer.store_as.label',
                    'label_attr' => ['class' => 'control-label'],
                    'attr'  => [
                        'tooltip' => 'mautic.plugin.usstatenormalizer.store_as.tooltip',
                        'class' => 'form-control'
                    ],
                    'expanded' => false,
                    'multiple' => false,
                ]
            )
            ->add(
                'display_as',
                'choice',
                [
                    'choices' => [
                        'mautic.plugin.usstatenormalizer.option.opt_name' => 'properName',
                        'mautic.plugin.usstatenormalizer.option.opt_abrv' => 'abbreviation',
                    ],
                    'choices_as_values' => true,
                    //'choice_attr' => ['class' => 'radio'],
                    'data'  => $options['data']['display_as'],
                    'label' => 'mautic.plugin.usstatenormalizer.display_as.label',
                    'label_attr' => ['class' => 'control-label'],
                    'attr'  => [
                        'tooltip' => 'mautic.plugin.usstatenormalizer.display_as.tooltip',
                        'class' => 'form-control'
                    ],
                    'expanded' => false,
                    'multiple' => false,
                ]
            );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'usstatenormalizer_config';
    }

}
