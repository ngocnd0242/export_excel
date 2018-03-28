<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

class ExportController extends Controller
{

    public function index()
    {
        $tablesBizMenzs = \DB::select("SELECT table_schema,table_name, table_catalog FROM information_schema.tables WHERE table_type = 'BASE TABLE' AND table_schema = 'public' ORDER BY table_name;");
        $tablesDouceCdbs = \DB::connection('pgsql_douce_cdb')->select("SELECT table_schema,table_name, table_catalog FROM information_schema.tables WHERE table_type = 'BASE TABLE' AND table_schema = 'public' ORDER BY table_name;");

        return view('export', compact('tablesBizMenzs', 'tablesDouceCdbs'));
    }

    public function export(Request $request)
    {
        $data = $request->except('_token', 'database', 'limit');
        $connection = $request->get('database');
        $limit = $request->get('limit');

        if (!count($data)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'select a table to export');
        }

        return Excel::create('invoices', function ($excel) use ($data, $connection, $limit) {
            foreach (array_keys($data) as $tableName) {
                $excel->sheet($tableName, function ($sheet) use ($tableName, $connection, $limit) {
                    $dataExport = \DB::connection($connection)->table($tableName)->limit($limit)->get()->toArray();
                    if (count($dataExport)) {
                        $sheet->fromArray(json_decode(json_encode($dataExport), true));
                    }
                });
            }
        })->export('xls');
    }
}