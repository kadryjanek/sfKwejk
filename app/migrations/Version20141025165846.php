<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141025165846 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rating (id INT AUTO_INCREMENT NOT NULL, created_by INT DEFAULT NULL, mem_id INT DEFAULT NULL, created_at DATETIME NOT NULL, rating SMALLINT NOT NULL, INDEX IDX_D8892622DE12AB56 (created_by), INDEX IDX_D889262243676E6 (mem_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, created_by INT DEFAULT NULL, mem_id INT DEFAULT NULL, created_at DATETIME NOT NULL, comment LONGTEXT NOT NULL, ip VARCHAR(15) NOT NULL, host VARCHAR(255) NOT NULL, user_agent VARCHAR(255) NOT NULL, INDEX IDX_9474526CDE12AB56 (created_by), INDEX IDX_9474526C43676E6 (mem_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mem (id INT AUTO_INCREMENT NOT NULL, created_by INT DEFAULT NULL, created_at DATETIME NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, image_name VARCHAR(255) NOT NULL, is_accepted TINYINT(1) NOT NULL, INDEX IDX_94C70366DE12AB56 (created_by), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D8892622DE12AB56 FOREIGN KEY (created_by) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D889262243676E6 FOREIGN KEY (mem_id) REFERENCES mem (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CDE12AB56 FOREIGN KEY (created_by) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C43676E6 FOREIGN KEY (mem_id) REFERENCES mem (id)');
        $this->addSql('ALTER TABLE mem ADD CONSTRAINT FK_94C70366DE12AB56 FOREIGN KEY (created_by) REFERENCES user (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D8892622DE12AB56');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CDE12AB56');
        $this->addSql('ALTER TABLE mem DROP FOREIGN KEY FK_94C70366DE12AB56');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D889262243676E6');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C43676E6');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE rating');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE mem');
    }
}
