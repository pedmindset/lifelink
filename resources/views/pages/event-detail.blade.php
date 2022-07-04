@extends('layouts.home-livewire')

@section('title', $eventName)

@section('content')

@livewire('pages.event-detail', ['eventId' => $eventId, 'eventName' => $eventName, 'formId' => $formId, 'userId'=>$userId])

@endsection
