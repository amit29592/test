<?php

namespace Amit\Learning\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action
{
    
    protected $_resultFactory;
   
    public function __construct(
        Context $context,
        ResultFactory $resultFactory
    ) {

        $this->_resultFactory = $resultFactory;
        parent::__construct($context);
    }

   
    public function execute()
    {
        
        $result = $this->_resultFactory->create(ResultFactory::TYPE_PAGE);
     
        return $result;
      
    }
}

