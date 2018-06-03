<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180603090321 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE restaurant ADD district_id INT DEFAULT NULL, ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FB08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_EB95123FB08FA272 ON restaurant (district_id)');
        $this->addSql('CREATE INDEX IDX_EB95123F12469DE2 ON restaurant (category_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_64C19C15373C966 ON category');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FB08FA272');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F12469DE2');
        $this->addSql('DROP INDEX IDX_EB95123FB08FA272 ON restaurant');
        $this->addSql('DROP INDEX IDX_EB95123F12469DE2 ON restaurant');
        $this->addSql('ALTER TABLE restaurant DROP district_id, DROP category_id');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d649f85e0677 TO UNIQ_8D93D649A188FE64');
    }
}
