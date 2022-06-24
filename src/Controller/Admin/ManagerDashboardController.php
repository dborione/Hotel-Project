<?php

namespace App\Controller\Admin;

use App\Entity\Suite;
use App\Entity\Booking;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManagerDashboardController extends AbstractDashboardController
{
    #[Route('/manager-panel', name: 'manager-panel')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/managerdashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Manager Administration Panel');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::linkToCrud('Suites', 'fas fa-hotel', Suite::class),

            MenuItem::section('Bookings'),
            MenuItem::linkToCrud('Bookings', 'fas fa-calendar-check', Booking::class),

            MenuItem::linkToLogout('Logout', 'fa fa-arrow-left'),
        ];
    }
}
