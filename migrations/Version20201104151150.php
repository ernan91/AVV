<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201104151150 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE animation ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription CHANGE date_annule date_annule DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP image');
        $this->addSql('ALTER TABLE animation DROP image');
        $this->addSql('ALTER TABLE inscription CHANGE date_annule date_annule DATETIME DEFAULT NULL');
    }
}
