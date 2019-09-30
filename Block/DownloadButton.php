<?php

namespace Rich\CartCsv\Block;

use Magento\Catalog\Block\ShortcutInterface;
use Magento\Framework\View\Element\Template;

class DownloadButton extends Template implements ShortcutInterface
{
    const ALIAS_ELEMENT_INDEX = 'alias';

    public function getAlias()
    {
        return $this->getData(self::ALIAS_ELEMENT_INDEX);
    }

}
