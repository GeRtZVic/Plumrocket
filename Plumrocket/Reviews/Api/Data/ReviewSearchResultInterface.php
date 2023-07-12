<?php
declare(strict_types=1);

namespace Plumrocket\Reviews\Api\Data;

interface ReviewSearchResultInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get list of Company entities
     *
     * @return ReviewInterface[]
     */
    public function getItems();

    /**
     * Set list of Company entities
     *
     * @param ReviewInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
