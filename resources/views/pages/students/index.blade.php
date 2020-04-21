@extends('layouts.sidebar')
@section('content')
<table>
    @foreach($students as $student)
    <tr><td>{{ $student->user->name }}</td><td>{{ $student->class->name }}</td></tr>
    @endforeach
</table>
@stop
