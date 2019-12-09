<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Communication\Plugin\Api;

use FondOfSpryker\Zed\ConditionalAvailabilityApi\ConditionalAvailabilityApiConfig;
use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;
use Spryker\Zed\Api\Dependency\Plugin\ApiResourcePluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityApi\Persistence\ConditionalAvailabilityApiQueryContainerInterface getQueryContainer()
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\ConditionalAvailabilityApiFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityApi\ConditionalAvailabilityApiConfig getConfig()
 */
class ConditionalAvailabilityApiResourcePlugin extends AbstractPlugin implements ApiResourcePluginInterface
{
    /**
     * @api
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return ConditionalAvailabilityApiConfig::RESOURCE_CONDITIONAL_AVAILABILITIES;
    }

    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function add(ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
        return $this->getFacade()->addConditionalAvailability($apiDataTransfer);
    }

    /**
     * @api
     *
     * @param string $id
     *
     * @throws
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function get($id): ApiItemTransfer
    {
        return $this->getFacade()->getConditionalAvailability($id);
    }

    /**
     * @api
     *
     * @param string $id
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function update($id, ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
        return $this->getFacade()->updateConditionalAvailability($id, $apiDataTransfer);
    }

    /**
     * @api
     *
     * @param string $id
     *
     * @throws
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function remove($id): ApiItemTransfer
    {
        return $this->getFacade()->removeConditionalAvailability($id);
    }

    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiRequestTransfer $apiRequestTransfer
     *
     * @throws
     *
     * @return \Generated\Shared\Transfer\ApiCollectionTransfer
     */
    public function find(ApiRequestTransfer $apiRequestTransfer): ApiCollectionTransfer
    {
        return $this->getFacade()->findConditionalAvailabilities($apiRequestTransfer);
    }
}
