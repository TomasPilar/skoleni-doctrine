<?php
declare(strict_types=1);

namespace App\Model;

use App\Entity\Product;
use Doctrine\Common\Collections\Criteria;
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


    /**
     * @return Product[]
     */
    public function findAll(): array
    {
        //return $this->entityManager->createQuery("
        //    SELECT p.id, p.name
        //    FROM App\Entity\Product p
        //    WHERE p.price < :minPrice
        //    ORDER BY p.name ASC
        //")
        //    ->setParameters([
        //        'minPrice' => 200
        //    ])
        //    ->getArrayResult();

        //return $this->entityManager->createQuery("
        //    SELECT p, b
        //    FROM App\Entity\Product p
        //    INNER JOIN p.brand b
        //    WHERE LOWER(p.name) = :productName
        //    ORDER BY p.name ASC
        //")
        //    ->setParameters([
        //        'productName' => 'nivea krém'
        //    ])
        //    ->getResult();
    }

}
