<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211013133031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE identifiant_plateforme ADD mdp VARCHAR(255) NOT NULL, DROP mdp_plateforme, CHANGE user_name user_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE plateforme DROP FOREIGN KEY FK_3C020C11FEDEAEF2');
        $this->addSql('DROP INDEX IDX_3C020C11FEDEAEF2 ON plateforme');
        $this->addSql('ALTER TABLE plateforme DROP abonnes_id');
        $this->addSql('ALTER TABLE playlist ADD artiste_playlist VARCHAR(255) DEFAULT NULL, CHANGE duree_playlist duree_playlist VARCHAR(255) DEFAULT NULL, CHANGE nom_playlist nom_playlist VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_nextp ADD is_verified TINYINT(1) NOT NULL, CHANGE nom nom VARCHAR(180) NOT NULL, CHANGE prenom prenom VARCHAR(180) NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE pseudo pseudo VARCHAR(180) NOT NULL, CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', CHANGE mdp password VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4FAE367E86CC499D ON user_nextp (pseudo)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4FAE367E6C6E55B5 ON user_nextp (nom)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4FAE367EA625945B ON user_nextp (prenom)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4FAE367EE7927C74 ON user_nextp (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE identifiant_plateforme ADD mdp_plateforme VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP mdp, CHANGE user_name user_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE plateforme ADD abonnes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plateforme ADD CONSTRAINT FK_3C020C11FEDEAEF2 FOREIGN KEY (abonnes_id) REFERENCES user_nextp (id)');
        $this->addSql('CREATE INDEX IDX_3C020C11FEDEAEF2 ON plateforme (abonnes_id)');
        $this->addSql('ALTER TABLE playlist DROP artiste_playlist, CHANGE nom_playlist nom_playlist VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE duree_playlist duree_playlist DOUBLE PRECISION NOT NULL');
        $this->addSql('DROP INDEX UNIQ_4FAE367E86CC499D ON user_nextp');
        $this->addSql('DROP INDEX UNIQ_4FAE367E6C6E55B5 ON user_nextp');
        $this->addSql('DROP INDEX UNIQ_4FAE367EA625945B ON user_nextp');
        $this->addSql('DROP INDEX UNIQ_4FAE367EE7927C74 ON user_nextp');
        $this->addSql('ALTER TABLE user_nextp DROP is_verified, CHANGE pseudo pseudo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password mdp VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
