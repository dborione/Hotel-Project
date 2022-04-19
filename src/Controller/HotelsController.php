<?php

namespace App\Controller;

use App\Repository\HotelRepository;
use App\Repository\SuiteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HotelsController extends AbstractController
{
    #[Route('/hotels', name: 'app_hotels')]
    public function index(HotelRepository $hotelRepository, SuiteRepository $suiteRepository)
    {
        return $this->render('hotels/index.html.twig', [
            'hotel' => $hotelRepository->findAll(),
            'suite' => $suiteRepository->findAll()
        ]);
    }
}
