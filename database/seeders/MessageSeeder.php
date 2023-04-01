<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        for ($i=1; $i <= 23; $i++) { 
            $newMessage = new Message();
            $newMessage->property_id = $i;
            $newMessage->mail_from = 'nome.cognome@gmail.com';
            $newMessage->name = 'Mario Rossi'.$i;
            $newMessage->subject = 'utente interessato alla casa '.$i;
            $newMessage->body_message = 'Testo di prova per messaggio per la proprietà '. $i;
            $newMessage->displayed = true;
            $newMessage->save();

            $newMessage = new Message();
            $newMessage->property_id = $i;
            $newMessage->mail_from = 'nome.cognome@gmail.com';
            $newMessage->name = 'Mario Rossi'.$i;
            $newMessage->subject = 'utente interessato alla casa '.$i;
            $newMessage->body_message = 'Testo di prova per messaggio per la proprietà '. $i;
            $newMessage->displayed = true;
            $newMessage->save();

            $newMessage = new Message();
            $newMessage->property_id = $i;
            $newMessage->mail_from = 'nome.cognome@gmail.com';
            $newMessage->name = 'Mario Rossi'.$i;
            $newMessage->subject = 'utente interessato alla casa '.$i;
            $newMessage->body_message = 'Testo di prova per messaggio per la proprietà '. $i;
            $newMessage->displayed = false;
            $newMessage->save();

        }
    }
}
