<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Amit\Learning\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
  

class Item extends AbstractDb
{
    protected $_idFieldName = 'id';

    protected function _construct() {

        $this->_init('learning_sample_item','id');
       
    }

   
}


