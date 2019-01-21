<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20190116175824 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE group_client DROP INDEX UNIQ_14C2DC856CC064FC, ADD INDEX IDX_14C2DC856CC064FC (broker_id)');
        $this->addSql('ALTER TABLE app_user ADD broker_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE app_user ADD CONSTRAINT FK_88BDF3E96CC064FC FOREIGN KEY (broker_id) REFERENCES broker (id)');
        $this->addSql('CREATE INDEX IDX_88BDF3E96CC064FC ON app_user (broker_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_user DROP FOREIGN KEY FK_88BDF3E96CC064FC');
        $this->addSql('DROP INDEX IDX_88BDF3E96CC064FC ON app_user');
        $this->addSql('ALTER TABLE app_user DROP broker_id');
        $this->addSql('ALTER TABLE group_client DROP INDEX IDX_14C2DC856CC064FC, ADD UNIQUE INDEX UNIQ_14C2DC856CC064FC (broker_id)');
    }
}
