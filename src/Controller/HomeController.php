<?php

namespace App\Controller;

use App\Repository\HotelRepository;
use App\Repository\SuiteRepository;
use App\Repository\ClientRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(HotelRepository $hotelRepository, SuiteRepository $suiteRepository, ClientRepository $clientRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'suite' => $suiteRepository->findAll(),
            'hotel' => $hotelRepository->findAll(),
            'client' => $clientRepository->findAll(),
        ]);
    }
}
