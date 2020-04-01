<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Validator;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\ApiDataTransfer;

class ConditionalAvailabilityApiValidatorTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Validator\ConditionalAvailabilityApiValidator
     */
    protected $conditionalAvailabilityApiValidator;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiDataTransfer
     */
    protected $apiDataTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->apiDataTransferMock = $this->getMockBuilder(ApiDataTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->conditionalAvailabilityApiValidator = new ConditionalAvailabilityApiValidator();
    }

    /**
     * @return void
     */
    public function testValidate(): void
    {
        $this->assertIsArray(
            $this->conditionalAvailabilityApiValidator->validate(
                $this->apiDataTransferMock
            )
        );
    }
}
