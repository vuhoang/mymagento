<?php
namespace Mastering\SampleModule\Model\Data;

use Magento\Framework\DataObject;
use Mastering\SampleModule\Api\Data\ProductInterface;

class Product extends DataObject implements ProductInterface
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData('id');
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData('id', $id);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData('name');
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData('name', $name);
    }
}
