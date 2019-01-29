@extends('admin.layouts.master')
@section('content')
    <h2 class="text-center my-5">Orders management</h2>
     <table class="table">
          <tr>
               <th>受注番号</th>
               <th>金額</th>
               <th>受注状況</th>
               <th>処理</th>
          </tr>
          @foreach ($transactions as $transaction)
               <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ number_format($transaction->amount) }}</td>
                    <td>
                         @if ($transaction->status == 0)
                         <span class="badge badge-danger">None</span>
                         @else
                              <span class="badge badge-success"><i data-feather="check"></i></span>
                         @endif 
                    </td>
                    <td><a href="/admin/transactions/{{ $transaction->id }}">Edit</a></td>
               </tr>
          @endforeach
     </table>
    {{-- @foreach ($transactions as $transaction)
       Order No. {{ $transaction->id }} <br>
       Amount: {{ number_format($transaction->amount) }} ￥<br>
       Status: @if ($transaction->status == 0)
                    <span class="badge badge-danger">None</span>
               @else
                    <span class="badge badge-success"><i data-feather="check"></i></span>
               @endif<br>
       <a href="/admin/transactions/{{ $transaction->id }}">Edit</a> <br>
       <hr> --}}
    {{-- @endforeach --}}
    {{ $transactions->links() }}

@endsection