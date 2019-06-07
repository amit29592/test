<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreFile

namespace Amit\Learning\Model\ResourceModel\Item;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
   protected $_idFieldName = 'id';

   protected function _construct()
   {
       $this->_init(
        'Amit\Learning\Model\Item', 
        'Amit\Learning\Model\ResourceModel\Item'
    );
   }
}

