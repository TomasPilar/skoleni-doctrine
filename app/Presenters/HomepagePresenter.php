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
	    $metadata = new Metadata('Super krém', 'Popis produktu');
	    $picture = new Picture(500, '/var/www/image.jpg');
	    $brand = new Brand('Značka');
	    $category = new Category('Krémy');
	    
	    $product = new Product('Nivea krém', 120, $metadata, [$picture], $brand, [$category]);
	    
	    $this->productRepository->save($product);

	    dump(1);
		die;
	}
}
