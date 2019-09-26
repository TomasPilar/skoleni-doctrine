<?php

declare(strict_types=1);

namespace App\Presenters;


use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Metadata;
use App\Entity\Picture;
use App\Entity\Product;
use App\Model\OrderGenerator;
use App\Model\ProductRepository;


final class HomepagePresenter extends BasePresenter
{

    /**
     * @var OrderGenerator
     */
    private $orderGenerator;


    public function __construct(OrderGenerator $orderGenerator)
    {
        $this->orderGenerator = $orderGenerator;
    }


    public function renderDefault()
    {
        $this->orderGenerator->generate();

    }
}
