<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201006124601 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite ADD id_type_activite_id INT NOT NULL');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515339C0AF1 FOREIGN KEY (id_type_activite_id) REFERENCES type_activite (id)');
        $this->addSql('CREATE INDEX IDX_B8755515339C0AF1 ON activite (id_type_activite_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515339C0AF1');
        $this->addSql('DROP INDEX IDX_B8755515339C0AF1 ON activite');
        $this->addSql('ALTER TABLE activite DROP id_type_activite_id');
    }
}
