<?php

namespace Rich\CartCsv\Observer;

use Magento\Framework\Event\Observer;
use Magento\Catalog\Block\ShortcutButtons;
use Magento\Framework\Event\ObserverInterface;

class AddDownloadButton implements ObserverInterface
{
    /**
     * Block class
     */
    const CSV_DOWNLOAD_BLOCK = \Rich\CartCsv\Block\DownloadButton::class;

    /**
     * Add Csv download button
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        /** @var ShortcutButtons $shortcutButtons */
        $shortcutButtons = $observer->getEvent()->getContainer();

        $shortcut = $shortcutButtons->getLayout()->createBlock(self::CSV_DOWNLOAD_BLOCK);

        $shortcutButtons->addShortcut($shortcut);
    }
}
