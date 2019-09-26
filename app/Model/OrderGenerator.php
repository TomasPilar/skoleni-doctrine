<?php
declare(strict_types=1);

namespace App\Model;

use App\Entity\Order;
use App\Entity\OrderProduct;
use Doctrine\ORM\EntityManager;


class OrderGenerator
{

    /**
     * @var EntityManager
     */
    private $entityManager;


    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function generate(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            $order = new Order('20190926' . $i);

            for ($j = 1; $j <= 3; $j++) {
                $orderProduct = new OrderProduct('Product name ' . $i . ':' . $j);
                $order->addProduct($orderProduct);
            }
            $this->entityManager->persist($order);
        }

        $this->entityManager->flush();
    }

}
