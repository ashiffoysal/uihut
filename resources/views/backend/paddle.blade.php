@extends('layouts.backend')
@section('content')
<x-paddle-button :url="$payLink" class="px-8 py-4" data-theme="none">
    Subscribe
</x-paddle-button>
@endsection
