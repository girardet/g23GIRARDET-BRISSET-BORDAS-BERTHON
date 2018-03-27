<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180324184904 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE manuel_procedure (id INTEGER NOT NULL, nom_procedure CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE valeur_statistique (id INTEGER NOT NULL, tickets_id INTEGER DEFAULT NULL, statistique_id INTEGER DEFAULT NULL, champ1_id INTEGER DEFAULT NULL, champ2_id INTEGER DEFAULT NULL, valeur_stat INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_593A86318FDC0E9A ON valeur_statistique (tickets_id)');
        $this->addSql('CREATE INDEX IDX_593A863176A81463 ON valeur_statistique (statistique_id)');
        $this->addSql('CREATE INDEX IDX_593A863131072A3D ON valeur_statistique (champ1_id)');
        $this->addSql('CREATE INDEX IDX_593A863123B285D3 ON valeur_statistique (champ2_id)');
        $this->addSql('CREATE TABLE type_probleme (id INTEGER NOT NULL, libelle_type CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE etat (id INTEGER NOT NULL, libelle_etat CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE champs (id INTEGER NOT NULL, nom_champ CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE personne_atype_probleme (id INTEGER NOT NULL, type_probleme_id INTEGER DEFAULT NULL, personne_id INTEGER DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5114A96DD61980F ON personne_atype_probleme (type_probleme_id)');
        $this->addSql('CREATE INDEX IDX_5114A96A21BD112 ON personne_atype_probleme (personne_id)');
        $this->addSql('CREATE TABLE personne (id INTEGER NOT NULL, statut_id INTEGER DEFAULT NULL, nom_personne CLOB NOT NULL, email CLOB NOT NULL, username CLOB NOT NULL, password_personne CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FCEC9EFF6203804 ON personne (statut_id)');
        $this->addSql('CREATE TABLE statut (id INTEGER NOT NULL, libelle_statut CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tickets (id INTEGER NOT NULL, etat_id INTEGER DEFAULT NULL, type_probleme_id INTEGER DEFAULT NULL, personne_id INTEGER DEFAULT NULL, poste_id INTEGER DEFAULT NULL, personne_assignee_id INTEGER DEFAULT NULL, urgence_id INTEGER DEFAULT NULL, date_traitement_prevu_ticket DATETIME NOT NULL, chemin_piece_jointe_ticket CLOB NOT NULL, texte_probleme_ticket CLOB NOT NULL, date_resolution DATETIME NOT NULL, date_creation DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_54469DF4D5E86FF ON tickets (etat_id)');
        $this->addSql('CREATE INDEX IDX_54469DF4DD61980F ON tickets (type_probleme_id)');
        $this->addSql('CREATE INDEX IDX_54469DF4A21BD112 ON tickets (personne_id)');
        $this->addSql('CREATE INDEX IDX_54469DF4A0905086 ON tickets (poste_id)');
        $this->addSql('CREATE INDEX IDX_54469DF45E7BB031 ON tickets (personne_assignee_id)');
        $this->addSql('CREATE INDEX IDX_54469DF4578B7FBD ON tickets (urgence_id)');
        $this->addSql('CREATE TABLE intervention (id INTEGER NOT NULL, procedure_id INTEGER DEFAULT NULL, tickets_id INTEGER DEFAULT NULL, date_intervention DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D11814AB1624BCD2 ON intervention (procedure_id)');
        $this->addSql('CREATE INDEX IDX_D11814AB8FDC0E9A ON intervention (tickets_id)');
        $this->addSql('CREATE TABLE commente_ticket (id INTEGER NOT NULL, personne_id INTEGER DEFAULT NULL, tickets_id INTEGER DEFAULT NULL, texte_commente CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_89ED6785A21BD112 ON commente_ticket (personne_id)');
        $this->addSql('CREATE INDEX IDX_89ED67858FDC0E9A ON commente_ticket (tickets_id)');
        $this->addSql('CREATE TABLE statistique (id INTEGER NOT NULL, personne INTEGER NOT NULL, forme_statistique INTEGER NOT NULL, nom_statistique CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE qualification (id INTEGER NOT NULL, type_id INTEGER DEFAULT NULL, nom_prequalification CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B712F0CEC54C8C93 ON qualification (type_id)');
        $this->addSql('CREATE TABLE urgence (id INTEGER NOT NULL, libelle_urgence CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE poste (id INTEGER NOT NULL, code_poste CLOB NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE manuel_procedure');
        $this->addSql('DROP TABLE valeur_statistique');
        $this->addSql('DROP TABLE type_probleme');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE champs');
        $this->addSql('DROP TABLE personne_atype_probleme');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE statut');
        $this->addSql('DROP TABLE tickets');
        $this->addSql('DROP TABLE intervention');
        $this->addSql('DROP TABLE commente_ticket');
        $this->addSql('DROP TABLE statistique');
        $this->addSql('DROP TABLE qualification');
        $this->addSql('DROP TABLE urgence');
        $this->addSql('DROP TABLE poste');
    }
}
