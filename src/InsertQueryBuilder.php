<?php

declare(strict_types=1);

namespace Danilocgsilva\NodumpDatabase;

class InsertQueryBuilder
{
    private array $fields = [];

    private string $tableName;

    public function setTableName(string $tableName): self
    {
        $this->tableName = $tableName;
        return $this;
    }
    
    public function addField(Field $field): self
    {
        $this->fields[] = $field;
        return $this;
    }
    
    public function get(): string
    {
        return sprintf(
            "INSERT INTO %s (%s) VALUES (%s);",
            $this->tableName,
            $this->getFieldsNamesSingleLineString(), 
            $this->getValuesFromFields()
        );
    }

    private function getFieldsNamesSingleLineString(): string
    {
        return implode(
            ", ", 
            array_map(
                fn (Field $field) => $field->name, 
                $this->fields
            )
        );
    }

    public function getValuesFromFields(): string
    {
        return implode(
            ", ", 
            array_map(
                function (Field $field): float|int|string|null {
                    if ($this->stringLike($field->type)) {
                        return "'" . $field->value . "'";
                    }
                    return $field->value;
                }, 
                $this->fields
            )
        );
    }

    private function stringLike(string $type): bool
    {
        if ($type === "VARCHAR(255)") {
            return true;
        }

        return false;
    }
}
