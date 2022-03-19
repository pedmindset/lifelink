@extends('layouts.home-livewire')

@section('title', 'Event')

@section('content')

@livewire('pages.event-detail', ['eventId' => $eventId, 'formId' => $formId, 'userId'=>$userId])

@endsection
