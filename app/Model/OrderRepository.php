<?php
declare(strict_types=1);

namespace App\Model;

use App\Entity\Order;
use Doctrine\ORM\EntityManager;
use Tracy\Debugger;


class OrderRepository
{

    /**
     * @var EntityManager
     */
    private $entityManager;


    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @return Order[]
     */
    public function findAll(): array
    {
        $orders = $this->entityManager->createQuery(
            'SELECT o FROM App\Entity\Order o ORDER BY o.id ASC'
        )
            ->getResult();
        
        $this->entityManager->createQuery(
            'SELECT PARTIAL o.{id}, op
            FROM App\Entity\Order o
            INNER JOIN o.products op'
        )
            ->getResult();

        // https://ocramius.github.io/blog/doctrine-orm-optimization-hydration/

        return $orders;
    }

}
