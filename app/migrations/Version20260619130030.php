<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260619130030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, origin VARCHAR(20) NOT NULL, profession VARCHAR(30) DEFAULT NULL, day INT NOT NULL, status VARCHAR(20) NOT NULL, user_id INT NOT NULL, INDEX IDX_937AB034A76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE character_stats (id INT AUTO_INCREMENT NOT NULL, hunger INT NOT NULL, energy INT NOT NULL, sleep INT NOT NULL, stress INT NOT NULL, money NUMERIC(10, 2) NOT NULL, skill INT NOT NULL, health INT NOT NULL, motivation INT NOT NULL, hygiene INT NOT NULL, social INT NOT NULL, character_id INT NOT NULL, UNIQUE INDEX UNIQ_A98480C81136BE75 (character_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE character_stats ADD CONSTRAINT FK_A98480C81136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(255) NOT NULL, CHANGE slug slug VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_64C19C1989D9B62 ON category (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034A76ED395');
        $this->addSql('ALTER TABLE character_stats DROP FOREIGN KEY FK_A98480C81136BE75');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE character_stats');
        $this->addSql('DROP INDEX UNIQ_64C19C1989D9B62 ON category');
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE slug slug VARCHAR(255) DEFAULT NULL');
    }
}
