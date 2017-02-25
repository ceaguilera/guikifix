<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170225013234 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql("
            CREATE OR REPLACE FUNCTION get_job_type_categories(job_type_id INT) RETURNS json AS $$
            DECLARE
                current_tree RECORD;
                aux_response text;
                aux_text text;
                aux_count int;
                lvl_job_type int;
            BEGIN
                aux_count := 0;
                aux_response := '';

                FOR current_tree IN SELECT * FROM job_type_category as jt WHERE jt.parent_id = job_type_id order by id LOOP

                    aux_text := 
                        ('{\"id\":' || current_tree.id 
                        || ',\"lvl\":' || current_tree.lvl 
                        || ',\"title\":\"' || current_tree.title 
                        || '\",\"children\":' || get_job_type_categories(current_tree.id)
                        || '}');
                
                    IF aux_count = 0 THEN
                        aux_response := aux_response || aux_text;
                        aux_count := aux_count + 1;
                    ELSE
                        aux_response := aux_response || ',' || aux_text;
                    END IF;     
                END LOOP;

                return '[' || aux_response || ']';
            END;
            $$ LANGUAGE plpgsql;
        ");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');
        $this->addSql('DROP FUNCTION IF EXISTS get_job_type_categories(integer)');        
    }
}
