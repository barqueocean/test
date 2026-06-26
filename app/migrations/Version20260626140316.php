<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260626140316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE character_item DROP FOREIGN KEY `FK_8E731861136BE75`');
        $this->addSql('ALTER TABLE character_stats DROP FOREIGN KEY `FK_A98480C81136BE75`');

        $this->addSql('DROP TABLE `character`');

        $this->addSql('ALTER TABLE character_item ADD CONSTRAINT FK_8E731861136BE75 FOREIGN KEY (character_id) REFERENCES game_character (id)');
        $this->addSql('ALTER TABLE character_stats ADD CONSTRAINT FK_A98480C81136BE75 FOREIGN KEY (character_id) REFERENCES game_character (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, origin VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, profession VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, day INT NOT NULL, status VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, user_id INT NOT NULL, current_city_id INT DEFAULT NULL, current_location_id INT DEFAULT NULL, INDEX IDX_937AB03421A1E72A (current_city_id), INDEX IDX_937AB034A76ED395 (user_id), INDEX IDX_937AB034B8998A57 (current_location_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE character_item DROP FOREIGN KEY FK_8E731861136BE75');
        $this->addSql('ALTER TABLE character_item ADD CONSTRAINT `FK_8E731861136BE75` FOREIGN KEY (character_id) REFERENCES `character` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE character_stats DROP FOREIGN KEY FK_A98480C81136BE75');
        $this->addSql('ALTER TABLE character_stats ADD CONSTRAINT `FK_A98480C81136BE75` FOREIGN KEY (character_id) REFERENCES `character` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
