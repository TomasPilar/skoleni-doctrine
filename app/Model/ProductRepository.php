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


    public function findById(int $id): ?Product
    {
        //return $this->entityManager->getRepository(Product::class)
        //    ->find($id);
        
        return $this->entityManager->createQuery(
            'SELECT p FROM App\Entity\Product p WHERE p.id = :id'
        )
            ->setParameters(['id' => $id])
            ->getSingleResult();
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

        return $this->entityManager->createQuery("
            SELECT p, b
            FROM App\Entity\Product p
            INNER JOIN p.brand b
            WHERE LOWER(p.name) = :productName
            ORDER BY p.name ASC
        ")
            ->setParameters([
                'productName' => 'nivea krém'
            ])
            ->getResult();

        return $this->entityManager->createQueryBuilder()
            ->select('p, b')
            ->from(Product::class, 'p')
            ->innerJoin('p.brand', 'b')
            ->where('LOWER(p.name) = :productName')
            ->orderBy('p.name', 'ASC')
            ->setParameters([
                'productName' => 'nivea krém'
            ])
            ->getQuery()
            ->getResult();
    }


    public function update(): void
    {
        $product = $this->entityManager->getRepository(Product::class)->find(2);
        
        dump($product);
        
        $this->entityManager->createQuery('
            UPDATE App\Entity\Product p SET p.price = :newPrice WHERE p.id = :productId
        ')
            ->setParameters([
                'newPrice' => 500,
                'productId' => 2
            ])
            ->getResult();
        
        dump($product);die;
    }


    public function delete(): void
    {
        $product = $this->entityManager->getRepository(Product::class)->find(1);

        dump($product);

        $this->entityManager->createQuery('
            DELETE App\Entity\Product p WHERE p.id = :productId
        ')
            ->setParameters([
                'productId' => 1
            ])
            ->getResult();

        dump($product);die;
    }

}
