<?php
namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class CommentFormSubscriber implements EventSubscriberInterface
{
    public function form(FormEvent $event)
    {
        $comment = $event->getData();
    }
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => array('form')
        );
    }
}