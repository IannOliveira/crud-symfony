<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200901172841 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acesso (id INT AUTO_INCREMENT NOT NULL, cod_cliente_id INT NOT NULL, cod BIGINT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2FA8F705F56F84EC (cod_cliente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, cod BIGINT NOT NULL, nome VARCHAR(255) NOT NULL, nascimento DATE NOT NULL, cpf VARCHAR(14) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE endereco (id INT AUTO_INCREMENT NOT NULL, cod_cliente_id INT NOT NULL, cod BIGINT NOT NULL, logradouro VARCHAR(500) NOT NULL, numero_imovel INT NOT NULL, complemento VARCHAR(500) DEFAULT NULL, bairro VARCHAR(500) NOT NULL, cidade VARCHAR(500) NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_F8E0D60EF56F84EC (cod_cliente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acesso ADD CONSTRAINT FK_2FA8F705F56F84EC FOREIGN KEY (cod_cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE endereco ADD CONSTRAINT FK_F8E0D60EF56F84EC FOREIGN KEY (cod_cliente_id) REFERENCES cliente (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acesso DROP FOREIGN KEY FK_2FA8F705F56F84EC');
        $this->addSql('ALTER TABLE endereco DROP FOREIGN KEY FK_F8E0D60EF56F84EC');
        $this->addSql('DROP TABLE acesso');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE endereco');
    }
}
