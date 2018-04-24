<?php
/**
 * Created by PhpStorm.
 * User: nbush
 * Date: 4/19/18
 * Time: 12:41 PM
 */

namespace MauticPlugin\MauticUSStateNormalizerBundle\EventListener;

use Mautic\ConfigBundle\Event\ConfigEvent;
use Mautic\CoreBundle\EventListener\CommonSubscriber;
use Mautic\ConfigBundle\ConfigEvents;
use Mautic\ConfigBundle\Event\ConfigBuilderEvent;

/**
 * Class ConfigSubscriber
 */
class ConfigSubscriber extends CommonSubscriber
{
    public static function getSubscribedEvents()
    {
        return [
            ConfigEvents::CONFIG_ON_GENERATE => ['onConfigGenerate', 0],
            ConfigEvents::CONFIG_PRE_SAVE    => ['onConfigSave', 0]
        ];
    }

    public function onConfigGenerate(ConfigBuilderEvent $event)
    {
        $config = $event->getParametersFromConfig('MauticUSStateNormalizerBundle');

        $event->addForm([
            'formAlias' => 'usstatenormalizer_config',
            'formTheme' => 'MauticUSStateNormalizerBundle:FormTheme\Config',
            'parameters' => $config
        ]);
    }

    public function onConfigSave(ConfigEvent $event)
    {
        //might not be needed
    }
}
