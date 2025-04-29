<?php

namespace Wismolabs\Tracking\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Wismolabs\Tracking\Helper\Data as TrackingHelper;
use \Magento\Sales\Helper\Reorder as ReorderHelper;
use \Magento\Framework\Data\Helper\PostHelper;
use Magento\Sales\Model\Order;

class InfoButtonsViewModel implements ArgumentInterface
{
    /**
     * @var TrackingHelper
     */
    protected $trackingHelper;

    /**
     * @var ReorderHelper
     */
    protected $reorderHelper;

    /**
     * @var PostHelper
     */
    protected $postHelper;

    /**
     * @param TrackingHelper $trackingHelper
     * @param ReorderHelper $reorderHelper
     * @param PostHelper $postHelper
     */
    public function __construct(
        TrackingHelper $trackingHelper,
        ReorderHelper $reorderHelper,
        PostHelper $postHelper
    ) {
        $this->trackingHelper = $trackingHelper;
        $this->reorderHelper = $reorderHelper;
        $this->postHelper = $postHelper;
    }

    /**
     * Verify if link should be displayed
     *
     * @param mixed $storeId
     */
    public function isLinkEnabledInUserAccountOrdersPage($storeId)
    {
        return $this->trackingHelper->isLinkEnabledInUserAccountOrdersPage($storeId);
    }

    /**
     * Get Url that contains info for all tracks
     *
     * @param Order $order
     * @param mixed $tracks
     */
    public function getCombinedUrl(Order $order, $tracks = null)
    {
        return $this->trackingHelper->getCombinedUrl($order, $tracks);
    }

    /**
     * Original template was accessing helper directly but it's not passing validation, so it's wrapper here
     */
    public function getReorderHelper()
    {
        return $this->reorderHelper;
    }

    /**
     * Original template was accessing helper directly but it's not passing validation, so it's wrapper here
     */
    public function getPostHelper()
    {
        return $this->postHelper;
    }
}
