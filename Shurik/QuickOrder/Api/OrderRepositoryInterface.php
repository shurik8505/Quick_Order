<?php

namespace Shurik\QuickOrder\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface OrderRepositoryInterface
{

    /**
     * Save order
     * @param \Shurik\QuickOrder\Api\Data\OrderInterface $order
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Shurik\QuickOrder\Api\Data\OrderInterface $order
    );

    /**
     * Retrieve order
     * @param string $orderId
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($orderId);

    /**
     * Retrieve order matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Shurik\QuickOrder\Api\Data\OrderSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete order
     * @param \Shurik\QuickOrder\Api\Data\OrderInterface $order
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Shurik\QuickOrder\Api\Data\OrderInterface $order
    );

    /**
     * Delete order by ID
     * @param string $orderId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($orderId);
}

