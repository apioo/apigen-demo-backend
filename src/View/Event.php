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
class Event extends ViewAbstract
{
    public function getCollection(int $startIndex, int $count, ?string $search, UserContext $context) : mixed
    {
        if (empty($startIndex) || $startIndex < 0) {
           $startIndex = 0;
        }

        if (empty($count) || $count < 1 || $count > 1024) {
           $count = 16;
        }

        $sortBy = Table\Generated\EventColumn::ID;
        $sortOrder = OrderBy::DESC;

        $condition = Condition::withAnd();
        $condition->equals(Table\Generated\EventTable::COLUMN_STATUS, Table\Event::STATUS_ACTIVE);

        if (!empty($search)) {
           $condition->like(Table\Generated\EventTable::COLUMN_NAME, '%' . $search . '%');
        }

        $builder = new Builder($this->connection);

        $definition = [
           'totalResults' => $this->getTable(Table\Event::class)->getCount($condition),
           'startIndex' => $startIndex,
           'itemsPerPage' => $count,
           'entry' => $builder->doCollection([$this->getTable(Table\Event::class), 'findAll'], [$condition, $startIndex, $count, $sortBy, $sortOrder], [
                'id' => Table\Generated\EventTable::COLUMN_DISPLAY_ID,
                'name' => Table\Generated\EventTable::COLUMN_NAME,
                'attendees' => $builder->doCollection([$this->getTable(Table\Person::class), 'findAllAttendees'], [new Reference('id')], [
                    'id' => Table\Generated\PersonTable::COLUMN_DISPLAY_ID,
                    'name' => Table\Generated\PersonTable::COLUMN_NAME,
                    'familyName' => Table\Generated\PersonTable::COLUMN_FAMILY_NAME,
                    'givenName' => Table\Generated\PersonTable::COLUMN_GIVEN_NAME,
                    'email' => Table\Generated\PersonTable::COLUMN_EMAIL,
                    'birthDate' => Table\Generated\PersonTable::COLUMN_BIRTH_DATE,
                    'updateDate' => $builder->fieldDateTime(Table\Generated\PersonTable::COLUMN_UPDATE_DATE),
                    'insertDate' => $builder->fieldDateTime(Table\Generated\PersonTable::COLUMN_INSERT_DATE),
                ]),
                'funder' => $builder->doEntity([$this->getTable(Table\Organization::class), 'find'], [new Reference(Table\Generated\EventTable::COLUMN_FUNDER_ID)], [
                    'id' => Table\Generated\OrganizationTable::COLUMN_DISPLAY_ID,
                    'name' => Table\Generated\OrganizationTable::COLUMN_NAME,
                    'legalName' => Table\Generated\OrganizationTable::COLUMN_LEGAL_NAME,
                    'leiCode' => Table\Generated\OrganizationTable::COLUMN_LEI_CODE,
                    'updateDate' => $builder->fieldDateTime(Table\Generated\OrganizationTable::COLUMN_UPDATE_DATE),
                    'insertDate' => $builder->fieldDateTime(Table\Generated\OrganizationTable::COLUMN_INSERT_DATE),
                ]),
                'startDate' => $builder->fieldDateTime(Table\Generated\EventTable::COLUMN_START_DATE),
                'endDate' => $builder->fieldDateTime(Table\Generated\EventTable::COLUMN_END_DATE),
                'updateDate' => $builder->fieldDateTime(Table\Generated\EventTable::COLUMN_UPDATE_DATE),
                'insertDate' => $builder->fieldDateTime(Table\Generated\EventTable::COLUMN_INSERT_DATE),
           ]),
        ];

        return $builder->build($definition);
    }

    public function getEntity(string $id, UserContext $context) : mixed
    {
        $builder = new Builder($this->connection);

        $definition = $builder->doEntity([$this->getTable(Table\Event::class), 'findOneByDisplayId'], [$id], [
            'id' => Table\Generated\EventTable::COLUMN_DISPLAY_ID,
            'name' => Table\Generated\EventTable::COLUMN_NAME,
            'attendees' => $builder->doCollection([$this->getTable(Table\Person::class), 'findAllAttendees'], [new Reference('id')], [
                'id' => Table\Generated\PersonTable::COLUMN_DISPLAY_ID,
                'name' => Table\Generated\PersonTable::COLUMN_NAME,
                'familyName' => Table\Generated\PersonTable::COLUMN_FAMILY_NAME,
                'givenName' => Table\Generated\PersonTable::COLUMN_GIVEN_NAME,
                'email' => Table\Generated\PersonTable::COLUMN_EMAIL,
                'birthDate' => Table\Generated\PersonTable::COLUMN_BIRTH_DATE,
                'memberOf' => $builder->doEntity([$this->getTable(Table\Organization::class), 'find'], [new Reference(Table\Generated\PersonTable::COLUMN_MEMBER_OF_ID)], [
                    'id' => Table\Generated\OrganizationTable::COLUMN_DISPLAY_ID,
                    'name' => Table\Generated\OrganizationTable::COLUMN_NAME,
                    'legalName' => Table\Generated\OrganizationTable::COLUMN_LEGAL_NAME,
                    'leiCode' => Table\Generated\OrganizationTable::COLUMN_LEI_CODE,
                    'updateDate' => $builder->fieldDateTime(Table\Generated\OrganizationTable::COLUMN_UPDATE_DATE),
                    'insertDate' => $builder->fieldDateTime(Table\Generated\OrganizationTable::COLUMN_INSERT_DATE),
                ]),
                'updateDate' => $builder->fieldDateTime(Table\Generated\PersonTable::COLUMN_UPDATE_DATE),
                'insertDate' => $builder->fieldDateTime(Table\Generated\PersonTable::COLUMN_INSERT_DATE),
            ]),
            'funder' => $builder->doEntity([$this->getTable(Table\Organization::class), 'find'], [new Reference(Table\Generated\EventTable::COLUMN_FUNDER_ID)], [
                'id' => Table\Generated\OrganizationTable::COLUMN_DISPLAY_ID,
                'name' => Table\Generated\OrganizationTable::COLUMN_NAME,
                'legalName' => Table\Generated\OrganizationTable::COLUMN_LEGAL_NAME,
                'leiCode' => Table\Generated\OrganizationTable::COLUMN_LEI_CODE,
                'updateDate' => $builder->fieldDateTime(Table\Generated\OrganizationTable::COLUMN_UPDATE_DATE),
                'insertDate' => $builder->fieldDateTime(Table\Generated\OrganizationTable::COLUMN_INSERT_DATE),
            ]),
            'startDate' => $builder->fieldDateTime(Table\Generated\EventTable::COLUMN_START_DATE),
            'endDate' => $builder->fieldDateTime(Table\Generated\EventTable::COLUMN_END_DATE),
            'updateDate' => $builder->fieldDateTime(Table\Generated\EventTable::COLUMN_UPDATE_DATE),
            'insertDate' => $builder->fieldDateTime(Table\Generated\EventTable::COLUMN_INSERT_DATE),
        ]);

        return $builder->build($definition);
    }
}
