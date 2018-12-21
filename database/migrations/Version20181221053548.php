<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20181221053548 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE coverage_tier_book ADD coverage_tier_label VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE coverage_tier_price ADD tier_price_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE insurance_plan ADD active TINYINT(1) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE coverage_tier_book DROP coverage_tier_label');
        $this->addSql('ALTER TABLE coverage_tier_price DROP tier_price_name');
        $this->addSql('ALTER TABLE insurance_plan DROP active');
    }
}
