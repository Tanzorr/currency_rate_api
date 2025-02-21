<?php

namespace App\Controller;

use App\Repository\ExchangeRateRepository;
use App\Service\ExchangeRateService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class ExchangeRateController extends AbstractController
{


    /**
     * @throws \DateMalformedStringException
     */
    #[Route('/exchange/set-rate', name: 'app_exchange_rate')]
    public function setRate(ExchangeRateService $rateService): JsonResponse
    {
        $rateService->updateRates();

            return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ExchangeRateController.php',
        ]);
    }


    #[Route('/exchange/get-rate')]
    public function getRate(ExchangeRateService $rateService): JsonResponse
    {


        return $this->json([$rateService->getRates()]);
    }
}
