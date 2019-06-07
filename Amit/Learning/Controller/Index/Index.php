<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Amit\Learning\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Event\ManagerInterface; 
//use Psr\log\LoggerInterface;
//use Amit\Learning\Model\ItemFactory;
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    protected $eventmanager;
    protected $sumresult;
    protected $a=10;
    protected $b=20;
    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    /*public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        //$this->_itemFactory = $itemFactory;
        parent::__construct($context);
    }
*/

    public function __construct(
        Context $context,
        ManagerInterface $eventmanager
    ) {
        //$this->resultPageFactory = $resultPageFactory;
        $this->eventmanager = $eventmanager;
        parent::__construct($context);
    }

    public function sum($a, $b)
	{
		 echo $this->sumresult = $a + $b;
		 return;
	}

    /**
     * Default customer account page
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {

        //return $this->resultPageFactory->create();
		// $resultModel = $this->resultPageFactory->create();
       //  $Collection = $resultModel->getCollection();
        // Load all data of collection
        //var_dump($Collection->getData());
        //die('3444444');
        $data = $this->sum($this->a,$this->b);
        print_r($data);
        //$this->eventmanager->dispatch('learning_observer', ['al_text' => 'test data']);
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
       // $model = $this->_itemFactory->create();
        //echo "<pre>";
        //print_r($model->getCollection()->getData());die;
    }
}
