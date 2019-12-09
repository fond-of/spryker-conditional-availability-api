<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\Facade;

use FondOfSpryker\Zed\ConditionalAvailability\Business\ConditionalAvailabilityFacadeInterface;
use Generated\Shared\Transfer\ConditionalAvailabilityResponseTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityTransfer;

class ConditionalAvailabilityApiToConditionalAvailabilityFacadeBridge implements ConditionalAvailabilityApiToConditionalAvailabilityFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailability\Business\ConditionalAvailabilityFacadeInterface
     */
    protected $conditionalAvailabilityFacade;

    /**
     * @param \FondOfSpryker\Zed\ConditionalAvailability\Business\ConditionalAvailabilityFacadeInterface $conditionalAvailabilityFacade
     */
    public function __construct(ConditionalAvailabilityFacadeInterface $conditionalAvailabilityFacade)
    {
        $this->conditionalAvailabilityFacade = $conditionalAvailabilityFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\ConditionalAvailabilityTransfer $conditionalAvailabilityTransfer
     *
     * @return \Generated\Shared\Transfer\ConditionalAvailabilityResponseTransfer
     */
    public function createConditionalAvailability(
        ConditionalAvailabilityTransfer $conditionalAvailabilityTransfer
    ): ConditionalAvailabilityResponseTransfer {
        return $this->conditionalAvailabilityFacade->createConditionalAvailability($conditionalAvailabilityTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ConditionalAvailabilityTransfer $conditionalAvailabilityTransfer
     *
     * @return \Generated\Shared\Transfer\ConditionalAvailabilityResponseTransfer
     */
    public function updateConditionalAvailability(
        ConditionalAvailabilityTransfer $conditionalAvailabilityTransfer
    ): ConditionalAvailabilityResponseTransfer {
        return $this->conditionalAvailabilityFacade->updateConditionalAvailability($conditionalAvailabilityTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ConditionalAvailabilityTransfer $conditionalAvailabilityTransfer
     *
     * @return \Generated\Shared\Transfer\ConditionalAvailabilityResponseTransfer
     */
    public function deleteConditionalAvailability(
        ConditionalAvailabilityTransfer $conditionalAvailabilityTransfer
    ): ConditionalAvailabilityResponseTransfer {
        return $this->conditionalAvailabilityFacade->deleteConditionalAvailability($conditionalAvailabilityTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ConditionalAvailabilityTransfer $conditionalAvailabilityTransfer
     *
     * @return \Generated\Shared\Transfer\ConditionalAvailabilityResponseTransfer
     */
    public function findConditionalAvailabilityById(
        ConditionalAvailabilityTransfer $conditionalAvailabilityTransfer
    ): ConditionalAvailabilityResponseTransfer {
        return $this->conditionalAvailabilityFacade->findConditionalAvailabilityById($conditionalAvailabilityTransfer);
    }
}
