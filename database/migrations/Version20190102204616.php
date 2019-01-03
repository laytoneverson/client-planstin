<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20190102204616 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE member_plan_entrollment (id INT AUTO_INCREMENT NOT NULL, member_id INT DEFAULT NULL, insurance_plan_id INT DEFAULT NULL, INDEX IDX_7702AC947597D3FE (member_id), INDEX IDX_7702AC945B8273E (insurance_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE member_plan_entrollment ADD CONSTRAINT FK_7702AC947597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE member_plan_entrollment ADD CONSTRAINT FK_7702AC945B8273E FOREIGN KEY (insurance_plan_id) REFERENCES insurance_plan (id)');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78727ACA70');
        $this->addSql('DROP INDEX IDX_70E4FA78727ACA70 ON member');
        $this->addSql('ALTER TABLE member DROP parent_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE member_plan_entrollment');
        $this->addSql('ALTER TABLE member ADD parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78727ACA70 FOREIGN KEY (parent_id) REFERENCES member (id)');
        $this->addSql('CREATE INDEX IDX_70E4FA78727ACA70 ON member (parent_id)');
    }
}
