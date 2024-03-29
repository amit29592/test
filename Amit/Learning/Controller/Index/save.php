<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Amit\Learning\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Amit\Learning\Model\ItemFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Exception\LocalizedException;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;


class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var PageFactory
     */
    protected $ResultFactory;
    protected $_itemFactory;
    protected $uploaderFactory;
    protected $adapterFactory;
    protected $filesystem;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        ItemFactory $itemFactory,
        ResultFactory $resultPageFactory,
        UploaderFactory $uploaderFactory,
        AdapterFactory $adapterFactory,
        Filesystem $filesystem
    ) {
        $this->ResultFactory = $resultPageFactory;
        $this->_itemFactory = $itemFactory;
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;
        parent::__construct($context);
    }

    /**
     * Default customer account page
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $model = $this->_itemFactory->create();
        //$data = $this->getRequest()->getPost();
        $data = $this->getRequest()->getParams();
   

        if (!empty($data)) {

            if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
     
                try{
                    $uploaderFactory = $this->uploaderFactory->create(['fileId' => 'image']);
                    $uploaderFactory->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                    $imageAdapter = $this->adapterFactory->create();
                    $uploaderFactory->addValidateCallback('custom_image_upload',$imageAdapter,'validateUploadFile');
                    $uploaderFactory->setAllowRenameFiles(true);
                    $uploaderFactory->setFilesDispersion(true);
                    $mediaDirectory = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);
                    $destinationPath = $mediaDirectory->getAbsolutePath('amit/learning');
                    $result = $uploaderFactory->save($destinationPath);
                    if (!$result) {
                        throw new LocalizedException(
                            __('File cannot be saved to path: $1', $destinationPath)
                        );
                    }
                    $imagePath = 'amit/learning'.$result['file'];
                    $data['image'] = $imagePath;
                    } catch (\Exception $e) {
                    }
            }
            
            $model->setData($data);
            try{
                $model->save();
                $this->messageManager->addSuccessMessage('Item has been submitted successfully');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }

            $this->_redirect('learning');
            return;

        }
        else{
            $this->messageManager->addErrorMessage('Please fill the form data');
        }
    }
}
