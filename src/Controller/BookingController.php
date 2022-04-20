<?php

namespace App\Controller;

use App\Entity\Suite;
use App\Entity\Client;
use App\Entity\Booking;
use App\Form\BookingFormType;
use App\Repository\HotelRepository;
use App\Repository\SuiteRepository;
use App\Repository\ClientRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BookingController extends AbstractController
{
    //#[Route('/suites', name: 'app_suites')]
    //public function index(): Response
    //{
        //return $this->render('booking/index.html.twig', [
            //'controller_name' => 'BookingController',
        //]);
    //}

    //#[Route('/booking/{client_id}', name: 'app_bookings')]
    #[Route('/booking', name: 'app_bookings')]
    public function book(SessionInterface $session, HotelRepository $hotelRepository, SuiteRepository $suiteRepository, ClientRepository $clientRepository): Response
    {
        $client = new Client();
        $suite = new Suite();
        $cart = $session->get('booking', []);
        $suite_id = $suite->getId();

        $client_id = $client->getId();

        if (!empty($cart[$suite_id])) {
            $cart[$suite_id]++;
            $cart[$client_id]++;
        } else {
            $cart[$suite_id] = 1;
            $cart[$client_id] = 1;
        }
        
        $session->set('booking', $cart);

        //return $this->redirectToRoute('app_home');

        return $this->render('booking/index.html.twig', [
            'suite' => $suiteRepository->findAll(),
            'hotel' => $hotelRepository->findAll(),
            'client' => $clientRepository->findAll(),
        ]);
    }
}
