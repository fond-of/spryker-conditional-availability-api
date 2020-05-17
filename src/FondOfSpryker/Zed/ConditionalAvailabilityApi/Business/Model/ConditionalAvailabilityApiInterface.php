<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Model;

use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;

interface ConditionalAvailabilityApiInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function add(ApiDataTransfer $apiDataTransfer): ApiItemTransfer;

    /**
     * @param int $id
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function update(int $id, ApiDataTransfer $apiDataTransfer): ApiItemTransfer;

    /**
     * @param \Generated\Shared\Transfer\ApiRequestTransfer $apiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\ApiCollectionTransfer
     */
    public function find(ApiRequestTransfer $apiRequestTransfer): ApiCollectionTransfer;

    /**
     * @param int $id
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function get(int $id): ApiItemTransfer;

    /**
     * @param int $id
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function remove(int $id): ApiItemTransfer;
}
