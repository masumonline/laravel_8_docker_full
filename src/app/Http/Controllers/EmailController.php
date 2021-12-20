<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails = Email::all();
        return view('emails.index', compact('mails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mailer' => 'required',
            'host' => 'required',
            'port' => 'required',
            'from' => 'required',
            'name' => 'required',
        ]);

        $mail = new Email;
        $mail->mailer = $request->mailer;
        $mail->status = $request->status;
        $mail->host = $request->host;
        $mail->port = $request->port;
        $mail->username = $request->username;
        $mail->password = $request->password;
        $mail->encryption = $request->encryption;
        $mail->from = $request->from;
        $mail->name = $request->name;
        $mail->save();
        return redirect('emails')->with('success', 'Email Setting is Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        return view('emails.edit', compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        $request->validate([
            'mailer' => 'required',
            'host' => 'required',
            'port' => 'required',
            'from' => 'required',
            'name' => 'required',
        ]);

        $email->mailer = $request->mailer;
        $email->status = $request->status;
        $email->host = $request->host;
        $email->port = $request->port;
        $email->username = $request->username;
        $email->password = $request->password;
        $email->encryption = $request->encryption;
        $email->from = $request->from;
        $email->name = $request->name;
        $email->save();
        return redirect('emails')->with('success', 'Email Setting is Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        $email->delete();
        return redirect('emails')->with('warning', 'Email Setting is Deleted!');
    }
}
