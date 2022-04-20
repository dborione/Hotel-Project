<?php

namespace App\Controller;

use App\Repository\HotelRepository;
use App\Repository\SuiteRepository;
use App\Repository\ClientRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HotelsController extends AbstractController
{
    #[Route('/hotels', name: 'app_hotels')]
    public function index(HotelRepository $hotelRepository, SuiteRepository $suiteRepository, ClientRepository $clientRepository)
    {
        return $this->render('hotels/index.html.twig', [
            'hotel' => $hotelRepository->findAll(),
            'suite' => $suiteRepository->findAll(),
            'client' => $clientRepository->findAll()
        ]);
    }
}
