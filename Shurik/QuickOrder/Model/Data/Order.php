<?php

namespace Shurik\QuickOrder\Model\Data;

use Shurik\QuickOrder\Api\Data\OrderInterface;

class Order extends \Magento\Framework\Api\AbstractExtensibleObject implements OrderInterface
{

    /**
     * Get order_id
     * @return string|null
     */
    public function getOrderId()
    {
        return $this->_get(self::ORDER_ID);
    }

    /**
     * Set order_id
     * @param string $orderId
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setOrderId($orderId)
    {
        return $this->setData(self::ORDER_ID, $orderId);
    }

    /**
     * Get sku
     * @return string|null
     */
    public function getSku()
    {
        return $this->_get(self::SKU);
    }

    /**
     * Set sku
     * @param string $sku
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setSku($sku)
    {
        return $this->setData(self::SKU, $sku);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Shurik\QuickOrder\Api\Data\OrderExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Shurik\QuickOrder\Api\Data\OrderExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Shurik\QuickOrder\Api\Data\OrderExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone()
    {
        return $this->_get(self::PHONE);
    }

    /**
     * Set phone
     * @param string $phone
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setPhone($phone)
    {
        return $this->setData(self::PHONE, $phone);
    }

    /**
     * Get email
     * @return string|null
     */
    public function getEmail()
    {
        return $this->_get(self::EMAIL);
    }

    /**
     * Set email
     * @param string $email
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get create_at
     * @return string|null
     */
    public function getCreateAt()
    {
        return $this->_get(self::CREATE_AT);
    }

    /**
     * Set create_at
     * @param string $createAt
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setCreateAt($createAt)
    {
        return $this->setData(self::CREATE_AT, $createAt);
    }

    /**
     * Get update_at
     * @return string|null
     */
    public function getUpdateAt()
    {
        return $this->_get(self::UPDATE_AT);
    }

    /**
     * Set update_at
     * @param string $updateAt
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setUpdateAt($updateAt)
    {
        return $this->setData(self::UPDATE_AT, $updateAt);
    }

    /**
     * Get status
     * @return string|null
     */
    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}

