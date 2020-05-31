<?php

namespace Shurik\QuickOrder\Model\ResourceModel\Order;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'order_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Shurik\QuickOrder\Model\Order::class,
            \Shurik\QuickOrder\Model\ResourceModel\Order::class
        );
    }
}

