<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Business;

use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;

interface ConditionalAvailabilityApiFacadeInterface
{
    /**
     * Specification:
     * - Add new conditional availability.
     * - Persist prices per added conditional availability.
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function addConditionalAvailability(ApiDataTransfer $apiDataTransfer): ApiItemTransfer;

    /**
     * Specification:
     * - Finds conditional availability by id.
     * - Throws ConditionalAvailabilityNotFoundException if not found.
     * - Update conditional availability data.
     * - Persist prices per updated conditional availability.
     *
     * @param int $id
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function updateConditionalAvailability(int $id, ApiDataTransfer $apiDataTransfer): ApiItemTransfer;

    /**
     * Specification:
     * - Validate api data.
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return array
     */
    public function validate(ApiDataTransfer $apiDataTransfer): array;

    /**
     * Specification:
     *  - Finds conditional availability by conditional availability ID.
     *  - Throws ConditionalAvailabilityNotFoundException if not found.
     *
     * @api
     *
     * @param int $id
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function getConditionalAvailability(int $id): ApiItemTransfer;

    /**
     * Specification:
     *  - Finds conditional availabilitys by filter transfer, including sort, conditions and pagination.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiRequestTransfer $apiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\ApiCollectionTransfer
     */
    public function findConditionalAvailabilities(ApiRequestTransfer $apiRequestTransfer): ApiCollectionTransfer;

    /**
     * Specification:
     *  - Finds conditional availability by conditional availability ID.
     *  - Throws ConditionalAvailabilityNotFoundException if not found.
     *  - Deletes conditional availability
     *
     * @api
     *
     * @param int $id
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function removeConditionalAvailability(int $id): ApiItemTransfer;
}
