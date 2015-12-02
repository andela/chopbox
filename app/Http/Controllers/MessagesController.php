<?php

namespace ChopBox\Http\Controllers;

use ChopBox\ChopBox\Repository\MessagesRepository;
use ChopBox\Message;
use ChopBox\Http\Requests;
use Illuminate\Http\Request;
use ChopBox\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @param MessagesRepository $messagesRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, MessagesRepository $messagesRepository)
    {
        if ($request->ajax()) {

            $message = $messagesRepository->sendMessage($request);

            return response()->json($message);
        }
    }

    /**
     * @param MessagesRepository $repo
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(MessagesRepository $repo)
    {
        $messages = $repo->findUserMessage();
        return response()->json($messages->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function senderImage(Request $request)
    {
        return response()->json(['id'=> $request->get('id') ]);
    }
}
