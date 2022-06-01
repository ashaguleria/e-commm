<?php

namespace App\Http\Controllers;

use App\Exports\abcExport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use SendGrid;
use SendGrid\Mail\From;
use SendGrid\Mail\Mail;
use SendGrid\Mail\Subject;
use SendGrid\Mail\To;

class ImportController extends Controller
{
    public function importview()
    {
        return view("import");
    }
    // public function import()
    // {
    //     Excel::import(new BulkImport, request()->file('file'));

    //     return back();
    // }
    public function export()
    {
        return Excel::download(new abcExport, 'abc-csv.csv');
    }
    public function export1()
    {
        return Excel::download(new UsersExport, 'user-csv.csv');
    }

    // public function sendgrid()
    // {

    //     $sendgrid_apikey = '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';
    //     $sendgrid = new SendGrid($sendgrid_apikey);
    //     $url = 'https://api.sendgrid.com/';
    //     $pass = $sendgrid_apikey;
    //     $template_id = 'd-df36cdc8a3cd432f9abe0d5a5fb0df38';
    //     $js = array(
    //         'sub' => array(':name' => array('Elmer')),
    //         'filters' => array('templates' => array('settings' => array('enable' => 1, 'template_id' => $template_id))),
    //     );
    //     echo json_encode($js);
    //     $params = array(
    //         'to' => "sharma.rajat877@gmail.com",
    //         'toname' => "Elmer Thomas",
    //         'from' => "rajat.weproinc@gmail.com",
    //         'fromname' => "FirstAidGuru",
    //         'subject' => "PHP Test",
    //         'text' => "I'm text!",
    //         'html' => "<strong>I'm HTML!</strong>",
    //         'x-smtpapi' => json_encode($js),
    //     );
    //     $request = $url . 'api/mail.send.json';
    //     $session = curl_init($request);
    //     curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
    //     curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey));
    //     curl_setopt($session, CURLOPT_POST, true);
    //     curl_setopt($session, CURLOPT_POSTFIELDS, $params);
    //     curl_setopt($session, CURLOPT_HEADER, false);
    //     curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    //     $response = curl_exec($session);
    //     curl_close($session);
    //     print_r($response);
    // }

    public function sendgrid1()
    {
        $from = new from("rajat.weproinc@gmail.com", "Example User");

        $tos = [
            new To(
                "sharma.rajat877@gmail.com",
                "Example User1",
                [
                    'subject' => 'Subject 1',
                    'name' => 'Rajat Sharma',
                    'location' => 'Liverpool',
                    'course_date' => '2022-06-01',
                    'price' => '₤ 126',
                    'payment_status' => 'Succeeded',
                ]
            ),

        ];

        $subject = new subject("This Is Dummy Text");

        $email = new Mail(
            $from,
            $tos,
            $subject
        );
        $email->setTemplateId("d-d9724243c1b34528bbc3232f030800dc");
        $sendgrid = new \SendGrid("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");
        try {
            // dd($email);
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            dd($e);
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }

    }
}