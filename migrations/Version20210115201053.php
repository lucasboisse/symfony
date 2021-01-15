<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210115201053 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage ADD stages_e_id INT NOT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93691950C39D FOREIGN KEY (stages_e_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_C27C93691950C39D ON stage (stages_e_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93691950C39D');
        $this->addSql('DROP INDEX IDX_C27C93691950C39D ON stage');
        $this->addSql('ALTER TABLE stage DROP stages_e_id');
    }
}
