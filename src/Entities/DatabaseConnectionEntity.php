<?php

declare(strict_types=1);

namespace Danilocgsilva\NodumpDatabase\Entities;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'database_connections')]
class DatabaseConnectionEntity
{
    #[Id]
    #[Column(type: 'integer')]
    #[GeneratedValue]
    private int $id;

    #[Column(type: 'string', nullable: false)]
    private string $userName;

    #[Column(type: 'string', nullable: false)]
    private string $hostAddress;

    #[Column(type: 'string', nullable: true)]
    private string $passwordHash;

    #[Column(type: 'string', nullable: false)]
    private string $databaseName;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getHostAddress(): string
    {
        return $this->hostAddress;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function getDatabaseName(): string
    {
        return $this->databaseName;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    public function setHostAddress(string $hostAddress): void
    {
        $this->hostAddress = $hostAddress;
    }

    public function setPasswordHash(string $passwordHash): void
    {
        $this->passwordHash = $passwordHash;
    }

    public function setDatabaseName(string $databaseName): void
    {
        $this->databaseName = $databaseName;
    }
}
