<?php
/**
 * Created by PhpStorm.
 * User: nbush
 * Date: 4/19/18
 * Time: 11:47 AM.
 */

namespace MauticPlugin\MauticUsstateNormalizerBundle\Integration;

use Mautic\PluginBundle\Integration\AbstractIntegration;

class UsstateNormalizerIntegration extends AbstractIntegration
{
    public function getName()
    {
        return 'UsstateNormalizer';
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
