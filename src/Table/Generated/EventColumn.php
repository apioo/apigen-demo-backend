<?php

namespace App\Table\Generated;

enum EventColumn : string implements \PSX\Sql\ColumnInterface
{
    case ID = \App\Table\Generated\EventTable::COLUMN_ID;
    case USER_ID = \App\Table\Generated\EventTable::COLUMN_USER_ID;
    case STATUS = \App\Table\Generated\EventTable::COLUMN_STATUS;
    case DISPLAY_ID = \App\Table\Generated\EventTable::COLUMN_DISPLAY_ID;
    case NAME = \App\Table\Generated\EventTable::COLUMN_NAME;
    case FUNDER_ID = \App\Table\Generated\EventTable::COLUMN_FUNDER_ID;
    case START_DATE = \App\Table\Generated\EventTable::COLUMN_START_DATE;
    case END_DATE = \App\Table\Generated\EventTable::COLUMN_END_DATE;
    case UPDATE_DATE = \App\Table\Generated\EventTable::COLUMN_UPDATE_DATE;
    case INSERT_DATE = \App\Table\Generated\EventTable::COLUMN_INSERT_DATE;
}