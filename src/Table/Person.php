<?php

namespace App\Table;

use App\Table\Generated\PersonRow;
use App\Table\Generated\PersonTable;
use PSX\Sql\Condition;

/**
 *
 */
class Person extends PersonTable
{
    public const STATUS_ACTIVE = 1;

    public const STATUS_DELETED = 0;

    public function findByIdAndUser(string $id, int $userId) : ?PersonRow
    {
        $condition = Condition::withAnd();
        $condition->equals(Generated\PersonTable::COLUMN_USER_ID, $userId);
        $condition->equals(Generated\PersonTable::COLUMN_DISPLAY_ID, $id);
        $condition->equals(Generated\PersonTable::COLUMN_STATUS, self::STATUS_ACTIVE);

        return $this->findOneBy($condition);
    }

    public function findAllAttendees(int $id) : array
    {
        $query = 'SELECT app_person.*
                    FROM app_event_attendees
              INNER JOIN app_person
                      ON app_event_attendees.person_id = app_person.id
                   WHERE app_event_attendees.event_id = :ref_id
                ORDER BY app_person.id DESC';
        $result = $this->connection->fetchAllAssociative($query, ['ref_id' => $id]);
        $rows = [];
        foreach ($result as $row) {
            $rows[] = $row;
        }

        return $rows;
    }
}
