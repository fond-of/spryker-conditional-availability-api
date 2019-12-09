<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi;

use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\Facade\ConditionalAvailabilityApiToConditionalAvailabilityFacadeBridge;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryBuilderQueryContainerBridge;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryContainerBridge;
use Orm\Zed\ConditionalAvailability\Persistence\FosConditionalAvailabilityQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ConditionalAvailabilityApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_CONDITIONAL_AVAILABILITY = 'FACADE_CONDITIONAL_AVAILABILITY';
    public const QUERY_CONTAINER_API = 'QUERY_CONTAINER_API';
    public const QUERY_CONTAINER_API_QUERY_BUILDER = 'QUERY_CONTAINER_API_QUERY_BUILDER';
    public const PROPEL_QUERY_CONDITIONAL_AVAILABILITY = 'PROPEL_QUERY_CONDITIONAL_AVAILABILITY';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addConditionalAvailabilityFacade($container);
        $container = $this->provideApiQueryContainer($container);
        $container = $this->provideApiQueryBuilderQueryContainer($container);

        return $container;
    }

    public function providePersistenceLayerDependencies(Container $container): Container
    {
        $container = parent::providePersistenceLayerDependencies($container);

        $container = $this->addConditionalAvailabilityPropelQuery($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addConditionalAvailabilityFacade(Container $container): Container
    {
        $container[static::FACADE_CONDITIONAL_AVAILABILITY] = function (Container $container) {
            return new ConditionalAvailabilityApiToConditionalAvailabilityFacadeBridge(
                $container->getLocator()->conditionalAvailability()->facade()
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function provideApiQueryContainer(Container $container): Container
    {
        $container[static::QUERY_CONTAINER_API] = function (Container $container) {
            return new ConditionalAvailabilityApiToApiQueryContainerBridge(
                $container->getLocator()->api()->queryContainer()
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function provideApiQueryBuilderQueryContainer(Container $container): Container
    {
        $container[static::QUERY_CONTAINER_API_QUERY_BUILDER] = function (Container $container) {
            return new ConditionalAvailabilityApiToApiQueryBuilderQueryContainerBridge(
                $container->getLocator()->apiQueryBuilder()->queryContainer()
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addConditionalAvailabilityPropelQuery(Container $container): Container
    {
        $container[static::PROPEL_QUERY_CONDITIONAL_AVAILABILITY] = function (Container $container) {
            return FosConditionalAvailabilityQuery::create();
        };

        return $container;
    }
}
