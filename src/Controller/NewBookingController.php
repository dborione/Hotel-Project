<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Doctrine\Persistence\ManagerRegistry;

class NewBookingController extends AbstractController
{

    #[Route('/booking', name: 'app_booking')]
    public function index(BookingRepository $bookingRepository)
    {
        return $this->render('booking/index.html.twig', [
            'booking' => $bookingRepository->findAll()
        ]);
    }

    #[Route('/booking/{id_client}', name: 'bookings')]
    public function book(Request $request, $id_client) 
    {
        $data = [];
    	$data['id_client'] = $id_client;
        $data['suite'] = $suite;
        $client = new Client();
   	 
    	$data['suite'] = null;
    	$data['dates']['from'] = '';
    	$data['dates']['to'] = '';
    	$form = $this->createFormBuilder()
                     ->add('dateFrom')
                     ->add('dateTo')
                     ->getForm();
   	 
    	$form->handleRequest($request);

        if ($form->isSubmitted()) {
        	$form_data = $form->getData();

        	$data['dates']['from'] = $form_data['dateFrom'];
        	$data['dates']['to'] = $form_data['dateTo'];

            //public function load(ManagerRegistery $manager)
            //{
        	//$em = $this->getDoctrine()->getManager();
            $entityManager = $doctrine->getManager();

        	$rooms = $em->getRepository('AppBundle:Room')
            	->getAvailableRooms($form_data['dateFrom'], $form_data['dateTo']);   

        	

    	}

        $client = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Client')
        ->find($id_client);

        $data['client'] = $client;

        return $this->render("suites/book.html.twig", $data);

        /**
 	* @Route("/book_suite/{id_client}/{id_room}/{start_date}/{end_date}", name="book_suite")
 	**/
	public function bookSuite($id_client, $id_suite, $start_date, $end_date)
	{
        $booking = new Booking();

		$date_start = new \DateTime( $start_date );
		$date_end = new \DateTime($end_date);
		$booking->setStartDate( $date_start );
		$booking->setEndDate( $date_end );

        $client = $this
					->getDoctrine()
					->getRepository('AppBundle:Client')
					->find($id_client);
    
        $suite = $this
					->getDoctrine()
					->getRepository('AppBundle:Suite')
					->find($id_suite);            
   	 
        $entityManager = $doctrine->getManager();

        $booking->setClient($client);
		$booking->setSuite($suite);

        $entityManager->persist($booking);
        $entityManager->flush();

		//$data['debug']['client'] = $client;
		//return $this->render('debug.html.twig', $data);

		//return $this->redirectToRoute('index_clients');

        return $this->redirectToRoute('app_home');





        //dd($session);
        //$session->set("booking", 3)
        //$cart = $session->get("cart", []);


    }
}
