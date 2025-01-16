<?php

namespace Wismolabs\Tracking\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Wismolabs\Tracking\Helper\Data as TrackingHelper;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\Order\Shipment\Track;

class ShipmentTrackViewModel implements ArgumentInterface
{
    /**
     * @var TrackingHelper
     */
    protected $trackingHelper;

    /**
     * @param TrackingHelper $trackingHelper
     */
    public function __construct(
        TrackingHelper $trackingHelper
    ) {
        $this->trackingHelper = $trackingHelper;
    }

    /**
     * Get Html For Track Button
     *
     * @param Order $order
     */
    public function getTrackButtonHtml(Order $order)
    {
        if ($this->trackingHelper->isLinkEnabledInShippingEmail($order->getStoreId())) {
            return $this->trackingHelper->getTrackButtonHtml($this->trackingHelper->getCombinedUrl($order));
        }
    }

    /**
     * Get Url For One Track
     *
     * @param Order $order
     * @param Track $track
     */
    public function getUrl(Order $order, Track $track)
    {
        return $this->trackingHelper->getUrl($order, $track);
    }
}
