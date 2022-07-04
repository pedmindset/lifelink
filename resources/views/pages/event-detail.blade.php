@extends('layouts.home-livewire')

@section('title', $event->name ?? 'Conference')

@section('content')

@livewire('pages.event-detail', ['event' => $event, 'formId' => $formId, 'userId'=>$userId])

@endsection
