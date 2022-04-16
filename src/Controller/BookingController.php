<?php

namespace App\Controller;

use App\Entity\Suite;
use App\Entity\Client;
use App\Entity\Booking;
use App\Form\BookingFormType;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/booking/{id_client}', name: 'app_bookings_')]
class BookingController extends AbstractController
{
    #[Route('/suites', name: 'app_suites')]
    public function index(): Response
    {
        return $this->render('booking/index.html.twig', [
            'controller_name' => 'BookingController',
        ]);
    }

    #[Route('/book/{id}', name: 'book')]
    public function book(ObjectManager $manager, Request $request, Suite $suite, Client $client, SessionInterface $session, EntityManagerInterface $entityManager): Response
    { 
        $user = new Client();
        $client_id = $client->getId();
        //$client_id->setClientId($client_id);

        $suite = new Suite();

        $booking = new Booking();

        $form = $this->createForm(BookingFormType::class, $user);
        $form->handleRequest($request);
        $session->get('client.id');

        if ($form->isSubmitted() && $form->isValid()) {
            $booking = new Booking();
            //afficher l'availabilité:
            //render

            $entityManager->persist($booking);
            $entityManager->flush();
        }

        return $this->render('booking/index.html.twig', [
            'bookingForm' => $form->createView(),
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
