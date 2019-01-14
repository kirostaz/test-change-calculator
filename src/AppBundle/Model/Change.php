<?php

declare(strict_types=1);

namespace AppBundle\Model;

class Change
{
    /**
     * @var int
     */
    public $bill10 = 0;

    /**
     * @var int
     */
    public $bill5 = 0;

    /**
     * @var int
     */
    public $coin2 = 0;

    /**
     * @var int
     */
    public $coin1 = 0;

    public function addChange($value , $count) {
        if( $value < 5 ) {
            $propertyType = 'coin';
        } else {
            $propertyType = 'bill';
        }
        if ( property_exists($this, $propertyType.$value)) {
            $this->{$propertyType.$value} += $count;
        }
    }
}
