<?php

namespace App\Controller;

use App\Repository\HotelRepository;
use App\Repository\SuiteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SuiteController extends AbstractController
{
    #[Route('/suites', name: 'app_suites')]
    public function index(SuiteRepository $suiteRepository, HotelRepository $hotelRepository,)
    {
        return $this->render('suite/index.html.twig', [
            'suite' => $suiteRepository->findAll(),
            'hotel' => $hotelRepository->findAll(),
        ]);
    }
}
