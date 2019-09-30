<?php

namespace Rich\CartCsv\Test\Unit\Block;


class DownloadButtonTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Rich\CartCsv\Block\DownloadButton
     */
    private $block;

    /**
     * @var \Rich\CartCsv\Model\Config | \PHPUnit_Framework_MockObject_MockObject
     */
    private $configMock;

    public function setUp()
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->block = $objectManager->getObject(\Rich\CartCsv\Block\DownloadButton::class);
        $this->configMock = $objectManager->getObject(\Rich\CartCsv\Model\Config::class);
    }

    protected function tearDown()
    {
        $this->block = null;
    }

    public function testGetAlias()
    {
        $this->assertEquals($this->block->getAlias(), $this->block->getData($this->block::ALIAS_ELEMENT_INDEX));
    }

    public function testIsActive()
    {
        $this->assertEquals($this->block->isActive(), $this->configMock->isDownloadButtonEnabled());
    }

}
