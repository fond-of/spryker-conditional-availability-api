<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Validator;

use Generated\Shared\Transfer\ApiDataTransfer;

interface ConditionalAvailabilityApiValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return string[]
     */
    public function validate(ApiDataTransfer $apiDataTransfer): array;
}
