<?php
/**
 * Created by PhpStorm.
 * User: nbush
 * Date: 4/19/18
 * Time: 11:00 AM.
 */

namespace MauticPlugin\MauticUsstateNormalizerBundle\Helper;

class UsstateMapHelper
{
    public static function getMap()
    {
        return [
            'AL' => 'Alabama',          'AK' => 'Alaska',
            'AZ' => 'Arizona',          'AR' => 'Arkansas',
            'CA' => 'California',       'CO' => 'Colorado',
            'CT' => 'Connecticut',      'DE' => 'Delaware',
            'FL' => 'Florida',          'GA' => 'Georgia',
            'HI' => 'Hawaii',           'ID' => 'Idaho',
            'IL' => 'Illinois',         'IN' => 'Indiana',
            'IA' => 'Iowa',             'KS' => 'Kansas',
            'KY' => 'Kentucky',         'LA' => 'Louisiana',
            'ME' => 'Maine',            'MD' => 'Maryland',
            'MA' => 'Massachusetts',    'MI' => 'Michigan',
            'MN' => 'Minnesota',        'MS' => 'Mississippi',
            'MO' => 'Missouri',         'MT' => 'Montana',
            'NE' => 'Nebraska',         'NV' => 'Nevada',
            'NH' => 'New Hampshire',    'NJ' => 'New Jersey',
            'NM' => 'New Mexico',       'NY' => 'New York',
            'NC' => 'North Carolina',   'ND' => 'North Dakota',
            'OH' => 'Ohio',             'OK' => 'Oklahoma',
            'OR' => 'Oregon',           'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',     'SC' => 'South Carolina',
            'SD' => 'South Dakota',     'TN' => 'Tennessee',
            'TX' => 'Texas',            'UT' => 'Utah',
            'VT' => 'Vermont',          'VA' => 'Virginia',
            'WA' => 'Washington',       'WV' => 'West Virginia',
            'WI' => 'Wisconsin',        'WY' => 'Wyoming', ];
    }

    /**
     * @return array
     */
    public static function getStateOptions()
    {
        $options = [];
        foreach (self::getMap() as $key => $value) {
            $options[$key] = $key;
            $options[$value] = $key;
        }

        return $options;
    }

    /**
     * @return array
     */
    public function getProperNames()
    {
        return array_values(self::getMap());
    }

    /**
     * @return array
     */
    public function getAbbreviations()
    {
        return array_keys(self::getMap());
    }

    /**
     * @param $state
     *
     * @return false|string
     *
     * @throws \Exception
     */
    public function getAbbreviationForState($state)
    {
        $abbreviation = array_search($state, self::getMap());
        if (false === $abbreviation) {
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
        if (!key_exists($abbreviation, self::getMap())) {
            throw new \Exception("State proper name requested for unknown $abbreviation.");
        }

        return $abbreviation;
    }
}
