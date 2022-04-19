<?php

namespace App\Controller;

use App\Entity\Suite;
use App\Entity\Client;
use App\Entity\Booking;
use App\Form\SuiteFormType;
use App\Repository\HotelRepository;
use App\Repository\SuiteRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SuiteController extends AbstractController
{
    //#[Route('/suites', name: 'app_suites')]
    //public function index(SuiteRepository $suiteRepository, HotelRepository $hotelRepository,)
    //{
        //return $this->render('suite/index.html.twig', [
            //'bookingForm' => $form->createView(),
            //'suite' => $suiteRepository->findAll(),
            //'hotel' => $hotelRepository->findAll(),
        //]);
    //}
        private $security;

        public function __construct(Security $security)
        {
            $this->security = $security;
        }

    //#[Route('/{id}', name: '_book')]
    #[Route('/suites/{id}', name: 'app_suites')]
    public function book(ManagerRegistry $doctrine, int $id, HotelRepository $hotelRepository, SuiteRepository $suiteRepository, Request $request, SessionInterface $session, EntityManagerInterface $entityManager): Response
    { 
       
        //$client_id->setClientId($client_id);
        //$client = new Client();
        $client = $this->security->getUser();

        //$suite = new Suite ();
        $booking = new Booking();

        $suite_id = $doctrine->getRepository(Suite::class)->find($id);

        $form = $this->createForm(SuiteFormType::class, $booking);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            //$data = $form->getData();
            $booking = new Booking();
            $booking->setClient($client);
            $booking->setSuite($suite_id);
            $booking->setStartDate($form->get('startDate')->getData());
            $booking->setEndDate($form->get('endDate')->getData());

            //afficher l'availabilité:
            //render

            $entityManager->persist($booking);
            $entityManager->flush();
        }

        return $this->render('suite/index.html.twig', [
            'suiteForm' => $form->createView(),
            'suite' => $suiteRepository->findAll(),
            'hotel' => $hotelRepository->findAll(),
        ]);

        //////////////////

        //$cart = $session->get('booking',[]);
        //$suite_id = $suite->getId();


        //$client_id = $client->getId();

        //if(!empty($cart[$suite_id])){
            //$cart[$suite_id]++;
            //$cart[$client_id]++;
        //}else{
            //$cart[$suite_id] = 1;
            //$cart[$client_id] = 1;
        //}
        
        //$session->set('booking', $cart);

        //return $this->redirectToRoute('app_home');
    }
}
