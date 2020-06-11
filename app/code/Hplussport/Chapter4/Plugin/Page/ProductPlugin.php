<?php
 
namespace Hplussport\Chapter4\Plugin\Page;
 
class ProductPlugin
{    
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {            
        return "Mr. ".$result;
    }    
}
?>