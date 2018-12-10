<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20181207180758 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, member_id INT DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_4C62E6387597D3FE (member_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6387597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE group_client ADD primary_contact_id INT DEFAULT NULL, ADD profile_image_url VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE group_client ADD CONSTRAINT FK_14C2DC85D905C92C FOREIGN KEY (primary_contact_id) REFERENCES contact (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_14C2DC85D905C92C ON group_client (primary_contact_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE group_client DROP FOREIGN KEY FK_14C2DC85D905C92C');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP INDEX UNIQ_14C2DC85D905C92C ON group_client');
        $this->addSql('ALTER TABLE group_client DROP primary_contact_id, DROP profile_image_url');
    }
}
