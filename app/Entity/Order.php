<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="`order`")
 */
class Order
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $variableSymbol;

    /**
     * @ORM\OneToMany(targetEntity="OrderProduct", mappedBy="order")
     * @var OrderProduct[]|Collection
     */
    private $products;


    public function __construct(string $variableSymbol)
    {
        $this->variableSymbol = $variableSymbol;
    }


    public function getVariableSymbol(): string
    {
        return $this->variableSymbol;
    }


    /**
     * @return OrderProduct[]
     */
    public function getProducts()
    {
        return $this->products->toArray();
    }


    public function addProduct(OrderProduct $orderProduct)
    {
        if ($this->products->contains($orderProduct)) {
            return;
        }

        $orderProduct->setOrder($this);
        $this->products->add($orderProduct);
    }

}
