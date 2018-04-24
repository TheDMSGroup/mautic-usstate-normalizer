<?php
/**
 * Created by PhpStorm.
 * User: nbush
 * Date: 4/20/18
 * Time: 8:24 AM
 */

namespace MauticPlugin\MauticUSStateNormalizerBundle\EventListener;


use Mautic\CoreBundle\EventListener\CommonSubscriber;
use Mautic\LeadBundle\Entity\ListLead;
use Mautic\LeadBundle\Event\LeadEvent;
use Mautic\LeadBundle\Event\LeadListFilteringEvent;
use Mautic\LeadBundle\LeadEvents;

class LeadSubscriber extends CommonSubscriber
{
    public static function getSubscribedEvents()
    {
        return [
            LeadEvents::LEAD_PRE_SAVE => ['doContactNormalizedSave', -1],
            LeadEvents::LIST_PRE_SAVE => ['doSegmentNormalizedSave', 0],
            LeadEvents::LIST_PRE_PROCESS_LIST => ['doSegmentPreProcess', 0]

        ];
    }

    public function doContactNormalizedSave(LeadEvent $event)
    {
        $stop = 'here';
    }

    public function doSegmentNormalizedSave(ListLead $event)
    {
        $stop = 'here';
    }

    public function doSegmentPreProcess(LeadListFilteringEvent $event)
    {
        $stop = 'here';
    }
}