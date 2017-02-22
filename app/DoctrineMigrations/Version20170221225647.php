<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170221225647 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE job_type_category DROP description');
        $this->addSql('ALTER TABLE job_type_category DROP notifications');
        $this->addSql('ALTER TABLE job_type_category RENAME COLUMN status TO lvl');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE job_type_category ADD description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE job_type_category ADD notifications BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE job_type_category RENAME COLUMN lvl TO status');
    }
}
