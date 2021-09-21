<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210913161945 extends AbstractMigration
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
        , director VARCHAR(100) DEFAULT NULL, tags CLOB DEFAULT NULL --(DC2Type:json)
        , poster VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE review (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, film_id INTEGER NOT NULL, user_id INTEGER NOT NULL, description VARCHAR(255) NOT NULL, content CLOB NOT NULL, rating INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_794381C6567F5183 ON review (film_id)');
        $this->addSql('CREATE INDEX IDX_794381C6A76ED395 ON review (user_id)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');

        /**
         * USERS
         */
        $this->addSql('INSERT INTO user (email, roles, password) VALUES (\'usuario@gmail.com\', \'[]\', \'$2y$13$J81Hn5KWNahSGEZsxRPBJurTXM8hjj0yEctFuV5pvKABmRd8K/I.K\')');
        $this->addSql('INSERT INTO user (email, roles, password) VALUES (\'admin@gmail.com\', \'["ROLE_ADMIN"]\', \'$2y$13$UWdKKgVp0.XZiSkuRc/Ik.2f7J7sTHdwjQmIMkpTM/LBGdIzhjaOC\')');


        /**
         * FILMS
         */
        $this->addSql('INSERT INTO film (title, premiere_at, synopsis, rating, playing_time, is_released, actors, director, tags, poster) VALUES (\'Origen\', \'2010-01-01 00:00:00\', \'A un ladrón que roba secretos corporativos a través del uso de la tecnología de compartir sueños, se le da la tarea de implantar una idea en la mente de un jefe de una gran empresa.\', NULL, 148, 1, \'[{"name":"Leonardo Di Caprio","photoUrl":"https://upload.wikimedia.org/wikipedia/commons/4/46/Leonardo_Dicaprio_Cannes_2019.jpg"},{"Nombre":"Joseph Gordon-Levitt","photoUrl":"dasd"},{"Nombre":"Elliot Page","photoUrl":"5"}]\', \'Christopher Nolan\', \'["Intriga","Accion","Ciencia ficcion"]\', \'https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/styles/1200/public/media/image/2016/12/origen.jpg?itok=bZMkhYgl\');');
        $this->addSql('INSERT INTO film (title, premiere_at, synopsis, rating, playing_time, is_released, actors, director, tags, poster) VALUES (\'Cruella\', \'2021-01-01 00:00:00\', \'Antes de convertirse en Cruella de Vil, Estella sueña con ser diseñadora de moda, ya que está dotada de talento, innovación y ambición a partes iguales. Pero la vida parece querer asegurarse de que sus sueños nunca se hagan realidad.\', NULL, 134, 1, \'[{"name":"Emma Stone","photoUrl":"https:\\/\\/aws.glamour.es\\/prod\\/designs\\/v1\\/assets\\/620x620\\/611832.jpg"},{"name":"Emma Thompson","photoUrl":null}]\', \'Craig Gillespie\', \'["Ficcion","Drama"]\', \'https://es.web.img3.acsta.net/pictures/21/04/21/11/08/5393301.jpg\');');
        $this->addSql('INSERT INTO film (title, premiere_at, synopsis, rating, playing_time, is_released, actors, director, tags, poster) VALUES (\'Ghost\', \'1990-01-01 00:00:00\', \'Un hombre es asesinado y su espíritu se queda atrás para avisar a su amante del peligro que se aproxima con la ayuda de una médium.\', NULL, 127, 1, \'[{"name":"Patrick Swayze","photoUrl":"https:\\/\\/upload.wikimedia.org\\/wikipedia\\/commons\\/a\\/a1\\/Patrick_Swayze_-_1990_Grammy_Awards_%28cropped%29.jpg"},{"name":"Demi Moore","photoUrl":"https:\\/\\/upload.wikimedia.org\\/wikipedia\\/commons\\/thumb\\/0\\/01\\/Demi_Moore_by_David_Shankbone.jpg\\/1200px-Demi_Moore_by_David_Shankbone.jpg"},{"name":"whoopi goldberg","photoUrl":"https:\\/\\/upload.wikimedia.org\\/wikipedia\\/commons\\/4\\/4b\\/Whoopi_Goldberg_at_a_NYC_No_on_Proposition_8_Rally.jpg"}]\', \'Jerry Zucker\', \'["Romance","Drama","Fantasia"]\', \'https://es.toluna.com//dpolls_images/2017/07/13/dda84f5b-a233-477d-a732-4148db56a85a.jpg\');');
        $this->addSql('INSERT INTO film (title, premiere_at, synopsis, rating, playing_time, is_released, actors, director, tags, poster) VALUES (\'Joker\', \'2019-01-01 00:00:00\', \'En Gotham, Arthur Fleck, un comediante con problemas de salud mental, es marginado y maltratado por la sociedad. Se adentra en una espiral de crimen que resulta revolucionaria. Pronto conoce a su alter-ego, el Joker.\', NULL, 122, 1, \'[{"name":"Joaquin Phoenix","photoUrl":"https:\\/\\/media.revistagq.com\\/photos\\/5e410c5051036000083a6075\\/master\\/pass\\/curiosidades-joaquin-phoenix-oscar.jpg"},{"name":"Robert de Niro","photoUrl":"https:\\/\\/upload.wikimedia.org\\/wikipedia\\/commons\\/5\\/58\\/Robert_De_Niro_Cannes_2016.jpg"},{"name":"Zazie Beetz","photoUrl":"https:\\/\\/es.web.img3.acsta.net\\/pictures\\/19\\/11\\/26\\/23\\/20\\/0444545.jpg"}]\', \'Todd Philips\', \'["Drama","Crimen"]\', \'https://m.media-amazon.com/images/I/51a+Ihr3TJL._AC_SY679_.jpg\');');
        $this->addSql('INSERT INTO film (title, premiere_at, synopsis, rating, playing_time, is_released, actors, director, tags, poster) VALUES (\'La Liga de la Justicia de Zack Snyder\', \'2021-01-01 00:00:00\', \'Bruce Wayne, decidido a asegurar que el último sacrificio de Superman no sea en vano, une sus fuerzas con Diana Prince para reclutar un equipo de metahumanos para proteger al mundo de una inminente amenaza de proporciones catastróficas.\', NULL, 240, 1, \'[{"name":"Henry Cavil","photoUrl":"https:\\/\\/images.chicmagazine.com.mx\\/BS_05T9GXafYxvAwf9KH5P2N3jU=\\/958x596\\/uploads\\/media\\/2021\\/04\\/12\\/natalie-viscuso-brillante-novia-henry.jpg"},{"name":"Ben Affleck","photoUrl":"https:\\/\\/static.wikia.nocookie.net\\/dcextendeduniverse\\/images\\/7\\/7b\\/Ben_Affleck.png\\/revision\\/latest?cb=20201002084901&path-prefix=es"}]\', \'Zack Snyder\', \'["Ciencia ficcion","Fantasia","Aventura"]\', \'https://static.wikia.nocookie.net/doblaje/images/c/c1/Zs-jleague.jpg/revision/latest?cb=20210311134331&path-prefix=es\');');
        $this->addSql('INSERT INTO film (title, premiere_at, synopsis, rating, playing_time, is_released, actors, director, tags, poster) VALUES (\'El Hoyo\', \'2019-01-01 00:00:00\', \'En un mundo distópico, hombres y mujeres son almacenados en una prisión vertical en la que ven descender la comida del día, o lo que queda de ella, dejando a los niveles inferiores hambrientos y radicalizados.\', NULL, 94, 1, \'[{"name":"Ivan Massague","photoUrl":"https:\\/\\/ruthfranco.com\\/wp-content\\/uploads\\/2020\\/07\\/Ivan-Masague-3.jpg"},{"name":"Zorion Eguileor","photoUrl":"https:\\/\\/images.moviefit.me\\/p\\/o\\/168254-zorion-eguileor.jpg"},{"name":"Emilio Buale","photoUrl":"http:\\/\\/mcartistas.com\\/wp-content\\/uploads\\/EMILIO-BUALE-3.jpg"},{"name":"Antonia San Juan","photoUrl":"https:\\/\\/upload.wikimedia.org\\/wikipedia\\/commons\\/1\\/1a\\/Premios_Goya_2018_-_Antonia_San_Juan.jpg"}]\', \'Galder Gaztelu-Urrutia\', \'["Drama","Sci-Fi"]\', \'https://pbs.twimg.com/profile_images/1186555554669514753/gwZmHROF_400x400.jpg\');');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE user');
    }
}
