<?php
declare(strict_types=1);

namespace Plumrocket\Reviews\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ReviewResource extends AbstractDb
{
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('plumrocket_reviews', 'entity_id');
    }
}
