<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20181221185934 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact ADD sales_force_update DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE coverage_tier_book ADD sales_force_update DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE coverage_tier_price ADD sales_force_update DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE group_client ADD sales_force_update DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE insurance_plan ADD sales_force_update DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE insurance_plan_copay ADD sales_force_update DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE insurance_plan_feature ADD sales_force_update DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE member ADD sales_force_update DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE prescription_copay ADD sales_force_update DATETIME DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact DROP sales_force_update');
        $this->addSql('ALTER TABLE coverage_tier_book DROP sales_force_update');
        $this->addSql('ALTER TABLE coverage_tier_price DROP sales_force_update');
        $this->addSql('ALTER TABLE group_client DROP sales_force_update');
        $this->addSql('ALTER TABLE insurance_plan DROP sales_force_update');
        $this->addSql('ALTER TABLE insurance_plan_copay DROP sales_force_update');
        $this->addSql('ALTER TABLE insurance_plan_feature DROP sales_force_update');
        $this->addSql('ALTER TABLE member DROP sales_force_update');
        $this->addSql('ALTER TABLE prescription_copay DROP sales_force_update');
    }
}
