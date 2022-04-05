<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405144253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hotel ADD admin_id INT NOT NULL');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED9642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX IDX_3535ED9642B8210 ON hotel (admin_id)');
        $this->addSql('ALTER TABLE manager ADD admin_id INT NOT NULL');
        $this->addSql('ALTER TABLE manager ADD CONSTRAINT FK_FA2425B9642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX IDX_FA2425B9642B8210 ON manager (admin_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED9642B8210');
        $this->addSql('DROP INDEX IDX_3535ED9642B8210 ON hotel');
        $this->addSql('ALTER TABLE hotel DROP admin_id');
        $this->addSql('ALTER TABLE manager DROP FOREIGN KEY FK_FA2425B9642B8210');
        $this->addSql('DROP INDEX IDX_FA2425B9642B8210 ON manager');
        $this->addSql('ALTER TABLE manager DROP admin_id');
    }
}
