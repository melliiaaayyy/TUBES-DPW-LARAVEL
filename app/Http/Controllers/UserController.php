<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function data()
    {
        return DataTables::of(User::query())->toJson();
    }

    public function index()
    {
        Alert::success('Selamat', 'Anda masuk di route User');
        return view('stock.index');
    }
    public function export_excel()
	{
		return Excel::download(new UserExport, 'product.xlsx');
	}
    public function cetak_pdf()
    {
        $Inventory = Inventory::all();

        $pdf = PDF::loadview('pages.user_pdf', ['Inventory' => $Inventory]);
        return $pdf->download('laporan-user.pdf');
    }

}