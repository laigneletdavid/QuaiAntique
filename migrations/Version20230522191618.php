<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522191618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE resarvation (id INT AUTO_INCREMENT NOT NULL, shedule_resa_id INT DEFAULT NULL, INDEX IDX_C68247AF1E846A69 (shedule_resa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE resarvation ADD CONSTRAINT FK_C68247AF1E846A69 FOREIGN KEY (shedule_resa_id) REFERENCES shedule_resa (id)');
        $this->addSql('ALTER TABLE restaurant ADD iframe_maps VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resarvation DROP FOREIGN KEY FK_C68247AF1E846A69');
        $this->addSql('DROP TABLE resarvation');
        $this->addSql('ALTER TABLE restaurant DROP iframe_maps');
    }
}
