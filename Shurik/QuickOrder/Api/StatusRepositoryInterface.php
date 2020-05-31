<?php

namespace Shurik\QuickOrder\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface StatusRepositoryInterface
{

    /**
     * Save status
     * @param \Shurik\QuickOrder\Api\Data\StatusInterface $status
     * @return \Shurik\QuickOrder\Api\Data\StatusInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Shurik\QuickOrder\Api\Data\StatusInterface $status
    );

    /**
     * Retrieve status
     * @param string $statusId
     * @return \Shurik\QuickOrder\Api\Data\StatusInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($statusId);

    /**
     * Retrieve status matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Shurik\QuickOrder\Api\Data\StatusSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete status
     * @param \Shurik\QuickOrder\Api\Data\StatusInterface $status
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Shurik\QuickOrder\Api\Data\StatusInterface $status
    );

    /**
     * Delete status by ID
     * @param string $statusId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($statusId);
}

