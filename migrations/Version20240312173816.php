<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240312173816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_page (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, presentation_text VARCHAR(1500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enterprise (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, phone_number INT NOT NULL, email VARCHAR(25) NOT NULL, adress VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exposition (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exposure (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form_contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(15) NOT NULL, first_name VARCHAR(15) NOT NULL, email VARCHAR(15) NOT NULL, phone_number INT NOT NULL, subject VARCHAR(25) NOT NULL, message VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home_page (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(25) NOT NULL, presentation_text VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening (id INT AUTO_INCREMENT NOT NULL, enterprise_id INT DEFAULT NULL, opening_day VARCHAR(10) NOT NULL, opening_hour_morning INT NOT NULL, closing_hour_morning INT NOT NULL, opening_hour_afternoon INT NOT NULL, closing_hour_afternoon INT NOT NULL, INDEX IDX_E35D4C3A97D1AC3 (enterprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opinion (id INT AUTO_INCREMENT NOT NULL, enterprise_id INT DEFAULT NULL, name VARCHAR(25) NOT NULL, avis VARCHAR(255) NOT NULL, score INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_AB02B027A97D1AC3 (enterprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services_page (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, services_presentation VARCHAR(1500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tips (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(25) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE topics (id INT AUTO_INCREMENT NOT NULL, watering_id INT NOT NULL, exposition_id INT NOT NULL, category_id INT NOT NULL, exposure_id INT NOT NULL, name VARCHAR(25) NOT NULL, latin_name VARCHAR(30) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_91F64639FA0020F0 (watering_id), INDEX IDX_91F6463988ED476F (exposition_id), INDEX IDX_91F6463912469DE2 (category_id), INDEX IDX_91F64639C677C140 (exposure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(25) NOT NULL, first_name VARCHAR(25) NOT NULL, email VARCHAR(25) NOT NULL, role JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(25) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE watering (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE opening ADD CONSTRAINT FK_E35D4C3A97D1AC3 FOREIGN KEY (enterprise_id) REFERENCES enterprise (id)');
        $this->addSql('ALTER TABLE opinion ADD CONSTRAINT FK_AB02B027A97D1AC3 FOREIGN KEY (enterprise_id) REFERENCES enterprise (id)');
        $this->addSql('ALTER TABLE topics ADD CONSTRAINT FK_91F64639FA0020F0 FOREIGN KEY (watering_id) REFERENCES watering (id)');
        $this->addSql('ALTER TABLE topics ADD CONSTRAINT FK_91F6463988ED476F FOREIGN KEY (exposition_id) REFERENCES exposition (id)');
        $this->addSql('ALTER TABLE topics ADD CONSTRAINT FK_91F6463912469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE topics ADD CONSTRAINT FK_91F64639C677C140 FOREIGN KEY (exposure_id) REFERENCES exposure (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opening DROP FOREIGN KEY FK_E35D4C3A97D1AC3');
        $this->addSql('ALTER TABLE opinion DROP FOREIGN KEY FK_AB02B027A97D1AC3');
        $this->addSql('ALTER TABLE topics DROP FOREIGN KEY FK_91F64639FA0020F0');
        $this->addSql('ALTER TABLE topics DROP FOREIGN KEY FK_91F6463988ED476F');
        $this->addSql('ALTER TABLE topics DROP FOREIGN KEY FK_91F6463912469DE2');
        $this->addSql('ALTER TABLE topics DROP FOREIGN KEY FK_91F64639C677C140');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE contact_page');
        $this->addSql('DROP TABLE enterprise');
        $this->addSql('DROP TABLE exposition');
        $this->addSql('DROP TABLE exposure');
        $this->addSql('DROP TABLE form_contact');
        $this->addSql('DROP TABLE home_page');
        $this->addSql('DROP TABLE opening');
        $this->addSql('DROP TABLE opinion');
        $this->addSql('DROP TABLE services_page');
        $this->addSql('DROP TABLE tips');
        $this->addSql('DROP TABLE topics');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE watering');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
