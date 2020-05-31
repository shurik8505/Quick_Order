<?php

namespace Shurik\QuickOrder\Model;

use Magento\Framework\Api\DataObjectHelper;
use Shurik\QuickOrder\Api\Data\StatusInterface;
use Shurik\QuickOrder\Api\Data\StatusInterfaceFactory;

class Status extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $_eventPrefix = 'shurik_quickorder_status';
    protected $statusDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param StatusInterfaceFactory $statusDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Shurik\QuickOrder\Model\ResourceModel\Status $resource
     * @param \Shurik\QuickOrder\Model\ResourceModel\Status\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        StatusInterfaceFactory $statusDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Shurik\QuickOrder\Model\ResourceModel\Status $resource,
        \Shurik\QuickOrder\Model\ResourceModel\Status\Collection $resourceCollection,
        array $data = []
    ) {
        $this->statusDataFactory = $statusDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve status model with status data
     * @return StatusInterface
     */
    public function getDataModel()
    {
        $statusData = $this->getData();
        
        $statusDataObject = $this->statusDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $statusDataObject,
            $statusData,
            StatusInterface::class
        );
        
        return $statusDataObject;
    }
}

