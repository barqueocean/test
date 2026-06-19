<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260619155858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game_character (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, origin VARCHAR(20) NOT NULL, profession VARCHAR(30) DEFAULT NULL, day INT NOT NULL, status VARCHAR(20) NOT NULL, current_city_id INT DEFAULT NULL, current_location_id INT DEFAULT NULL, user_id INT NOT NULL, INDEX IDX_41DC713621A1E72A (current_city_id), INDEX IDX_41DC7136B8998A57 (current_location_id), INDEX IDX_41DC7136A76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE game_character ADD CONSTRAINT FK_41DC713621A1E72A FOREIGN KEY (current_city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE game_character ADD CONSTRAINT FK_41DC7136B8998A57 FOREIGN KEY (current_location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE game_character ADD CONSTRAINT FK_41DC7136A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY `FK_937AB03421A1E72A`');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY `FK_937AB034A76ED395`');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY `FK_937AB034B8998A57`');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('ALTER TABLE character_item DROP FOREIGN KEY `FK_8E731861136BE75`');
        $this->addSql('ALTER TABLE character_item ADD CONSTRAINT FK_8E731861136BE75 FOREIGN KEY (character_id) REFERENCES game_character (id)');
        $this->addSql('ALTER TABLE character_stats DROP FOREIGN KEY `FK_A98480C81136BE75`');
        $this->addSql('ALTER TABLE character_stats ADD CONSTRAINT FK_A98480C81136BE75 FOREIGN KEY (character_id) REFERENCES game_character (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, origin VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, profession VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, day INT NOT NULL, status VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, user_id INT NOT NULL, current_city_id INT DEFAULT NULL, current_location_id INT DEFAULT NULL, INDEX IDX_937AB034A76ED395 (user_id), INDEX IDX_937AB03421A1E72A (current_city_id), INDEX IDX_937AB034B8998A57 (current_location_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT `FK_937AB03421A1E72A` FOREIGN KEY (current_city_id) REFERENCES city (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT `FK_937AB034A76ED395` FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT `FK_937AB034B8998A57` FOREIGN KEY (current_location_id) REFERENCES location (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE game_character DROP FOREIGN KEY FK_41DC713621A1E72A');
        $this->addSql('ALTER TABLE game_character DROP FOREIGN KEY FK_41DC7136B8998A57');
        $this->addSql('ALTER TABLE game_character DROP FOREIGN KEY FK_41DC7136A76ED395');
        $this->addSql('DROP TABLE game_character');
        $this->addSql('ALTER TABLE character_item DROP FOREIGN KEY FK_8E731861136BE75');
        $this->addSql('ALTER TABLE character_item ADD CONSTRAINT `FK_8E731861136BE75` FOREIGN KEY (character_id) REFERENCES `character` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE character_stats DROP FOREIGN KEY FK_A98480C81136BE75');
        $this->addSql('ALTER TABLE character_stats ADD CONSTRAINT `FK_A98480C81136BE75` FOREIGN KEY (character_id) REFERENCES `character` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
