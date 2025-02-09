<?php

namespace App\Service;

use App\Model;
use App\Table;
use Fusio\Engine\DispatcherInterface;
use Fusio\Impl\Authorization\UserContext;
use PSX\DateTime\LocalDateTime;
use PSX\Http\Exception as StatusCode;
use Ramsey\Uuid\Uuid;

readonly class Person
{
    public function __construct(private Table\Person $personTable, private Table\Organization $organizationTable, private DispatcherInterface $dispatcher)
    {
    }

    public function create(Model\Person $model, UserContext $context) : string
    {
        try {
            $this->personTable->beginTransaction();

            $id = Uuid::uuid4()->toString();

            $row = new Table\Generated\PersonRow();
            $row->setUserId($context->getUserId());
            $row->setDisplayId($id);
            $row->setStatus(Table\Person::STATUS_ACTIVE);

            $name = $model->getName();
            if ($name !== null) {
                $row->setName($name);
            }

            $familyName = $model->getFamilyName();
            if ($familyName !== null) {
                $row->setFamilyName($familyName);
            }

            $givenName = $model->getGivenName();
            if ($givenName !== null) {
                $row->setGivenName($givenName);
            }

            $email = $model->getEmail();
            if ($email !== null) {
                $row->setEmail($email);
            }

            $birthDate = $model->getBirthDate();
            if ($birthDate !== null) {
                $row->setBirthDate($birthDate);
            }

            $memberOfId = $model->getMemberOf()?->getId();
            if ($memberOfId !== null) {
                $memberOf = $this->organizationTable->findOneByDisplayId($memberOfId) ?? throw new StatusCode\NotFoundException('Provided Organization does not exist');
                $row->setMemberOfId($memberOf->getId());
            }

            $row->setUpdateDate(LocalDateTime::now());
            $row->setInsertDate(LocalDateTime::now());
            $this->personTable->create($row);

            $row->setId($this->personTable->getLastInsertId());


            $model->setId($row->getDisplayId());
            $this->dispatcher->dispatch('person.create', $model);

            $this->personTable->commit();
        } catch (\Throwable $e) {
            $this->personTable->rollBack();

            throw $e;
        }

        return $id;
    }

    public function update(string $id, Model\Person $model, UserContext $context) : string
    {
        $row = $this->personTable->findOneByDisplayId($id);
        if (!$row instanceof Table\Generated\PersonRow) {
            throw new StatusCode\NotFoundException('Provided Person does not exist');
        }

        try {
            $this->personTable->beginTransaction();

            $name = $model->getName();
            if ($name !== null) {
                $row->setName($name);
            }

            $familyName = $model->getFamilyName();
            if ($familyName !== null) {
                $row->setFamilyName($familyName);
            }

            $givenName = $model->getGivenName();
            if ($givenName !== null) {
                $row->setGivenName($givenName);
            }

            $email = $model->getEmail();
            if ($email !== null) {
                $row->setEmail($email);
            }

            $birthDate = $model->getBirthDate();
            if ($birthDate !== null) {
                $row->setBirthDate($birthDate);
            }

            $memberOfId = $model->getMemberOf()?->getId();
            if ($memberOfId !== null) {
                $memberOf = $this->organizationTable->findOneByDisplayId($memberOfId) ?? throw new StatusCode\NotFoundException('Provided Organization does not exist');
                $row->setMemberOfId($memberOf->getId());
            }

            $row->setUpdateDate(LocalDateTime::now());
            $this->personTable->update($row);


            $model->setId($row->getDisplayId());
            $this->dispatcher->dispatch('person.update', $model);

            $this->personTable->commit();
        } catch (\Throwable $e) {
            $this->personTable->rollBack();

            throw $e;
        }

        return $row->getDisplayId();
    }

    public function delete(string $id, UserContext $context) : string
    {
        $row = $this->personTable->findOneByDisplayId($id);
        if (!$row instanceof Table\Generated\PersonRow) {
            throw new StatusCode\NotFoundException('Provided Person does not exist');
        }

        try {
            $this->personTable->beginTransaction();

            $row->setStatus(Table\Person::STATUS_DELETED);
            $row->setUpdateDate(LocalDateTime::now());
            $this->personTable->update($row);

            $model = new Model\Person();
            $model->setId($row->getDisplayId());
            $this->dispatcher->dispatch('person.delete', $model);

            $this->personTable->commit();
        } catch (\Throwable $e) {
            $this->personTable->rollBack();

            throw $e;
        }

        return $row->getDisplayId();
    }
}
