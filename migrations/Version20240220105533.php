<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240220105533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF3329A0022');
        $this->addSql('CREATE TABLE application (id INT AUTO_INCREMENT NOT NULL, course_id INT DEFAULT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_A45BDDC1591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE application_student (application_id INT NOT NULL, student_id INT NOT NULL, INDEX IDX_5C9DAA003E030ACD (application_id), INDEX IDX_5C9DAA00CB944F1A (student_id), PRIMARY KEY(application_id, student_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_review (id INT AUTO_INCREMENT NOT NULL, student_id INT NOT NULL, testimonial VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F7755946CB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC1591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE application_student ADD CONSTRAINT FK_5C9DAA003E030ACD FOREIGN KEY (application_id) REFERENCES application (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE application_student ADD CONSTRAINT FK_5C9DAA00CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_review ADD CONSTRAINT FK_F7755946CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE applications DROP FOREIGN KEY FK_F7C966F0591CC992');
        $this->addSql('ALTER TABLE student_reviews DROP FOREIGN KEY FK_84465EF7CB944F1A');
        $this->addSql('DROP TABLE applications');
        $this->addSql('DROP TABLE student_reviews');
        $this->addSql('ALTER TABLE contact CHANGE message message VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE discipline CHANGE name name VARCHAR(255) NOT NULL, CHANGE url_image url_image VARCHAR(1255) NOT NULL');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33591CC992');
        $this->addSql('DROP INDEX IDX_B723AF33591CC992 ON student');
        $this->addSql('DROP INDEX IDX_B723AF3329A0022 ON student');
        $this->addSql('ALTER TABLE student ADD address VARCHAR(200) NOT NULL, DROP course_id, DROP applications_id, DROP adress, CHANGE first_name first_name VARCHAR(255) NOT NULL, CHANGE formation formation VARCHAR(150) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE applications (id INT AUTO_INCREMENT NOT NULL, course_id INT NOT NULL, status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_F7C966F0591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE student_reviews (id INT AUTO_INCREMENT NOT NULL, student_id INT NOT NULL, testimonial VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_84465EF7CB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE applications ADD CONSTRAINT FK_F7C966F0591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE student_reviews ADD CONSTRAINT FK_84465EF7CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC1591CC992');
        $this->addSql('ALTER TABLE application_student DROP FOREIGN KEY FK_5C9DAA003E030ACD');
        $this->addSql('ALTER TABLE application_student DROP FOREIGN KEY FK_5C9DAA00CB944F1A');
        $this->addSql('ALTER TABLE student_review DROP FOREIGN KEY FK_F7755946CB944F1A');
        $this->addSql('DROP TABLE application');
        $this->addSql('DROP TABLE application_student');
        $this->addSql('DROP TABLE student_review');
        $this->addSql('ALTER TABLE contact CHANGE message message LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE discipline CHANGE name name VARCHAR(100) NOT NULL, CHANGE url_image url_image VARCHAR(1255) NOT NULL');
        $this->addSql('ALTER TABLE student ADD course_id INT NOT NULL, ADD applications_id INT NOT NULL, ADD adress VARCHAR(255) NOT NULL, DROP address, CHANGE first_name first_name VARCHAR(150) NOT NULL, CHANGE formation formation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3329A0022 FOREIGN KEY (applications_id) REFERENCES applications (id)');
        $this->addSql('CREATE INDEX IDX_B723AF33591CC992 ON student (course_id)');
        $this->addSql('CREATE INDEX IDX_B723AF3329A0022 ON student (applications_id)');
    }
}
