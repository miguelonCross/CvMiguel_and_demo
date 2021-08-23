<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210820102625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE film (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(50) NOT NULL, premiere_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , synopsis CLOB DEFAULT NULL, rating DOUBLE PRECISION DEFAULT NULL, playing_time INTEGER NOT NULL, is_released BOOLEAN NOT NULL, actors CLOB DEFAULT NULL --(DC2Type:json)
        , director VARCHAR(100) DEFAULT NULL, tags CLOB DEFAULT NULL --(DC2Type:array)
        )');
        $this->addSql('CREATE TABLE review (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, film_id INTEGER NOT NULL, user_id INTEGER NOT NULL, description VARCHAR(255) NOT NULL, content CLOB NOT NULL, rating INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_794381C6567F5183 ON review (film_id)');
        $this->addSql('CREATE INDEX IDX_794381C6A76ED395 ON review (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE review');
    }
}
