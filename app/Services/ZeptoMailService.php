<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZeptoMailService
{
    // public static function sendMail($toEmail, $toName, $subject, $htmlBody)
    // {
    //     $response = Http::withHeaders([
    //         'accept' => 'application/json',
    //         'authorization' => 'Zoho-enczapikey ' . env('ZEPTO_API_KEY'), // Replace with your real API key
    //         'cache-control' => 'no-cache',
    //         'content-type' => 'application/json',
    //     ])->withoutVerifying()
    //         ->post('https://api.zeptomail.com/v1.1/email', [
    //             'from' => [
    //                 'address' => 'noreply@legato-design.com', // your verified email
    //             ],
    //             'to' => [
    //                 [
    //                     'email_address' => [
    //                         'address' => $toEmail,
    //                         'name' => $toName,
    //                     ],
    //                 ],
    //             ],
    //             'subject' => $subject,
    //             'htmlbody' => $htmlBody, 
    //         ]);

    //     return $response->json();
    // }

    public static function sendMail($to, $cc = [], $bcc = [], $subject, $htmlBody)
    {
        $toAddresses = [];
        if (is_array($to)) {
            foreach ($to as $email) {
                $toAddresses[] = ['email_address' => ['address' => $email]];
            }
        } else {
            $toAddresses[] = ['email_address' => ['address' => $to]];
        }

        $ccAddresses = [];
        if (!empty($cc)) {
            foreach ($cc as $email) {
                $ccAddresses[] = ['email_address' => ['address' => $email]];
            }
        }

        $bccAddresses = [];
        if (!empty($bcc)) {
            foreach ($bcc as $email) {
                $bccAddresses[] = ['email_address' => ['address' => $email]];
            }
        }

        $payload = [
            'from' => [
                'address' => 'noreply@legato-design.com',
            ],
            'to' => $toAddresses,
            'subject' => $subject,
            'htmlbody' => $htmlBody,
        ];

        if (!empty($ccAddresses)) {
            $payload['cc'] = $ccAddresses;
        }
        if (!empty($bccAddresses)) {
            $payload['bcc'] = $bccAddresses;
        }

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'authorization' =>  env('ZEPTO_API_KEY'), // change this
            'cache-control' => 'no-cache',
            'content-type' => 'application/json',
        ])->withoutVerifying()->post('https://api.zeptomail.com/v1.1/email', $payload);

        return $response->json();
    }
}
