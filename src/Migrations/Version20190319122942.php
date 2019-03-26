<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190319122942 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE logboek (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, chauffeur_id INT NOT NULL, truck_id INT NOT NULL, brief_nr INT NOT NULL, datum DATETIME NOT NULL, kubs NUMERIC(10, 2) NOT NULL, laadplaats VARCHAR(255) NOT NULL, vertrektijd TIME NOT NULL, bestemming VARCHAR(255) NOT NULL, evenement VARCHAR(255) DEFAULT NULL, INDEX IDX_13847B9AA76ED395 (user_id), INDEX IDX_13847B9A85C0B3BE (chauffeur_id), INDEX IDX_13847B9AC6957CCE (truck_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE truck (id INT AUTO_INCREMENT NOT NULL, kenteken INT NOT NULL, merk VARCHAR(255) NOT NULL, bouwjaar DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE logboek ADD CONSTRAINT FK_13847B9AA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE logboek ADD CONSTRAINT FK_13847B9A85C0B3BE FOREIGN KEY (chauffeur_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE logboek ADD CONSTRAINT FK_13847B9AC6957CCE FOREIGN KEY (truck_id) REFERENCES truck (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE logboek DROP FOREIGN KEY FK_13847B9AC6957CCE');
        $this->addSql('DROP TABLE logboek');
        $this->addSql('DROP TABLE truck');
    }
}
