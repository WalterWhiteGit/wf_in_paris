<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180130202921 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D58E09BAB');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DD36A08A1');
        $this->addSql('DROP INDEX IDX_5A8A6C8D58E09BAB ON post');
        $this->addSql('DROP INDEX IDX_5A8A6C8DD36A08A1 ON post');
        $this->addSql('ALTER TABLE post ADD post_id INT DEFAULT NULL, DROP category_id, DROP AuthorId, DROP CategoryId, CHANGE author_id author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DF675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D4B89032C FOREIGN KEY (post_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DF675F31B ON post (author_id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D4B89032C ON post (post_id)');
        $this->addSql('ALTER TABLE author CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE author CHANGE id id SMALLINT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE category CHANGE id id SMALLINT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DF675F31B');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D4B89032C');
        $this->addSql('DROP INDEX IDX_5A8A6C8DF675F31B ON post');
        $this->addSql('DROP INDEX IDX_5A8A6C8D4B89032C ON post');
        $this->addSql('ALTER TABLE post ADD category_id SMALLINT NOT NULL, ADD AuthorId SMALLINT DEFAULT NULL, ADD CategoryId SMALLINT DEFAULT NULL, DROP post_id, CHANGE author_id author_id SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D58E09BAB FOREIGN KEY (AuthorId) REFERENCES author (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DD36A08A1 FOREIGN KEY (CategoryId) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D58E09BAB ON post (AuthorId)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DD36A08A1 ON post (CategoryId)');
    }
}
