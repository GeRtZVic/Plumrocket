<?php
declare(strict_types=1);

namespace Plumrocket\Reviews\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Reviews extends Template implements BlockInterface
{
    protected $_template = "widget/reviews.phtml";
    private array $viewModels;

    public function __construct(
        Template\Context $context,
        array $data = [],
        array $viewModels = []
    ) {
        parent::__construct($context, $data);
        $this->viewModels = $viewModels;
    }

    public function toHtml()
    {
        foreach ($this->viewModels as $name => $viewModel){
            $this->setData($name,$viewModel);
        }

        return parent::toHtml();
    }
}
