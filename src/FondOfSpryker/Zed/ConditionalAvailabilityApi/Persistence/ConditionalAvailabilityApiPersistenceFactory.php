<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Persistence;

use FondOfSpryker\Zed\ConditionalAvailabilityApi\ConditionalAvailabilityApiDependencyProvider;
use Orm\Zed\ConditionalAvailability\Persistence\FosConditionalAvailabilityQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityApi\ConditionalAvailabilityApiConfig getConfig()
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityApi\Persistence\ConditionalAvailabilityApiQueryContainerInterface getQueryContainer()
 */
class ConditionalAvailabilityApiPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\ConditionalAvailability\Persistence\FosConditionalAvailabilityQuery
     */
    public function getConditionalAvailabilityQuery(): FosConditionalAvailabilityQuery
    {
        return $this->getProvidedDependency(ConditionalAvailabilityApiDependencyProvider::PROPEL_QUERY_CONDITIONAL_AVAILABILITY);
    }
}
