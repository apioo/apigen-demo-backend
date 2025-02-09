<?php

namespace App\Service;

use App\Model;
use App\Table;
use Fusio\Engine\DispatcherInterface;
use Fusio\Impl\Authorization\UserContext;
use PSX\DateTime\LocalDateTime;
use PSX\Http\Exception as StatusCode;
use Ramsey\Uuid\Uuid;

readonly class Event
{
    public function __construct(private Table\Event $eventTable, private Table\EventAttendees $eventAttendeesTable, private Table\Person $personTable, private Table\Organization $organizationTable, private DispatcherInterface $dispatcher)
    {
    }

    public function create(Model\Event $model, UserContext $context) : string
    {
        try {
            $this->eventTable->beginTransaction();

            $id = Uuid::uuid4()->toString();

            $row = new Table\Generated\EventRow();
            $row->setUserId($context->getUserId());
            $row->setDisplayId($id);
            $row->setStatus(Table\Event::STATUS_ACTIVE);

            $name = $model->getName();
            if ($name !== null) {
                $row->setName($name);
            }

            $funderId = $model->getFunder()?->getId();
            if ($funderId !== null) {
                $funder = $this->organizationTable->findOneByDisplayId($funderId) ?? throw new StatusCode\NotFoundException('Provided Organization does not exist');
                $row->setFunderId($funder->getId());
            }

            $startDate = $model->getStartDate();
            if ($startDate !== null) {
                $row->setStartDate($startDate);
            }

            $endDate = $model->getEndDate();
            if ($endDate !== null) {
                $row->setEndDate($endDate);
            }

            $row->setUpdateDate(LocalDateTime::now());
            $row->setInsertDate(LocalDateTime::now());
            $this->eventTable->create($row);

            $row->setId($this->eventTable->getLastInsertId());

            $attendees = $model->getAttendees();
            if ($attendees !== null) {
                $this->eventAttendeesTable->deleteByEventId($row->getId());
                foreach ($attendees as $person) {
                    $personId = $person->getId() ?? throw new StatusCode\BadRequestException('No Person provided');
                    $person = $this->personTable->findOneByDisplayId($personId) ?? throw new StatusCode\NotFoundException('Provided Person does not exist');
                    $ref = new Table\Generated\EventAttendeesRow();
                    $ref->setEventId($row->getId());
                    $ref->setPersonId($person->getId());
                    $this->eventAttendeesTable->create($ref);
                }
            }


            $model->setId($row->getDisplayId());
            $this->dispatcher->dispatch('event.create', $model);

            $this->eventTable->commit();
        } catch (\Throwable $e) {
            $this->eventTable->rollBack();

            throw $e;
        }

        return $id;
    }

    public function update(string $id, Model\Event $model, UserContext $context) : string
    {
        $row = $this->eventTable->findOneByDisplayId($id);
        if (!$row instanceof Table\Generated\EventRow) {
            throw new StatusCode\NotFoundException('Provided Event does not exist');
        }

        try {
            $this->eventTable->beginTransaction();

            $name = $model->getName();
            if ($name !== null) {
                $row->setName($name);
            }

            $funderId = $model->getFunder()?->getId();
            if ($funderId !== null) {
                $funder = $this->organizationTable->findOneByDisplayId($funderId) ?? throw new StatusCode\NotFoundException('Provided Organization does not exist');
                $row->setFunderId($funder->getId());
            }

            $startDate = $model->getStartDate();
            if ($startDate !== null) {
                $row->setStartDate($startDate);
            }

            $endDate = $model->getEndDate();
            if ($endDate !== null) {
                $row->setEndDate($endDate);
            }

            $row->setUpdateDate(LocalDateTime::now());
            $this->eventTable->update($row);

            $attendees = $model->getAttendees();
            if ($attendees !== null) {
                $this->eventAttendeesTable->deleteByEventId($row->getId());
                foreach ($attendees as $person) {
                    $personId = $person->getId() ?? throw new StatusCode\BadRequestException('No Person provided');
                    $person = $this->personTable->findOneByDisplayId($personId) ?? throw new StatusCode\NotFoundException('Provided Person does not exist');
                    $ref = new Table\Generated\EventAttendeesRow();
                    $ref->setEventId($row->getId());
                    $ref->setPersonId($person->getId());
                    $this->eventAttendeesTable->create($ref);
                }
            }


            $model->setId($row->getDisplayId());
            $this->dispatcher->dispatch('event.update', $model);

            $this->eventTable->commit();
        } catch (\Throwable $e) {
            $this->eventTable->rollBack();

            throw $e;
        }

        return $row->getDisplayId();
    }

    public function delete(string $id, UserContext $context) : string
    {
        $row = $this->eventTable->findOneByDisplayId($id);
        if (!$row instanceof Table\Generated\EventRow) {
            throw new StatusCode\NotFoundException('Provided Event does not exist');
        }

        try {
            $this->eventTable->beginTransaction();

            $row->setStatus(Table\Event::STATUS_DELETED);
            $row->setUpdateDate(LocalDateTime::now());
            $this->eventTable->update($row);

            $model = new Model\Event();
            $model->setId($row->getDisplayId());
            $this->dispatcher->dispatch('event.delete', $model);

            $this->eventTable->commit();
        } catch (\Throwable $e) {
            $this->eventTable->rollBack();

            throw $e;
        }

        return $row->getDisplayId();
    }
}
