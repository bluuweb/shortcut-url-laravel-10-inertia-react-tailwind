<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Rules\UniqueUserUrl;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        // dd($request->all());
        $validated = $request->validate([
            'url' => ['required', 'url', new UniqueUserUrl],
        ]);

        // revisar si la url ya existe
        // $url = $request->user()->urls()->firstWhere('url', $validated['url']);

        // if ($url) {
        //     throw ValidationException::withMessages(['url' => 'URL already exists.']);
        // }

        // generando el short_url
        $validated['short_url'] = substr(md5($request->user()->id . $validated['url']), 0, 5);

        // guardar la url en la base de datos
        $request->user()->urls()->create($validated);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        //
    }
}
