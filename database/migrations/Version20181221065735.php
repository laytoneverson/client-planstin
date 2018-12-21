<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20181221065735 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE insurance_plan_feature CHANGE additional_details_link additional_details_link VARCHAR(255) DEFAULT NULL, CHANGE feature_details feature_details LONGTEXT DEFAULT NULL, CHANGE feature_name feature_name VARCHAR(255) DEFAULT NULL, CHANGE feature_title feature_title VARCHAR(255) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE insurance_plan_feature CHANGE additional_details_link additional_details_link VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE feature_details feature_details LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE feature_name feature_name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE feature_title feature_title VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
