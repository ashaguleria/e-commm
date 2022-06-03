<?php

namespace App\Http\Controllers;

use App\Exports\abcExport;
use App\Imports\abcImport;
use App\Models\abc;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use SendGrid;
use SendGrid\Mail\From;
use SendGrid\Mail\Mail;
use SendGrid\Mail\Subject;
use SendGrid\Mail\To;

class ImportController extends Controller
{

// ------------Generate PDF-----------------
    public function download()
    {
        $abc = abc::all();
        return view('Admin.download', compact('abc'));
    }
    public function generatePdf()
    {
        $abc = abc::all();
        $pdf = PDF::loadView('Admin.download', compact('abc'));
        return $pdf->download('abc.pdf');
        return back();
    }
    //-----------end pdf generator------------//

    ////---------------export CSV-------------//
    public function export(Request $request)
    {
        $FromDate = $request->FromDate;
        $ToDate = $request->ToDate;
        // dd($request->all());
       if (!empty($request->FromDate) && !empty($request->ToDate)) {
                $abcs = abc::where('created_at', '>=', $FromDate)->where('created_at', '<=', $ToDate)->get();
                // dd($abcs);
                return Excel::download(new abcExport($abcs), 'users.xlsx');
            } elseif(!empty($request->FromDate)) {
                $abcs = abc::where('created_at', '>=', $FromDate)->get();
                return Excel::download(new abcExport($abcs), 'users.xlsx');
                // dd($abcs);
            }elseif(!empty($request->ToDate)){
                $abcs = abc::where('created_at', '<=', $ToDate)->get();
                return Excel::download(new abcExport($abcs), 'users.xlsx');
            }else{
                return redirect()->back();
            }
    }

    ///-------------------IMPORT CSV FILE------------///
    public function import()
    {
        Excel::import(new abcImport, request()->file('file'));
        return redirect()->back()->with('success', 'Data Imported Successfully');
    }

    //--------------SEND GRID----------------//

    public function sendgrid1()
    {
        $from = new from("rajat.weproinc@gmail.com", "Example User");
        $tos = [
            new To(
                "rajat.weproinc@gmail.com",
                "Example User1",
                [
                    'subject' => 'Subject 1',
                    'name' => 'Rajat Sharma',
                    'location' => 'Liverpool',
                    'course_date' => '2022-06-01',
                    'price' => '₤ 126',
                    'seat' => '12',
                    'payment_status' => 'Succeeded',
                    'location_url' => 'https://maps.google.com/?q=london',
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