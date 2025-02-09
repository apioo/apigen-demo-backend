<?php

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

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
}
