<?php
namespace Hplussport\Chapter4\Controller\Page;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_sportFactory;
    
    protected $title;    

    public function __construct(
            \Magento\Framework\App\Action\Context $context,
            \Magento\Framework\View\Result\PageFactory $pageFactory,
            \Hplussport\Chapter3\Model\SportsFactory $sportFactory
            )
    {
            $this->_pageFactory = $pageFactory;
            $this->_sportFactory = $sportFactory;
            return parent::__construct($context);
    }

    public function execute()
    {
            echo "Set Title = ".$this->setTitle('My'). "</br>";
            echo "Get Title = ".$this->getTitle();
        
//            $sports = $this->_sportFactory->create();
//            $collection = $sports->getCollection()->setPageSize(1);
//            foreach($collection as $item){
//                    echo "<pre>";
//                    print_r($item->getData());
//                    echo "</pre>";
//            }
            return $this->_pageFactory->create();
    }

    public function setTitle($title)
    {
            return $this->title = $title;
    }

    public function getTitle()
    {
            return $this->title;
    }    
}