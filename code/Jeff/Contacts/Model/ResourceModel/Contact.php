<?php
namespace Jeff\Contacts\Model\ResourceModel;

class Contact extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('jeff_contacts_contact', 'jeff_contacts_contact_id');
    }
}
