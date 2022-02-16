@extends('layouts.home-livewire')

@section('title', 'Tertiary Events')

@section('content')

@livewire('pages.tertiary-events', ['eventId' => $eventId])

@endsection
