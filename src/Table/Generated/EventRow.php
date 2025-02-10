<?php

namespace App\Table\Generated;

class EventRow implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    private ?int $id = null;
    private ?int $userId = null;
    private ?int $status = null;
    private ?string $displayId = null;
    private ?string $name = null;
    private ?int $funderId = null;
    private ?\PSX\DateTime\LocalDateTime $startDate = null;
    private ?\PSX\DateTime\LocalDateTime $endDate = null;
    private ?\PSX\DateTime\LocalDateTime $updateDate = null;
    private ?\PSX\DateTime\LocalDateTime $insertDate = null;
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id ?? throw new \PSX\Sql\Exception\NoValueAvailable('No value for required column "id" was provided');
    }
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }
    public function getUserId(): int
    {
        return $this->userId ?? throw new \PSX\Sql\Exception\NoValueAvailable('No value for required column "user_id" was provided');
    }
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }
    public function getStatus(): int
    {
        return $this->status ?? throw new \PSX\Sql\Exception\NoValueAvailable('No value for required column "status" was provided');
    }
    public function setDisplayId(string $displayId): void
    {
        $this->displayId = $displayId;
    }
    public function getDisplayId(): string
    {
        return $this->displayId ?? throw new \PSX\Sql\Exception\NoValueAvailable('No value for required column "display_id" was provided');
    }
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function setFunderId(int $funderId): void
    {
        $this->funderId = $funderId;
    }
    public function getFunderId(): int
    {
        return $this->funderId ?? throw new \PSX\Sql\Exception\NoValueAvailable('No value for required column "funder_id" was provided');
    }
    public function setStartDate(\PSX\DateTime\LocalDateTime $startDate): void
    {
        $this->startDate = $startDate;
    }
    public function getStartDate(): \PSX\DateTime\LocalDateTime
    {
        return $this->startDate ?? throw new \PSX\Sql\Exception\NoValueAvailable('No value for required column "start_date" was provided');
    }
    public function setEndDate(\PSX\DateTime\LocalDateTime $endDate): void
    {
        $this->endDate = $endDate;
    }
    public function getEndDate(): \PSX\DateTime\LocalDateTime
    {
        return $this->endDate ?? throw new \PSX\Sql\Exception\NoValueAvailable('No value for required column "end_date" was provided');
    }
    public function setUpdateDate(\PSX\DateTime\LocalDateTime $updateDate): void
    {
        $this->updateDate = $updateDate;
    }
    public function getUpdateDate(): \PSX\DateTime\LocalDateTime
    {
        return $this->updateDate ?? throw new \PSX\Sql\Exception\NoValueAvailable('No value for required column "update_date" was provided');
    }
    public function setInsertDate(\PSX\DateTime\LocalDateTime $insertDate): void
    {
        $this->insertDate = $insertDate;
    }
    public function getInsertDate(): \PSX\DateTime\LocalDateTime
    {
        return $this->insertDate ?? throw new \PSX\Sql\Exception\NoValueAvailable('No value for required column "insert_date" was provided');
    }
    public function toRecord(): \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('id', $this->id);
        $record->put('user_id', $this->userId);
        $record->put('status', $this->status);
        $record->put('display_id', $this->displayId);
        $record->put('name', $this->name);
        $record->put('funder_id', $this->funderId);
        $record->put('start_date', $this->startDate);
        $record->put('end_date', $this->endDate);
        $record->put('update_date', $this->updateDate);
        $record->put('insert_date', $this->insertDate);
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
        $row->userId = isset($data['user_id']) && is_int($data['user_id']) ? $data['user_id'] : null;
        $row->status = isset($data['status']) && is_int($data['status']) ? $data['status'] : null;
        $row->displayId = isset($data['display_id']) && is_string($data['display_id']) ? $data['display_id'] : null;
        $row->name = isset($data['name']) && is_string($data['name']) ? $data['name'] : null;
        $row->funderId = isset($data['funder_id']) && is_int($data['funder_id']) ? $data['funder_id'] : null;
        $row->startDate = isset($data['start_date']) && $data['start_date'] instanceof \DateTimeInterface ? \PSX\DateTime\LocalDateTime::from($data['start_date']) : null;
        $row->endDate = isset($data['end_date']) && $data['end_date'] instanceof \DateTimeInterface ? \PSX\DateTime\LocalDateTime::from($data['end_date']) : null;
        $row->updateDate = isset($data['update_date']) && $data['update_date'] instanceof \DateTimeInterface ? \PSX\DateTime\LocalDateTime::from($data['update_date']) : null;
        $row->insertDate = isset($data['insert_date']) && $data['insert_date'] instanceof \DateTimeInterface ? \PSX\DateTime\LocalDateTime::from($data['insert_date']) : null;
        return $row;
    }
}