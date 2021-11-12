<?php

namespace App\Http\Controllers;

use App\Models\Propiedade;
use Illuminate\Http\Request;

/**
 * Class PropiedadeController
 * @package App\Http\Controllers
 */
class PropiedadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propiedades = Propiedade::paginate();

        return view('propiedade.index', compact('propiedades'))
            ->with('i', (request()->input('page', 1) - 1) * $propiedades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propiedade = new Propiedade();
        return view('propiedade.create', compact('propiedade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Propiedade::$rules);

        $propiedade = Propiedade::create($request->all());

        return redirect()->route('propiedades.index')
            ->with('success', 'Propiedade created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $propiedade = Propiedade::find($id);

        return view('propiedade.show', compact('propiedade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propiedade = Propiedade::find($id);

        return view('propiedade.edit', compact('propiedade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Propiedade $propiedade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propiedade $propiedade)
    {
        request()->validate(Propiedade::$rules);

        $propiedade->update($request->all());

        return redirect()->route('propiedades.index')
            ->with('success', 'Propiedade updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $propiedade = Propiedade::find($id)->delete();

        return redirect()->route('propiedades.index')
            ->with('success', 'Propiedade deleted successfully');
    }
}
