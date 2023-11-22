<?php
declare(strict_types=1);

namespace Plumrocket\Reviews\Controller\Reviews;

use Magento\Customer\Model\Session;
use Magento\Customer\Model\Url;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;

class index implements ActionInterface
{

    protected PageFactory $resultPageFactory;
    private ResultFactory $resultFactory;
    private Session $customerSession;

    /**
     * @param ResultFactory $resultFactory
     * @param PageFactory $resultPageFactory
     * @param Session $customerSession
     */
    public function __construct(
        ResultFactory $resultFactory,
        PageFactory $resultPageFactory,
        Session $customerSession
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->customerSession = $customerSession;
        $this->resultFactory = $resultFactory;
    }


    /**
     * @inheritDoc
     */
    public function execute()
    {
        if ($this->customerSession->authenticate()) {
            $resultPage = $this->resultPageFactory->create();
        } else {
            $resultPage = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultPage = $resultPage->setPath(Url::ROUTE_ACCOUNT_LOGIN);
        }

        return $resultPage;
    }
}
