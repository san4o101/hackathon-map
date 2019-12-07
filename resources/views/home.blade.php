@extends('layouts.app')

@section('content')
    @map([
    'lat' => '48.5097',
    'lng' => '32.2656',
    'zoom' => '13',
    'markers' => [[
    'title' => 'yatran',
    'lat' => '48.51207',
    'lng' => '32.26755',
    'url' => 'http://yatran.com/',
    ]],
    ])
@endsection
