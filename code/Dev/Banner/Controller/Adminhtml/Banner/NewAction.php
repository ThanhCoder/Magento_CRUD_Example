<?php
namespace Dev\Banner\Controller\Adminhtml\Banner;

use Dev\Banner\Model\Banner as Banner;


class NewAction extends \Magento\Backend\App\Action
{
  /**
     * Edit A Contact Page
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();

        $contactDatas = $this->getRequest()->getParam('banner');
        if(is_array($contactDatas)) {
            $contact = $this->_objectManager->create(Banner::class);
            $contact->setData($contactDatas)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index');
        }
    }
}
