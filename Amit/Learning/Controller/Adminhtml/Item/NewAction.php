<?php

namespace Amit\Learning\Controller\Adminhtml\Item;

use Magento\Framework\Controller\ResultFactory;
use Amit\Learning\Model\ItemFactory;

class NewAction extends \Magento\Backend\App\Action
{
	private $_itemFactory;

	

	  public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        ItemFactory $itemFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->_itemFactory = $itemFactory;
    }

    public function execute()
    {
    	$rowId = (int) $this->getRequest()->getParam('id');

        $rowData = $this->_itemFactory->create();
        
        if ($rowId) {
           $rowData = $rowData->load($rowId);
          
           if (!$rowData->getId()) {
               $this->messageManager->addError(__('row data no longer exist.'));
               $this->_redirect('*/item/new');
               return;
           }
       }

        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
