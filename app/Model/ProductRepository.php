<?php
declare(strict_types=1);

namespace App\Model;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;


class ProductRepository
{

    /**
     * @var EntityManager
     */
    private $entityManager;


    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function save(Product $product)
    {
        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }

}
