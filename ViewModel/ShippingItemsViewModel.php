<?php

namespace Wismolabs\Tracking\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Wismolabs\Tracking\Helper\Data as TrackingHelper;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\Order\Shipment\Track;

class ShippingItemsViewModel implements ArgumentInterface
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
     * Check if link should be displayed on that page
     *
     * @param mixed $storeId
     */
    public function isLinkEnabledInUserAccountOrdersPage($storeId)
    {
        return $this->trackingHelper->isLinkEnabledInUserAccountOrdersPage($storeId);
    }

    /**
     * Get Url For One Track
     *
     * @param Order $order
     * @param Track $shipmentTrack
     */
    public function getUrl(Order $order, Track $shipmentTrack)
    {
        return $this->trackingHelper->getUrl($order, $shipmentTrack);
    }

    /**
     * Get Url that contains info for all shipment tracks
     *
     * @param Order $order
     * @param mixed $tracks
     */
    public function getCombinedUrl(Order $order, $tracks = null)
    {
        return $this->trackingHelper->getCombinedUrl($order, $tracks);
    }
}
