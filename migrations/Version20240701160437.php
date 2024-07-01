<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240701160437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE application (id INT AUTO_INCREMENT NOT NULL, course_id INT DEFAULT NULL, first_name VARCHAR(150) NOT NULL, last_name VARCHAR(150) NOT NULL, tel INT NOT NULL, email VARCHAR(255) NOT NULL, degree VARCHAR(150) NOT NULL, age INT NOT NULL, message LONGTEXT NOT NULL, status VARCHAR(150) NOT NULL, INDEX IDX_A45BDDC1591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(150) NOT NULL, last_name VARCHAR(150) NOT NULL, phone INT NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, discipline_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, capacity INT NOT NULL, description LONGTEXT NOT NULL, duration VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, date DATETIME NOT NULL, degree VARCHAR(255) NOT NULL, financing_support INT NOT NULL, url_image VARCHAR(255) NOT NULL, INDEX IDX_169E6FB9A5522701 (discipline_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discipline (id INT AUTO_INCREMENT NOT NULL, icon VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, url_image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(150) NOT NULL, email VARCHAR(255) NOT NULL, tel INT NOT NULL, degree VARCHAR(150) NOT NULL, birthday DATE NOT NULL, address VARCHAR(200) DEFAULT NULL, avatar_image VARCHAR(255) DEFAULT NULL, formation VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_review (id INT AUTO_INCREMENT NOT NULL, student_id INT DEFAULT NULL, testimonial LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_F7755946CB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC1591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9A5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id)');
        $this->addSql('ALTER TABLE student_review ADD CONSTRAINT FK_F7755946CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC1591CC992');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9A5522701');
        $this->addSql('ALTER TABLE student_review DROP FOREIGN KEY FK_F7755946CB944F1A');
        $this->addSql('DROP TABLE application');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE discipline');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE student_review');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
