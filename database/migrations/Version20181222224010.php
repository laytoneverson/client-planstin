<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20181222224010 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE broker (id INT AUTO_INCREMENT NOT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE group_client ADD broker_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE group_client ADD CONSTRAINT FK_14C2DC856CC064FC FOREIGN KEY (broker_id) REFERENCES broker (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_14C2DC856CC064FC ON group_client (broker_id)');
        $this->addSql('ALTER TABLE member ADD parent_id INT DEFAULT NULL, ADD gender VARCHAR(255) NOT NULL, ADD coverage_type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78727ACA70 FOREIGN KEY (parent_id) REFERENCES member (id)');
        $this->addSql('CREATE INDEX IDX_70E4FA78727ACA70 ON member (parent_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE group_client DROP FOREIGN KEY FK_14C2DC856CC064FC');
        $this->addSql('DROP TABLE broker');
        $this->addSql('DROP INDEX UNIQ_14C2DC856CC064FC ON group_client');
        $this->addSql('ALTER TABLE group_client DROP broker_id');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78727ACA70');
        $this->addSql('DROP INDEX IDX_70E4FA78727ACA70 ON member');
        $this->addSql('ALTER TABLE member DROP parent_id, DROP gender, DROP coverage_type');
    }
}
