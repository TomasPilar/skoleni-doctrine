<?php
declare(strict_types=1);

namespace App\Model;

use App\Entity\Order;
use Doctrine\Common\EventSubscriber;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;


class OrderVariableSymbolCalculator implements EventSubscriber
{

    ///**
    // * @var Connection
    // */
    //private $connection;
    //
    //
    //public function __construct(Connection $connection)
    //{
    //    $this->connection = $connection;
    //}


    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return string[]
     */
    public function getSubscribedEvents()
    {
        return [Events::prePersist];
    }


    public function prePersist(LifecycleEventArgs $lifecycleEventArgs)
    {
        $entity = $lifecycleEventArgs->getEntity();

        if ($entity instanceof Order) {
            $entity->setVariableSymbol($this->calculate($entity));
        }
    }


    private function calculate(Order $entity): string
    {
        //$this->connection->fetchColumn('SQL');
        return date('ymdhis');
    }
}
