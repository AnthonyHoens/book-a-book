<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\Publisher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'Guide pratique de choix typographique';

        $book = Book::create([
            'title' => $title,
            'slug' => Str::slug($title),
            'isbn' => '9782911220937',
            'edit_detail' => 'Chaque caractère d\'imprimerie, au-delà de sa forme, possède son propre passé, véhicule un bagage culturel, historique et social, crée par sa seule présence              sur une page, au-delà du sens des mots écrits, une véritable ambiance. De ce fait, il influe directement sur l\'interprétation du texte et implique de la part du                        maquettiste ou du graphiste une bonne connaissance des caractères d\'imprimerie et de ce que leur choix implique. Ce livre a pour but de vous donner toutes les clés qui                   vous permettront d\'effectuer le bon choix typographique en fonction d\'un travail donné, et d\'effectuer une mise en pages pertinente et esthétique. C\'est au total une               soixantaine de typographies qui sont présentées au fil de ces pages ; chaque police de caractères est disséquée, son créateur est présenté, le contexte social est évoqué,               et toutes les connotations impliquées par son utilisation sont mises en avant. On trouvera également un tableau synthétique en fin d\'ouvrage, à base de mots-clés, qui                permettra de trouver simplement et rapidement une ou plusieurs typographies possibles. Enfin, une dizaine de personnalités du monde de la typographie ou de l\'édition,                 parmi lesquelles Erik Spiekermann, Xavier Dupré, Alejandro Paul, Alain Beaulet ou Bas Jacobs ont participe à cet ouvrage en répondant à une question difficile : « Quel est                 votre caractère préféré ? » Il est donc possible de lire ce livre de plusieurs manières : soit en cherchant rapidement la solution à une problématique professionnelle,                 soit en le lisant du début à la fin, en amateur désireux d\'en connaître un peu plus sur ces lettres qu\'on lit sans les voir, sur ces alphabets qui nous sont familiers à              force de les rencontrer dans la rue, dans les journaux, sur les publicités, ces amis intimes à propos desquels on ne sait finalement pas grand-chose. Cette nouvelle                    édition, qui fait suite au succès du premier tirage, a été entièrement revue et augmentée d\'une cinquantaine de pages, avec de nouveaux caractères et les contributions                exclusives de Jim Parkinson, Nick Shinn, Étienne Robial, Jean-Christophe Menu et Bruno Leandri.',
            'stock' => '2',
        ]);

        BookAuthor::create([
           'book_id' => $book->id,
           'author_id' => 1,
        ]);
        BookAuthor::create([
            'book_id' => $book->id,
            'author_id' => 2,
        ]);

        $publishers = [
            'DOD & CIE',
        ];

        foreach ($publishers as $publisher) {
            Publisher::create([
                'book_id' => $book->id,
                'name' => $publisher,
            ]);
        }

        $title = 'Lexique des règles typographiques';

        $book = Book::create([
            'title' => $title,
            'slug' => Str::slug($title),
            'isbn' => '2743304820',
            'edit_detail' => 'Pour ne pas perdre le nord (minuscule en général, majuscule quand il s\'agit de la région d\'un pays) ; pour ne pas donner du mister (Mr) à monsieur (M.) ni de trait d\'union à saint Jacques, sauf quand c\'est le nom d\'une église ( Saint-Jacques-de-Compostelle); pour distinguer le Premier ministre du président de la République, même si l\'un rêve toujours d\'être l\'autre; pour laisser leur minuscule au roi et à l\'empereur sauf en cas de mégalomanie (Napoléon); pour ne pas écrire 1ère mais 1re; pour conserver l\'accent sur les capitales, donc la lisibilité d\'un texte en dépit de toutes les paresses et de toutes les pressions numériques... bref,pour ne pas se perdre, un seul fil d\'Ariane, le Lexique des règles typographiques. C\'est la bible de tous les académiciens quand ils rédigent le Dictionnaire, la règle du jeu de la langue française. Le jeu en vaut la chandelle.',
            'stock' => '3',
        ]);

        BookAuthor::create([
            'book_id' => $book->id,
            'author_id' => 3,
        ]);

        $publishers = [
            'Impr.nationale',
        ];

        foreach ($publishers as $publisher) {
            Publisher::create([
                'book_id' => $book->id,
                'name' => $publisher,
            ]);
        }
        $title = 'HTML 5: Une référence pour le développeur web';

        $book = Book::create([
            'title' => $title,
            'slug' => Str::slug($title),
            'isbn' => '9782212143652',
            'edit_detail' => 'HTML 5 intègre dans sa conception l\'architecture à trois piliers qu\'est HTML pour la structure, CSS 3 pour l\'apparence et JavaScript pour l\'interactivité, avec de nombreuses nouvelles API pour concevoir des applications web. L\'intégrateur ou le développeur web pourra ainsi découvrir et exploiter les standards du Web, pour proposer au sein de sites performants et accessibles des contenus multimédias (animations, audio et vidéo), mais également interactifs (nouveaux formulaires, glisser-déposer, etc.).',
        ]);

        BookAuthor::create([
            'book_id' => $book->id,
            'author_id' => 4,
        ]);

        $publishers = [
            'Eyrolles',
        ];

        foreach ($publishers as $publisher) {
            Publisher::create([
                'book_id' => $book->id,
                'name' => $publisher,
            ]);
        }
    }
}
