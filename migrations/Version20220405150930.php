<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405150930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suite ADD manager_id INT NOT NULL');
        $this->addSql('ALTER TABLE suite ADD CONSTRAINT FK_153CE426783E3463 FOREIGN KEY (manager_id) REFERENCES manager (id)');
        $this->addSql('CREATE INDEX IDX_153CE426783E3463 ON suite (manager_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suite DROP FOREIGN KEY FK_153CE426783E3463');
        $this->addSql('DROP INDEX IDX_153CE426783E3463 ON suite');
        $this->addSql('ALTER TABLE suite DROP manager_id');
    }
}
