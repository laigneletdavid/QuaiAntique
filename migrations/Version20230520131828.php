<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230520131828 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dishe (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, visible TINYINT(1) NOT NULL, INDEX IDX_2AF53C6812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formule (id INT AUTO_INCREMENT NOT NULL, content LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, period VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formule_menu (formule_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_369BC4362A68F4D1 (formule_id), INDEX IDX_369BC436CCD7E912 (menu_id), PRIMARY KEY(formule_id, menu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, visible TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, file_name VARCHAR(255) NOT NULL, visible TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, customer_name VARCHAR(255) NOT NULL, customer_phone VARCHAR(10) NOT NULL, nbr_reservation INT NOT NULL, allergy LONGTEXT NOT NULL, reserved_at DATE NOT NULL, reserved_time VARCHAR(5) NOT NULL, validated TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, nbr_place INT NOT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(10) DEFAULT NULL, town VARCHAR(255) DEFAULT NULL, post_code INT DEFAULT NULL, adress_1 VARCHAR(255) DEFAULT NULL, adress_2 VARCHAR(255) DEFAULT NULL, google_maps VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dishe ADD CONSTRAINT FK_2AF53C6812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE formule_menu ADD CONSTRAINT FK_369BC4362A68F4D1 FOREIGN KEY (formule_id) REFERENCES formule (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formule_menu ADD CONSTRAINT FK_369BC436CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dishe DROP FOREIGN KEY FK_2AF53C6812469DE2');
        $this->addSql('ALTER TABLE formule_menu DROP FOREIGN KEY FK_369BC4362A68F4D1');
        $this->addSql('ALTER TABLE formule_menu DROP FOREIGN KEY FK_369BC436CCD7E912');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE dishe');
        $this->addSql('DROP TABLE formule');
        $this->addSql('DROP TABLE formule_menu');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
