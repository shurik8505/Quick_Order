<?php

namespace Shurik\QuickOrder\Api\Data;

interface OrderSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get order list.
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface[]
     */
    public function getItems();

    /**
     * Set sku list.
     * @param \Shurik\QuickOrder\Api\Data\OrderInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

