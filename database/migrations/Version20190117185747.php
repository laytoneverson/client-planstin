<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20190117185747 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE dependent_plan_enrollment (id INT AUTO_INCREMENT NOT NULL, member_dependent_id INT DEFAULT NULL, member_plan_enrollment_id INT DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, sales_force_update DATETIME DEFAULT NULL, INDEX IDX_6CDFA1B65DF2D2CA (member_dependent_id), INDEX IDX_6CDFA1B64054EA63 (member_plan_enrollment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dependent_plan_enrollment ADD CONSTRAINT FK_6CDFA1B65DF2D2CA FOREIGN KEY (member_dependent_id) REFERENCES member_dependent (id)');
        $this->addSql('ALTER TABLE dependent_plan_enrollment ADD CONSTRAINT FK_6CDFA1B64054EA63 FOREIGN KEY (member_plan_enrollment_id) REFERENCES member_plan_entrollment (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE dependent_plan_enrollment');
    }
}
