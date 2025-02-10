<?php

declare(strict_types = 1);

namespace App\Model;

/**
 * @extends Collection<Event>
 */
class EventCollection extends Collection implements \JsonSerializable, \PSX\Record\RecordableInterface
{
}

