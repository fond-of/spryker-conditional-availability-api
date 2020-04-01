<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Communication\Plugin\Api;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\ConditionalAvailabilityApiFacade;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\ConditionalAvailabilityApiConfig;
use Generated\Shared\Transfer\ApiDataTransfer;

class ConditionalAvailabilityApiValidatorPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityApi\Communication\Plugin\Api\ConditionalAvailabilityApiValidatorPlugin
     */
    protected $conditionalAvailabilityApiValidatorPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiDataTransfer
     */
    protected $apiDataTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\ConditionalAvailabilityApiFacade
     */
    protected $conditionalAvailabilityApiFacadeMock;

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

        $this->conditionalAvailabilityApiValidatorPlugin = new ConditionalAvailabilityApiValidatorPlugin();
        $this->conditionalAvailabilityApiValidatorPlugin->setFacade($this->conditionalAvailabilityApiFacadeMock);
    }

    /**
     * @return void
     */
    public function testGetResourceName(): void
    {
        $this->assertSame(
            ConditionalAvailabilityApiConfig::RESOURCE_CONDITIONAL_AVAILABILITIES,
            $this->conditionalAvailabilityApiValidatorPlugin->getResourceName()
        );
    }

    /**
     * @return void
     */
    public function testValidate(): void
    {
        $this->conditionalAvailabilityApiFacadeMock->expects($this->atLeastOnce())
            ->method('validate')
            ->with($this->apiDataTransferMock)
            ->willReturn([]);

        $this->assertIsArray(
            $this->conditionalAvailabilityApiValidatorPlugin->validate(
                $this->apiDataTransferMock
            )
        );
    }
}
