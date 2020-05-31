<?php

namespace Shurik\QuickOrder\Model\ResourceModel;

class Status extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('shurik_quickorder_status', 'status_id');
    }
}

