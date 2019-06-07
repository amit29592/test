<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Amit\Learning\Model;


use Magento\Framework\Model\AbstractModel;


/**
 * Product entity resource model
 *
 * @api
 * @SuppressWarnings(PHPMD.LongVariable)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @since 100.0.2
 */
class Item extends AbstractModel
{
    
    protected function _construct() {

       // $this->_init(\Amit\Learning\Model\ResourceModel\Item::class);
        $this->_init('Amit\Learning\Model\ResourceModel\Item');
        
    }

   
}

