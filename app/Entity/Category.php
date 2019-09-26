<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Category
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
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="categories")
     * @var Product[]|Collection
     */
    private $products;


    public function __construct(string $name)
    {
        $this->name = $name;
    }

}
