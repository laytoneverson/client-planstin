<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20181221065913 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE insurance_plan_copay CHANGE copay_name copay_name VARCHAR(255) DEFAULT NULL, CHANGE service_name service_name VARCHAR(255) DEFAULT NULL, CHANGE out_of_network_price out_of_network_price NUMERIC(10, 0) DEFAULT NULL, CHANGE in_network_price in_network_price NUMERIC(10, 0) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE insurance_plan_copay CHANGE copay_name copay_name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE service_name service_name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE out_of_network_price out_of_network_price NUMERIC(10, 0) NOT NULL, CHANGE in_network_price in_network_price NUMERIC(10, 0) NOT NULL');
    }
}
