<?php

/*
* @copyright   2018 Mautic Contributors. All rights reserved
* @author      Mautic, Inc
*
* @link        http://mautic.org
*
* @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/

return [
    'name'        => 'US State Normalizer',
    'description' => 'Causes US states to be either 2 character codes or full name',
    'version'     => '0.1.0',
    'author'      => 'Nicholai Bush',

    'services' => [
        'forms' => [
            'plugin.mautic.usstatenormalizer.config_form' => [
                'class' => 'MauticPlugin\MauticUSStateNormalizerBundle\Form\Type\ConfigType',
                'alias' => 'usstatenormalizer_config',
            ],
        ],
        'events' => [
            'plugin.mautic.ussstatenormalizer.config_subscriber' => [
                'class' => 'MauticPlugin\MauticUSStateNormalizerBundle\EventListener\ConfigSubscriber',
            ],
            'plugin.mautic.ussstatenormalizer.lead_subscriber' => [
                'class' => 'MauticPlugin\MauticUSStateNormalizerBundle\EventListener\LeadSubscriber',
            ],
        ],
        'integrations' => [
            'plugin.mautic' => [
                'class' => 'MauticPlugin\MauticUSStateNormalizerBundle\Integration\USStateNormalizerIntegration',
            ],
        ],
    ],
    'parameters' => [
        'store_as'   => 'abbreviation',
        'display_as' => 'properName',
    ],
];
