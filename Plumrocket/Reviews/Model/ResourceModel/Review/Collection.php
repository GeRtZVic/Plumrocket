<?php
declare(strict_types=1);

namespace Plumrocket\Reviews\Model\ResourceModel\Review;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Plumrocket\Reviews\Model\ResourceModel\ReviewResource;
use Plumrocket\Reviews\Model\Review;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            Review::class,
            ReviewResource::class
        );
    }
}
