<?php

declare(strict_types=1);

namespace AppBundle\Calculator;

use AppBundle\Model\Change;

class Mk2Calculator extends Calculator
{

    public function __construct()
    {
        $this->setAvailableTypes([2,5,10]);
    }

    /**
     * @inheritdoc
     */
    public function getSupportedModel(): string {
        return 'mk2';
    }

}
