<?php

namespace Shurik\QuickOrder\Block;

use Magento\Framework\Model\AbstractModel;


class StatusDefault extends AbstractModel
{
    public $statusDefault;

    protected function _construct()
    {
        $this->_init('\Shurik\QuickOrder\Model\ResourceModel\Status');
        $this->load('1', 'is_default');
        return $this;
    }



}