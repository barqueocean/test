<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260626155224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY `FK_47CC8C9264D218E`');
        $this->addSql('DROP TABLE action');
        $this->addSql('ALTER TABLE character_stats ADD thirst INT NOT NULL');
        $this->addSql('ALTER TABLE location ADD code VARCHAR(50) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5E9E89CB77153098 ON location (code)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, code VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, energy_cost INT NOT NULL, hunger_effect INT DEFAULT NULL, health_effect INT DEFAULT NULL, money_effect NUMERIC(10, 2) DEFAULT NULL, skill_required INT DEFAULT NULL, location_id INT NOT NULL, INDEX IDX_47CC8C9264D218E (location_id), UNIQUE INDEX UNIQ_47CC8C9277153098 (code), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT `FK_47CC8C9264D218E` FOREIGN KEY (location_id) REFERENCES location (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE character_stats DROP thirst');
        $this->addSql('DROP INDEX UNIQ_5E9E89CB77153098 ON location');
        $this->addSql('ALTER TABLE location DROP code');
    }
}
