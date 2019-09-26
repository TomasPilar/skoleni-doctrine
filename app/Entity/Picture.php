<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 */
class Picture
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $size;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $path;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="pictures")
     * @var Product
     */
    private $product;


    public function __construct(int $size, string $path)
    {
        $this->size = $size;
        $this->path = $path;
    }

}
