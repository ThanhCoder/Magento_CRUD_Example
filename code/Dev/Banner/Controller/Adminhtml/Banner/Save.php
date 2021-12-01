<?php
 
namespace Dev\Banner\Controller\Adminhtml\Banner;
 
class Save extends \Magento\Backend\App\Action
 
{
 
    protected $customFactory;
 
    protected $adapterFactory;
 
    protected $uploader;
 
    public function __construct(
 
        \Magento\Backend\App\Action\Context $context,
 
        \Dev\Banner\Model\BannerFactory $customFactory
 
    ) {
 
        parent::__construct($context);
 
        $this->customFactory = $customFactory;
 
    }
 
    public function execute()
    {
        // Lay duong dan tren URL se lay cai id
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if($data)
        try {
            // set id theo cot banner_id
            $id = $data['banner_id'];
            // lay du lieu tu cot banner_id bang load(id)
            $model = $this->customFactory->create()->load($id);;
            $model->addData([
            "name" => $data['name'],
            "description" => $data['description'],
            "image" => $data['image'],
            "status" => $data['status'],
            "product_banner" => $data['product_banner'],
        ]);
 
        $saveData = $model->save();
        
        if($saveData){
        
            $this->messageManager->addSuccess( __('Insert data Successfully !') );
            $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
            return $resultRedirect->setPath('*/*/');
        }
    }
        catch (\Exception $e) 
        {
 
            $this->messageManager->addError(__($e->getMessage()));
            $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $contact->getId()]);
        }
        $this->_redirect('*/*/index');
    }
}

/*
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if($data)
        {
            try{
                $id = $data['jeff_contacts_contact_id'];

                $contact = $this->contactFactory->create()->load($id);

                $data = array_filter($data, function($value) {return $value !== ''; });

                $contact->setData($data);
                $contact->save();
                $this->messageManager->addSuccess(__('Successfully saved the item.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
            }
            catch(\Exception $d)
            {
                $this->messageManager->addError($e->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
            }
        }
*/