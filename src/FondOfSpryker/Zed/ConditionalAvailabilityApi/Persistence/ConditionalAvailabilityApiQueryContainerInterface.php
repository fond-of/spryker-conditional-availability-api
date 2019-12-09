<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Persistence;

use Orm\Zed\ConditionalAvailability\Persistence\FosConditionalAvailabilityQuery;

interface ConditionalAvailabilityApiQueryContainerInterface
{
    /**
     * @return \Orm\Zed\ConditionalAvailability\Persistence\FosConditionalAvailabilityQuery
     */
    public function queryFind(): FosConditionalAvailabilityQuery;
}
