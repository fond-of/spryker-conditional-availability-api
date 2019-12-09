<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Persistence;

use Orm\Zed\ConditionalAvailability\Persistence\FosConditionalAvailabilityQuery;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityApi\Persistence\ConditionalAvailabilityApiPersistenceFactory getFactory()
 */
class ConditionalAvailabilityApiQueryContainer extends AbstractQueryContainer implements ConditionalAvailabilityApiQueryContainerInterface
{
    /**
     * @return \Orm\Zed\ConditionalAvailability\Persistence\FosConditionalAvailabilityQuery
     */
    public function queryFind(): FosConditionalAvailabilityQuery
    {
        return $this->getFactory()->getConditionalAvailabilityQuery();
    }
}
