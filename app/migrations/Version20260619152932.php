<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260619152932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_item (id INT AUTO_INCREMENT NOT NULL, equipped TINYINT NOT NULL, slot_position VARCHAR(30) DEFAULT NULL, quantity INT NOT NULL, character_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_8E731861136BE75 (character_id), INDEX IDX_8E73186126F525E (item_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, difficulty INT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE game_event (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, background VARCHAR(255) DEFAULT NULL, event_type VARCHAR(30) NOT NULL, min_day INT DEFAULT NULL, max_day INT DEFAULT NULL, required_origin VARCHAR(20) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, slot VARCHAR(30) NOT NULL, durability INT NOT NULL, value NUMERIC(10, 0) NOT NULL, warmth INT DEFAULT NULL, hygiene_bonus INT DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, type VARCHAR(30) NOT NULL, danger_level INT NOT NULL, city_id INT NOT NULL, INDEX IDX_5E9E89CB8BAC62AF (city_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE character_item ADD CONSTRAINT FK_8E731861136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE character_item ADD CONSTRAINT FK_8E73186126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE `character` ADD current_city_id INT DEFAULT NULL, ADD current_location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB03421A1E72A FOREIGN KEY (current_city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034B8998A57 FOREIGN KEY (current_location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_937AB03421A1E72A ON `character` (current_city_id)');
        $this->addSql('CREATE INDEX IDX_937AB034B8998A57 ON `character` (current_location_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_item DROP FOREIGN KEY FK_8E731861136BE75');
        $this->addSql('ALTER TABLE character_item DROP FOREIGN KEY FK_8E73186126F525E');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB8BAC62AF');
        $this->addSql('DROP TABLE character_item');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE game_event');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE location');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB03421A1E72A');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034B8998A57');
        $this->addSql('DROP INDEX IDX_937AB03421A1E72A ON `character`');
        $this->addSql('DROP INDEX IDX_937AB034B8998A57 ON `character`');
        $this->addSql('ALTER TABLE `character` DROP current_city_id, DROP current_location_id');
    }
}
