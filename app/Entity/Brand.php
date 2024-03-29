<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Brand
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="brand")
     * @var Product[]|Collection
     */
    private $product;


    public function __construct(string $name)
    {
        $this->name = $name;
    }

}
