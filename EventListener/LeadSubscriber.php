<?php
/**
 * Created by PhpStorm.
 * User: nbush
 * Date: 4/20/18
 * Time: 8:24 AM.
 */

namespace MauticPlugin\MauticUSStateNormalizerBundle\EventListener;

use Mautic\CoreBundle\EventListener\CommonSubscriber;
use Mautic\LeadBundle\Event\LeadEvent;
use Mautic\LeadBundle\Event\LeadListEvent;
use Mautic\LeadBundle\LeadEvents;
use MauticPlugin\MauticUSStateNormalizerBundle\Helper\USStateMapHelper;

class LeadSubscriber extends CommonSubscriber
{
    public static function getSubscribedEvents()
    {
        return [
            LeadEvents::LEAD_PRE_SAVE => ['doContactNormalizedSave', -1],
            LeadEvents::LIST_PRE_SAVE => ['doSegmentNormalizedSave', 0],
        ];
    }

    public function doContactNormalizedSave(LeadEvent $event)
    {
        try {
            $helper = new USStateMapHelper();
            $lead   = $event->getLead();
            if (($this->params['store_as'] == 'properName' &&
                !in_array($lead->getState(), $helper->getProperNames()))) {
                $lead->addUpdatedField('state', $helper->getStateForAbbreviation($lead->getState()));
            } elseif (!in_array($lead->getState(), $helper->getAbbreviations())) {
                $lead->addUpdatedField('state', $helper->getAbbreviationForState($lead->getState()));
            }
        } catch (\Exception $e) {
        }
    }

    public function doSegmentNormalizedSave(LeadListEvent $event)
    {
        $filters    = $event->getList()->getFilters();
        $normalized = [];
        foreach ($filters as $filter) {
            if ($filter['field'] === 'state') {
                $replacement = [];
                $helper      = new USStateMapHelper();
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
                        } catch (\Exception $e) {
                        }
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
                    } catch (\Exception $e) {
                    }
                    $replacement[] = $result ? $result : $state;
                }
                $filter['filter'] = $replacement;
            }
            $normalized[] = $filter;
        }
        $changes               = $event->getList()->getChanges(true);
        $changes['filters'][1] = $normalized;
        $event->getList()->setChanges($changes);

        return true;
    }
}
