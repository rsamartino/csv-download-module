<?php

namespace Rich\CartCsv\Test\Unit\Observer;

use Rich\CartCsv\Block\DownloadButton;
use Rich\CartCsv\Observer\AddDownloadButton;
use Magento\Catalog\Block\ShortcutButtons;
use Magento\Framework\Event;
use Magento\Framework\Event\Observer;
use Magento\Framework\View\LayoutInterface;

class AddDownloadButtonTest extends \PHPUnit\Framework\TestCase
{
    public function testExecute()
    {
        $addDownloadButton = new AddDownloadButton();

        /** @var Observer|\PHPUnit_Framework_MockObject_MockObject $observerMock */
        $observerMock = $this->getMockBuilder(Observer::class)
            ->disableOriginalConstructor()
            ->getMock();

        /** @var Event|\PHPUnit_Framework_MockObject_MockObject $eventMock */
        $eventMock = $this->getMockBuilder(Event::class)
            ->setMethods(['getContainer'])
            ->disableOriginalConstructor()
            ->getMock();

        /** @var ShortcutButtons|\PHPUnit_Framework_MockObject_MockObject $shortcutButtonsMock */
        $shortcutButtonsMock = $this->getMockBuilder(ShortcutButtons::class)
            ->disableOriginalConstructor()
            ->getMock();

        $layoutMock = $this->getMockBuilder(LayoutInterface::class)
            ->getMockForAbstractClass();

        $blockMock = $this->getMockBuilder(DownloadButton::class)
            ->disableOriginalConstructor()
            ->getMock();

        $observerMock->expects(self::once())
            ->method('getEvent')
            ->willReturn($eventMock);

        $eventMock->expects(self::once())
            ->method('getContainer')
            ->willReturn($shortcutButtonsMock);

        $shortcutButtonsMock->expects(self::once())
            ->method('getLayout')
            ->willReturn($layoutMock);

        $layoutMock->expects(self::once())
            ->method('createBlock')
            ->with(AddDownloadButton::CSV_DOWNLOAD_BLOCK)
            ->willReturn($blockMock);

        $shortcutButtonsMock->expects(self::once())
            ->method('addShortcut')
            ->with($blockMock);

        $addDownloadButton->execute($observerMock);
    }
}
