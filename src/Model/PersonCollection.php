<?php

declare(strict_types = 1);

namespace App\Model;

/**
 * @extends Collection<Person>
 */
class PersonCollection extends Collection implements \JsonSerializable, \PSX\Record\RecordableInterface
{
}

