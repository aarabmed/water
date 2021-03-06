<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191230102953 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bill ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bill ADD CONSTRAINT FK_7A2119E319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_7A2119E319EB6921 ON bill (client_id)');
        $this->addSql('ALTER TABLE water_meter ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE water_meter ADD CONSTRAINT FK_A9F3254719EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_A9F3254719EB6921 ON water_meter (client_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bill DROP FOREIGN KEY FK_7A2119E319EB6921');
        $this->addSql('DROP INDEX IDX_7A2119E319EB6921 ON bill');
        $this->addSql('ALTER TABLE bill DROP client_id');
        $this->addSql('ALTER TABLE water_meter DROP FOREIGN KEY FK_A9F3254719EB6921');
        $this->addSql('DROP INDEX IDX_A9F3254719EB6921 ON water_meter');
        $this->addSql('ALTER TABLE water_meter DROP client_id');
    }
}
