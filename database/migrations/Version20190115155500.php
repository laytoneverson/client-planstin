<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20190115155500 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE payment_method (id INT AUTO_INCREMENT NOT NULL, group_client_id INT DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_7B61A1F6D95835C0 (group_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, product_subscription_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, display_url VARCHAR(255) DEFAULT NULL, product_family VARCHAR(255) DEFAULT NULL, product_description VARCHAR(255) DEFAULT NULL, product_name VARCHAR(255) DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_D34A04ADA8938241 (product_subscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_feature (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, description VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, additional_details_url VARCHAR(255) DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_CE0E6ED64584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_subscription (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, group_client_id INT DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_2E6246B84584665A (product_id), INDEX IDX_2E6246B8D95835C0 (group_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE payment_method ADD CONSTRAINT FK_7B61A1F6D95835C0 FOREIGN KEY (group_client_id) REFERENCES group_client (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADA8938241 FOREIGN KEY (product_subscription_id) REFERENCES product_subscription (id)');
        $this->addSql('ALTER TABLE product_feature ADD CONSTRAINT FK_CE0E6ED64584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_subscription ADD CONSTRAINT FK_2E6246B84584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_subscription ADD CONSTRAINT FK_2E6246B8D95835C0 FOREIGN KEY (group_client_id) REFERENCES product (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_feature DROP FOREIGN KEY FK_CE0E6ED64584665A');
        $this->addSql('ALTER TABLE product_subscription DROP FOREIGN KEY FK_2E6246B84584665A');
        $this->addSql('ALTER TABLE product_subscription DROP FOREIGN KEY FK_2E6246B8D95835C0');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADA8938241');
        $this->addSql('DROP TABLE payment_method');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_feature');
        $this->addSql('DROP TABLE product_subscription');
    }
}
