<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181007073237 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE articles (idarticles INT UNSIGNED AUTO_INCREMENT NOT NULL, users_idusers INT UNSIGNED DEFAULT NULL, title VARCHAR(120) NOT NULL, content TEXT NOT NULL, temps DATETIME DEFAULT NULL, INDEX fk_articles_users_idx (users_idusers), PRIMARY KEY(idarticles)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE great_article (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(150) NOT NULL, texte LONGTEXT NOT NULL, thedate DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (idusers INT UNSIGNED AUTO_INCREMENT NOT NULL, login VARCHAR(45) NOT NULL, pwd VARCHAR(45) NOT NULL, email VARCHAR(100) NOT NULL, UNIQUE INDEX login_UNIQUE (login), PRIMARY KEY(idusers)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD31683286BD3A FOREIGN KEY (users_idusers) REFERENCES users (idusers)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD31683286BD3A');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE great_article');
        $this->addSql('DROP TABLE users');
    }
}
