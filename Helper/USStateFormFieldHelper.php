<?php
/**
 * Created by PhpStorm.
 * User: nbush
 * Date: 4/25/18
 * Time: 9:06 AM.
 */

namespace MauticPlugin\MauticUSStateNormalizerBundle\Helper;

use Mautic\LeadBundle\Helper\FormFieldHelper as OriginalHelper;

class USStateFormFieldHelper extends OriginalHelper
{
    public static function getRegionChoices()
    {
        $helper                   = new USStateMapHelper();
        $choices                  = parent::getRegionChoices();
        $choices['United States'] = $helper::getStateOptions();

        return $choices;
    }
}
