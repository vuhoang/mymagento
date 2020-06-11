<?php

namespace Mastering\SampleModule\Block;

use Magento\Framework\View\Element\Template;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;

class Hello extends Template
{
    private $collectionFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }
    /**
     * @return \Mastering\SampleModule\Model\Item[]
     */
    public function getItems()
    {
        //var_dump($this->collectionFactory->create()->getItems());
        //exit();
//        var_dump($this->collectionFactory);exit();
//        print_r($this->collectionFactory->create()->getItems());exit();
//        var_dump(debug_backtrace());
//        exit();
        return $this->collectionFactory->create()->getItems();
    }
}
