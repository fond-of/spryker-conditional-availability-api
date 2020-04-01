<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Model\ConditionalAvailabilityApiInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\ConditionalAvailabilityApiDependencyProvider;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\Facade\ConditionalAvailabilityApiToConditionalAvailabilityFacadeInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryBuilderQueryContainerInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryContainerInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Persistence\ConditionalAvailabilityApiQueryContainer;
use Spryker\Zed\Kernel\Container;

class ConditionalAvailabilityApiBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\ConditionalAvailabilityApiBusinessFactory
     */
    protected $conditionalAvailabilityApiBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityApi\Persistence\ConditionalAvailabilityApiQueryContainer
     */
    protected $conditionalAvailabilityApiQueryContainerMock;

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
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityApiQueryContainerMock = $this->getMockBuilder(ConditionalAvailabilityApiQueryContainer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityApiToConditionalAvailabilityFacadeInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityApiToConditionalAvailabilityFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityApiToApiQueryContainerInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityApiToApiQueryContainerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityApiToApiQueryBuilderQueryContainerInterfaceMock = $this->getMockBuilder(ConditionalAvailabilityApiToApiQueryBuilderQueryContainerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityApiBusinessFactory = new ConditionalAvailabilityApiBusinessFactory();
        $this->conditionalAvailabilityApiBusinessFactory->setQueryContainer($this->conditionalAvailabilityApiQueryContainerMock);
        $this->conditionalAvailabilityApiBusinessFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateConditionalAvailabilityApi(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->withConsecutive(
                [ConditionalAvailabilityApiDependencyProvider::FACADE_CONDITIONAL_AVAILABILITY],
                [ConditionalAvailabilityApiDependencyProvider::QUERY_CONTAINER_API],
                [ConditionalAvailabilityApiDependencyProvider::QUERY_CONTAINER_API_QUERY_BUILDER]
            )->willReturnOnConsecutiveCalls(
                $this->conditionalAvailabilityApiToConditionalAvailabilityFacadeInterfaceMock,
                $this->conditionalAvailabilityApiToApiQueryContainerInterfaceMock,
                $this->conditionalAvailabilityApiToApiQueryBuilderQueryContainerInterfaceMock
            );

        $this->assertInstanceOf(
            ConditionalAvailabilityApiInterface::class,
            $this->conditionalAvailabilityApiBusinessFactory->createConditionalAvailabilityApi()
        );
    }
}
