<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="`order`")
 * @ORM\Cache(usage="NONSTRICT_READ_WRITE", region="order")
 * @ORM\HasLifecycleCallbacks
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
     * @ORM\OneToMany(targetEntity="OrderProduct", mappedBy="order", cascade={"persist"})
     * @ORM\Cache(usage="NONSTRICT_READ_WRITE")
     * @var OrderProduct[]|Collection
     */
    private $products;


    public function __construct()
    {
        $this->products = new ArrayCollection;
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function getVariableSymbol(): string
    {
        return $this->variableSymbol;
    }


    public function setVariableSymbol(string $variableSymbol): void
    {
        $this->variableSymbol = $variableSymbol;
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
