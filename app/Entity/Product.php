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
     * @ORM\OneToOne(targetEntity="Metadata")
     * @var Metadata
     */
    private $metadata;

    /**
     * @ORM\OneToMany(targetEntity="Picture", mappedBy="product")
     * @var Picture[]|Collection
     */
    private $pictures;

    /**
     * @ORM\ManyToOne(targetEntity="Brand", inversedBy="product")
     * @ORM\JoinColumn(nullable=FALSE)
     * @var Brand
     */
    private $brand;

    /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="products")
     * @var Category[]|Collection
     */
    private $categories;

}
