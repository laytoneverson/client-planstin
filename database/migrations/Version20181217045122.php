<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20181217045122 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE coverage_tier_book (id INT AUTO_INCREMENT NOT NULL, insurance_plan_id INT DEFAULT NULL, coverage_tier_book_name VARCHAR(255) NOT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, INDEX IDX_62204BCC5B8273E (insurance_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coverage_tier_price (id INT AUTO_INCREMENT NOT NULL, coverage_tier_book_id INT DEFAULT NULL, price_tier_label VARCHAR(255) NOT NULL, employee_price NUMERIC(10, 0) NOT NULL, employee_spouse_price NUMERIC(10, 0) NOT NULL, employee_children_price NUMERIC(10, 0) NOT NULL, employee_family_price NUMERIC(10, 0) NOT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, INDEX IDX_96D6990D6171C70 (coverage_tier_book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE insurance_plan (id INT AUTO_INCREMENT NOT NULL, insurance_plan_display_name VARCHAR(255) NOT NULL, insurance_plan_name VARCHAR(255) NOT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE insurance_plan_copay (id INT AUTO_INCREMENT NOT NULL, insurance_plan_id INT DEFAULT NULL, copay_name VARCHAR(255) NOT NULL, service_name VARCHAR(255) NOT NULL, out_of_network_price NUMERIC(10, 0) NOT NULL, in_network_price NUMERIC(10, 0) NOT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, INDEX IDX_52B4FCD85B8273E (insurance_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE insurance_plan_feature (id INT AUTO_INCREMENT NOT NULL, insurance_plan_id INT DEFAULT NULL, additional_details_link VARCHAR(255) NOT NULL, feature_details LONGTEXT NOT NULL, feature_name VARCHAR(255) NOT NULL, feature_title VARCHAR(255) NOT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, INDEX IDX_5C1CD3F25B8273E (insurance_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prescription_copay (id INT AUTO_INCREMENT NOT NULL, insurance_plan_id INT DEFAULT NULL, drug_tier VARCHAR(255) NOT NULL, copay_name VARCHAR(255) NOT NULL, copay VARCHAR(255) NOT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, INDEX IDX_B7EEBED45B8273E (insurance_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coverage_tier_book ADD CONSTRAINT FK_62204BCC5B8273E FOREIGN KEY (insurance_plan_id) REFERENCES insurance_plan (id)');
        $this->addSql('ALTER TABLE coverage_tier_price ADD CONSTRAINT FK_96D6990D6171C70 FOREIGN KEY (coverage_tier_book_id) REFERENCES coverage_tier_book (id)');
        $this->addSql('ALTER TABLE insurance_plan_copay ADD CONSTRAINT FK_52B4FCD85B8273E FOREIGN KEY (insurance_plan_id) REFERENCES insurance_plan (id)');
        $this->addSql('ALTER TABLE insurance_plan_feature ADD CONSTRAINT FK_5C1CD3F25B8273E FOREIGN KEY (insurance_plan_id) REFERENCES insurance_plan (id)');
        $this->addSql('ALTER TABLE prescription_copay ADD CONSTRAINT FK_B7EEBED45B8273E FOREIGN KEY (insurance_plan_id) REFERENCES insurance_plan (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE coverage_tier_price DROP FOREIGN KEY FK_96D6990D6171C70');
        $this->addSql('ALTER TABLE coverage_tier_book DROP FOREIGN KEY FK_62204BCC5B8273E');
        $this->addSql('ALTER TABLE insurance_plan_copay DROP FOREIGN KEY FK_52B4FCD85B8273E');
        $this->addSql('ALTER TABLE insurance_plan_feature DROP FOREIGN KEY FK_5C1CD3F25B8273E');
        $this->addSql('ALTER TABLE prescription_copay DROP FOREIGN KEY FK_B7EEBED45B8273E');
        $this->addSql('DROP TABLE coverage_tier_book');
        $this->addSql('DROP TABLE coverage_tier_price');
        $this->addSql('DROP TABLE insurance_plan');
        $this->addSql('DROP TABLE insurance_plan_copay');
        $this->addSql('DROP TABLE insurance_plan_feature');
        $this->addSql('DROP TABLE prescription_copay');
    }
}
