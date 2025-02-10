<?php

namespace App\Table\Generated;

enum EventAttendeesColumn : string implements \PSX\Sql\ColumnInterface
{
    case ID = \App\Table\Generated\EventAttendeesTable::COLUMN_ID;
    case EVENT_ID = \App\Table\Generated\EventAttendeesTable::COLUMN_EVENT_ID;
    case PERSON_ID = \App\Table\Generated\EventAttendeesTable::COLUMN_PERSON_ID;
}