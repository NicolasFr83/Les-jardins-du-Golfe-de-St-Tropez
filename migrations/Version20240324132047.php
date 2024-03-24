<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240324132047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opening CHANGE opening_hour_morning opening_hour_morning VARCHAR(5) NOT NULL, CHANGE closing_hour_morning closing_hour_morning VARCHAR(5) NOT NULL, CHANGE opening_hour_afternoon opening_hour_afternoon VARCHAR(5) NOT NULL, CHANGE closing_hour_afternoon closing_hour_afternoon VARCHAR(5) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opening CHANGE opening_hour_morning opening_hour_morning INT NOT NULL, CHANGE closing_hour_morning closing_hour_morning INT NOT NULL, CHANGE opening_hour_afternoon opening_hour_afternoon INT NOT NULL, CHANGE closing_hour_afternoon closing_hour_afternoon INT NOT NULL');
    }
}
