<?php

namespace App\Table\Generated;

enum OrganizationColumn : string implements \PSX\Sql\ColumnInterface
{
    case ID = \App\Table\Generated\OrganizationTable::COLUMN_ID;
    case USER_ID = \App\Table\Generated\OrganizationTable::COLUMN_USER_ID;
    case STATUS = \App\Table\Generated\OrganizationTable::COLUMN_STATUS;
    case DISPLAY_ID = \App\Table\Generated\OrganizationTable::COLUMN_DISPLAY_ID;
    case NAME = \App\Table\Generated\OrganizationTable::COLUMN_NAME;
    case LEGAL_NAME = \App\Table\Generated\OrganizationTable::COLUMN_LEGAL_NAME;
    case LEI_CODE = \App\Table\Generated\OrganizationTable::COLUMN_LEI_CODE;
    case UPDATE_DATE = \App\Table\Generated\OrganizationTable::COLUMN_UPDATE_DATE;
    case INSERT_DATE = \App\Table\Generated\OrganizationTable::COLUMN_INSERT_DATE;
}