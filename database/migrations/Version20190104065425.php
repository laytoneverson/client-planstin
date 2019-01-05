<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20190104065425 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE token (id INT AUTO_INCREMENT NOT NULL, token_type VARCHAR(255) NOT NULL, refresh_token VARCHAR(255) NOT NULL, access_token VARCHAR(255) NOT NULL, issue_date DATETIME NOT NULL, id_url VARCHAR(255) NOT NULL, instance_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE benefit_plan (id INT AUTO_INCREMENT NOT NULL, plan_family_id INT DEFAULT NULL, benefit_plan_display_name VARCHAR(255) NOT NULL, benefit_plan_name VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, plan_details_link LONGTEXT DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_99A1CD0C7380AB7F (plan_family_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE benefit_plan_copay (id INT AUTO_INCREMENT NOT NULL, benefit_plan_id INT DEFAULT NULL, copay_name VARCHAR(255) DEFAULT NULL, service_name VARCHAR(255) DEFAULT NULL, out_of_network_price NUMERIC(10, 0) DEFAULT NULL, in_network_price NUMERIC(10, 0) DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_91511B69B0DE06B0 (benefit_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE benefit_plan_family (id INT AUTO_INCREMENT NOT NULL, active TINYINT(1) NOT NULL, display_order INT NOT NULL, display_name VARCHAR(255) NOT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE benefit_plan_feature (id INT AUTO_INCREMENT NOT NULL, benefit_plan_id INT DEFAULT NULL, additional_details_link VARCHAR(255) DEFAULT NULL, feature_details LONGTEXT DEFAULT NULL, feature_name VARCHAR(255) DEFAULT NULL, feature_title VARCHAR(255) DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_9FACF835B0DE06B0 (benefit_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE broker (id INT AUTO_INCREMENT NOT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, member_id INT DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_4C62E6387597D3FE (member_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coverage_tier_book (id INT AUTO_INCREMENT NOT NULL, benefit_plan_id INT DEFAULT NULL, coverage_tier_book_name VARCHAR(255) NOT NULL, coverage_tier_label VARCHAR(255) NOT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_62204BCCB0DE06B0 (benefit_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coverage_tier_price (id INT AUTO_INCREMENT NOT NULL, coverage_tier_book_id INT DEFAULT NULL, price_tier_label VARCHAR(255) NOT NULL, employee_price NUMERIC(10, 0) NOT NULL, employee_spouse_price NUMERIC(10, 0) NOT NULL, employee_children_price NUMERIC(10, 0) NOT NULL, employee_family_price NUMERIC(10, 0) NOT NULL, tier_price_name VARCHAR(255) NOT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_96D6990D6171C70 (coverage_tier_book_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_client (id INT AUTO_INCREMENT NOT NULL, broker_id INT DEFAULT NULL, primary_contact_id INT DEFAULT NULL, signup_step VARCHAR(255) DEFAULT NULL, profile_image_url VARCHAR(255) DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_14C2DC856CC064FC (broker_id), UNIQUE INDEX UNIQ_14C2DC85D905C92C (primary_contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_client_plan_offered (id INT AUTO_INCREMENT NOT NULL, benefit_plan_id INT DEFAULT NULL, group_client_id INT DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_F6027C9FB0DE06B0 (benefit_plan_id), INDEX IDX_F6027C9FD95835C0 (group_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, group_client_id INT DEFAULT NULL, gender VARCHAR(255) NOT NULL, coverage_type VARCHAR(255) NOT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_70E4FA78D95835C0 (group_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member_dependent (id INT AUTO_INCREMENT NOT NULL, member_id INT DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_FBB8A1617597D3FE (member_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member_plan_entrollment (id INT AUTO_INCREMENT NOT NULL, member_id INT DEFAULT NULL, benefit_plan_id INT DEFAULT NULL, INDEX IDX_7702AC947597D3FE (member_id), INDEX IDX_7702AC94B0DE06B0 (benefit_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prescription_copay (id INT AUTO_INCREMENT NOT NULL, benefit_plan_id INT DEFAULT NULL, drug_tier VARCHAR(255) NOT NULL, copay_name VARCHAR(255) NOT NULL, copay VARCHAR(255) NOT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_B7EEBED4B0DE06B0 (benefit_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_user (id INT AUTO_INCREMENT NOT NULL, group_client_id INT DEFAULT NULL, member_id INT DEFAULT NULL, admin_of_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, remember_token VARCHAR(255) DEFAULT NULL, INDEX IDX_88BDF3E9D95835C0 (group_client_id), UNIQUE INDEX UNIQ_88BDF3E97597D3FE (member_id), INDEX IDX_88BDF3E9FA275886 (admin_of_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE benefit_plan ADD CONSTRAINT FK_99A1CD0C7380AB7F FOREIGN KEY (plan_family_id) REFERENCES benefit_plan_family (id)');
        $this->addSql('ALTER TABLE benefit_plan_copay ADD CONSTRAINT FK_91511B69B0DE06B0 FOREIGN KEY (benefit_plan_id) REFERENCES benefit_plan (id)');
        $this->addSql('ALTER TABLE benefit_plan_feature ADD CONSTRAINT FK_9FACF835B0DE06B0 FOREIGN KEY (benefit_plan_id) REFERENCES benefit_plan (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6387597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE coverage_tier_book ADD CONSTRAINT FK_62204BCCB0DE06B0 FOREIGN KEY (benefit_plan_id) REFERENCES benefit_plan (id)');
        $this->addSql('ALTER TABLE coverage_tier_price ADD CONSTRAINT FK_96D6990D6171C70 FOREIGN KEY (coverage_tier_book_id) REFERENCES coverage_tier_book (id)');
        $this->addSql('ALTER TABLE group_client ADD CONSTRAINT FK_14C2DC856CC064FC FOREIGN KEY (broker_id) REFERENCES broker (id)');
        $this->addSql('ALTER TABLE group_client ADD CONSTRAINT FK_14C2DC85D905C92C FOREIGN KEY (primary_contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE group_client_plan_offered ADD CONSTRAINT FK_F6027C9FB0DE06B0 FOREIGN KEY (benefit_plan_id) REFERENCES benefit_plan (id)');
        $this->addSql('ALTER TABLE group_client_plan_offered ADD CONSTRAINT FK_F6027C9FD95835C0 FOREIGN KEY (group_client_id) REFERENCES group_client (id)');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78D95835C0 FOREIGN KEY (group_client_id) REFERENCES group_client (id)');
        $this->addSql('ALTER TABLE member_dependent ADD CONSTRAINT FK_FBB8A1617597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE member_plan_entrollment ADD CONSTRAINT FK_7702AC947597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE member_plan_entrollment ADD CONSTRAINT FK_7702AC94B0DE06B0 FOREIGN KEY (benefit_plan_id) REFERENCES benefit_plan (id)');
        $this->addSql('ALTER TABLE prescription_copay ADD CONSTRAINT FK_B7EEBED4B0DE06B0 FOREIGN KEY (benefit_plan_id) REFERENCES benefit_plan (id)');
        $this->addSql('ALTER TABLE app_user ADD CONSTRAINT FK_88BDF3E9D95835C0 FOREIGN KEY (group_client_id) REFERENCES group_client (id)');
        $this->addSql('ALTER TABLE app_user ADD CONSTRAINT FK_88BDF3E97597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE app_user ADD CONSTRAINT FK_88BDF3E9FA275886 FOREIGN KEY (admin_of_id) REFERENCES group_client (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE benefit_plan_copay DROP FOREIGN KEY FK_91511B69B0DE06B0');
        $this->addSql('ALTER TABLE benefit_plan_feature DROP FOREIGN KEY FK_9FACF835B0DE06B0');
        $this->addSql('ALTER TABLE coverage_tier_book DROP FOREIGN KEY FK_62204BCCB0DE06B0');
        $this->addSql('ALTER TABLE group_client_plan_offered DROP FOREIGN KEY FK_F6027C9FB0DE06B0');
        $this->addSql('ALTER TABLE member_plan_entrollment DROP FOREIGN KEY FK_7702AC94B0DE06B0');
        $this->addSql('ALTER TABLE prescription_copay DROP FOREIGN KEY FK_B7EEBED4B0DE06B0');
        $this->addSql('ALTER TABLE benefit_plan DROP FOREIGN KEY FK_99A1CD0C7380AB7F');
        $this->addSql('ALTER TABLE group_client DROP FOREIGN KEY FK_14C2DC856CC064FC');
        $this->addSql('ALTER TABLE group_client DROP FOREIGN KEY FK_14C2DC85D905C92C');
        $this->addSql('ALTER TABLE coverage_tier_price DROP FOREIGN KEY FK_96D6990D6171C70');
        $this->addSql('ALTER TABLE group_client_plan_offered DROP FOREIGN KEY FK_F6027C9FD95835C0');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78D95835C0');
        $this->addSql('ALTER TABLE app_user DROP FOREIGN KEY FK_88BDF3E9D95835C0');
        $this->addSql('ALTER TABLE app_user DROP FOREIGN KEY FK_88BDF3E9FA275886');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6387597D3FE');
        $this->addSql('ALTER TABLE member_dependent DROP FOREIGN KEY FK_FBB8A1617597D3FE');
        $this->addSql('ALTER TABLE member_plan_entrollment DROP FOREIGN KEY FK_7702AC947597D3FE');
        $this->addSql('ALTER TABLE app_user DROP FOREIGN KEY FK_88BDF3E97597D3FE');
        $this->addSql('DROP TABLE token');
        $this->addSql('DROP TABLE benefit_plan');
        $this->addSql('DROP TABLE benefit_plan_copay');
        $this->addSql('DROP TABLE benefit_plan_family');
        $this->addSql('DROP TABLE benefit_plan_feature');
        $this->addSql('DROP TABLE broker');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE coverage_tier_book');
        $this->addSql('DROP TABLE coverage_tier_price');
        $this->addSql('DROP TABLE group_client');
        $this->addSql('DROP TABLE group_client_plan_offered');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE member_dependent');
        $this->addSql('DROP TABLE member_plan_entrollment');
        $this->addSql('DROP TABLE prescription_copay');
        $this->addSql('DROP TABLE app_user');
    }
}
