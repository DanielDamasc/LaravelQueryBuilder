<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){

        // DELETE - hard delete a client
        DB::table('clients')
        ->where('id', 10)
        ->delete();

        // DELETE - soft delete a client
        DB::table('clients')
        ->where('id', 11)
        ->update([
            'deleted_at' => Carbon::now()
        ]);
        
    }

    private function showRawData($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    private function showDataTable($data)
    {
        echo '<table border="1">';

        echo '<tr>';

        foreach ($data[0] as $key => $value) {
            echo '<th>' . $key . '</th>';
        }

        echo '</tr>';

        foreach ($data as $row) {
            echo '<tr>';
            foreach ($row as $key => $value) {
                echo '<td>' . $value . '</td>';
            }
            echo '</tr>';
        }

        echo '</table>';
    }
}
