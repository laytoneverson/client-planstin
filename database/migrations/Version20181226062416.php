<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20181226062416 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE group_client_plan_offered (id INT AUTO_INCREMENT NOT NULL, insurance_plan_id INT DEFAULT NULL, group_client_id INT DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_F6027C9F5B8273E (insurance_plan_id), INDEX IDX_F6027C9FD95835C0 (group_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE group_client_plan_offered ADD CONSTRAINT FK_F6027C9F5B8273E FOREIGN KEY (insurance_plan_id) REFERENCES insurance_plan (id)');
        $this->addSql('ALTER TABLE group_client_plan_offered ADD CONSTRAINT FK_F6027C9FD95835C0 FOREIGN KEY (group_client_id) REFERENCES group_client (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE group_client_plan_offered');
    }
}
