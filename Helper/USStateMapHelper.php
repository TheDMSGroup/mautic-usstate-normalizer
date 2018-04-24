<?php
/**
 * Created by PhpStorm.
 * User: nbush
 * Date: 4/19/18
 * Time: 11:00 AM
 */

namespace MauticPlugin\MauticUSStateNormalizerBundle\Helper;


class USStateMapHelper
{
    private $map = [
        'AL' => 'Alabama',      'AK' => 'Alaska',       'AZ' => 'Arizona',      'AR' => 'Arkansas',     'CA' => 'California',
        'CO' => 'Colorado',     'CT' => 'Connecticut',  'DE' => 'Delaware',     'FL' => 'Florida',      'GA' => 'Georgia',
        'HI' => 'Hawaii',       'ID' => 'Idaho',        'IL' => 'Illinois',     'IN' => 'Indiana',      'IA' => 'Iowa',
        'KS' => 'Kansas',       'KY' => 'Kentucky',     'LA' => 'Louisiana',    'ME' => 'Maine',        'MD' => 'Maryland',
        'MA' => 'Massachusetts','MI' => 'Michigan',     'MN' => 'Minnesota',    'MS' => 'Mississippi',  'MO' => 'Missouri',
        'MT' => 'Montana',      'NE' => 'Nebraska',     'NV' => 'Nevada',       'NH' => 'New Hampshire','NJ' => 'New Jersey',
        'NM' => 'New Mexico',   'NY' => 'New York',     'NC' => 'North Carolina','ND' => 'North Dakota','OH' => 'Ohio',
        'OK' => 'Oklahoma',     'OR' => 'Oregon',       'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina',
        'SD' => 'South Dakota', 'TN' => 'Tennessee',    'TX' => 'Texas',        'UT' => 'Utah',         'VT' => 'Vermont',
        'VA' => 'Virginia',     'WA' => 'Washington',   'WV' => 'West Virginia','WI' => 'Wisconsin',    'WY' => 'Wyoming'
    ];

    /**
     * @param $state
     *
     * @return false|int|string
     *
     * @throws \Exception
     */
    public function getAbbreviationForState($state)
    {
        $abbreviation = array_search($state, $this->map);
        if (FALSE === $abbreviation) {
            throw new \Exception("Abbreviation requested for unknown state $state.");
        }
        return $abbreviation;
    }

    /**
     * @param $abbreviation
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function getStateForAbbreviation($abbreviation)
    {
        if (!key_exists($abbreviation, $this->map)) {
            throw new \Exception("State abbreviation requested for unknown $state.");
        }
        return $abbreviation;
    }

}
