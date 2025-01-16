<?php
namespace Wismolabs\Tracking\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Wismolabs\Tracking\Helper\Data as TrackingHelper;
use \Magento\GiftMessage\Helper\Message as GiftMessageHelper;
use Magento\Sales\Model\Order;

class OrderItemViewModel implements ArgumentInterface
{
    /**
     * @var TrackingHelper
     */
    protected $trackingHelper;

    /**
     * @var GiftMessageHelper
     */
    protected $giftMessageHelper;

    /**
     * @param TrackingHelper $trackingHelper
     * @param GiftMessageHelper $giftMessageHelper
     */
    public function __construct(
        TrackingHelper $trackingHelper,
        GiftMessageHelper $giftMessageHelper
    ) {
        $this->trackingHelper = $trackingHelper;
        $this->giftMessageHelper = $giftMessageHelper;
    }

    /**
     * Get Html For Track Button
     *
     * @param Order $order
     */
    public function getTrackButtonHtml(Order $order)
    {
        try {
            if ($this->trackingHelper->isLinkEnabledInOrderConfirmationEmail($order->getStoreId())) {
                return $this->trackingHelper->getTrackButtonHtml($this->trackingHelper->getCombinedUrl($order));
            }
        } catch (\Exception $e) {
            return "";
        }
        return "";
    }

    /**
     * Original template was accessing helper directly but it's not passing validation, so it's wrapper here
     */
    public function getGiftMessageHelper()
    {
        return $this->giftMessageHelper;
    }
}
