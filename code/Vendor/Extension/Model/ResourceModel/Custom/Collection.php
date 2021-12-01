<?php
namespace Vendor\Extension\Model\ResourceModel\Custom;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'vendor_extension_custom_collection';
    protected $_eventObject = 'custom_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Vendor\Extension\Model\Custom', 'Vendor\Extension\Model\ResourceModel\Custom');
    }
}
