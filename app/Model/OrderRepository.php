<?php
declare(strict_types=1);

namespace App\Model;

use App\Entity\Order;
use Doctrine\ORM\EntityManager;


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
        return $this->entityManager->createQuery(
            'SELECT o FROM App\Entity\Order o ORDER BY o.id ASC'
        )
            ->getResult();
    }

}
