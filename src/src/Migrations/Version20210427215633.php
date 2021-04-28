<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427215633 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE turma (id INT AUTO_INCREMENT NOT NULL, dia_da_semana VARCHAR(255) NOT NULL, horario VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE turma_aluno (turma_id INT NOT NULL, aluno_id INT NOT NULL, INDEX IDX_D155FB16CEBA2CFD (turma_id), INDEX IDX_D155FB16B2DDF7F4 (aluno_id), PRIMARY KEY(turma_id, aluno_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE turma_aluno ADD CONSTRAINT FK_D155FB16CEBA2CFD FOREIGN KEY (turma_id) REFERENCES turma (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE turma_aluno ADD CONSTRAINT FK_D155FB16B2DDF7F4 FOREIGN KEY (aluno_id) REFERENCES aluno (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE aluno CHANGE unidade_id unidade_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE endereco CHANGE aluno_id aluno_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE turma_aluno DROP FOREIGN KEY FK_D155FB16CEBA2CFD');
        $this->addSql('DROP TABLE turma');
        $this->addSql('DROP TABLE turma_aluno');
        $this->addSql('ALTER TABLE aluno CHANGE unidade_id unidade_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE endereco CHANGE aluno_id aluno_id INT DEFAULT NULL');
    }
}
