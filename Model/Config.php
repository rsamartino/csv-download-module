<?php

namespace Rich\CartCsv\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_DISPLAY_DOWNLOAD_BUTTON = 'checkout/sidebar/csvDownload';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Config constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return bool
     */
    public function isDownloadButtonEnabled()
    {
        return (bool) $this->scopeConfig->getValue(self::XML_PATH_DISPLAY_DOWNLOAD_BUTTON);
    }
}
