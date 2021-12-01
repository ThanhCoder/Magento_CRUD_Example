<?php
 
namespace Vendor\Extension\Controller\Adminhtml\Index;
 
class Save extends \Magento\Backend\App\Action
 
{
 
    protected $customFactory;
 
    protected $adapterFactory;
 
    protected $uploader;
 
    public function __construct(
 
        \Magento\Backend\App\Action\Context $context,
 
        \Vendor\Extension\Model\CustomFactory $customFactory
 
    ) {
 
        parent::__construct($context);
 
        $this->customFactory = $customFactory;
 
    }
 
    public function execute()
 
    {
 
        $data = $this->getRequest()->getPostValue();
 
        try {
 
            $model = $this->customFactory->create();
 
$model->addData([
 
    "name" => $data['name'],
 
    "content" => $data['content'],
 
    "title" => $data['title'],
 
]);
 
$saveData = $model->save();
 
if($saveData){
 
    $this->messageManager->addSuccess( __('Insert data Successfully !') );
 
}
 
        }catch (\Exception $e) {
 
            $this->messageManager->addError(__($e->getMessage()));
 
        }
 
        $this->_redirect('*/*/index');
 
    }
 
}