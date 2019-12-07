@extends('layouts.app')

@section('content')
    @map([
    'lat' => '48.134664',
    'lng' => '11.555220',
    'zoom' => '6',
    'markers' => [[
    'title' => 'Go NoWare',
    'lat' => '48.134664',
    'lng' => '11.555220',
    'url' => 'https://gonoware.com',
    ]],
    ])
@endsection
