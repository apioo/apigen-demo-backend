<?php

declare(strict_types = 1);

namespace App\Model;

use PSX\Schema\Attribute\Description;

#[Description('')]
class Event implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $id = null;
    #[Description('')]
    protected ?string $name = null;
    /**
     * @var array<Person>|null
     */
    #[Description('')]
    protected ?array $attendees = null;
    #[Description('')]
    protected ?Organization $funder = null;
    #[Description('')]
    protected ?\PSX\DateTime\LocalDateTime $startDate = null;
    #[Description('')]
    protected ?\PSX\DateTime\LocalDateTime $endDate = null;
    protected ?\PSX\DateTime\LocalDateTime $updateDate = null;
    protected ?\PSX\DateTime\LocalDateTime $insertDate = null;
    public function setId(?string $id): void
    {
        $this->id = $id;
    }
    public function getId(): ?string
    {
        return $this->id;
    }
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * @param array<Person>|null $attendees
     */
    public function setAttendees(?array $attendees): void
    {
        $this->attendees = $attendees;
    }
    /**
     * @return array<Person>|null
     */
    public function getAttendees(): ?array
    {
        return $this->attendees;
    }
    public function setFunder(?Organization $funder): void
    {
        $this->funder = $funder;
    }
    public function getFunder(): ?Organization
    {
        return $this->funder;
    }
    public function setStartDate(?\PSX\DateTime\LocalDateTime $startDate): void
    {
        $this->startDate = $startDate;
    }
    public function getStartDate(): ?\PSX\DateTime\LocalDateTime
    {
        return $this->startDate;
    }
    public function setEndDate(?\PSX\DateTime\LocalDateTime $endDate): void
    {
        $this->endDate = $endDate;
    }
    public function getEndDate(): ?\PSX\DateTime\LocalDateTime
    {
        return $this->endDate;
    }
    public function setUpdateDate(?\PSX\DateTime\LocalDateTime $updateDate): void
    {
        $this->updateDate = $updateDate;
    }
    public function getUpdateDate(): ?\PSX\DateTime\LocalDateTime
    {
        return $this->updateDate;
    }
    public function setInsertDate(?\PSX\DateTime\LocalDateTime $insertDate): void
    {
        $this->insertDate = $insertDate;
    }
    public function getInsertDate(): ?\PSX\DateTime\LocalDateTime
    {
        return $this->insertDate;
    }
    public function toRecord(): \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('id', $this->id);
        $record->put('name', $this->name);
        $record->put('attendees', $this->attendees);
        $record->put('funder', $this->funder);
        $record->put('startDate', $this->startDate);
        $record->put('endDate', $this->endDate);
        $record->put('updateDate', $this->updateDate);
        $record->put('insertDate', $this->insertDate);
        return $record;
    }
    public function jsonSerialize(): object
    {
        return (object) $this->toRecord()->getAll();
    }
}

