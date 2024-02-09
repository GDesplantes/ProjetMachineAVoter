<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208105624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidats DROP FOREIGN KEY FK_3C663B152A523243');
        $this->addSql('DROP INDEX IDX_3C663B152A523243 ON candidats');
        $this->addSql('ALTER TABLE candidats DROP session_candidats_id');
        $this->addSql('ALTER TABLE session_candidats ADD candidat_id INT NOT NULL, ADD session_id INT NOT NULL');
        $this->addSql('ALTER TABLE session_candidats ADD CONSTRAINT FK_7F847E1F8D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidats (id)');
        $this->addSql('ALTER TABLE session_candidats ADD CONSTRAINT FK_7F847E1F613FECDF FOREIGN KEY (session_id) REFERENCES session_vote (id)');
        $this->addSql('CREATE INDEX IDX_7F847E1F8D0EB82 ON session_candidats (candidat_id)');
        $this->addSql('CREATE INDEX IDX_7F847E1F613FECDF ON session_candidats (session_id)');
        $this->addSql('ALTER TABLE session_vote DROP FOREIGN KEY FK_9C61854E2A523243');
        $this->addSql('DROP INDEX IDX_9C61854E2A523243 ON session_vote');
        $this->addSql('ALTER TABLE session_vote DROP session_candidats_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidats ADD session_candidats_id INT NOT NULL');
        $this->addSql('ALTER TABLE candidats ADD CONSTRAINT FK_3C663B152A523243 FOREIGN KEY (session_candidats_id) REFERENCES session_candidats (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_3C663B152A523243 ON candidats (session_candidats_id)');
        $this->addSql('ALTER TABLE session_candidats DROP FOREIGN KEY FK_7F847E1F8D0EB82');
        $this->addSql('ALTER TABLE session_candidats DROP FOREIGN KEY FK_7F847E1F613FECDF');
        $this->addSql('DROP INDEX IDX_7F847E1F8D0EB82 ON session_candidats');
        $this->addSql('DROP INDEX IDX_7F847E1F613FECDF ON session_candidats');
        $this->addSql('ALTER TABLE session_candidats DROP candidat_id, DROP session_id');
        $this->addSql('ALTER TABLE session_vote ADD session_candidats_id INT NOT NULL');
        $this->addSql('ALTER TABLE session_vote ADD CONSTRAINT FK_9C61854E2A523243 FOREIGN KEY (session_candidats_id) REFERENCES session_candidats (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9C61854E2A523243 ON session_vote (session_candidats_id)');
    }
}
