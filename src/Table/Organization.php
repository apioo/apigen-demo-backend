<?php

namespace App\Table;

use App\Table\Generated\OrganizationRow;
use App\Table\Generated\OrganizationTable;
use PSX\Sql\Condition;

/**
 *
 */
class Organization extends OrganizationTable
{
    public const STATUS_ACTIVE = 1;

    public const STATUS_DELETED = 0;

    public function findByIdAndUser(string $id, int $userId) : ?OrganizationRow
    {
        $condition = Condition::withAnd();
        $condition->equals(Generated\OrganizationTable::COLUMN_USER_ID, $userId);
        $condition->equals(Generated\OrganizationTable::COLUMN_DISPLAY_ID, $id);
        $condition->equals(Generated\OrganizationTable::COLUMN_STATUS, self::STATUS_ACTIVE);

        return $this->findOneBy($condition);
    }
}
