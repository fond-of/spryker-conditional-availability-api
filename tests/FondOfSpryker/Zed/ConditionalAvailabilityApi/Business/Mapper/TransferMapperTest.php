<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Mapper;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\ConditionalAvailabilityTransfer;

class TransferMapperTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Mapper\TransferMapper
     */
    protected $transferMapper;

    /**
     * @var array
     */
    protected $transferData;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->transferData = [
            [],
        ];

        $this->transferMapper = new TransferMapper();
    }

    /**
     * @return void
     */
    public function testToTransfer(): void
    {
        $this->assertInstanceOf(
            ConditionalAvailabilityTransfer::class,
            $this->transferMapper->toTransfer(
                $this->transferData
            )
        );
    }

    /**
     * @return void
     */
    public function testToTransferCollection(): void
    {
        $this->assertIsArray(
            $this->transferMapper->toTransferCollection(
                $this->transferData
            )
        );
    }
}
