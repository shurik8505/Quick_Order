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
use Shurik\QuickOrder\Api\Data\StatusInterfaceFactory;
use Shurik\QuickOrder\Api\Data\StatusSearchResultsInterfaceFactory;
use Shurik\QuickOrder\Api\StatusRepositoryInterface;
use Shurik\QuickOrder\Model\ResourceModel\Status as ResourceStatus;
use Shurik\QuickOrder\Model\ResourceModel\Status\CollectionFactory as StatusCollectionFactory;

class StatusRepository implements StatusRepositoryInterface
{

    protected $extensionAttributesJoinProcessor;

    protected $dataStatusFactory;

    protected $dataObjectProcessor;

    private $storeManager;

    protected $statusFactory;

    protected $searchResultsFactory;

    private $collectionProcessor;

    protected $dataObjectHelper;

    protected $resource;

    protected $statusCollectionFactory;

    protected $extensibleDataObjectConverter;

    /**
     * @param ResourceStatus $resource
     * @param StatusFactory $statusFactory
     * @param StatusInterfaceFactory $dataStatusFactory
     * @param StatusCollectionFactory $statusCollectionFactory
     * @param StatusSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceStatus $resource,
        StatusFactory $statusFactory,
        StatusInterfaceFactory $dataStatusFactory,
        StatusCollectionFactory $statusCollectionFactory,
        StatusSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->statusFactory = $statusFactory;
        $this->statusCollectionFactory = $statusCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataStatusFactory = $dataStatusFactory;
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
        \Shurik\QuickOrder\Api\Data\StatusInterface $status
    ) {
        /* if (empty($status->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $status->setStoreId($storeId);
        } */
        
        $statusData = $this->extensibleDataObjectConverter->toNestedArray(
            $status,
            [],
            \Shurik\QuickOrder\Api\Data\StatusInterface::class
        );
        
        $statusModel = $this->statusFactory->create()->setData($statusData);
        
        try {
            $this->resource->save($statusModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the status: %1',
                $exception->getMessage()
            ));
        }
        return $statusModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($statusId)
    {
        $status = $this->statusFactory->create();
        $this->resource->load($status, $statusId);
        if (!$status->getId()) {
            throw new NoSuchEntityException(__('status with id "%1" does not exist.', $statusId));
        }
        return $status->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->statusCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Shurik\QuickOrder\Api\Data\StatusInterface::class
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
        \Shurik\QuickOrder\Api\Data\StatusInterface $status
    ) {
        try {
            $statusModel = $this->statusFactory->create();
            $this->resource->load($statusModel, $status->getStatusId());
            $this->resource->delete($statusModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the status: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($statusId)
    {
        return $this->delete($this->get($statusId));
    }
}

