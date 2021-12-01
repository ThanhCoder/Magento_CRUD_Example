<?php
namespace Jeff\Contacts\Model\ResourceModel\Contact;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'jeff_contacts_contact_id';
    protected $_eventPrefix = 'jeff_contacts_contact_collection';
    protected $_eventObject = 'contact_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Jeff\Contacts\Model\Contact', 'Jeff\Contacts\Model\ResourceModel\Contact');
    }
}
