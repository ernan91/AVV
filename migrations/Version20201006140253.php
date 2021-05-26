<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201006140253 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animation (id INT AUTO_INCREMENT NOT NULL, nom_animation VARCHAR(50) NOT NULL, date_debut_animation DATETIME NOT NULL, date_fin_animation DATETIME NOT NULL, duree_animation TIME NOT NULL, limite_age INT DEFAULT NULL, prix_animation DOUBLE PRECISION NOT NULL, nombre_de_place INT NOT NULL, description_animation LONGTEXT DEFAULT NULL, commentaire_animation LONGTEXT DEFAULT NULL, difficulte_animation LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE animation');
    }
}
