<?php

namespace Shurik\QuickOrder\Controller\Adminhtml\Order;

class Delete extends \Shurik\QuickOrder\Controller\Adminhtml\Order
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('order_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Shurik\QuickOrder\Model\Order::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Order.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['order_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Order to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

