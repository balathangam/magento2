<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Webhook
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Mage_Webhook_Block_Adminhtml_Subscriber_Grid_Renderer_Action
    extends Mage_Backend_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        if ($row instanceof Mage_Webhook_Model_Subscriber) {
            if ($row->getStatus() == Mage_Webhook_Model_Subscriber::STATUS_ACTIVE) {
                return '<a href="' . $this->getUrl('*/webhook_subscriber/revoke', array('id' => $row->getId())) . '">'
                    . $this->__('Revoke') . '</a>';
            } else if ($row->getStatus() == Mage_Webhook_Model_Subscriber::STATUS_REVOKED) {
                return '<a href="' . $this->getUrl('*/webhook_subscriber/activate', array('id' => $row->getId())) . '">'
                    . $this->__('Activate') . '</a>';
            } else if ($row->getStatus() == Mage_Webhook_Model_Subscriber::STATUS_INACTIVE) {
                $url = $this->getUrl('*/webhook_registration/activate', array('id' => $row->getId()));
                return '<a href="#" onclick="activateSubscriber(\''. $url .'\'); return false;">'
                    . $this->__('Activate')
                    . '</a>';
            }
        }

        return '';
    }
}
