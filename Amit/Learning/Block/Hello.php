<?php
namespace Amit\Learning\Block;

use Magento\Framework\View\Element\Template;
use Amit\Learning\Model\ItemFactory;


class Hello extends \Magento\Framework\View\Element\Template
{
	private $_collectionFactory;
  protected $_itemFactory;

	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        ItemFactory $collectionFactory, 
        ItemFactory $itemFactory,
        array $data = []
    ) {
        //parent::__construct($context, $data);
        $this->_collectionFactory = $collectionFactory;
        $this->_itemFactory = $itemFactory;
		parent::__construct($context,$data);
    }

	/*public function __construct()(
		\Magento\Framework\View\Element\Template\Context $context,
		//\Amit\Learning\Model\ResourceModel\Item\Collection $collectionFactory,
		array $data = []
	){
		  	die('kkkkkkkkkklllll');
		//$this->collectionFactory = $collectionFactory;
		parent::__construct($context,$data);
	}*/
   
   public function getItems()
   {
//die('testiiiii');
   	
   	 $model = $this->_itemFactory->create();
      //  echo "<pre>";
      return $itemdata = $model->getCollection()->getData();
   	
   	//return "temp";
   }

     
    public function getFormAction()
    {
            // companymodule is given in routes.xml
            // controller_name is folder name inside controller folder
            // action is php file name inside above controller_name folder

        return '/learning/index/save';
        // here controller_name is index, action is booking
    }
}