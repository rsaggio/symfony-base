<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210426210706 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE aluno CHANGE unidade_id unidade_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE aluno ADD CONSTRAINT FK_67C97100EDF4B99B FOREIGN KEY (unidade_id) REFERENCES unidade (id)');
        $this->addSql('CREATE INDEX IDX_67C97100EDF4B99B ON aluno (unidade_id)');
        $this->addSql('ALTER TABLE endereco CHANGE aluno_id aluno_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE aluno DROP FOREIGN KEY FK_67C97100EDF4B99B');
        $this->addSql('DROP INDEX IDX_67C97100EDF4B99B ON aluno');
        $this->addSql('ALTER TABLE aluno CHANGE unidade_id unidade_id INT NOT NULL');
        $this->addSql('ALTER TABLE endereco CHANGE aluno_id aluno_id INT DEFAULT NULL');
    }
}
