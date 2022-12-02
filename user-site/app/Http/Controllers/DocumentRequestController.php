<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Mail\MailDocumentRequest;
use App\Http\Requests\DocumentRequestPostRequest;

class DocumentRequestController extends Controller
{
    public function input()
    {
        return view('document_request.input')->with(['bodyId' => 'document-request']);
    }

    public function confirm(DocumentRequestPostRequest $request)
    {
        return view('document_request.confirm')
            ->with(['bodyId' => 'document-request',
                    'inputs' => $request->all()]);
    }

    public function repair(Request $request)
    {
        return redirect()
            ->route('document_request.input')
            ->withInput();
    }

    public function result(Request $request)
    {
        // 二重送信対策
        $request->session()->regenerateToken();

        $inputs = $request->all();

        if (Mail::to($inputs['email'])->send(new MailDocumentRequest($inputs))) {
            $errMsg = 'エラーが発生しました。後ほどもう一度お試しください。';
        }

        return view('document_request.result')
            ->with(['bodyId' => 'document-request',
                    'errMsg' => empty($errMsg) ? $errMsg : '']);
    }
}
