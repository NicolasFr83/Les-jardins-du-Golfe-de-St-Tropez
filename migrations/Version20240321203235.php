<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240321203235 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', email VARCHAR(50) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(50) NOT NULL, name VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE contact_page CHANGE presentation_text presentation_text LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE enterprise CHANGE phone_number phone_number VARCHAR(15) NOT NULL');
        $this->addSql('ALTER TABLE exposition CHANGE name name VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE form_contact ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE name name VARCHAR(25) NOT NULL, CHANGE first_name first_name VARCHAR(25) NOT NULL, CHANGE email email VARCHAR(25) NOT NULL, CHANGE phone_number phone_number VARCHAR(15) NOT NULL, CHANGE subject subject VARCHAR(50) NOT NULL, CHANGE message message LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE home_page CHANGE title title VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE opinion ADD is_moderated TINYINT(1) NOT NULL, CHANGE enterprise_id enterprise_id INT NOT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE services_page CHANGE services_presentation services_presentation LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE tips CHANGE name name VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE topics ADD image_name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, first_name VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, role JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE contact_page CHANGE presentation_text presentation_text VARCHAR(1500) NOT NULL');
        $this->addSql('ALTER TABLE enterprise CHANGE phone_number phone_number INT NOT NULL');
        $this->addSql('ALTER TABLE exposition CHANGE name name VARCHAR(15) NOT NULL');
        $this->addSql('ALTER TABLE form_contact DROP created_at, CHANGE name name VARCHAR(15) NOT NULL, CHANGE first_name first_name VARCHAR(15) NOT NULL, CHANGE email email VARCHAR(15) NOT NULL, CHANGE phone_number phone_number INT NOT NULL, CHANGE subject subject VARCHAR(25) NOT NULL, CHANGE message message VARCHAR(1000) NOT NULL');
        $this->addSql('ALTER TABLE home_page CHANGE title title VARCHAR(25) NOT NULL');
        $this->addSql('ALTER TABLE opinion DROP is_moderated, CHANGE enterprise_id enterprise_id INT DEFAULT NULL, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE services_page CHANGE services_presentation services_presentation VARCHAR(1500) NOT NULL');
        $this->addSql('ALTER TABLE tips CHANGE name name VARCHAR(25) NOT NULL');
        $this->addSql('ALTER TABLE topics DROP image_name');
    }
}
