<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170217132807 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE budget_category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE job_category_id_seq CASCADE');
        $this->addSql('CREATE TABLE job (id INT NOT NULL, user_id INT DEFAULT NULL, assigned_budget_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, status INT NOT NULL, phone_contact VARCHAR(255) NOT NULL, notifications BOOLEAN NOT NULL, last_update TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FBD8E0F8A76ED395 ON job (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FBD8E0F84F0A131A ON job (assigned_budget_id)');
        $this->addSql('CREATE TABLE jobs_status_category (job_status_id INT NOT NULL, job_status_category_id INT NOT NULL, PRIMARY KEY(job_status_id, job_status_category_id))');
        $this->addSql('CREATE INDEX IDX_8010E3D8AC47EFAC ON jobs_status_category (job_status_id)');
        $this->addSql('CREATE INDEX IDX_8010E3D8DB4FE840 ON jobs_status_category (job_status_category_id)');
        $this->addSql('CREATE TABLE jobs_types_category (job_types_id INT NOT NULL, job_types_category_id INT NOT NULL, PRIMARY KEY(job_types_id, job_types_category_id))');
        $this->addSql('CREATE INDEX IDX_4ED344BAE9F5962C ON jobs_types_category (job_types_id)');
        $this->addSql('CREATE INDEX IDX_4ED344BAE67AA7E2 ON jobs_types_category (job_types_category_id)');
        $this->addSql('CREATE TABLE budget (id INT NOT NULL, qualification_id INT DEFAULT NULL, job_id INT DEFAULT NULL, profesional_profile_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, status INT NOT NULL, notifications BOOLEAN NOT NULL, price DOUBLE PRECISION NOT NULL, last_update TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_73F2F77B1A75EE38 ON budget (qualification_id)');
        $this->addSql('CREATE INDEX IDX_73F2F77BBE04EA9 ON budget (job_id)');
        $this->addSql('CREATE INDEX IDX_73F2F77B9113B2BE ON budget (profesional_profile_id)');
        $this->addSql('CREATE TABLE document (id INT NOT NULL, filaname VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE profesional_plan (id INT NOT NULL, parent_id INT DEFAULT NULL, profesional_profile_id INT DEFAULT NULL, renovation_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, status INT NOT NULL, credit INT NOT NULL, last_update TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_418A058A727ACA70 ON profesional_plan (parent_id)');
        $this->addSql('CREATE INDEX IDX_418A058A9113B2BE ON profesional_plan (profesional_profile_id)');
        $this->addSql('CREATE TABLE qualification (id INT NOT NULL, budget_id INT DEFAULT NULL, user_profile_id INT DEFAULT NULL, comment VARCHAR(255) NOT NULL, quality INT NOT NULL, responsability INT NOT NULL, delivery_time INT NOT NULL, amiability INT NOT NULL, cleaning INT NOT NULL, price INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B712F0CE36ABA6B8 ON qualification (budget_id)');
        $this->addSql('CREATE INDEX IDX_B712F0CE6B9DD454 ON qualification (user_profile_id)');
        $this->addSql('CREATE TABLE message (id INT NOT NULL, user_id INT DEFAULT NULL, budget_id INT DEFAULT NULL, comment TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, last_update TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B6BD307FA76ED395 ON message (user_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F36ABA6B8 ON message (budget_id)');
        $this->addSql('CREATE TABLE plan (id INT NOT NULL, name VARCHAR(255) NOT NULL, credit INT NOT NULL, price DOUBLE PRECISION NOT NULL, access_contact BOOLEAN NOT NULL, rating BOOLEAN NOT NULL, publish_contact BOOLEAN NOT NULL, web BOOLEAN NOT NULL, publicidad BOOLEAN NOT NULL, last_update TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE profesional_profile (id INT NOT NULL, user_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, cell_phone VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, alternative_phone VARCHAR(255) NOT NULL, fax VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, gender INT NOT NULL, last_update TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_93376DC8A76ED395 ON profesional_profile (user_id)');
        $this->addSql('CREATE TABLE job_type_category (id INT NOT NULL, parent_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, status INT NOT NULL, notifications BOOLEAN NOT NULL, last_update TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_606D60F1727ACA70 ON job_type_category (parent_id)');
        $this->addSql('CREATE TABLE location (id INT NOT NULL, parent_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, lvl INT DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5E9E89CB727ACA70 ON location (parent_id)');
        $this->addSql('CREATE TABLE job_status_category (id INT NOT NULL, job_status_category_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, status INT NOT NULL, notifications BOOLEAN NOT NULL, last_update TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_700AF176DB4FE840 ON job_status_category (job_status_category_id)');
        $this->addSql('CREATE TABLE user_profile (id INT NOT NULL, user_id INT DEFAULT NULL, location_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, cell_phone VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, gender INT NOT NULL, last_update TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D95AB405A76ED395 ON user_profile (user_id)');
        $this->addSql('CREATE INDEX IDX_D95AB40564D218E ON user_profile (location_id)');
        $this->addSql('CREATE TABLE fos_user (id INT NOT NULL, user_profile_id INT DEFAULT NULL, profesional_profile_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, roles TEXT NOT NULL, type_user INT DEFAULT 1 NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A647992FC23A8 ON fos_user (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479A0D96FBF ON fos_user (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479C05FB297 ON fos_user (confirmation_token)');
        $this->addSql('CREATE INDEX IDX_957A64796B9DD454 ON fos_user (user_profile_id)');
        $this->addSql('CREATE INDEX IDX_957A64799113B2BE ON fos_user (profesional_profile_id)');
        $this->addSql('COMMENT ON COLUMN fos_user.roles IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F84F0A131A FOREIGN KEY (assigned_budget_id) REFERENCES budget (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE jobs_status_category ADD CONSTRAINT FK_8010E3D8AC47EFAC FOREIGN KEY (job_status_id) REFERENCES job (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE jobs_status_category ADD CONSTRAINT FK_8010E3D8DB4FE840 FOREIGN KEY (job_status_category_id) REFERENCES job_status_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE jobs_types_category ADD CONSTRAINT FK_4ED344BAE9F5962C FOREIGN KEY (job_types_id) REFERENCES job (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE jobs_types_category ADD CONSTRAINT FK_4ED344BAE67AA7E2 FOREIGN KEY (job_types_category_id) REFERENCES job_type_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE budget ADD CONSTRAINT FK_73F2F77B1A75EE38 FOREIGN KEY (qualification_id) REFERENCES qualification (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE budget ADD CONSTRAINT FK_73F2F77BBE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE budget ADD CONSTRAINT FK_73F2F77B9113B2BE FOREIGN KEY (profesional_profile_id) REFERENCES profesional_profile (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE profesional_plan ADD CONSTRAINT FK_418A058A727ACA70 FOREIGN KEY (parent_id) REFERENCES profesional_plan (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE profesional_plan ADD CONSTRAINT FK_418A058A9113B2BE FOREIGN KEY (profesional_profile_id) REFERENCES profesional_profile (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE qualification ADD CONSTRAINT FK_B712F0CE36ABA6B8 FOREIGN KEY (budget_id) REFERENCES budget (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE qualification ADD CONSTRAINT FK_B712F0CE6B9DD454 FOREIGN KEY (user_profile_id) REFERENCES user_profile (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F36ABA6B8 FOREIGN KEY (budget_id) REFERENCES budget (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE profesional_profile ADD CONSTRAINT FK_93376DC8A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE job_type_category ADD CONSTRAINT FK_606D60F1727ACA70 FOREIGN KEY (parent_id) REFERENCES job_type_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB727ACA70 FOREIGN KEY (parent_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE job_status_category ADD CONSTRAINT FK_700AF176DB4FE840 FOREIGN KEY (job_status_category_id) REFERENCES job_status_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB405A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB40564D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fos_user ADD CONSTRAINT FK_957A64796B9DD454 FOREIGN KEY (user_profile_id) REFERENCES user_profile (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fos_user ADD CONSTRAINT FK_957A64799113B2BE FOREIGN KEY (profesional_profile_id) REFERENCES profesional_profile (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE jobs_status_category DROP CONSTRAINT FK_8010E3D8AC47EFAC');
        $this->addSql('ALTER TABLE jobs_types_category DROP CONSTRAINT FK_4ED344BAE9F5962C');
        $this->addSql('ALTER TABLE budget DROP CONSTRAINT FK_73F2F77BBE04EA9');
        $this->addSql('ALTER TABLE job DROP CONSTRAINT FK_FBD8E0F84F0A131A');
        $this->addSql('ALTER TABLE qualification DROP CONSTRAINT FK_B712F0CE36ABA6B8');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307F36ABA6B8');
        $this->addSql('ALTER TABLE profesional_plan DROP CONSTRAINT FK_418A058A727ACA70');
        $this->addSql('ALTER TABLE budget DROP CONSTRAINT FK_73F2F77B1A75EE38');
        $this->addSql('ALTER TABLE budget DROP CONSTRAINT FK_73F2F77B9113B2BE');
        $this->addSql('ALTER TABLE profesional_plan DROP CONSTRAINT FK_418A058A9113B2BE');
        $this->addSql('ALTER TABLE fos_user DROP CONSTRAINT FK_957A64799113B2BE');
        $this->addSql('ALTER TABLE jobs_types_category DROP CONSTRAINT FK_4ED344BAE67AA7E2');
        $this->addSql('ALTER TABLE job_type_category DROP CONSTRAINT FK_606D60F1727ACA70');
        $this->addSql('ALTER TABLE location DROP CONSTRAINT FK_5E9E89CB727ACA70');
        $this->addSql('ALTER TABLE user_profile DROP CONSTRAINT FK_D95AB40564D218E');
        $this->addSql('ALTER TABLE jobs_status_category DROP CONSTRAINT FK_8010E3D8DB4FE840');
        $this->addSql('ALTER TABLE job_status_category DROP CONSTRAINT FK_700AF176DB4FE840');
        $this->addSql('ALTER TABLE qualification DROP CONSTRAINT FK_B712F0CE6B9DD454');
        $this->addSql('ALTER TABLE fos_user DROP CONSTRAINT FK_957A64796B9DD454');
        $this->addSql('ALTER TABLE job DROP CONSTRAINT FK_FBD8E0F8A76ED395');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307FA76ED395');
        $this->addSql('ALTER TABLE profesional_profile DROP CONSTRAINT FK_93376DC8A76ED395');
        $this->addSql('ALTER TABLE user_profile DROP CONSTRAINT FK_D95AB405A76ED395');
        $this->addSql('CREATE SEQUENCE budget_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE job_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE jobs_status_category');
        $this->addSql('DROP TABLE jobs_types_category');
        $this->addSql('DROP TABLE budget');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE profesional_plan');
        $this->addSql('DROP TABLE qualification');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE plan');
        $this->addSql('DROP TABLE profesional_profile');
        $this->addSql('DROP TABLE job_type_category');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE job_status_category');
        $this->addSql('DROP TABLE user_profile');
        $this->addSql('DROP TABLE fos_user');
    }
}
