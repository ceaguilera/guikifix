<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170422104322 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');
        
        $this->addSql('delete from jobs_status_category;');
        $this->addSql('delete from jobs_types_category');
        $this->addSql('delete from job');

        $this->addSql('ALTER TABLE job DROP CONSTRAINT fk_fbd8e0f8a76ed395');
        $this->addSql('DROP INDEX idx_fbd8e0f8a76ed395');
        $this->addSql('ALTER TABLE job RENAME COLUMN user_id TO user_profile_id');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F86B9DD454 FOREIGN KEY (user_profile_id) REFERENCES user_profile (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_FBD8E0F86B9DD454 ON job (user_profile_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE job DROP CONSTRAINT FK_FBD8E0F86B9DD454');
        $this->addSql('DROP INDEX IDX_FBD8E0F86B9DD454');
        $this->addSql('ALTER TABLE job RENAME COLUMN user_profile_id TO user_id');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT fk_fbd8e0f8a76ed395 FOREIGN KEY (user_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_fbd8e0f8a76ed395 ON job (user_id)');
    }
}
