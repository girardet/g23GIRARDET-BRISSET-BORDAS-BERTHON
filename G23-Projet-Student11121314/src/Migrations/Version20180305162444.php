<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180305162444 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE perspersonne (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE personneatypeprobleme (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE posposte (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE chamchamps (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE urgurgence (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE manuelprocedure (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE typtypeprobleme (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE ticktickets (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE stastatut (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE valeurstatistique (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE intervention (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE personnecommenteticket (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE statstatistique (id INTEGER NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE perspersonne');
        $this->addSql('DROP TABLE personneatypeprobleme');
        $this->addSql('DROP TABLE posposte');
        $this->addSql('DROP TABLE chamchamps');
        $this->addSql('DROP TABLE urgurgence');
        $this->addSql('DROP TABLE manuelprocedure');
        $this->addSql('DROP TABLE typtypeprobleme');
        $this->addSql('DROP TABLE ticktickets');
        $this->addSql('DROP TABLE stastatut');
        $this->addSql('DROP TABLE valeurstatistique');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE personnecommenteticket');
        $this->addSql('DROP TABLE statstatistique');
    }
}
