<?php

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Ramsey\Uuid\Uuid;

/**
 *
 */
class Version20250209230743 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $personTable = $schema->createTable('app_person');
        $personTable->addColumn('id', 'integer', ['autoincrement' => true]);
        $personTable->addColumn('user_id', 'integer');
        $personTable->addColumn('status', 'integer');
        $personTable->addColumn('display_id', 'string', ['length' => 36]);
        $personTable->addColumn('name', 'string', array (
          'notnull' => false,
        ));
        $personTable->addColumn('family_name', 'string', array (
          'notnull' => false,
        ));
        $personTable->addColumn('given_name', 'string', array (
          'notnull' => false,
        ));
        $personTable->addColumn('email', 'string', array (
          'notnull' => false,
        ));
        $personTable->addColumn('birth_date', 'date');
        $personTable->addColumn('member_of_id', 'integer');
        $personTable->addColumn('update_date', 'datetime');
        $personTable->addColumn('insert_date', 'datetime');
        $personTable->setPrimaryKey(['id']);
        $personTable->addUniqueIndex(['display_id']);
        $personTable->addIndex(array (
          0 => 'member_of_id',
        ));

        $organizationTable = $schema->createTable('app_organization');
        $organizationTable->addColumn('id', 'integer', ['autoincrement' => true]);
        $organizationTable->addColumn('user_id', 'integer');
        $organizationTable->addColumn('status', 'integer');
        $organizationTable->addColumn('display_id', 'string', ['length' => 36]);
        $organizationTable->addColumn('name', 'string', array (
          'notnull' => false,
        ));
        $organizationTable->addColumn('legal_name', 'string', array (
          'notnull' => false,
        ));
        $organizationTable->addColumn('lei_code', 'string', array (
          'notnull' => false,
        ));
        $organizationTable->addColumn('update_date', 'datetime');
        $organizationTable->addColumn('insert_date', 'datetime');
        $organizationTable->setPrimaryKey(['id']);
        $organizationTable->addUniqueIndex(['display_id']);

        $eventTable = $schema->createTable('app_event');
        $eventTable->addColumn('id', 'integer', ['autoincrement' => true]);
        $eventTable->addColumn('user_id', 'integer');
        $eventTable->addColumn('status', 'integer');
        $eventTable->addColumn('display_id', 'string', ['length' => 36]);
        $eventTable->addColumn('name', 'string', array (
          'notnull' => false,
        ));
        $eventTable->addColumn('funder_id', 'integer');
        $eventTable->addColumn('start_date', 'datetime');
        $eventTable->addColumn('end_date', 'datetime');
        $eventTable->addColumn('update_date', 'datetime');
        $eventTable->addColumn('insert_date', 'datetime');
        $eventTable->setPrimaryKey(['id']);
        $eventTable->addUniqueIndex(['display_id']);
        $eventTable->addIndex(array (
          0 => 'funder_id',
        ));

        $eventAttendeesTable = $schema->createTable('app_event_attendees');
        $eventAttendeesTable->addColumn('id', 'integer', ['autoincrement' => true]);
        $eventAttendeesTable->addColumn('event_id', 'integer');
        $eventAttendeesTable->addColumn('person_id', 'integer');
        $eventAttendeesTable->setPrimaryKey(['id']);
        $eventAttendeesTable->addIndex(array (
          0 => 'event_id',
          1 => 'person_id',
        ));

        $eventAttendeesTable->addForeignKeyConstraint($schema->getTable('app_event'), ['event_id'], ['id']);
        $eventAttendeesTable->addForeignKeyConstraint($schema->getTable('app_person'), ['person_id'], ['id']);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('app_person');
        $schema->dropTable('app_organization');
        $schema->dropTable('app_event');
        $schema->dropTable('app_event_attendees');
    }

    /**
     * Manually added to insert some demo data
     */
    public function postUp(Schema $schema): void
    {
        $rows = [
            ['user_id' => 2, 'status' => 1, 'display_id' => Uuid::uuid4()->toString(), 'name' => 'Google', 'legal_name' => 'GOOGLE LLC', 'lei_code' => '7ZW8QJWVPR4P1J1KQY45', 'update_date' => date('Y-m-d H:i:s'), 'insert_date' => date('Y-m-d H:i:s')],
            ['user_id' => 2, 'status' => 1, 'display_id' => Uuid::uuid4()->toString(), 'name' => 'Microsoft', 'legal_name' => 'MICROSOFT CORPORATION', 'lei_code' => 'INR2EJN1ERAN0W5ZP974', 'update_date' => date('Y-m-d H:i:s'), 'insert_date' => date('Y-m-d H:i:s')],
            ['user_id' => 2, 'status' => 1, 'display_id' => Uuid::uuid4()->toString(), 'name' => 'Apple', 'legal_name' => 'Apple Inc.', 'lei_code' => 'HWUPKR0MPOU8FGXBT394', 'update_date' => date('Y-m-d H:i:s'), 'insert_date' => date('Y-m-d H:i:s')],
        ];
        foreach ($rows as $row) {
            $this->connection->insert('app_organization', $row);
        }

        $rows = [
            ['user_id' => 2, 'status' => 1, 'display_id' => Uuid::uuid4()->toString(), 'name' => 'Eric Schmidt', 'family_name' => 'Schmidt', 'given_name' => 'Eric', 'email' => '', 'birth_date' => '1955-04-27', 'member_of_id' => 1, 'update_date' => date('Y-m-d H:i:s'), 'insert_date' => date('Y-m-d H:i:s')],
            ['user_id' => 2, 'status' => 1, 'display_id' => Uuid::uuid4()->toString(), 'name' => 'Sergey Brin', 'family_name' => 'Brin', 'given_name' => 'Sergey', 'email' => '', 'birth_date' => '1973-08-21', 'member_of_id' => 1, 'update_date' => date('Y-m-d H:i:s'), 'insert_date' => date('Y-m-d H:i:s')],
            ['user_id' => 2, 'status' => 1, 'display_id' => Uuid::uuid4()->toString(), 'name' => 'Larry Page', 'family_name' => 'Page', 'given_name' => 'Larry', 'email' => '', 'birth_date' => '1973-03-26', 'member_of_id' => 1, 'update_date' => date('Y-m-d H:i:s'), 'insert_date' => date('Y-m-d H:i:s')],
            ['user_id' => 2, 'status' => 1, 'display_id' => Uuid::uuid4()->toString(), 'name' => 'Bill Gates', 'family_name' => 'Gates', 'given_name' => 'Bill', 'email' => '', 'birth_date' => '1955-10-28', 'member_of_id' => 2, 'update_date' => date('Y-m-d H:i:s'), 'insert_date' => date('Y-m-d H:i:s')],
            ['user_id' => 2, 'status' => 1, 'display_id' => Uuid::uuid4()->toString(), 'name' => 'Paul Allen', 'family_name' => 'Allen', 'given_name' => 'Paul', 'email' => '', 'birth_date' => '1953-01-21', 'member_of_id' => 2, 'update_date' => date('Y-m-d H:i:s'), 'insert_date' => date('Y-m-d H:i:s')],
            ['user_id' => 2, 'status' => 1, 'display_id' => Uuid::uuid4()->toString(), 'name' => 'Steve Wozniak', 'family_name' => 'Wozniak', 'given_name' => 'Steve', 'email' => '', 'birth_date' => '1950-08-11', 'member_of_id' => 3, 'update_date' => date('Y-m-d H:i:s'), 'insert_date' => date('Y-m-d H:i:s')],
            ['user_id' => 2, 'status' => 1, 'display_id' => Uuid::uuid4()->toString(), 'name' => 'Steve Jobs', 'family_name' => 'Jobs', 'given_name' => 'Steve', 'email' => '', 'birth_date' => '1955-02-24', 'member_of_id' => 3, 'update_date' => date('Y-m-d H:i:s'), 'insert_date' => date('Y-m-d H:i:s')],
        ];
        foreach ($rows as $row) {
            $this->connection->insert('app_person', $row);
        }

        $rows = [
            ['user_id' => 2, 'status' => 1, 'display_id' => Uuid::uuid4()->toString(), 'name' => 'Google I/O', 'funder_id' => 1, 'start_date' => date('Y-m-d H:i:s', strtotime('today')), 'end_date' => date('Y-m-d H:i:s', strtotime('tomorrow')), 'update_date' => date('Y-m-d H:i:s'), 'insert_date' => date('Y-m-d H:i:s')],
        ];
        foreach ($rows as $row) {
            $this->connection->insert('app_event', $row);
        }

        $rows = [
            ['event_id' => 1, 'person_id' => 1],
            ['event_id' => 1, 'person_id' => 2],
            ['event_id' => 1, 'person_id' => 3],
            ['event_id' => 1, 'person_id' => 4],
            ['event_id' => 1, 'person_id' => 5],
            ['event_id' => 1, 'person_id' => 6],
            ['event_id' => 1, 'person_id' => 7],
        ];
        foreach ($rows as $row) {
            $this->connection->insert('app_event_attendees', $row);
        }
    }
}
