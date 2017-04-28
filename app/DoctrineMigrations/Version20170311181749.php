<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170311181749 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE job_status_category DROP CONSTRAINT fk_700af176db4fe840');
        $this->addSql('DROP INDEX idx_700af176db4fe840');
        $this->addSql('ALTER TABLE job_status_category DROP notifications');
        $this->addSql('ALTER TABLE job_status_category RENAME COLUMN job_status_category_id TO parent_id');
        $this->addSql('ALTER TABLE job_status_category RENAME COLUMN description TO subtitle');
        $this->addSql('ALTER TABLE job_status_category RENAME COLUMN status TO lvl');
        $this->addSql('ALTER TABLE job_status_category ADD CONSTRAINT FK_700AF176727ACA70 FOREIGN KEY (parent_id) REFERENCES job_status_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_700AF176727ACA70 ON job_status_category (parent_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE job_status_category DROP CONSTRAINT FK_700AF176727ACA70');
        $this->addSql('DROP INDEX IDX_700AF176727ACA70');
        $this->addSql('ALTER TABLE job_status_category ADD notifications BOOLEAN DEFAULT NULL');
        $this->addSql('ALTER TABLE job_status_category RENAME COLUMN parent_id TO job_status_category_id');
        $this->addSql('ALTER TABLE job_status_category RENAME COLUMN subtitle TO description');
        $this->addSql('ALTER TABLE job_status_category RENAME COLUMN lvl TO status');
        $this->addSql('ALTER TABLE job_status_category ADD CONSTRAINT fk_700af176db4fe840 FOREIGN KEY (job_status_category_id) REFERENCES job_status_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_700af176db4fe840 ON job_status_category (job_status_category_id)');
    }
}
