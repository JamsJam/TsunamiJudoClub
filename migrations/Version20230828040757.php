<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230828040757 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_groupe (user_id INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_61EB971CA76ED395 (user_id), INDEX IDX_61EB971C7A45358C (groupe_id), PRIMARY KEY(user_id, groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_groupe ADD CONSTRAINT FK_61EB971CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_groupe ADD CONSTRAINT FK_61EB971C7A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_user DROP FOREIGN KEY FK_257BA9FE7A45358C');
        $this->addSql('ALTER TABLE groupe_user DROP FOREIGN KEY FK_257BA9FEA76ED395');
        $this->addSql('DROP TABLE groupe_user');
        $this->addSql('DROP INDEX UNIQ_8D93D649D17F50A6 ON user');
        $this->addSql('ALTER TABLE user DROP uuid, CHANGE email email VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupe_user (groupe_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_257BA9FE7A45358C (groupe_id), INDEX IDX_257BA9FEA76ED395 (user_id), PRIMARY KEY(groupe_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE groupe_user ADD CONSTRAINT FK_257BA9FE7A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_user ADD CONSTRAINT FK_257BA9FEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_groupe DROP FOREIGN KEY FK_61EB971CA76ED395');
        $this->addSql('ALTER TABLE user_groupe DROP FOREIGN KEY FK_61EB971C7A45358C');
        $this->addSql('DROP TABLE user_groupe');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user ADD uuid VARCHAR(180) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649D17F50A6 ON user (uuid)');
    }
}
