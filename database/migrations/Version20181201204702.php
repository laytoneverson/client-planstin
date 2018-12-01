<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20181201204702 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE app_user (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, member_id INT DEFAULT NULL, admin_of_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, remember_token VARCHAR(255) DEFAULT NULL, INDEX IDX_88BDF3E919EB6921 (client_id), UNIQUE INDEX UNIQ_88BDF3E97597D3FE (member_id), INDEX IDX_88BDF3E9FA275886 (admin_of_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, INDEX IDX_70E4FA7819EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, sf_object_id VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_user ADD CONSTRAINT FK_88BDF3E919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE app_user ADD CONSTRAINT FK_88BDF3E97597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE app_user ADD CONSTRAINT FK_88BDF3E9FA275886 FOREIGN KEY (admin_of_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA7819EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_user DROP FOREIGN KEY FK_88BDF3E97597D3FE');
        $this->addSql('ALTER TABLE app_user DROP FOREIGN KEY FK_88BDF3E919EB6921');
        $this->addSql('ALTER TABLE app_user DROP FOREIGN KEY FK_88BDF3E9FA275886');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA7819EB6921');
        $this->addSql('DROP TABLE app_user');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE client');
    }
}
