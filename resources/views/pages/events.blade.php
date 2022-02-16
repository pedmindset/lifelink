@extends('layouts.home-livewire')

@section('title', 'Upcoming Conferences')

@section('content')

@livewire('pages.tertiary-events', ['eventId' => $eventId])

@endsection
