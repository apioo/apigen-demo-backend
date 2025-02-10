<?php

namespace App\Table\Generated;

enum PersonColumn : string implements \PSX\Sql\ColumnInterface
{
    case ID = \App\Table\Generated\PersonTable::COLUMN_ID;
    case USER_ID = \App\Table\Generated\PersonTable::COLUMN_USER_ID;
    case STATUS = \App\Table\Generated\PersonTable::COLUMN_STATUS;
    case DISPLAY_ID = \App\Table\Generated\PersonTable::COLUMN_DISPLAY_ID;
    case NAME = \App\Table\Generated\PersonTable::COLUMN_NAME;
    case FAMILY_NAME = \App\Table\Generated\PersonTable::COLUMN_FAMILY_NAME;
    case GIVEN_NAME = \App\Table\Generated\PersonTable::COLUMN_GIVEN_NAME;
    case EMAIL = \App\Table\Generated\PersonTable::COLUMN_EMAIL;
    case BIRTH_DATE = \App\Table\Generated\PersonTable::COLUMN_BIRTH_DATE;
    case MEMBER_OF_ID = \App\Table\Generated\PersonTable::COLUMN_MEMBER_OF_ID;
    case UPDATE_DATE = \App\Table\Generated\PersonTable::COLUMN_UPDATE_DATE;
    case INSERT_DATE = \App\Table\Generated\PersonTable::COLUMN_INSERT_DATE;
}