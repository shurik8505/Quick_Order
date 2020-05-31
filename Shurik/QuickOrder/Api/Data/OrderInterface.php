<?php

namespace Shurik\QuickOrder\Api\Data;

interface OrderInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const EMAIL = 'email';
    const CREATE_AT = 'create_at';
    const SKU = 'sku';
    const ORDER_ID = 'order_id';
    const UPDATE_AT = 'update_at';
    const PHONE = 'phone';
    const NAME = 'name';
    const STATUS = 'status';
    /**
     * Get order_id
     * @return string|null
     */
    public function getOrderId();

    /**
     * Set order_id
     * @param string $orderId
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setOrderId($orderId);

    /**
     * Get sku
     * @return string|null
     */
    public function getSku();

    /**
     * Set sku
     * @param string $sku
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setSku($sku);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Shurik\QuickOrder\Api\Data\OrderExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Shurik\QuickOrder\Api\Data\OrderExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Shurik\QuickOrder\Api\Data\OrderExtensionInterface $extensionAttributes
    );

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setName($name);

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone();

    /**
     * Set phone
     * @param string $phone
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setPhone($phone);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setEmail($email);

    /**
     * Get create_at
     * @return string|null
     */
    public function getCreateAt();

    /**
     * Set create_at
     * @param string $createAt
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */

    public function setCreateAt($createAt);

    /**
     * Get update_at
     * @return string|null
     */
    public function getUpdateAt();

    /**
     * Set update_at
     * @param string $updateAt
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setUpdateAt($updateAt);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Shurik\QuickOrder\Api\Data\OrderInterface
     */
    public function setStatus($status);

    /**
     * Get CreateTime
     * @return string|null
     */
}

