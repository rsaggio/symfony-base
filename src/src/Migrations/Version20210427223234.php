<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427223234 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE registro_visualizacao (id INT AUTO_INCREMENT NOT NULL, aluno_id INT DEFAULT NULL, hora DATETIME NOT NULL, INDEX IDX_326350E4B2DDF7F4 (aluno_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE registro_visualizacao ADD CONSTRAINT FK_326350E4B2DDF7F4 FOREIGN KEY (aluno_id) REFERENCES aluno (id)');
        $this->addSql('ALTER TABLE aluno CHANGE unidade_id unidade_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE endereco CHANGE aluno_id aluno_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE registro_visualizacao');
        $this->addSql('ALTER TABLE aluno CHANGE unidade_id unidade_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE endereco CHANGE aluno_id aluno_id INT DEFAULT NULL');
    }
}
