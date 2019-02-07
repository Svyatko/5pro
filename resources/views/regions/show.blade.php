@extends('layout')

@section('content')
    <div class="container">
        <h2>Address</h2>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Address</th>
            </tr>
            </thead>
            <tbody>
            @foreach(json_decode($address) as $address)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $address->address }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection