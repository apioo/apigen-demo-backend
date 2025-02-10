<?php

namespace App\Table\Generated;

class EventAttendeesRow implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    private ?int $id = null;
    private ?int $eventId = null;
    private ?int $personId = null;
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id ?? throw new \PSX\Sql\Exception\NoValueAvailable('No value for required column "id" was provided');
    }
    public function setEventId(int $eventId): void
    {
        $this->eventId = $eventId;
    }
    public function getEventId(): int
    {
        return $this->eventId ?? throw new \PSX\Sql\Exception\NoValueAvailable('No value for required column "event_id" was provided');
    }
    public function setPersonId(int $personId): void
    {
        $this->personId = $personId;
    }
    public function getPersonId(): int
    {
        return $this->personId ?? throw new \PSX\Sql\Exception\NoValueAvailable('No value for required column "person_id" was provided');
    }
    public function toRecord(): \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('id', $this->id);
        $record->put('event_id', $this->eventId);
        $record->put('person_id', $this->personId);
        return $record;
    }
    public function jsonSerialize(): object
    {
        return (object) $this->toRecord()->getAll();
    }
    public static function from(array|\ArrayAccess $data): self
    {
        $row = new self();
        $row->id = isset($data['id']) && is_int($data['id']) ? $data['id'] : null;
        $row->eventId = isset($data['event_id']) && is_int($data['event_id']) ? $data['event_id'] : null;
        $row->personId = isset($data['person_id']) && is_int($data['person_id']) ? $data['person_id'] : null;
        return $row;
    }
}