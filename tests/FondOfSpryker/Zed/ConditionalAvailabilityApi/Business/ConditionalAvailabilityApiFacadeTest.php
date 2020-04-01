<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Model\ConditionalAvailabilityApiInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Validator\ConditionalAvailabilityApiValidatorInterface;
use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;

class ConditionalAvailabilityApiFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\ConditionalAvailabilityApiFacade
     */
    protected $conditionalAvailabilityApiFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\ConditionalAvailabilityApiBusinessFactory
     */
    protected $conditionalAvailabilityApiBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiDataTransfer
     */
    protected $apiDataTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiItemTransfer
     */
    protected $apiItemTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Model\ConditionalAvailabilityApiInterface
     */
    protected $conditionalAvailabilityApiInterfaceMock;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Validator\ConditionalAvailabilityApiValidatorInterface
     */
    protected $conditionalAvailabilityApiValidatorInterfaceMock;

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
        $this->conditionalAvailabilityApiBusinessFactoryMock = $this->getMockBuilder(ConditionalAvailabilityApiBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiDataTransferMock = $this->getMockBuilder(ApiDataTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiItemTransferMock = $this->getMockBuilder(ApiItemTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityApiInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityApiInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->id = 1;

        $this->conditionalAvailabilityApiValidatorInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityApiValidatorInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiRequestTransferMock = $this->getMockBuilder(ApiRequestTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiCollectionTransferMock = $this->getMockBuilder(ApiCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityApiFacade = new ConditionalAvailabilityApiFacade();
        $this->conditionalAvailabilityApiFacade->setFactory($this->conditionalAvailabilityApiBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testAddConditionalAvailability(): void
    {
        $this->conditionalAvailabilityApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createConditionalAvailabilityApi')
            ->willReturn($this->conditionalAvailabilityApiInterfaceMock);

        $this->conditionalAvailabilityApiInterfaceMock->expects($this->atLeastOnce())
            ->method('add')
            ->with($this->apiDataTransferMock)
            ->willReturn($this->apiItemTransferMock);

        $this->assertInstanceOf(
            ApiItemTransfer::class,
            $this->conditionalAvailabilityApiFacade->addConditionalAvailability(
                $this->apiDataTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdateConditionalAvailability(): void
    {
        $this->conditionalAvailabilityApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createConditionalAvailabilityApi')
            ->willReturn($this->conditionalAvailabilityApiInterfaceMock);

        $this->conditionalAvailabilityApiInterfaceMock->expects($this->atLeastOnce())
            ->method('update')
            ->with($this->id, $this->apiDataTransferMock)
            ->willReturn($this->apiItemTransferMock);

        $this->assertInstanceOf(
            ApiItemTransfer::class,
            $this->conditionalAvailabilityApiFacade->updateConditionalAvailability(
                $this->id,
                $this->apiDataTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testValidate(): void
    {
        $this->conditionalAvailabilityApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createConditionalAvailabilityApiValidator')
            ->willReturn($this->conditionalAvailabilityApiValidatorInterfaceMock);

        $this->conditionalAvailabilityApiValidatorInterfaceMock->expects($this->atLeastOnce())
            ->method('validate')
            ->with($this->apiDataTransferMock)
            ->willReturn([]);

        $this->assertIsArray(
            $this->conditionalAvailabilityApiFacade->validate($this->apiDataTransferMock)
        );
    }

    /**
     * @return void
     */
    public function testGetConditionalAvailability(): void
    {
        $this->conditionalAvailabilityApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createConditionalAvailabilityApi')
            ->willReturn($this->conditionalAvailabilityApiInterfaceMock);

        $this->conditionalAvailabilityApiInterfaceMock->expects($this->atLeastOnce())
            ->method('get')
            ->with($this->id)
            ->willReturn($this->apiItemTransferMock);

        $this->assertInstanceOf(
            ApiItemTransfer::class,
            $this->conditionalAvailabilityApiFacade->getConditionalAvailability($this->id)
        );
    }

    /**
     * @return void
     */
    public function testFindConditionalAvailability(): void
    {
        $this->conditionalAvailabilityApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createConditionalAvailabilityApi')
            ->willReturn($this->conditionalAvailabilityApiInterfaceMock);

        $this->conditionalAvailabilityApiInterfaceMock->expects($this->atLeastOnce())
            ->method('find')
            ->with($this->apiRequestTransferMock)
            ->willReturn($this->apiCollectionTransferMock);

        $this->assertInstanceOf(
            ApiCollectionTransfer::class,
            $this->conditionalAvailabilityApiFacade->findConditionalAvailabilities(
                $this->apiRequestTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testRemoveConditionalAvailability(): void
    {
        $this->conditionalAvailabilityApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createConditionalAvailabilityApi')
            ->willReturn($this->conditionalAvailabilityApiInterfaceMock);

        $this->conditionalAvailabilityApiInterfaceMock->expects($this->atLeastOnce())
            ->method('remove')
            ->with($this->id)
            ->willReturn($this->apiItemTransferMock);

        $this->assertInstanceOf(
            ApiItemTransfer::class,
            $this->conditionalAvailabilityApiFacade->removeConditionalAvailability(
                $this->id
            )
        );
    }
}
