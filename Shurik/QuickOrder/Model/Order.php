<?php

namespace Shurik\QuickOrder\Model;

use Magento\Framework\Api\DataObjectHelper;
use Shurik\QuickOrder\Api\Data\OrderInterface;
use Shurik\QuickOrder\Api\Data\OrderInterfaceFactory;

class Order extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'shurik_quickorder_order';
    protected $dataObjectHelper;

    protected $orderDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param OrderInterfaceFactory $orderDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Shurik\QuickOrder\Model\ResourceModel\Order $resource
     * @param \Shurik\QuickOrder\Model\ResourceModel\Order\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        OrderInterfaceFactory $orderDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Shurik\QuickOrder\Model\ResourceModel\Order $resource,
        \Shurik\QuickOrder\Model\ResourceModel\Order\Collection $resourceCollection,
        array $data = []
    ) {
        $this->orderDataFactory = $orderDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve order model with order data
     * @return OrderInterface
     */
    public function getDataModel()
    {
        $orderData = $this->getData();
        
        $orderDataObject = $this->orderDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $orderDataObject,
            $orderData,
            OrderInterface::class
        );
        
        return $orderDataObject;
    }
}

