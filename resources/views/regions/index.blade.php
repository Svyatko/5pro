@extends('layout')

@section('content')
    <div class="container">
        <h2>Regions</h2>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name of Region</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach(json_decode($regions) as $region)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $region->name }}</td>
                    <td>
                        <a href="{{ route('region.show', ['id' => $region->id]) }}">Show</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection