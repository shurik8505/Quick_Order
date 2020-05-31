<?php

namespace Shurik\QuickOrder\Model\Data;

use Shurik\QuickOrder\Api\Data\StatusInterface;

class Status extends \Magento\Framework\Api\AbstractExtensibleObject implements StatusInterface
{

    /**
     * Get status_id
     * @return string|null
     */
    public function getStatusId()
    {
        return $this->_get(self::STATUS_ID);
    }

    /**
     * Set status_id
     * @param string $statusId
     * @return \Shurik\QuickOrder\Api\Data\StatusInterface
     */
    public function setStatusId($statusId)
    {
        return $this->setData(self::STATUS_ID, $statusId);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Magento\Framework\Api\ExtensionAttributesInterface
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Shurik\QuickOrder\Api\Data\StatusExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Shurik\QuickOrder\Api\Data\StatusExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get status_code
     * @return string|null
     */
    public function getStatusCode()
    {
        return $this->_get(self::STATUS_CODE);
    }

    /**
     * Set status_code
     * @param string $statusCode
     * @return \Shurik\QuickOrder\Api\Data\StatusInterface
     */
    public function setStatusCode($statusCode)
    {
        return $this->setData(self::STATUS_CODE, $statusCode);
    }

    /**
     * Get label
     * @return string|null
     */
    public function getLabel()
    {
        return $this->_get(self::LABEL);
    }

    /**
     * Set label
     * @param string $label
     * @return \Shurik\QuickOrder\Api\Data\StatusInterface
     */
    public function setLabel($label)
    {
        return $this->setData(self::LABEL, $label);
    }

    /**
     * Get is_default
     * @return string|null
     */
    public function getIsDefault()
    {
        return $this->_get(self::IS_DEFAULT);
    }

    /**
     * Set is_default
     * @param string $isDefault
     * @return \Shurik\QuickOrder\Api\Data\StatusInterface
     */
    public function setIsDefault($isDefault)
    {
        return $this->setData(self::IS_DEFAULT, $isDefault);
    }
}

