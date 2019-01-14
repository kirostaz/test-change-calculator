<?php

declare(strict_types=1);

namespace AppBundle\Calculator;

use AppBundle\Model\Change;

abstract class Calculator implements CalculatorInterface
{

    /**
     * @var array $availableTypes
     */
    private $availableTypes;

    /**
     * @return array
     */
    public function getAvailableTypes(): array
    {
        return $this->availableTypes;
    }

    /**
     * @param array $availableTypes
     */
    public function setAvailableTypes(array $availableTypes): void
    {
        $this->availableTypes = $availableTypes;
    }

    /**
     * @inheritdoc
     */
    public function getChange(int $amount): ?Change {

        $availableChange = $this->getAvailableTypes();

        if ( 0 <= $amount ) {
            $change = new Change();
            $rest = $amount;
            rsort($availableChange);

            foreach ( $availableChange as $changeValue ) {
                if ( $rest >= $changeValue ) {
                    $count = floor($rest / $changeValue);
                    $rest = $rest % $changeValue;
                    $change->addChange($changeValue, $count);
                }
            }

            if ( 0 === $rest ) {
                return $change;
            } else {
                return null;
            }

        } else {
            return null;
        }

    }


}
