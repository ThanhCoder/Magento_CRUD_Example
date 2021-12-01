<?php
namespace Dev\Banner\Block;

class Thanh extends \Magento\Framework\View\Element\Template
{

    protected $_bannerFactory;
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Dev\Banner\Model\BannerFactory $_bannerFactory,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        $this->_bannerFactory = $_bannerFactory;
        parent::__construct($context, $data);
    }

   /* public function getData()
	{
		$post = $this->_bannerFactory->create();
		$collection = $post->getCollection();
		foreach($collection as $item){
			echo "<pre>";
			print_r($item->getData());
			echo "</pre>";
		}
		exit();
    }*/

    public function getPostCollection(){
		$post = $this->_bannerFactory->create();
		return $post->getCollection();
	}
}
