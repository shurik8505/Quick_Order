<?php

namespace Shurik\QuickOrder\Model\ResourceModel\Status;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'status_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Shurik\QuickOrder\Model\Status::class,
            \Shurik\QuickOrder\Model\ResourceModel\Status::class
        );
    }
}

