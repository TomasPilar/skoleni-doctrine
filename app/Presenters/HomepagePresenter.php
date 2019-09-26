<?php

declare(strict_types=1);

namespace App\Presenters;


use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Metadata;
use App\Entity\Picture;
use App\Entity\Product;
use App\Model\OrderGenerator;
use App\Model\OrderRepository;
use App\Model\ProductRepository;


final class HomepagePresenter extends BasePresenter
{

    /**
     * @var OrderRepository
     */
    private $orderRepository;


    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function renderDefault()
    {
        $this->template->setParameters([
            'orders' => $this->orderRepository->findAll()
        ]);
    }
}
