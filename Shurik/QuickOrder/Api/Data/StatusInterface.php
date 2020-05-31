<?php

namespace Shurik\QuickOrder\Api\Data;

interface StatusInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const IS_DEFAULT = 'is_default';
    const STATUS_ID = 'status_id';
    const LABEL = 'label';
    const STATUS_CODE = 'status_code';

    /**
     * Get status_id
     * @return string|null
     */
    public function getStatusId();

    /**
     * Set status_id
     * @param string $statusId
     * @return \Shurik\QuickOrder\Api\Data\StatusInterface
     */
    public function setStatusId($statusId);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Shurik\QuickOrder\Api\Data\StatusExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Shurik\QuickOrder\Api\Data\StatusExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Shurik\QuickOrder\Api\Data\StatusExtensionInterface $extensionAttributes
    );

    /**
     * Get status_code
     * @return string|null
     */
    public function getStatusCode();

    /**
     * Set status_code
     * @param string $statusCode
     * @return \Shurik\QuickOrder\Api\Data\StatusInterface
     */
    public function setStatusCode($statusCode);

    /**
     * Get label
     * @return string|null
     */
    public function getLabel();

    /**
     * Set label
     * @param string $label
     * @return \Shurik\QuickOrder\Api\Data\StatusInterface
     */
    public function setLabel($label);

    /**
     * Get is_default
     * @return string|null
     */
    public function getIsDefault();

    /**
     * Set is_default
     * @param string $isDefault
     * @return \Shurik\QuickOrder\Api\Data\StatusInterface
     */
    public function setIsDefault($isDefault);
}

