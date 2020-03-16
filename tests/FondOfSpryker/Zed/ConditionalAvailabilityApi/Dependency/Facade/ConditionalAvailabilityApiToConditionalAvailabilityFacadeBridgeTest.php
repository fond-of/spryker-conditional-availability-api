<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\Facade;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConditionalAvailability\Business\ConditionalAvailabilityFacadeInterface;
use Generated\Shared\Transfer\ConditionalAvailabilityResponseTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityTransfer;

class ConditionalAvailabilityApiToConditionalAvailabilityFacadeBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\Facade\ConditionalAvailabilityApiToConditionalAvailabilityFacadeBridge
     */
    protected $conditionalAvailabilityApiToConditionalAvailabilityFacadeBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailability\Business\ConditionalAvailabilityFacadeInterface
     */
    protected $conditionalAvailabilityFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ConditionalAvailabilityResponseTransfer
     */
    protected $conditionalAvailabilityResponseTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ConditionalAvailabilityTransfer
     */
    protected $conditionalAvailabilityTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->conditionalAvailabilityFacadeInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityResponseTransferMock = $this->getMockBuilder(ConditionalAvailabilityResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityTransferMock = $this->getMockBuilder(ConditionalAvailabilityTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityApiToConditionalAvailabilityFacadeBridge = new ConditionalAvailabilityApiToConditionalAvailabilityFacadeBridge(
            $this->conditionalAvailabilityFacadeInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testCreateConditionalAvailability(): void
    {
        $this->conditionalAvailabilityFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('createConditionalAvailability')
            ->with($this->conditionalAvailabilityTransferMock)
            ->willReturn($this->conditionalAvailabilityResponseTransferMock);

        $this->assertInstanceOf(
            ConditionalAvailabilityResponseTransfer::class,
            $this->conditionalAvailabilityApiToConditionalAvailabilityFacadeBridge->createConditionalAvailability(
                $this->conditionalAvailabilityTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdateConditionalAvailability(): void
    {
        $this->conditionalAvailabilityFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('updateConditionalAvailability')
            ->with($this->conditionalAvailabilityTransferMock)
            ->willReturn($this->conditionalAvailabilityResponseTransferMock);

        $this->assertInstanceOf(
            ConditionalAvailabilityResponseTransfer::class,
            $this->conditionalAvailabilityApiToConditionalAvailabilityFacadeBridge->updateConditionalAvailability(
                $this->conditionalAvailabilityTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testDeleteConditionalAvailability(): void
    {
        $this->conditionalAvailabilityFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('deleteConditionalAvailability')
            ->with($this->conditionalAvailabilityTransferMock)
            ->willReturn($this->conditionalAvailabilityResponseTransferMock);

        $this->assertInstanceOf(
            ConditionalAvailabilityResponseTransfer::class,
            $this->conditionalAvailabilityApiToConditionalAvailabilityFacadeBridge->deleteConditionalAvailability(
                $this->conditionalAvailabilityTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindConditionalAvailability(): void
    {
        $this->conditionalAvailabilityFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('findConditionalAvailabilityById')
            ->with($this->conditionalAvailabilityTransferMock)
            ->willReturn($this->conditionalAvailabilityResponseTransferMock);

        $this->assertInstanceOf(
            ConditionalAvailabilityResponseTransfer::class,
            $this->conditionalAvailabilityApiToConditionalAvailabilityFacadeBridge->findConditionalAvailabilityById(
                $this->conditionalAvailabilityTransferMock
            )
        );
    }
}
