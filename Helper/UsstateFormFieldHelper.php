<?php
/**
 * Created by PhpStorm.
 * User: nbush
 * Date: 4/25/18
 * Time: 9:06 AM.
 */

namespace MauticPlugin\MauticUsstateNormalizerBundle\Helper;

use Mautic\LeadBundle\Helper\FormFieldHelper as OriginalHelper;

class UsstateFormFieldHelper extends OriginalHelper
{
    public static function getRegionChoices()
    {
        $helper                   = new UsstateMapHelper();
        $choices                  = parent::getRegionChoices();
        $choices['United States'] = $helper::getStateOptions();

        return $choices;
    }
}
