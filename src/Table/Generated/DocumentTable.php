<?php

namespace App\Table\Generated;

/**
 * @extends \PSX\Sql\TableAbstract<\App\Table\Generated\DocumentRow>
 */
class DocumentTable extends \PSX\Sql\TableAbstract
{
    public const NAME = 'app_document';
    public const COLUMN_ID = 'id';
    public const COLUMN_USER_ID = 'user_id';
    public const COLUMN_STATUS = 'status';
    public const COLUMN_DISPLAY_ID = 'display_id';
    public const COLUMN_TITLE = 'title';
    public const COLUMN_AUTHOR_ID = 'author_id';
    public const COLUMN_CONTENT = 'content';
    public const COLUMN_UPDATE_DATE = 'update_date';
    public const COLUMN_INSERT_DATE = 'insert_date';
    public function getName(): string
    {
        return self::NAME;
    }
    public function getColumns(): array
    {
        return [self::COLUMN_ID => 0x3020000a, self::COLUMN_USER_ID => 0x20000a, self::COLUMN_STATUS => 0x20000a, self::COLUMN_DISPLAY_ID => 0xa00024, self::COLUMN_TITLE => 0x40a000ff, self::COLUMN_AUTHOR_ID => 0x20000a, self::COLUMN_CONTENT => 0x40a000ff, self::COLUMN_UPDATE_DATE => 0x800000, self::COLUMN_INSERT_DATE => 0x800000];
    }
    /**
     * @return array<\App\Table\Generated\DocumentRow>
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findAll(?\PSX\Sql\Condition $condition = null, ?int $startIndex = null, ?int $count = null, ?\App\Table\Generated\DocumentColumn $sortBy = null, ?\PSX\Sql\OrderBy $sortOrder = null): array
    {
        return $this->doFindAll($condition, $startIndex, $count, $sortBy, $sortOrder);
    }
    /**
     * @return array<\App\Table\Generated\DocumentRow>
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findBy(\PSX\Sql\Condition $condition, ?int $startIndex = null, ?int $count = null, ?\App\Table\Generated\DocumentColumn $sortBy = null, ?\PSX\Sql\OrderBy $sortOrder = null): array
    {
        return $this->doFindBy($condition, $startIndex, $count, $sortBy, $sortOrder);
    }
    /**
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findOneBy(\PSX\Sql\Condition $condition): ?\App\Table\Generated\DocumentRow
    {
        return $this->doFindOneBy($condition);
    }
    /**
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function find(int $id): ?\App\Table\Generated\DocumentRow
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('id', $id);
        return $this->doFindOneBy($condition);
    }
    /**
     * @return array<\App\Table\Generated\DocumentRow>
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findById(int $value, ?int $startIndex = null, ?int $count = null, ?\App\Table\Generated\DocumentColumn $sortBy = null, ?\PSX\Sql\OrderBy $sortOrder = null): array
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('id', $value);
        return $this->doFindBy($condition, $startIndex, $count, $sortBy, $sortOrder);
    }
    /**
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findOneById(int $value): ?\App\Table\Generated\DocumentRow
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('id', $value);
        return $this->doFindOneBy($condition);
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function updateById(int $value, \App\Table\Generated\DocumentRow $record): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('id', $value);
        return $this->doUpdateBy($condition, $record->toRecord());
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function deleteById(int $value): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('id', $value);
        return $this->doDeleteBy($condition);
    }
    /**
     * @return array<\App\Table\Generated\DocumentRow>
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findByUserId(int $value, ?int $startIndex = null, ?int $count = null, ?\App\Table\Generated\DocumentColumn $sortBy = null, ?\PSX\Sql\OrderBy $sortOrder = null): array
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('user_id', $value);
        return $this->doFindBy($condition, $startIndex, $count, $sortBy, $sortOrder);
    }
    /**
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findOneByUserId(int $value): ?\App\Table\Generated\DocumentRow
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('user_id', $value);
        return $this->doFindOneBy($condition);
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function updateByUserId(int $value, \App\Table\Generated\DocumentRow $record): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('user_id', $value);
        return $this->doUpdateBy($condition, $record->toRecord());
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function deleteByUserId(int $value): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('user_id', $value);
        return $this->doDeleteBy($condition);
    }
    /**
     * @return array<\App\Table\Generated\DocumentRow>
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findByStatus(int $value, ?int $startIndex = null, ?int $count = null, ?\App\Table\Generated\DocumentColumn $sortBy = null, ?\PSX\Sql\OrderBy $sortOrder = null): array
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('status', $value);
        return $this->doFindBy($condition, $startIndex, $count, $sortBy, $sortOrder);
    }
    /**
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findOneByStatus(int $value): ?\App\Table\Generated\DocumentRow
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('status', $value);
        return $this->doFindOneBy($condition);
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function updateByStatus(int $value, \App\Table\Generated\DocumentRow $record): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('status', $value);
        return $this->doUpdateBy($condition, $record->toRecord());
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function deleteByStatus(int $value): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('status', $value);
        return $this->doDeleteBy($condition);
    }
    /**
     * @return array<\App\Table\Generated\DocumentRow>
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findByDisplayId(string $value, ?int $startIndex = null, ?int $count = null, ?\App\Table\Generated\DocumentColumn $sortBy = null, ?\PSX\Sql\OrderBy $sortOrder = null): array
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->like('display_id', $value);
        return $this->doFindBy($condition, $startIndex, $count, $sortBy, $sortOrder);
    }
    /**
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findOneByDisplayId(string $value): ?\App\Table\Generated\DocumentRow
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->like('display_id', $value);
        return $this->doFindOneBy($condition);
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function updateByDisplayId(string $value, \App\Table\Generated\DocumentRow $record): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->like('display_id', $value);
        return $this->doUpdateBy($condition, $record->toRecord());
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function deleteByDisplayId(string $value): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->like('display_id', $value);
        return $this->doDeleteBy($condition);
    }
    /**
     * @return array<\App\Table\Generated\DocumentRow>
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findByTitle(string $value, ?int $startIndex = null, ?int $count = null, ?\App\Table\Generated\DocumentColumn $sortBy = null, ?\PSX\Sql\OrderBy $sortOrder = null): array
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->like('title', $value);
        return $this->doFindBy($condition, $startIndex, $count, $sortBy, $sortOrder);
    }
    /**
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findOneByTitle(string $value): ?\App\Table\Generated\DocumentRow
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->like('title', $value);
        return $this->doFindOneBy($condition);
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function updateByTitle(string $value, \App\Table\Generated\DocumentRow $record): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->like('title', $value);
        return $this->doUpdateBy($condition, $record->toRecord());
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function deleteByTitle(string $value): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->like('title', $value);
        return $this->doDeleteBy($condition);
    }
    /**
     * @return array<\App\Table\Generated\DocumentRow>
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findByAuthorId(int $value, ?int $startIndex = null, ?int $count = null, ?\App\Table\Generated\DocumentColumn $sortBy = null, ?\PSX\Sql\OrderBy $sortOrder = null): array
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('author_id', $value);
        return $this->doFindBy($condition, $startIndex, $count, $sortBy, $sortOrder);
    }
    /**
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findOneByAuthorId(int $value): ?\App\Table\Generated\DocumentRow
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('author_id', $value);
        return $this->doFindOneBy($condition);
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function updateByAuthorId(int $value, \App\Table\Generated\DocumentRow $record): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('author_id', $value);
        return $this->doUpdateBy($condition, $record->toRecord());
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function deleteByAuthorId(int $value): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('author_id', $value);
        return $this->doDeleteBy($condition);
    }
    /**
     * @return array<\App\Table\Generated\DocumentRow>
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findByContent(string $value, ?int $startIndex = null, ?int $count = null, ?\App\Table\Generated\DocumentColumn $sortBy = null, ?\PSX\Sql\OrderBy $sortOrder = null): array
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->like('content', $value);
        return $this->doFindBy($condition, $startIndex, $count, $sortBy, $sortOrder);
    }
    /**
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findOneByContent(string $value): ?\App\Table\Generated\DocumentRow
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->like('content', $value);
        return $this->doFindOneBy($condition);
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function updateByContent(string $value, \App\Table\Generated\DocumentRow $record): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->like('content', $value);
        return $this->doUpdateBy($condition, $record->toRecord());
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function deleteByContent(string $value): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->like('content', $value);
        return $this->doDeleteBy($condition);
    }
    /**
     * @return array<\App\Table\Generated\DocumentRow>
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findByUpdateDate(\PSX\DateTime\LocalDateTime $value, ?int $startIndex = null, ?int $count = null, ?\App\Table\Generated\DocumentColumn $sortBy = null, ?\PSX\Sql\OrderBy $sortOrder = null): array
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('update_date', $value);
        return $this->doFindBy($condition, $startIndex, $count, $sortBy, $sortOrder);
    }
    /**
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findOneByUpdateDate(\PSX\DateTime\LocalDateTime $value): ?\App\Table\Generated\DocumentRow
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('update_date', $value);
        return $this->doFindOneBy($condition);
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function updateByUpdateDate(\PSX\DateTime\LocalDateTime $value, \App\Table\Generated\DocumentRow $record): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('update_date', $value);
        return $this->doUpdateBy($condition, $record->toRecord());
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function deleteByUpdateDate(\PSX\DateTime\LocalDateTime $value): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('update_date', $value);
        return $this->doDeleteBy($condition);
    }
    /**
     * @return array<\App\Table\Generated\DocumentRow>
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findByInsertDate(\PSX\DateTime\LocalDateTime $value, ?int $startIndex = null, ?int $count = null, ?\App\Table\Generated\DocumentColumn $sortBy = null, ?\PSX\Sql\OrderBy $sortOrder = null): array
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('insert_date', $value);
        return $this->doFindBy($condition, $startIndex, $count, $sortBy, $sortOrder);
    }
    /**
     * @throws \PSX\Sql\Exception\QueryException
     */
    public function findOneByInsertDate(\PSX\DateTime\LocalDateTime $value): ?\App\Table\Generated\DocumentRow
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('insert_date', $value);
        return $this->doFindOneBy($condition);
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function updateByInsertDate(\PSX\DateTime\LocalDateTime $value, \App\Table\Generated\DocumentRow $record): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('insert_date', $value);
        return $this->doUpdateBy($condition, $record->toRecord());
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function deleteByInsertDate(\PSX\DateTime\LocalDateTime $value): int
    {
        $condition = \PSX\Sql\Condition::withAnd();
        $condition->equals('insert_date', $value);
        return $this->doDeleteBy($condition);
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function create(\App\Table\Generated\DocumentRow $record): int
    {
        return $this->doCreate($record->toRecord());
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function update(\App\Table\Generated\DocumentRow $record): int
    {
        return $this->doUpdate($record->toRecord());
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function updateBy(\PSX\Sql\Condition $condition, \App\Table\Generated\DocumentRow $record): int
    {
        return $this->doUpdateBy($condition, $record->toRecord());
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function delete(\App\Table\Generated\DocumentRow $record): int
    {
        return $this->doDelete($record->toRecord());
    }
    /**
     * @throws \PSX\Sql\Exception\ManipulationException
     */
    public function deleteBy(\PSX\Sql\Condition $condition): int
    {
        return $this->doDeleteBy($condition);
    }
    /**
     * @param array<string, mixed> $row
     */
    protected function newRecord(array $row): \App\Table\Generated\DocumentRow
    {
        return \App\Table\Generated\DocumentRow::from($row);
    }
}