<?php

namespace App\Controller;

use App\Repository\HotelRepository;
use App\Repository\SuiteRepository;
use App\Repository\ClientRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, HotelRepository $hotelRepository, SuiteRepository $suiteRepository, ClientRepository $clientRepository): Response
    {
        
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        //$session = new Session();
        //$session->start();

       // $session->set('name', $clientFirstName);
        //$session->get('name');

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername, 
            'error' => $error,
            'hotel' => $hotelRepository->findAll(),
            'suite' => $suiteRepository->findAll(),
            'client' => $clientRepository->findAll()
            ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    public function index(): RedirectResponse
    {
        // redirects to the "home" route
        if ($this->getUser('App/Entity/Admin')) {
            return $this->redirectToRoute('admin');
        }

        if ($this->getUser('ROLE_MANAGER')) {
            return $this->redirectToRoute('app_home');
        }

        if ($this->getUser('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_admin');
        }
        //if ($this->getUser('ROLE_USER')) {
        //    return new RedirectResponse($this->urlGenerator->generate('home'));
        //}
    }
}
