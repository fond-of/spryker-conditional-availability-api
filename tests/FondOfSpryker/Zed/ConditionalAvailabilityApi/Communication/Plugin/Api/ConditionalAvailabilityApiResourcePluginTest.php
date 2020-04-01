<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Communication\Plugin\Api;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\ConditionalAvailabilityApiFacade;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\ConditionalAvailabilityApiConfig;
use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;

class ConditionalAvailabilityApiResourcePluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityApi\Communication\Plugin\Api\ConditionalAvailabilityApiResourcePlugin
     */
    protected $conditionalAvailabilityApiResourcePlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiDataTransfer
     */
    protected $apiDataTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\ConditionalAvailabilityApiFacade
     */
    protected $conditionalAvailabilityApiFacadeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiItemTransfer
     */
    protected $apiItemTransferMock;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiRequestTransfer
     */
    protected $apiRequestTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiCollectionTransfer
     */
    protected $apiCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->conditionalAvailabilityApiFacadeMock = $this->getMockBuilder(ConditionalAvailabilityApiFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiDataTransferMock = $this->getMockBuilder(ApiDataTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiItemTransferMock = $this->getMockBuilder(ApiItemTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->id = 1;

        $this->apiRequestTransferMock = $this->getMockBuilder(ApiRequestTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiCollectionTransferMock = $this->getMockBuilder(ApiCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityApiResourcePlugin = new ConditionalAvailabilityApiResourcePlugin();
        $this->conditionalAvailabilityApiResourcePlugin->setFacade($this->conditionalAvailabilityApiFacadeMock);
    }

    /**
     * @return void
     */
    public function testGetResourceName(): void
    {
        $this->assertSame(
            ConditionalAvailabilityApiConfig::RESOURCE_CONDITIONAL_AVAILABILITIES,
            $this->conditionalAvailabilityApiResourcePlugin->getResourceName()
        );
    }

    /**
     * @return void
     */
    public function testAdd(): void
    {
        $this->conditionalAvailabilityApiFacadeMock->expects($this->atLeastOnce())
            ->method('addConditionalAvailability')
            ->with($this->apiDataTransferMock)
            ->willReturn($this->apiItemTransferMock);

        $this->assertInstanceOf(
            ApiItemTransfer::class,
            $this->conditionalAvailabilityApiResourcePlugin->add(
                $this->apiDataTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testGet(): void
    {
        $this->conditionalAvailabilityApiFacadeMock->expects($this->atLeastOnce())
            ->method('getConditionalAvailability')
            ->with($this->id)
            ->willReturn($this->apiItemTransferMock);

        $this->assertInstanceOf(
            ApiItemTransfer::class,
            $this->conditionalAvailabilityApiResourcePlugin->get(
                $this->id
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdate(): void
    {
        $this->conditionalAvailabilityApiFacadeMock->expects($this->atLeastOnce())
            ->method('updateConditionalAvailability')
            ->with($this->id, $this->apiDataTransferMock)
            ->willReturn($this->apiItemTransferMock);

        $this->assertInstanceOf(
            ApiItemTransfer::class,
            $this->conditionalAvailabilityApiResourcePlugin->update(
                $this->id,
                $this->apiDataTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testRemove(): void
    {
        $this->conditionalAvailabilityApiFacadeMock->expects($this->atLeastOnce())
            ->method('removeConditionalAvailability')
            ->with($this->id)
            ->willReturn($this->apiItemTransferMock);

        $this->assertInstanceOf(
            ApiItemTransfer::class,
            $this->conditionalAvailabilityApiResourcePlugin->remove(
                $this->id
            )
        );
    }

    /**
     * @return void
     */
    public function testFind(): void
    {
        $this->conditionalAvailabilityApiFacadeMock->expects($this->atLeastOnce())
            ->method('findConditionalAvailabilities')
            ->with($this->apiRequestTransferMock)
            ->willReturn($this->apiCollectionTransferMock);

        $this->assertInstanceOf(
            ApiCollectionTransfer::class,
            $this->conditionalAvailabilityApiResourcePlugin->find(
                $this->apiRequestTransferMock
            )
        );
    }
}
