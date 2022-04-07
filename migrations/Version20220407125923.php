<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220407125923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hotel ADD manager_id INT NOT NULL');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED9783E3463 FOREIGN KEY (manager_id) REFERENCES manager (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3535ED9783E3463 ON hotel (manager_id)');
        $this->addSql('ALTER TABLE manager DROP FOREIGN KEY FK_FA2425B93243BB18');
        $this->addSql('DROP INDEX UNIQ_FA2425B93243BB18 ON manager');
        $this->addSql('ALTER TABLE manager DROP hotel_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED9783E3463');
        $this->addSql('DROP INDEX UNIQ_3535ED9783E3463 ON hotel');
        $this->addSql('ALTER TABLE hotel DROP manager_id');
        $this->addSql('ALTER TABLE manager ADD hotel_id INT NOT NULL');
        $this->addSql('ALTER TABLE manager ADD CONSTRAINT FK_FA2425B93243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FA2425B93243BB18 ON manager (hotel_id)');
    }
}
