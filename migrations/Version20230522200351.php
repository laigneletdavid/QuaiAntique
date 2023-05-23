<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230522200351 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resarvation DROP FOREIGN KEY FK_C68247AF1E846A69');
        $this->addSql('DROP TABLE resarvation');
        $this->addSql('ALTER TABLE restaurant CHANGE iframe_maps iframe_maps LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE shedule ADD noon_start TIME DEFAULT NULL, ADD noon_end TIME DEFAULT NULL, ADD evening_start TIME DEFAULT NULL, ADD evening_end TIME DEFAULT NULL, DROP period, DROP time, CHANGE day day INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE resarvation (id INT AUTO_INCREMENT NOT NULL, shedule_resa_id INT DEFAULT NULL, INDEX IDX_C68247AF1E846A69 (shedule_resa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE resarvation ADD CONSTRAINT FK_C68247AF1E846A69 FOREIGN KEY (shedule_resa_id) REFERENCES shedule_resa (id)');
        $this->addSql('ALTER TABLE restaurant CHANGE iframe_maps iframe_maps TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE shedule ADD period VARCHAR(255) NOT NULL, ADD time VARCHAR(50) NOT NULL, DROP noon_start, DROP noon_end, DROP evening_start, DROP evening_end, CHANGE day day VARCHAR(255) NOT NULL');
    }
}
