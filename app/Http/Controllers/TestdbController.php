<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testdb;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TestdbController extends Controller
{
    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    public function index()
    {
        return view('testdb');
    }
    public function save(Request $request)
    {
        if ($request->add) {
            // code...
            $file = public_path('/csv/bmi_1000.csv');
            //
            $data = $this->csvToArray($file);
            // dd($data);
            // foreach ($data as $element) {
            //     $new_data[] = implode(",", $element);
            // }
            // dd($new_data);
            // $new_data = implode(",", $data);
            // dd($new_data);
            // for ($i = 0; $i < count($data); $i ++)
            // {
            //     $dataArr[] = ['height' => $data[$i]['height'], 'weight' => $data[$i]['weight'], 'label' => $data[$i]['label']];
            // }
            // dd($dataArr);
            $start = date('m-d-Y H:i:').(date('s')+fmod(microtime(true), 1));
            // for($i = 0; $i < 500; $i++) {
                DB::table('testdbs')->insert($data);
                // DB::insert('insert into testdbs (height, weight, label) values(?, ?, ?)', [1, 1, 1]);
            // }
            $finish = date('m-d-Y H:i:').(date('s')+fmod(microtime(true), 1));
            $msg = 'done';
            return view('testdb', compact('msg', 'start', 'finish'));
        } else {
            return 'FALSE';
        }

    }
}
