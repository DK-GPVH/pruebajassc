<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;

/**
 * Class TipoDocumentoController
 * @package App\Http\Controllers
 */
class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoDocumentos = TipoDocumento::paginate();

        return view('tipo-documento.index', compact('tipoDocumentos'))
            ->with('i', (request()->input('page', 1) - 1) * $tipoDocumentos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoDocumento = new TipoDocumento();
        return view('tipo-documento.create', compact('tipoDocumento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TipoDocumento::$rules);

        $tipoDocumento = TipoDocumento::create($request->all());

        return redirect()->route('tipo-documentos.index')
            ->with('success', 'TipoDocumento created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoDocumento = TipoDocumento::find($id);

        return view('tipo-documento.show', compact('tipoDocumento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoDocumento = TipoDocumento::find($id);

        return view('tipo-documento.edit', compact('tipoDocumento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TipoDocumento $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoDocumento $tipoDocumento)
    {
        request()->validate(TipoDocumento::$rules);

        $tipoDocumento->update($request->all());

        return redirect()->route('tipo-documentos.index')
            ->with('success', 'TipoDocumento updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoDocumento = TipoDocumento::find($id)->delete();

        return redirect()->route('tipo-documentos.index')
            ->with('success', 'TipoDocumento deleted successfully');
    }
}
