<?php

declare(strict_types = 1);

namespace App\Model;

use PSX\Schema\Attribute\Description;

#[Description('')]
class Person implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $id = null;
    #[Description('')]
    protected ?string $name = null;
    #[Description('')]
    protected ?string $familyName = null;
    #[Description('')]
    protected ?string $givenName = null;
    #[Description('')]
    protected ?string $email = null;
    #[Description('')]
    protected ?\PSX\DateTime\LocalDate $birthDate = null;
    #[Description('')]
    protected ?Organization $memberOf = null;
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
    public function setFamilyName(?string $familyName): void
    {
        $this->familyName = $familyName;
    }
    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }
    public function setGivenName(?string $givenName): void
    {
        $this->givenName = $givenName;
    }
    public function getGivenName(): ?string
    {
        return $this->givenName;
    }
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setBirthDate(?\PSX\DateTime\LocalDate $birthDate): void
    {
        $this->birthDate = $birthDate;
    }
    public function getBirthDate(): ?\PSX\DateTime\LocalDate
    {
        return $this->birthDate;
    }
    public function setMemberOf(?Organization $memberOf): void
    {
        $this->memberOf = $memberOf;
    }
    public function getMemberOf(): ?Organization
    {
        return $this->memberOf;
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
        $record->put('familyName', $this->familyName);
        $record->put('givenName', $this->givenName);
        $record->put('email', $this->email);
        $record->put('birthDate', $this->birthDate);
        $record->put('memberOf', $this->memberOf);
        $record->put('updateDate', $this->updateDate);
        $record->put('insertDate', $this->insertDate);
        return $record;
    }
    public function jsonSerialize(): object
    {
        return (object) $this->toRecord()->getAll();
    }
}

