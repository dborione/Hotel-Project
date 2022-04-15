<?php

namespace App\Controller;

use App\Entity\Suite;
use Doctrine\Persistence\ObjectManager;
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

    #[Route('/add/{id}', name: 'add')]
    public function book(Suite $suite, SessionInterface $session) 
    { 
        $cart = $session->get("booking",[]);
        $id = $suite->getId();

        if(!empty($cart[$id])){
            $cart[$id]++;
        }else{
            $panier[$id] = 1;
        }
        
        $session->set("booking", $cart);

        return $this->redirectToRoute('app_suites');
    }
}
