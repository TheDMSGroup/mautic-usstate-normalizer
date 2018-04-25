<?php
/**
 * Created by PhpStorm.
 * User: nbush
 * Date: 4/19/18
 * Time: 11:47 AM.
 */

namespace MauticPlugin\MauticUSStateNormalizerBundle\Integration;

use Mautic\PluginBundle\Integration\AbstractIntegration;

class USStateNormalizerIntegration extends AbstractIntegration
{
    public function getName()
    {
        return 'USStateNormalizer';
    }

    public function getDisplayName()
    {
        return 'US State Normalizer';
    }

    public function getAuthenticationType()
    {
        return 'none';
    }
}
