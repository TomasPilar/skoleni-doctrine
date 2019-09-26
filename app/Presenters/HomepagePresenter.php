<?php

declare(strict_types=1);

namespace App\Presenters;


use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Metadata;
use App\Entity\Picture;
use App\Entity\Product;
use App\Model\ProductRepository;


final class HomepagePresenter extends BasePresenter
{

    /**
     * @var ProductRepository
     */
    private $productRepository;


    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

	public function renderDefault(): void
	{
        $this->productRepository->update();

		die;
	}
}
