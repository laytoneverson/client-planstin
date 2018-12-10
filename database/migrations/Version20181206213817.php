<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20181206213817 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE token (id INT AUTO_INCREMENT NOT NULL, token_type VARCHAR(255) NOT NULL, refresh_token VARCHAR(255) NOT NULL, access_token VARCHAR(255) NOT NULL, issue_date DATETIME NOT NULL, id_url VARCHAR(255) NOT NULL, instance_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_client (id INT AUTO_INCREMENT NOT NULL, signup_step VARCHAR(255) DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, group_client_id INT DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, INDEX IDX_70E4FA78D95835C0 (group_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_user (id INT AUTO_INCREMENT NOT NULL, group_client_id INT DEFAULT NULL, member_id INT DEFAULT NULL, admin_of_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, remember_token VARCHAR(255) DEFAULT NULL, INDEX IDX_88BDF3E9D95835C0 (group_client_id), UNIQUE INDEX UNIQ_88BDF3E97597D3FE (member_id), INDEX IDX_88BDF3E9FA275886 (admin_of_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78D95835C0 FOREIGN KEY (group_client_id) REFERENCES group_client (id)');
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

        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78D95835C0');
        $this->addSql('ALTER TABLE app_user DROP FOREIGN KEY FK_88BDF3E9D95835C0');
        $this->addSql('ALTER TABLE app_user DROP FOREIGN KEY FK_88BDF3E9FA275886');
        $this->addSql('ALTER TABLE app_user DROP FOREIGN KEY FK_88BDF3E97597D3FE');
        $this->addSql('DROP TABLE token');
        $this->addSql('DROP TABLE group_client');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE app_user');
    }
}
