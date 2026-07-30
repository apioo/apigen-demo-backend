<?php

namespace App\View;

use App\Table;
use Fusio\Impl\Authorization\UserContext;
use Fusio\Impl\Backend\Filter\QueryFilter;
use PSX\Nested\Builder;
use PSX\Nested\Reference;
use PSX\Sql\OrderBy;
use PSX\Sql\ViewAbstract;

/**
 *
 */
class Organization extends ViewAbstract
{
    public function getCollection(QueryFilter $filter, UserContext $context): mixed
    {
        $startIndex = $filter->getStartIndex();
        $count = $filter->getCount();
        $sortBy = Table\Generated\OrganizationColumn::tryFrom($filter->getSortBy(Table\Generated\OrganizationTable::COLUMN_ID) ?? '');
        $sortOrder = $filter->getSortOrder(OrderBy::DESC);

        $condition = $filter->getCondition($this->getTable(Table\Organization::class), [QueryFilter::COLUMN_SEARCH => Table\Generated\OrganizationColumn::NAME]);
        $condition->equals(Table\Generated\OrganizationTable::COLUMN_STATUS, Table\Organization::STATUS_ACTIVE);

        $builder = new Builder($this->connection);

        $definition = [
           'totalResults' => $this->getTable(Table\Organization::class)->getCount($condition),
           'startIndex' => $startIndex,
           'itemsPerPage' => $count,
           'entry' => $builder->doCollection([$this->getTable(Table\Organization::class), 'findAll'], [$condition, $startIndex, $count, $sortBy, $sortOrder], [
                'id' => Table\Generated\OrganizationTable::COLUMN_DISPLAY_ID,
                'name' => Table\Generated\OrganizationTable::COLUMN_NAME,
                'legalName' => Table\Generated\OrganizationTable::COLUMN_LEGAL_NAME,
                'leiCode' => Table\Generated\OrganizationTable::COLUMN_LEI_CODE,
                'updateDate' => $builder->fieldDateTime(Table\Generated\OrganizationTable::COLUMN_UPDATE_DATE),
                'insertDate' => $builder->fieldDateTime(Table\Generated\OrganizationTable::COLUMN_INSERT_DATE),
           ]),
        ];

        return $builder->build($definition);
    }

    public function getEntity(string $id, UserContext $context): mixed
    {
        $builder = new Builder($this->connection);

        $definition = $builder->doEntity([$this->getTable(Table\Organization::class), 'findOneByDisplayId'], [$id], [
            'id' => Table\Generated\OrganizationTable::COLUMN_DISPLAY_ID,
            'name' => Table\Generated\OrganizationTable::COLUMN_NAME,
            'legalName' => Table\Generated\OrganizationTable::COLUMN_LEGAL_NAME,
            'leiCode' => Table\Generated\OrganizationTable::COLUMN_LEI_CODE,
            'updateDate' => $builder->fieldDateTime(Table\Generated\OrganizationTable::COLUMN_UPDATE_DATE),
            'insertDate' => $builder->fieldDateTime(Table\Generated\OrganizationTable::COLUMN_INSERT_DATE),
        ]);

        return $builder->build($definition);
    }
}
