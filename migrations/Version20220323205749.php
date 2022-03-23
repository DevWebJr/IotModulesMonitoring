<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220323205749 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module CHANGE value value DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C242628EDDF52D FOREIGN KEY (energy_id) REFERENCES energy (id)');
        $this->addSql('CREATE INDEX IDX_C242628EDDF52D ON module (energy_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE energy CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE unit_of_measure unit_of_measure VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE abbreviation abbreviation VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE log CHANGE message message VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C242628EDDF52D');
        $this->addSql('DROP INDEX IDX_C242628EDDF52D ON module');
        $this->addSql('ALTER TABLE module CHANGE item item VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ip_address ip_address VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE value value INT NOT NULL');
    }
}
