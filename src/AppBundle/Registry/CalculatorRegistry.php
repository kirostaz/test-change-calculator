<?php

declare(strict_types=1);

namespace AppBundle\Registry;

use AppBundle\Calculator\CalculatorInterface;
use AppBundle\Calculator\Mk1Calculator;
use AppBundle\Calculator\Mk2Calculator;

class CalculatorRegistry implements CalculatorRegistryInterface
{
    /**
     * @inheritdoc
     */
    public function getCalculatorFor(string $model): ?CalculatorInterface {
        switch ($model) {
            case 'mk1' : return new Mk1Calculator(); break;
            case 'mk2' : return new Mk2Calculator(); break;
            default : return null;
        }
    }


}
