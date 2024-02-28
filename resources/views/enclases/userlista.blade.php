@extends('layouts.app')

@section('cargadato')
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($listusers as $listuser )

            <tr>
                <td>{{$listuser->id}}</td>  
                <td>{{$listuser->name}}</td>
                <td>{{$listuser->email}}</td>
                <td>{{$listuser->estado}}</td>
            </tr>
        @endforeach
</table>

@endsection('cargadato');
