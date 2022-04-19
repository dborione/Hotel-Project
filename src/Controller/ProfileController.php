<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\HotelRepository;
use App\Repository\SuiteRepository;
use App\Repository\ClientRepository;
use App\Repository\BookingRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/profile/{id}', name: 'app_profile')]
    public function index(ManagerRegistry $doctrine, int $id, HotelRepository $hotelRepository, SuiteRepository $suiteRepository, ClientRepository $clientRepository, BookingRepository $bookingRepository)
    {
        //$client_id = $doctrine->getRepository(Client::class) ->find($id); 
        $client = $this->security->getUser();
        //$client = new Client ();

        return $this->render('profile/index.html.twig', [
            'suite' => $suiteRepository->findAll(),
            'hotel' => $hotelRepository->findAll(),
            'client' => $clientRepository->findAll(),
            'booking' => $bookingRepository->findBy(['client' => $client])
            //'booking' => $bookingRepository->findAll()
        ]);
    }
}
