<?php

declare(strict_types=1);

namespace Danilocgsilva\NodumpDatabase\Tests;

use Danilocgsilva\NodumpDatabase\Field;
use Danilocgsilva\NodumpDatabase\InsertQueryBuilder;
use PHPUnit\Framework\TestCase;

class InsertQueryBuilderTest extends TestCase
{
    public function testQueryInsert(): void
    {
        $expectedQuery = "INSERT INTO people (id, name) VALUES (12, 'Wanessa');";
        $fieldId = new Field("id", "INT", 12);
        $fieldName = new Field("name", "VARCHAR(255)", "Wanessa");
        $queryBuilder = new InsertQueryBuilder();
        $queryBuilder->setTableName("people");
        $queryBuilder->addField($fieldId);
        $queryBuilder->addField($fieldName);
        $this->assertSame($expectedQuery, $queryBuilder->get());
    }
}

