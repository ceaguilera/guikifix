<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170310034419 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE user_profile ADD how_contact_us VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_profile ALTER phone DROP NOT NULL');
        $this->addSql('ALTER TABLE user_profile ALTER birthdate DROP NOT NULL');
        $this->addSql('ALTER TABLE user_profile ALTER gender DROP NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_profile DROP how_contact_us');
        $this->addSql('ALTER TABLE user_profile ALTER phone SET NOT NULL');
        $this->addSql('ALTER TABLE user_profile ALTER birthdate SET NOT NULL');
        $this->addSql('ALTER TABLE user_profile ALTER gender SET NOT NULL');
    }
}
