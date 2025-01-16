<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){

        // INSERT - add client
        $new_client = [
            'client_name' => 'Daniel Damasceno',
            'email' => 'dan@gmail.com'
        ];
        DB::table('clients')->insert($new_client);

        // INSERT - add multiple clients
        DB::table('clients')
            ->insert([
                [
                    'client_name' => 'Cliente 1',
                    'email' => 'cliente1@gmail.com',
                    'created_at' => Carbon::now()
                ],
                [
                    'client_name' => 'Cliente 2',
                    'email' => 'cliente2@gmail.com',
                    'created_at' => Carbon::now()
                ]
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
