<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211129134204 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cereale (id INT AUTO_INCREMENT NOT NULL, nom_c VARCHAR(255) NOT NULL, prix INT NOT NULL, code_c INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collecte (id INT AUTO_INCREMENT NOT NULL, code_c_id INT NOT NULL, code_s_id INT NOT NULL, date_c DATE NOT NULL, quantite INT NOT NULL, INDEX IDX_55AE4A3DA73CF112 (code_c_id), INDEX IDX_55AE4A3DF725A68D (code_s_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE silo (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, capacite INT NOT NULL, code_s INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE collecte ADD CONSTRAINT FK_55AE4A3DA73CF112 FOREIGN KEY (code_c_id) REFERENCES cereale (id)');
        $this->addSql('ALTER TABLE collecte ADD CONSTRAINT FK_55AE4A3DF725A68D FOREIGN KEY (code_s_id) REFERENCES silo (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE collecte DROP FOREIGN KEY FK_55AE4A3DA73CF112');
        $this->addSql('ALTER TABLE collecte DROP FOREIGN KEY FK_55AE4A3DF725A68D');
        $this->addSql('DROP TABLE cereale');
        $this->addSql('DROP TABLE collecte');
        $this->addSql('DROP TABLE silo');
    }
}
