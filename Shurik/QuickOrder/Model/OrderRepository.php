<?php

namespace Shurik\QuickOrder\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;
use Shurik\QuickOrder\Api\Data\OrderInterfaceFactory;
use Shurik\QuickOrder\Api\Data\OrderSearchResultsInterfaceFactory;
use Shurik\QuickOrder\Api\OrderRepositoryInterface;
use Shurik\QuickOrder\Model\ResourceModel\Order as ResourceOrder;
use Shurik\QuickOrder\Model\ResourceModel\Order\CollectionFactory as OrderCollectionFactory;

class OrderRepository implements OrderRepositoryInterface
{

    protected $extensionAttributesJoinProcessor;

    protected $dataObjectProcessor;

    private $storeManager;

    protected $orderFactory;

    protected $searchResultsFactory;

    private $collectionProcessor;

    protected $dataObjectHelper;

    protected $orderCollectionFactory;

    protected $resource;

    protected $dataOrderFactory;

    protected $extensibleDataObjectConverter;

    /**
     * @param ResourceOrder $resource
     * @param OrderFactory $orderFactory
     * @param OrderInterfaceFactory $dataOrderFactory
     * @param OrderCollectionFactory $orderCollectionFactory
     * @param OrderSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceOrder $resource,
        OrderFactory $orderFactory,
        OrderInterfaceFactory $dataOrderFactory,
        OrderCollectionFactory $orderCollectionFactory,
        OrderSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->orderFactory = $orderFactory;
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataOrderFactory = $dataOrderFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Shurik\QuickOrder\Api\Data\OrderInterface $order
    ) {
        /* if (empty($order->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $order->setStoreId($storeId);
        } */
        
        $orderData = $this->extensibleDataObjectConverter->toNestedArray(
            $order,
            [],
            \Shurik\QuickOrder\Api\Data\OrderInterface::class
        );
        
        $orderModel = $this->orderFactory->create()->setData($orderData);
        
        try {
            $this->resource->save($orderModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the order: %1',
                $exception->getMessage()
            ));
        }
        return $orderModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($orderId)
    {
        $order = $this->orderFactory->create();
        $this->resource->load($order, $orderId);
        if (!$order->getId()) {
            throw new NoSuchEntityException(__('order with id "%1" does not exist.', $orderId));
        }
        return $order->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->orderCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Shurik\QuickOrder\Api\Data\OrderInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Shurik\QuickOrder\Api\Data\OrderInterface $order
    ) {
        try {
            $orderModel = $this->orderFactory->create();
            $this->resource->load($orderModel, $order->getOrderId());
            $this->resource->delete($orderModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the order: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($orderId)
    {
        return $this->delete($this->get($orderId));
    }
}

