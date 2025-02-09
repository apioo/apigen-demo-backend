<?php

namespace App\Table;

use App\Table\Generated\EventRow;
use App\Table\Generated\EventTable;
use PSX\Sql\Condition;

/**
 *
 */
class Event extends EventTable
{
    public const STATUS_ACTIVE = 1;

    public const STATUS_DELETED = 0;

    public function findByIdAndUser(string $id, int $userId) : ?EventRow
    {
        $condition = Condition::withAnd();
        $condition->equals(Generated\EventTable::COLUMN_USER_ID, $userId);
        $condition->equals(Generated\EventTable::COLUMN_DISPLAY_ID, $id);
        $condition->equals(Generated\EventTable::COLUMN_STATUS, self::STATUS_ACTIVE);

        return $this->findOneBy($condition);
    }
}
