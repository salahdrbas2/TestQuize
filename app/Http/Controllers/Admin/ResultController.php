<?php

namespace App\Http\Controllers\Admin;

use App\Models\Result;
use App\Models\Question;
use App\Models\Option;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ResultRequest;

class ResultController extends Controller
{
   
    public function index(): View
    {
        $results = Result::all();
        $options = Option::all();
        return view('admin.results.index', compact('results', 'options'));
    }

    

    public function show(Result $result): View
    {
        return view('admin.results.show', compact('result'));
    }

    public function destroy(Result $result): RedirectResponse
    {
        try{
        $result->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

    public function DestroyAll()
    {
        try{
        Result::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }
}
