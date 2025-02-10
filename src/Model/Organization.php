<?php

declare(strict_types = 1);

namespace App\Model;

use PSX\Schema\Attribute\Description;

#[Description('')]
class Organization implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $id = null;
    #[Description('')]
    protected ?string $name = null;
    #[Description('')]
    protected ?string $legalName = null;
    #[Description('')]
    protected ?string $leiCode = null;
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
    public function setLegalName(?string $legalName): void
    {
        $this->legalName = $legalName;
    }
    public function getLegalName(): ?string
    {
        return $this->legalName;
    }
    public function setLeiCode(?string $leiCode): void
    {
        $this->leiCode = $leiCode;
    }
    public function getLeiCode(): ?string
    {
        return $this->leiCode;
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
        $record->put('legalName', $this->legalName);
        $record->put('leiCode', $this->leiCode);
        $record->put('updateDate', $this->updateDate);
        $record->put('insertDate', $this->insertDate);
        return $record;
    }
    public function jsonSerialize(): object
    {
        return (object) $this->toRecord()->getAll();
    }
}

