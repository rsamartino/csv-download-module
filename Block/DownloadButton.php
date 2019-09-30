<?php

namespace Rich\CartCsv\Block;

use Magento\Catalog\Block\ShortcutInterface;
use Magento\Framework\View\Element\Template;
use Rich\CartCsv\Model\Config;

class DownloadButton extends Template implements ShortcutInterface
{
    const ALIAS_ELEMENT_INDEX = 'alias';

    /**
     * @var Config
     */
    private $config;

    public function __construct(
        Config $config,
        Template\Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);

        $this->config = $config;
    }


    public function getAlias()
    {
        return $this->getData(self::ALIAS_ELEMENT_INDEX);
    }

    /**
     * @inheritdoc
     */
    protected function _toHtml()
    {
        if ($this->isActive()) {
            return parent::_toHtml();
        }

        return '';
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->config->isDownloadButtonEnabled();
    }
}
