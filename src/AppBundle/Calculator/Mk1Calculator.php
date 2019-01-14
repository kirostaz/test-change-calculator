<?php

declare(strict_types=1);

namespace AppBundle\Calculator;

use AppBundle\Model\Change;

class Mk1Calculator extends Calculator
{

    public function __construct()
    {
        $this->setAvailableTypes([1]);
    }

    /**
     * @inheritdoc
     */
    public function getSupportedModel(): string {
        return 'mk1';
    }

}
