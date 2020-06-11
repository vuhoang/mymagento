<?php
namespace Mastering\SampleModule\Model;

use Mastering\SampleModule\Api\ConfigurableProductRepositoryInterface;
use Mastering\SampleModule\Api\ProductRepositoryInterface;
use Mastering\SampleModule\Api\Data\ProductInterfaceFactory;
//use Mastering\SampleModule\Helper\ProductHelper;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Mastering api to get product by ID
 */
class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var ProductInterfaceFactory\
     */
    private $productInterfaceFactory;
    /**
     * ProductRepository constructor
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
     * @param ProductInterfaceFactory $productInterfaceFactory
     */
    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        ProductInterfaceFactory $productInterfaceFactory
    )
    {
        $this->productInterfaceFactory = $productInterfaceFactory;
        $this->productRepository = $productRepository;
    }

    /**
     * Get product by it's ID
     * @param int $id
     * @return \Mastering\SampleModule\Api\Data\ProductInterface
     * @throw NoSuchEntityException
     */
    public function getProductById($id)
    {
        /** @var \Mastering\SampleModule\Api\Data\ProductInterface $productInterface */
        $productInterface = $this->productInterfaceFactory->create();
        try{
            /** @var \Magento\Catalog\Api\Data\ProductInterface $product */
            $product = $this->productRepository->getById($id);
            $productInterface->setId($product->getId());
            $productInterface->setName($product->getName());
            return $productInterface;
        }catch (NoSuchEntityException $e){
            throw NoSuchEntityException::singleField("id",$id);
        }
    }
}
