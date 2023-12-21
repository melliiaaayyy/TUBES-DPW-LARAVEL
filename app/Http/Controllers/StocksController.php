<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Stocks;
use Symfony\Component\HttpFoundation\Session\Session;
use Redirect;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Inventory::paginate(10);
        return view('pages.stocks', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'id'=> 'unique:stocks',
            'name'=> 'required'
        ]);
        $data = new Inventory();
        $data->id = $request->id;
        $data->name = $request->name;
        $data->stocks = $request->stocks;
        $data->price = $request->price;
        $data->save();
        
        return Redirect('/stocks')->with('succes', 'berhasil');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Inventory::create($request->all());
        return redirect()->route('pages.create')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

  
    public function edit(Request $request, $id)
    {
        $data = Inventory::where('id',$id)->first();
        return view('pages.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Inventory::where('id',$id)->first();
        $data->id = $request->id;
        $data->name = $request->name;
        $data->stocks = $request->stocks;
        $data->price = $request->price;
        $data->save();
        return Redirect('/stocks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus(Request $request, $id)
    {
        $data = Inventory::where('id',$id);
        $data->delete();
        return Redirect('/stocks');
    }
}