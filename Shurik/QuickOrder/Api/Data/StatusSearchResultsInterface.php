<?php

namespace Shurik\QuickOrder\Api\Data;

interface StatusSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get status list.
     * @return \Shurik\QuickOrder\Api\Data\StatusInterface[]
     */
    public function getItems();

    /**
     * Set status_id list.
     * @param \Shurik\QuickOrder\Api\Data\StatusInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

