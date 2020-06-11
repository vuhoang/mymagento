<?php
namespace Mastering\SampleModule\Api;
interface ProductRepositoryInterface
{
    /**
     * Get product by it's ID
     * @param int $id
     * @return \Mastering\SampleModule\Api\Data\ProductInterface
     * @throw NoSuchEntityException
     */
    public function getProductById($id);
}
