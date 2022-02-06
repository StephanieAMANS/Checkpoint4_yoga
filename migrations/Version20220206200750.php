<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220206200750 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment_training (equipment_id INT NOT NULL, training_id INT NOT NULL, INDEX IDX_E5D10EA9517FE9FE (equipment_id), INDEX IDX_E5D10EA9BEFD98D1 (training_id), PRIMARY KEY(equipment_id, training_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, url VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_training (user_id INT NOT NULL, training_id INT NOT NULL, INDEX IDX_359F6E8FA76ED395 (user_id), INDEX IDX_359F6E8FBEFD98D1 (training_id), PRIMARY KEY(user_id, training_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment_training ADD CONSTRAINT FK_E5D10EA9517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipment_training ADD CONSTRAINT FK_E5D10EA9BEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_training ADD CONSTRAINT FK_359F6E8FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_training ADD CONSTRAINT FK_359F6E8FBEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipment_training DROP FOREIGN KEY FK_E5D10EA9517FE9FE');
        $this->addSql('ALTER TABLE equipment_training DROP FOREIGN KEY FK_E5D10EA9BEFD98D1');
        $this->addSql('ALTER TABLE user_training DROP FOREIGN KEY FK_359F6E8FBEFD98D1');
        $this->addSql('ALTER TABLE user_training DROP FOREIGN KEY FK_359F6E8FA76ED395');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE equipment_training');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_training');
    }
}
