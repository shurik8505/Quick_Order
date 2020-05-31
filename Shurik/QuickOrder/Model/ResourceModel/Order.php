<?php

namespace Shurik\QuickOrder\Model\ResourceModel;

class Order extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('shurik_quickorder_order', 'order_id');
    }
}

