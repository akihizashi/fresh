<h1>TEST DB</h1>
@isset ($msg, $start, $finish)
    <h4>{{$msg}}</h4>
    {{$start}}
    <br>
    {{$finish}}
@endisset
<form action="/testdb" method="post">
    {{ csrf_field() }}
    <input type="submit" name="add" value="ADD">
</form>
