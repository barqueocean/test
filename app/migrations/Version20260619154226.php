<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260619154226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, code VARCHAR(50) NOT NULL, description LONGTEXT DEFAULT NULL, energy_cost INT NOT NULL, hunger_effect INT DEFAULT NULL, health_effect INT DEFAULT NULL, money_effect NUMERIC(10, 2) DEFAULT NULL, skill_required INT DEFAULT NULL, location_id INT NOT NULL, UNIQUE INDEX UNIQ_47CC8C9277153098 (code), INDEX IDX_47CC8C9264D218E (location_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C9264D218E FOREIGN KEY (location_id) REFERENCES location (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C9264D218E');
        $this->addSql('DROP TABLE action');
    }
}
