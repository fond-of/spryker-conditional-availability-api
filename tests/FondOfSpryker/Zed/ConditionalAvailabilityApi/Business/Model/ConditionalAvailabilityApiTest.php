<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\Facade\ConditionalAvailabilityApiToConditionalAvailabilityFacadeInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryBuilderQueryContainerInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryContainerInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Persistence\ConditionalAvailabilityApiQueryContainerInterface;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityResponseTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityTransfer;
use Spryker\Zed\Api\Business\Exception\EntityNotFoundException;
use Spryker\Zed\Api\Business\Exception\EntityNotSavedException;

class ConditionalAvailabilityApiTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Model\ConditionalAvailabilityApi
     */
    protected $conditionalAvailabilityApi;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\Facade\ConditionalAvailabilityApiToConditionalAvailabilityFacadeInterface
     */
    protected $conditionalAvailabilityApiToConditionalAvailabilityFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryContainerInterface
     */
    protected $conditionalAvailabilityApiToApiQueryContainerInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryBuilderQueryContainerInterface
     */
    protected $conditionalAvailabilityApiToApiQueryBuilderQueryContainerInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityApi\Persistence\ConditionalAvailabilityApiQueryContainerInterface
     */
    protected $conditionalAvailabilityApiQueryContainerInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Mapper\TransferMapperInterface
     */
    protected $transferMapperInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiDataTransfer
     */
    protected $apiDataTransferMock;

    /**
     * @var array
     */
    protected $apiData;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ConditionalAvailabilityTransfer
     */
    protected $conditionalAvailabilityTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ConditionalAvailabilityResponseTransfer
     */
    protected $conditionalAvailabilityResponseTransferMock;

    /**
     * @var int
     */
    protected $idConditionalAvailability;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiItemTransfer
     */
    protected $apiItemTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->conditionalAvailabilityApiToConditionalAvailabilityFacadeInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityApiToConditionalAvailabilityFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityApiToApiQueryContainerInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityApiToApiQueryContainerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityApiToApiQueryBuilderQueryContainerInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityApiToApiQueryBuilderQueryContainerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityApiQueryContainerInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityApiQueryContainerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->transferMapperInterfaceMock = $this->getMockBuilder(TransferMapperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiDataTransferMock = $this->getMockBuilder(ApiDataTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiData = [];

        $this->conditionalAvailabilityTransferMock = $this->getMockBuilder(ConditionalAvailabilityTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityResponseTransferMock = $this->getMockBuilder(ConditionalAvailabilityResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->idConditionalAvailability = 1;

        $this->apiItemTransferMock = $this->getMockBuilder(ApiItemTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityApi = new ConditionalAvailabilityApi(
            $this->conditionalAvailabilityApiToConditionalAvailabilityFacadeInterfaceMock,
            $this->conditionalAvailabilityApiToApiQueryContainerInterfaceMock,
            $this->conditionalAvailabilityApiToApiQueryBuilderQueryContainerInterfaceMock,
            $this->conditionalAvailabilityApiQueryContainerInterfaceMock,
            $this->transferMapperInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testAdd(): void
    {
        $this->apiDataTransferMock->expects($this->atLeastOnce())
            ->method('getData')
            ->willReturn($this->apiData);

        $this->transferMapperInterfaceMock->expects($this->atLeastOnce())
            ->method('toTransfer')
            ->with($this->apiData)
            ->willReturn($this->conditionalAvailabilityTransferMock);

        $this->conditionalAvailabilityTransferMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->willReturn([]);

        $this->conditionalAvailabilityApiToConditionalAvailabilityFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('createConditionalAvailability')
            ->willReturn($this->conditionalAvailabilityResponseTransferMock);

        $this->conditionalAvailabilityResponseTransferMock->expects($this->atLeastOnce())
            ->method('getConditionalAvailabilityTransfer')
            ->willReturn($this->conditionalAvailabilityTransferMock);

        $this->conditionalAvailabilityResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(true);

        $this->conditionalAvailabilityTransferMock->expects($this->atLeastOnce())
            ->method('getIdConditionalAvailability')
            ->willReturn($this->idConditionalAvailability);

        $this->conditionalAvailabilityApiToApiQueryContainerInterfaceMock->expects($this->atLeastOnce())
            ->method('createApiItem')
            ->with(
                $this->conditionalAvailabilityTransferMock,
                $this->idConditionalAvailability
            )->willReturn($this->apiItemTransferMock);

        $this->assertInstanceOf(
            ApiItemTransfer::class,
            $this->conditionalAvailabilityApi->add(
                $this->apiDataTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testAddEntityNotSaved(): void
    {
        $this->apiDataTransferMock->expects($this->atLeastOnce())
            ->method('getData')
            ->willReturn($this->apiData);

        $this->transferMapperInterfaceMock->expects($this->atLeastOnce())
            ->method('toTransfer')
            ->with($this->apiData)
            ->willReturn($this->conditionalAvailabilityTransferMock);

        $this->conditionalAvailabilityTransferMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->willReturn([]);

        $this->conditionalAvailabilityApiToConditionalAvailabilityFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('createConditionalAvailability')
            ->willReturn($this->conditionalAvailabilityResponseTransferMock);

        $this->conditionalAvailabilityResponseTransferMock->expects($this->atLeastOnce())
            ->method('getConditionalAvailabilityTransfer')
            ->willReturn($this->conditionalAvailabilityTransferMock);

        $this->conditionalAvailabilityResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(false);

        try {
            $this->conditionalAvailabilityApi->add($this->apiDataTransferMock);
        } catch (EntityNotSavedException $entityNotSavedException) {
            $this->assertInstanceOf(
                EntityNotSavedException::class,
                $entityNotSavedException
            );
        }
    }

    /**
     * @return void
     */
    public function testRemove(): void
    {
        $this->conditionalAvailabilityApiToConditionalAvailabilityFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('findConditionalAvailabilityById')
            ->willReturn($this->conditionalAvailabilityResponseTransferMock);

        $this->conditionalAvailabilityResponseTransferMock->expects($this->atLeastOnce())
            ->method('getConditionalAvailabilityTransfer')
            ->willReturn($this->conditionalAvailabilityTransferMock);

        $this->conditionalAvailabilityResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(true);

        $this->conditionalAvailabilityApiToConditionalAvailabilityFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('deleteConditionalAvailability')
            ->willReturn($this->conditionalAvailabilityResponseTransferMock);

        $this->conditionalAvailabilityApiToApiQueryContainerInterfaceMock->expects($this->atLeastOnce())
            ->method('createApiItem')
            ->willReturn($this->apiItemTransferMock);

        $this->assertInstanceOf(
            ApiItemTransfer::class,
            $this->conditionalAvailabilityApi->remove(
                $this->idConditionalAvailability
            )
        );
    }

    /**
     * @return void
     */
    public function testRemoveEntityNotFound(): void
    {
        $this->conditionalAvailabilityApiToConditionalAvailabilityFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('findConditionalAvailabilityById')
            ->willReturn($this->conditionalAvailabilityResponseTransferMock);

        $this->conditionalAvailabilityResponseTransferMock->expects($this->atLeastOnce())
            ->method('getConditionalAvailabilityTransfer')
            ->willReturn($this->conditionalAvailabilityTransferMock);

        $this->conditionalAvailabilityResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(false);

        try {
            $this->conditionalAvailabilityApi->remove($this->idConditionalAvailability);
        } catch (EntityNotFoundException $entityNotFoundException) {
            $this->assertInstanceOf(
                EntityNotFoundException::class,
                $entityNotFoundException
            );
        }
    }
}
