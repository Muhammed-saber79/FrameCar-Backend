<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendReplyEmail ($data)
    {
        try {
            Mail::send('mail.users.reply', ['data' => $data], function ($mail) use ($data) {
                $mail->to($data['email'])
                    ->subject('Reply From FrameCar Admin');
            });

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}