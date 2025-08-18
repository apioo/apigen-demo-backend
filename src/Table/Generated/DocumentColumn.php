<?php

namespace App\Table\Generated;

enum DocumentColumn : string implements \PSX\Sql\ColumnInterface
{
    case ID = \App\Table\Generated\DocumentTable::COLUMN_ID;
    case USER_ID = \App\Table\Generated\DocumentTable::COLUMN_USER_ID;
    case STATUS = \App\Table\Generated\DocumentTable::COLUMN_STATUS;
    case DISPLAY_ID = \App\Table\Generated\DocumentTable::COLUMN_DISPLAY_ID;
    case TITLE = \App\Table\Generated\DocumentTable::COLUMN_TITLE;
    case AUTHOR_ID = \App\Table\Generated\DocumentTable::COLUMN_AUTHOR_ID;
    case CONTENT = \App\Table\Generated\DocumentTable::COLUMN_CONTENT;
    case UPDATE_DATE = \App\Table\Generated\DocumentTable::COLUMN_UPDATE_DATE;
    case INSERT_DATE = \App\Table\Generated\DocumentTable::COLUMN_INSERT_DATE;
}