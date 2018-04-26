<?php
/**
 * Created by PhpStorm.
 * User: nbush
 * Date: 4/25/18
 * Time: 9:00 AM.
 */

namespace MauticPlugin\MauticUsstateNormalizerBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class UsstateNormalizerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $formFieldHelper = $container->getDefinition('mautic.helper.form.field_helper');
        $formFieldHelper->setClass('\MauticPlugin\MauticUsstateNormalizerBundle\Helper\UsstateFormFieldHelper');
    }
}
