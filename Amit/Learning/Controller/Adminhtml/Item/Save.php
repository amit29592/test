<?php

namespace Amit\Learning\Controller\Adminhtml\Item;

use Amit\Learning\Model\ItemFactory;
use Magento\Backend\App\Action;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;


class Save extends Action
{
    private $itemFactory;

    const ADMIN_RESOURCE = 'Amit_Learning::helloworld';    
    protected $dataProcessor;    
    protected $dataPersistor;
    protected $imageUploader;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        ItemFactory $itemFactory,
       // PostDataProcessor $dataProcessor,
        DataPersistorInterface $dataPersistor
    ) {
        $this->itemFactory = $itemFactory;
       // $this->dataProcessor = $dataProcessor;
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();


        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {



        

            if (isset($data['logo'][0]['name']) && isset($data['logo'][0]['tmp_name'])) {
                $data['image'] =$data['logo'][0]['name'];
                $this->imageUploader = \Magento\Framework\App\ObjectManager::getInstance()->get(
                'Amit\Learning\HelloWorldImageUpload'
            );
                $this->imageUploader->moveFileFromTmp($data['image']);
            } elseif (isset($data['logo'][0]['image']) && !isset($data['logo'][0]['tmp_name'])) {
                $data['image'] = $data['logo'][0]['image'];
            } else {
                $data['image'] = null;
            }


        $this->itemFactory->create()
            ->setData($this->getRequest()->getPostValue()['general'])
            ->save();
        return $this->resultRedirectFactory->create()->setPath('learning/index/index');
    }
       
    }
}
