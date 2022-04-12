<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412162519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, suite_id INT NOT NULL, client_id INT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, INDEX IDX_E00CEDDE4FFCB518 (suite_id), INDEX IDX_E00CEDDE19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, client_last_name VARCHAR(255) NOT NULL, client_first_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C7440455E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, manager_id INT NOT NULL, hotel_name VARCHAR(255) NOT NULL, hotel_city VARCHAR(255) NOT NULL, hotel_address VARCHAR(255) NOT NULL, hotel_description LONGTEXT NOT NULL, hotel_slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3535ED9783E3463 (manager_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, suite_id INT NOT NULL, image_name VARCHAR(255) NOT NULL, INDEX IDX_C53D045F4FFCB518 (suite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manager (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, manager_last_name VARCHAR(255) NOT NULL, manager_first_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FA2425B9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suite (id INT AUTO_INCREMENT NOT NULL, manager_id INT NOT NULL, suite_name VARCHAR(255) NOT NULL, suite_description LONGTEXT NOT NULL, suite_price NUMERIC(10, 2) DEFAULT NULL, suite_slug VARCHAR(255) NOT NULL, INDEX IDX_153CE426783E3463 (manager_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE4FFCB518 FOREIGN KEY (suite_id) REFERENCES suite (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED9783E3463 FOREIGN KEY (manager_id) REFERENCES manager (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F4FFCB518 FOREIGN KEY (suite_id) REFERENCES suite (id)');
        $this->addSql('ALTER TABLE suite ADD CONSTRAINT FK_153CE426783E3463 FOREIGN KEY (manager_id) REFERENCES manager (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE19EB6921');
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED9783E3463');
        $this->addSql('ALTER TABLE suite DROP FOREIGN KEY FK_153CE426783E3463');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE4FFCB518');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F4FFCB518');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE manager');
        $this->addSql('DROP TABLE suite');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
