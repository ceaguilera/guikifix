<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170422175606 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE document ADD job_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document ADD type INT NOT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D8698A76BE04EA9 ON document (job_id)');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT fk_b6bd307fa76ed395');
        $this->addSql('DROP INDEX idx_b6bd307fa76ed395');
        $this->addSql('ALTER TABLE message ADD receiver_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message ADD status INT NOT NULL');
        $this->addSql('ALTER TABLE message ALTER comment TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE message ALTER comment DROP DEFAULT');
        $this->addSql('ALTER TABLE message RENAME COLUMN user_id TO transmitter_user_id');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF9DAB01C FOREIGN KEY (transmitter_user_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FDA57E237 FOREIGN KEY (receiver_user_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_B6BD307FF9DAB01C ON message (transmitter_user_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FDA57E237 ON message (receiver_user_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A76BE04EA9');
        $this->addSql('DROP INDEX IDX_D8698A76BE04EA9');
        $this->addSql('ALTER TABLE document DROP job_id');
        $this->addSql('ALTER TABLE document DROP type');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307FF9DAB01C');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307FDA57E237');
        $this->addSql('DROP INDEX IDX_B6BD307FF9DAB01C');
        $this->addSql('DROP INDEX IDX_B6BD307FDA57E237');
        $this->addSql('ALTER TABLE message ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message DROP transmitter_user_id');
        $this->addSql('ALTER TABLE message DROP receiver_user_id');
        $this->addSql('ALTER TABLE message DROP status');
        $this->addSql('ALTER TABLE message ALTER comment TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE message ALTER comment DROP DEFAULT');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT fk_b6bd307fa76ed395 FOREIGN KEY (user_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_b6bd307fa76ed395 ON message (user_id)');
    }
}
