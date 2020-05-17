<?php

namespace FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Model;

use FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\Facade\ConditionalAvailabilityApiToConditionalAvailabilityFacadeInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryBuilderQueryContainerInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryContainerInterface;
use FondOfSpryker\Zed\ConditionalAvailabilityApi\Persistence\ConditionalAvailabilityApiQueryContainerInterface;
use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ApiPaginationTransfer;
use Generated\Shared\Transfer\ApiQueryBuilderQueryTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityApiTransfer;
use Generated\Shared\Transfer\ConditionalAvailabilityTransfer;
use Generated\Shared\Transfer\PropelQueryBuilderColumnSelectionTransfer;
use Generated\Shared\Transfer\PropelQueryBuilderColumnTransfer;
use Orm\Zed\ConditionalAvailability\Persistence\Map\FosConditionalAvailabilityTableMap;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;
use Spryker\Zed\Api\ApiConfig;
use Spryker\Zed\Api\Business\Exception\EntityNotFoundException;
use Spryker\Zed\Api\Business\Exception\EntityNotSavedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ConditionalAvailabilityApi implements ConditionalAvailabilityApiInterface
{
    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\Facade\ConditionalAvailabilityApiToConditionalAvailabilityFacadeInterface
     */
    protected $conditionalAvailabilityFacade;

    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryContainerInterface
     */
    protected $apiQueryContainer;

    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryBuilderQueryContainerInterface
     */
    protected $apiQueryBuilderQueryContainer;

    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityApi\Persistence\ConditionalAvailabilityApiQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @var \FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Mapper\TransferMapperInterface
     */
    protected $transferMapper;

    /**
     * @param \FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\Facade\ConditionalAvailabilityApiToConditionalAvailabilityFacadeInterface $conditionalAvailabilityFacade
     * @param \FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryContainerInterface $apiQueryContainer
     * @param \FondOfSpryker\Zed\ConditionalAvailabilityApi\Dependency\QueryContainer\ConditionalAvailabilityApiToApiQueryBuilderQueryContainerInterface $apiQueryBuilderQueryContainer
     * @param \FondOfSpryker\Zed\ConditionalAvailabilityApi\Persistence\ConditionalAvailabilityApiQueryContainerInterface $queryContainer
     * @param \FondOfSpryker\Zed\ConditionalAvailabilityApi\Business\Mapper\TransferMapperInterface $transferMapper
     */
    public function __construct(
        ConditionalAvailabilityApiToConditionalAvailabilityFacadeInterface $conditionalAvailabilityFacade,
        ConditionalAvailabilityApiToApiQueryContainerInterface $apiQueryContainer,
        ConditionalAvailabilityApiToApiQueryBuilderQueryContainerInterface $apiQueryBuilderQueryContainer,
        ConditionalAvailabilityApiQueryContainerInterface $queryContainer,
        TransferMapperInterface $transferMapper
    ) {
        $this->conditionalAvailabilityFacade = $conditionalAvailabilityFacade;
        $this->apiQueryContainer = $apiQueryContainer;
        $this->apiQueryBuilderQueryContainer = $apiQueryBuilderQueryContainer;
        $this->queryContainer = $queryContainer;
        $this->transferMapper = $transferMapper;
    }

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @throws \Spryker\Zed\Api\Business\Exception\EntityNotSavedException
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function add(ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
        $conditionalAvailabilityApiTransfer = $this->transferMapper->toTransfer((array)$apiDataTransfer->getData());

        $conditionalAvailabilityTransfer = (new ConditionalAvailabilityTransfer())
            ->fromArray($conditionalAvailabilityApiTransfer->toArray(), true);

        $conditionalAvailabilityResponseTransfer = $this->conditionalAvailabilityFacade
            ->createConditionalAvailability($conditionalAvailabilityTransfer);

        $conditionalAvailabilityTransfer = $conditionalAvailabilityResponseTransfer
            ->getConditionalAvailabilityTransfer();

        if ($conditionalAvailabilityTransfer === null || !$conditionalAvailabilityResponseTransfer->getIsSuccessful()) {
            throw new EntityNotSavedException(
                'Could not save conditional availability.',
                ApiConfig::HTTP_CODE_INTERNAL_ERROR
            );
        }

        return $this->apiQueryContainer->createApiItem(
            $conditionalAvailabilityTransfer,
            $conditionalAvailabilityTransfer->getIdConditionalAvailability()
        );
    }

    /**
     * @param int $id
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @throws \Spryker\Zed\Api\Business\Exception\EntityNotSavedException
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function update(int $id, ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
        $this->getByIdConditionalAvailability($id);

        $data = (array)$apiDataTransfer->getData();

        $conditionalAvailabilityTransfer = (new ConditionalAvailabilityTransfer())
            ->fromArray($data, true)
            ->setIdConditionalAvailability($id);

        $conditionalAvailabilityResponseTransfer = $this->conditionalAvailabilityFacade
            ->updateConditionalAvailability($conditionalAvailabilityTransfer);

        if (!$conditionalAvailabilityResponseTransfer->getIsSuccessful()) {
            throw new EntityNotSavedException(
                'Could not save conditional availability.',
                ApiConfig::HTTP_CODE_INTERNAL_ERROR
            );
        }

        return $this->apiQueryContainer->createApiItem(
            $conditionalAvailabilityTransfer,
            $conditionalAvailabilityTransfer->getIdConditionalAvailability()
        );
    }

    /**
     * @param \Generated\Shared\Transfer\ApiRequestTransfer $apiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\ApiCollectionTransfer
     */
    public function find(ApiRequestTransfer $apiRequestTransfer): ApiCollectionTransfer
    {
        $query = $this->buildQuery($apiRequestTransfer);
        $collection = $this->transferMapper->toTransferCollection($query->find()->toArray());

        foreach ($collection as $k => $conditionalAvailabilityApiTransfer) {
            $collection[$k] = $this->get($conditionalAvailabilityApiTransfer->getIdConditionalAvailability())
                ->getData();
        }

        $apiCollectionTransfer = $this->apiQueryContainer->createApiCollection($collection);
        $apiCollectionTransfer = $this->addPagination($query, $apiCollectionTransfer, $apiRequestTransfer);

        return $apiCollectionTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\ApiRequestTransfer $apiRequestTransfer
     *
     * @return \Propel\Runtime\ActiveQuery\ModelCriteria
     */
    protected function buildQuery(ApiRequestTransfer $apiRequestTransfer): ModelCriteria
    {
        $apiQueryBuilderQueryTransfer = $this->buildApiQueryBuilderQuery($apiRequestTransfer);
        $query = $this->queryContainer->queryFind();
        $query = $this->apiQueryBuilderQueryContainer->buildQueryFromRequest($query, $apiQueryBuilderQueryTransfer);

        return $query;
    }

    /**
     * @param \Generated\Shared\Transfer\ApiRequestTransfer $apiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\ApiQueryBuilderQueryTransfer
     */
    protected function buildApiQueryBuilderQuery(ApiRequestTransfer $apiRequestTransfer): ApiQueryBuilderQueryTransfer
    {
        return (new ApiQueryBuilderQueryTransfer())
            ->setApiRequest($apiRequestTransfer)
            ->setColumnSelection($this->buildColumnSelection());
    }

    /**
     * @return \Generated\Shared\Transfer\PropelQueryBuilderColumnSelectionTransfer
     */
    protected function buildColumnSelection(): PropelQueryBuilderColumnSelectionTransfer
    {
        $columnSelectionTransfer = new PropelQueryBuilderColumnSelectionTransfer();
        $tableColumns = FosConditionalAvailabilityTableMap::getFieldNames(TableMap::TYPE_FIELDNAME);

        foreach ($tableColumns as $columnAlias) {
            $columnTransfer = (new PropelQueryBuilderColumnTransfer())
                ->setName(FosConditionalAvailabilityTableMap::TABLE_NAME . '.' . $columnAlias)
                ->setAlias($columnAlias);

            $columnSelectionTransfer->addTableColumn($columnTransfer);
        }

        return $columnSelectionTransfer;
    }

    /**
     * @param \Propel\Runtime\ActiveQuery\ModelCriteria $query
     * @param \Generated\Shared\Transfer\ApiCollectionTransfer $apiCollectionTransfer
     * @param \Generated\Shared\Transfer\ApiRequestTransfer $apiRequestTransfer
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     *
     * @return \Generated\Shared\Transfer\ApiCollectionTransfer
     */
    protected function addPagination(
        ModelCriteria $query,
        ApiCollectionTransfer $apiCollectionTransfer,
        ApiRequestTransfer $apiRequestTransfer
    ): ApiCollectionTransfer {
        $query->setOffset(0)
            ->setLimit(-1);

        $total = $query->count();
        $page = $apiRequestTransfer->getFilter()->getLimit() ? ($apiRequestTransfer->getFilter()->getOffset() / $apiRequestTransfer->getFilter()->getLimit() + 1) : 1;
        $pageTotal = ($total && $apiRequestTransfer->getFilter()->getLimit()) ? (int)ceil($total / $apiRequestTransfer->getFilter()->getLimit()) : 1;

        if ($page > $pageTotal) {
            throw new NotFoundHttpException('Out of bounds.', null, ApiConfig::HTTP_CODE_NOT_FOUND);
        }

        $apiPaginationTransfer = (new ApiPaginationTransfer())
            ->setItemsPerPage($apiRequestTransfer->getFilter()->getLimit())
            ->setPage($page)
            ->setTotal($total)
            ->setPageTotal($pageTotal);

        $apiCollectionTransfer->setPagination($apiPaginationTransfer);

        return $apiCollectionTransfer;
    }

    /**
     * @param int $id
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function get(int $id): ApiItemTransfer
    {
        $conditionalAvailabilityTransfer = $this->getByIdConditionalAvailability($id);

        return $this->apiQueryContainer->createApiItem($conditionalAvailabilityTransfer, $id);
    }

    /**
     * @param int $idConditionalAvailability
     *
     * @throws \Spryker\Zed\Api\Business\Exception\EntityNotFoundException
     *
     * @return \Generated\Shared\Transfer\ConditionalAvailabilityTransfer
     */
    protected function getByIdConditionalAvailability(int $idConditionalAvailability): ConditionalAvailabilityTransfer
    {
        $conditionalAvailabilityTransfer = (new ConditionalAvailabilityTransfer())
            ->setIdConditionalAvailability($idConditionalAvailability);

        $conditionalAvailabilityResponseTransfer = $this->conditionalAvailabilityFacade
            ->findConditionalAvailabilityById($conditionalAvailabilityTransfer);

        $conditionalAvailabilityTransfer = $conditionalAvailabilityResponseTransfer
            ->getConditionalAvailabilityTransfer();

        if ($conditionalAvailabilityTransfer === null || !$conditionalAvailabilityResponseTransfer->getIsSuccessful()) {
            throw new EntityNotFoundException(
                'Could not found conditional availability.',
                ApiConfig::HTTP_CODE_NOT_FOUND
            );
        }

        return $conditionalAvailabilityTransfer;
    }

    /**
     * @param int $id
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function remove(int $id): ApiItemTransfer
    {
        $conditionalAvailabilityTransfer = $this->getByIdConditionalAvailability($id);

        $this->conditionalAvailabilityFacade
            ->deleteConditionalAvailability($conditionalAvailabilityTransfer);

        return $this->apiQueryContainer->createApiItem(new ConditionalAvailabilityApiTransfer(), $id);
    }
}
