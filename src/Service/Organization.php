<?php

namespace App\Service;

use App\Model;
use App\Table;
use Fusio\Engine\DispatcherInterface;
use Fusio\Impl\Authorization\UserContext;
use PSX\DateTime\LocalDateTime;
use PSX\Http\Exception as StatusCode;
use Ramsey\Uuid\Uuid;

readonly class Organization
{
    public function __construct(private Table\Organization $organizationTable, private DispatcherInterface $dispatcher)
    {
    }

    public function create(Model\Organization $model, UserContext $context) : string
    {
        try {
            $this->organizationTable->beginTransaction();

            $id = Uuid::uuid4()->toString();

            $row = new Table\Generated\OrganizationRow();
            $row->setUserId($context->getUserId());
            $row->setDisplayId($id);
            $row->setStatus(Table\Organization::STATUS_ACTIVE);

            $name = $model->getName();
            if ($name !== null) {
                $row->setName($name);
            }

            $legalName = $model->getLegalName();
            if ($legalName !== null) {
                $row->setLegalName($legalName);
            }

            $leiCode = $model->getLeiCode();
            if ($leiCode !== null) {
                $row->setLeiCode($leiCode);
            }

            $row->setUpdateDate(LocalDateTime::now());
            $row->setInsertDate(LocalDateTime::now());
            $this->organizationTable->create($row);

            $row->setId($this->organizationTable->getLastInsertId());


            $model->setId($row->getDisplayId());
            $this->dispatcher->dispatch('organization.create', $model);

            $this->organizationTable->commit();
        } catch (\Throwable $e) {
            $this->organizationTable->rollBack();

            throw $e;
        }

        return $id;
    }

    public function update(string $id, Model\Organization $model, UserContext $context) : string
    {
        $row = $this->organizationTable->findOneByDisplayId($id);
        if (!$row instanceof Table\Generated\OrganizationRow) {
            throw new StatusCode\NotFoundException('Provided Organization does not exist');
        }

        try {
            $this->organizationTable->beginTransaction();

            $name = $model->getName();
            if ($name !== null) {
                $row->setName($name);
            }

            $legalName = $model->getLegalName();
            if ($legalName !== null) {
                $row->setLegalName($legalName);
            }

            $leiCode = $model->getLeiCode();
            if ($leiCode !== null) {
                $row->setLeiCode($leiCode);
            }

            $row->setUpdateDate(LocalDateTime::now());
            $this->organizationTable->update($row);


            $model->setId($row->getDisplayId());
            $this->dispatcher->dispatch('organization.update', $model);

            $this->organizationTable->commit();
        } catch (\Throwable $e) {
            $this->organizationTable->rollBack();

            throw $e;
        }

        return $row->getDisplayId();
    }

    public function delete(string $id, UserContext $context) : string
    {
        $row = $this->organizationTable->findOneByDisplayId($id);
        if (!$row instanceof Table\Generated\OrganizationRow) {
            throw new StatusCode\NotFoundException('Provided Organization does not exist');
        }

        try {
            $this->organizationTable->beginTransaction();

            $row->setStatus(Table\Organization::STATUS_DELETED);
            $row->setUpdateDate(LocalDateTime::now());
            $this->organizationTable->update($row);

            $model = new Model\Organization();
            $model->setId($row->getDisplayId());
            $this->dispatcher->dispatch('organization.delete', $model);

            $this->organizationTable->commit();
        } catch (\Throwable $e) {
            $this->organizationTable->rollBack();

            throw $e;
        }

        return $row->getDisplayId();
    }
}
