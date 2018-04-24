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
use Mautic\LeadBundle\Event\LeadListEvent;
use Mautic\LeadBundle\Event\LeadListFilteringEvent;
use Mautic\LeadBundle\LeadEvents;
use MauticPlugin\MauticUSStateNormalizerBundle\Helper\USStateMapHelper;

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

    public function doSegmentNormalizedSave(LeadListEvent $event)
    {
        $filters = $event->getList()->getFilters();
        $normalized = [];
        foreach ($filters as $filter) {
            if ($filter['field'] === 'state') {
                $replacement = [];
                $helper = new USStateMapHelper();
                if (is_array($filter['filter'])) {
                    foreach ($filter['filter'] as $state) {
                        $result = false;
                        try {
                            if ($this->params['store_as'] == 'properName' &&
                                !in_array($state, $helper->getProperNames())) {
                                $result = $helper->getStateForAbbreviation($state);
                            } elseif (!in_array($state, $helper->getAbbreviations())) {
                                $result = $helper->getAbbreviationForState($state);
                            }
                        } catch (\Exception $e ) {}
                        $replacement[] = $result ? $result : $state;
                    }
                } else {
                    try {
                        $state = $filter['filter'];
                        if ($this->params['store_as'] == 'properName' &&
                            !in_array($state, $helper->getProperNames())) {
                            $result = $helper->getStateForAbbreviation($state);
                        } elseif (!in_array($filter['filter'], $helper->getAbbreviations())) {
                            $result = $helper->getAbbreviationForState($state);
                        }
                    } catch (\Exception $e ) {}
                    $replacement[] = $result ? $result : $state;
                }
                $filter['filter'] = $replacement;
            }
            $normalized[] = $filter;
        }
        $event->getList()->setChanges($normalized);
        $event->getList()->setFilters($normalized);
        $stop = 'here';
        return true;
    }

    public function doSegmentPreProcess(LeadListFilteringEvent $event)
    {
        $stop = 'here';
    }
}