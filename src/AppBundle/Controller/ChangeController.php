<?php

declare(strict_types=1);

namespace AppBundle\Controller;

use AppBundle\Calculator\Calculator;
use AppBundle\Registry\CalculatorRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ChangeController extends Controller
{

    /**
     * @Route("/automaton/{type}/change/{amount}", name="automaton_get_change", requirements={"amount"="\d+"})
     * @param string $type model of automaton
     * @param int $amount amount to change
     * @return JsonResponse|Response
     */
    public function automatonAction($type, int $amount)
    {

        $calculatorRegistry = $this->get(CalculatorRegistry::class);
        $calculator = $calculatorRegistry->getCalculatorFor($type);

        if ( $calculator instanceof Calculator) {
            $change = $calculator->getChange($amount);

            if ( null !== $change ) {
                return JsonResponse::create($change, 200);
            } else {
                return new Response(null,204);
            }
        } else {
            return new Response(null, 404);
        }
    }

}
