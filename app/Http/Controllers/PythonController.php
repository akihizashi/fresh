<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PythonController extends Controller
{
    public function callPython()
    {
        return view('python.form');
    }

    public function runPython(Request $request)
    {
        if ($request->run == 'run') {
            // dump($request->run);
            $cmd = escapeshellcmd('python3 /home/aki/Desktop/Python-lesson/kadai/predict.py');
            $output = shell_exec($cmd);
            dd($cmd);
            return view('python.form', compact('output'));
        }
    }
}
