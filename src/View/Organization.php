<?php

namespace App\View;

use App\Table;
use Fusio\Impl\Authorization\UserContext;
use PSX\Nested\Builder;
use PSX\Nested\Reference;
use PSX\Sql\Condition;
use PSX\Sql\OrderBy;
use PSX\Sql\ViewAbstract;

/**
 *
 */
class Organization extends ViewAbstract
{
    public function getCollection(int $startIndex, int $count, ?string $search, UserContext $context) : mixed
    {
        if (empty($startIndex) || $startIndex < 0) {
           $startIndex = 0;
        }

        if (empty($count) || $count < 1 || $count > 1024) {
           $count = 16;
        }

        $sortBy = Table\Generated\OrganizationColumn::ID;
        $sortOrder = OrderBy::DESC;

        $condition = Condition::withAnd();
        $condition->equals(Table\Generated\OrganizationTable::COLUMN_STATUS, Table\Organization::STATUS_ACTIVE);

        if (!empty($search)) {
           $condition->like(Table\Generated\OrganizationTable::COLUMN_NAME, '%' . $search . '%');
        }

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

    public function getEntity(string $id, UserContext $context) : mixed
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
