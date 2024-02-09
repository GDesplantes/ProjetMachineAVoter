<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208111400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE votes DROP FOREIGN KEY FK_518B7ACFA4392681');
        $this->addSql('ALTER TABLE votes DROP FOREIGN KEY FK_518B7ACFBFA9F225');
        $this->addSql('DROP INDEX IDX_518B7ACFA4392681 ON votes');
        $this->addSql('DROP INDEX IDX_518B7ACFBFA9F225 ON votes');
        $this->addSql('ALTER TABLE votes ADD candidat_id INT NOT NULL, ADD tour INT NOT NULL, DROP candidat_id_id, DROP session_id_id, CHANGE tour_vote session_id INT NOT NULL');
        $this->addSql('ALTER TABLE votes ADD CONSTRAINT FK_518B7ACF613FECDF FOREIGN KEY (session_id) REFERENCES session_vote (id)');
        $this->addSql('ALTER TABLE votes ADD CONSTRAINT FK_518B7ACF8D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidats (id)');
        $this->addSql('CREATE INDEX IDX_518B7ACF613FECDF ON votes (session_id)');
        $this->addSql('CREATE INDEX IDX_518B7ACF8D0EB82 ON votes (candidat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE votes DROP FOREIGN KEY FK_518B7ACF613FECDF');
        $this->addSql('ALTER TABLE votes DROP FOREIGN KEY FK_518B7ACF8D0EB82');
        $this->addSql('DROP INDEX IDX_518B7ACF613FECDF ON votes');
        $this->addSql('DROP INDEX IDX_518B7ACF8D0EB82 ON votes');
        $this->addSql('ALTER TABLE votes ADD candidat_id_id INT DEFAULT NULL, ADD session_id_id INT DEFAULT NULL, ADD tour_vote INT NOT NULL, DROP session_id, DROP candidat_id, DROP tour');
        $this->addSql('ALTER TABLE votes ADD CONSTRAINT FK_518B7ACFA4392681 FOREIGN KEY (session_id_id) REFERENCES session_vote (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE votes ADD CONSTRAINT FK_518B7ACFBFA9F225 FOREIGN KEY (candidat_id_id) REFERENCES candidats (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_518B7ACFA4392681 ON votes (session_id_id)');
        $this->addSql('CREATE INDEX IDX_518B7ACFBFA9F225 ON votes (candidat_id_id)');
    }
}
