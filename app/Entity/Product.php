<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Product
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
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=4)
     * @var float
     */
    private $price;

    /**
     * @ORM\OneToOne(targetEntity="Metadata", cascade={"persist"})
     * @var Metadata
     */
    private $metadata;

    /**
     * @ORM\OneToMany(targetEntity="Picture", mappedBy="product", cascade={"persist"})
     * @var Picture[]|Collection
     */
    private $pictures;

    /**
     * @ORM\ManyToOne(targetEntity="Brand", inversedBy="product", cascade={"persist"})
     * @ORM\JoinColumn(nullable=FALSE)
     * @var Brand
     */
    private $brand;

    /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="products", cascade={"persist"})
     * @var Category[]|Collection
     */
    private $categories;


    public function __construct(string $name, float $price, Metadata $metadata, $pictures, Brand $brand, $categories)
    {
        $this->name = $name;
        $this->price = $price;
        $this->metadata = $metadata;
        $this->pictures = $pictures;
        $this->brand = $brand;
        $this->categories = $categories;
    }


    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

}
