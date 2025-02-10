<?php

declare(strict_types = 1);

namespace App\Model;

/**
 * @extends Collection<Organization>
 */
class OrganizationCollection extends Collection implements \JsonSerializable, \PSX\Record\RecordableInterface
{
}

