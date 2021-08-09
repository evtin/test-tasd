<?php

declare(strict_types=1);

namespace App\Subscriber;

use App\Service\ActivityClientInterface;

use DateTimeImmutable;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\TerminateEvent;

class PageSubscriber implements EventSubscriberInterface
{
    private ActivityClientInterface $sender;

   public function __construct(ActivityClientInterface  $sender)
   {
       $this->sender = $sender;
   }

    public static function getSubscribedEvents(): array
    {
        return [
            'kernel.terminate' => [['onKernelTerminate']]
        ];
    }

    public function onKernelTerminate(TerminateEvent $event): void
    {
        if (!$event->isMainRequest()){
            return;
        }

        $this->sender->sendActivity($event->getRequest()->getPathInfo(), new DateTimeImmutable());
    }
}
