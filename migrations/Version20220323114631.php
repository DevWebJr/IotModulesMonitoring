<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220323114631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE log (id INT AUTO_INCREMENT NOT NULL, message VARCHAR(255) NOT NULL, reported_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE log_module (log_id INT NOT NULL, module_id INT NOT NULL, INDEX IDX_19DE758AEA675D86 (log_id), INDEX IDX_19DE758AAFC2B591 (module_id), PRIMARY KEY(log_id, module_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, ip_address VARCHAR(255) NOT NULL, alight TINYINT(1) NOT NULL, functional TINYINT(1) NOT NULL, INDEX IDX_C24262812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE log_module ADD CONSTRAINT FK_19DE758AEA675D86 FOREIGN KEY (log_id) REFERENCES log (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE log_module ADD CONSTRAINT FK_19DE758AAFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C24262812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C24262812469DE2');
        $this->addSql('ALTER TABLE log_module DROP FOREIGN KEY FK_19DE758AEA675D86');
        $this->addSql('ALTER TABLE log_module DROP FOREIGN KEY FK_19DE758AAFC2B591');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE log');
        $this->addSql('DROP TABLE log_module');
        $this->addSql('DROP TABLE module');
    }
}
