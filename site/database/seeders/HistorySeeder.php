<?php

namespace Database\Seeders;

use App\Models\History;
use App\Models\User;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        $messages = [
            [
                'title' => 'Commande',
                'message' => 'Vos livres sont arrivés à l\'école, ils vous attendent',
            ],
            [
                'title' => 'Commande',
                'message' => 'Le status de votre commande a été modifié à "payé"',
            ],
            [
                'title' => 'Commande',
                'message' => 'Envoi de la commande à Spirlet Xavier',
            ],
            [
                'title' => 'Livres',
                'message' => 'Le livre "Guide pratique de choix typographique" vient d\'être ajouter',
            ],
            [
                'title' => 'Livres',
                'message' => 'Le prix de "Guide pratique de choix typographique" vient de passer de 13.50€ à 12€',
            ],
            [
                'title' => 'Livres',
                'message' => 'Le livre "Guide pratique de choix typographique" vient d\'être supprimer',
            ],
            [
                'title' => 'Spirlet Xavier',
                'message' => 'Vient d\'archiver votre compte, vous pourrez le réactivez à votre prochaine connexion l\'année prochaine',
            ],
        ];

        foreach ($users as $user) {
            $firstmessage = rand(0, count($messages) - 1);
            $secondmessage = rand(0, count($messages) - 1);
            $thirdmessage = rand(0, count($messages) - 1);

            History::create([
                'user_id' => $user->id,
                'title' => $messages[$firstmessage]['title'],
                'message' => $messages[$firstmessage]['message'],
            ]);
            History::create([
                'user_id' => $user->id,
                'title' => $messages[$secondmessage]['title'],
                'message' => $messages[$secondmessage]['message'],
            ]);
            History::create([
                'user_id' => $user->id,
                'title' => $messages[$thirdmessage]['title'],
                'message' => $messages[$thirdmessage]['message'],
            ]);
        }
    }
}
