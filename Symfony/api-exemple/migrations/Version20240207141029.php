<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240207141029 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidats (id INT AUTO_INCREMENT NOT NULL, session_candidats_id INT NOT NULL, nom_candidat VARCHAR(50) NOT NULL, prenom_candidat VARCHAR(50) NOT NULL, slogan_candidat VARCHAR(255) NOT NULL, INDEX IDX_3C663B152A523243 (session_candidats_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_candidats (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_vote (id INT AUTO_INCREMENT NOT NULL, session_candidats_id INT NOT NULL, nb_tour INT NOT NULL, nb_representants INT NOT NULL, status VARCHAR(10) NOT NULL, INDEX IDX_9C61854E2A523243 (session_candidats_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE votes (id INT AUTO_INCREMENT NOT NULL, candidat_id_id INT DEFAULT NULL, session_id_id INT DEFAULT NULL, tour_vote INT NOT NULL, INDEX IDX_518B7ACFBFA9F225 (candidat_id_id), INDEX IDX_518B7ACFA4392681 (session_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidats ADD CONSTRAINT FK_3C663B152A523243 FOREIGN KEY (session_candidats_id) REFERENCES session_candidats (id)');
        $this->addSql('ALTER TABLE session_vote ADD CONSTRAINT FK_9C61854E2A523243 FOREIGN KEY (session_candidats_id) REFERENCES session_candidats (id)');
        $this->addSql('ALTER TABLE votes ADD CONSTRAINT FK_518B7ACFBFA9F225 FOREIGN KEY (candidat_id_id) REFERENCES candidats (id)');
        $this->addSql('ALTER TABLE votes ADD CONSTRAINT FK_518B7ACFA4392681 FOREIGN KEY (session_id_id) REFERENCES session_vote (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidats DROP FOREIGN KEY FK_3C663B152A523243');
        $this->addSql('ALTER TABLE session_vote DROP FOREIGN KEY FK_9C61854E2A523243');
        $this->addSql('ALTER TABLE votes DROP FOREIGN KEY FK_518B7ACFBFA9F225');
        $this->addSql('ALTER TABLE votes DROP FOREIGN KEY FK_518B7ACFA4392681');
        $this->addSql('DROP TABLE candidats');
        $this->addSql('DROP TABLE session_candidats');
        $this->addSql('DROP TABLE session_vote');
        $this->addSql('DROP TABLE votes');
    }
}
