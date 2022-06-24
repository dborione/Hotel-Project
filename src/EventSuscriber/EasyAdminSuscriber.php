<?php

namespace App\EasyAdminSubscriber;

use App\Entity\Hotel;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;
//use Symfony\Component\HttpKernel\Event\ExceptionEvent;
//use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\String\Slugger\SluggerInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $slugger;
    private $security;

    public function _construct(SluggerInterface $slugger, Security $security)
    {
        $this->slugger = $slugger;
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        // return the subscribed events, their methods and priorities
        return [
            BeforeEntityPersistedEvent::class => ['setHotelSlug'],
        ];

        //return [
        //    BeforeEntityPersistedEvent::class => ['setHotelSlugAndUser'],
        //];
    }

    public function setHotelSlugandUser(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Hotel)) {
            return;
        }

        $slug = $this->slugger->slug($entity->getHotelName());
        $entity->setHotelSlug($slug);

        //$user= $this->security->getUser();
        //$entity->setUser($user);
    }

}