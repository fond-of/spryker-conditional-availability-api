<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Business;

use FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Mapper\TransferMapper;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Model\ConditionalAvailabilityApi;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Model\ConditionalAvailabilityApiInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Validator\ConditionalAvailabilityApiValidator;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Validator\ConditionalAvailabilityApiValidatorInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\ConditionalAvailabilityApiDependencyProvider;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\Facade\ConditionalAvailabilityApiToConditionalAvailabilityFacadeInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryBuilderQueryContainerInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryContainerInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityApi\Persistence\ConditionalAvailabilityApiQueryContainerInterface getQueryContainer()
 * @method \FondOfSpryker\Zed\ConditionalAvailabilityApi\ConditionalAvailabilityApiConfig getConfig()
 */
class ConditionalAvailabilityApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Model\ConditionalAvailabilityApiInterface
     */
    public function createConditionalAvailabilityApi(): ConditionalAvailabilityApiInterface
    {
        return new ConditionalAvailabilityApi(
            $this->getConditionalAvailabilityFacade(),
            $this->getApiQueryContainer(),
            $this->getApiQueryBuilderQueryContainer(),
            $this->getQueryContainer(),
            $this->createApiDataTransferMapper()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\Facade\ConditionalAvailabilityApiToConditionalAvailabilityFacadeInterface
     */
    protected function getConditionalAvailabilityFacade(): ConditionalAvailabilityApiToConditionalAvailabilityFacadeInterface
    {
        return $this->getProvidedDependency(ConditionalAvailabilityApiDependencyProvider::FACADE_CONDITIONAL_AVAILABILITY);
    }

    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryContainerInterface
     */
    protected function getApiQueryContainer(): ConditionalAvailabilityApiToApiQueryContainerInterface
    {
        return $this->getProvidedDependency(ConditionalAvailabilityApiDependencyProvider::QUERY_CONTAINER_API);
    }

    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryBuilderQueryContainerInterface
     */
    protected function getApiQueryBuilderQueryContainer(): ConditionalAvailabilityApiToApiQueryBuilderQueryContainerInterface
    {
        return $this->getProvidedDependency(ConditionalAvailabilityApiDependencyProvider::QUERY_CONTAINER_API_QUERY_BUILDER);
    }

    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Validator\ConditionalAvailabilityApiValidatorInterface
     */
    public function createConditionalAvailabilityApiValidator(): ConditionalAvailabilityApiValidatorInterface
    {
        return new ConditionalAvailabilityApiValidator();
    }

    /**
     * @return \FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Mapper\TransferMapperInterface
     */
    protected function createApiDataTransferMapper(): TransferMapperInterface
    {
        return new TransferMapper();
    }
}
