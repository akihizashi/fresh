<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateTime;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(Request $request)
    {
      $datas = $this->getNewsData();
      // dd($datas);
      // dump($datas);
      return view('admin.dash.index', compact('datas'));
    }

    protected function getNewsData()
    {
      $curl = curl_init('https://bcart.jp/news');

      curl_setopt($curl, CURLOPT_URL, "https://bcart.jp/news");

      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

      $data = curl_exec($curl);
      $data_encode = htmlentities($data, ENT_QUOTES | ENT_HTML401 | ENT_SUBSTITUTE | ENT_DISALLOWED, 'UTF-8', true);
      // dd($data);
      // preg_match_all("'<li class=\"row row-zero\">([^<]*)</li>'si", $data, $matches);

      curl_close($curl);

      return $data;
    }
}