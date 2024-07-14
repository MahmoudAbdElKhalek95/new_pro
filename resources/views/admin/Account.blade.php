@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <v-app>
            <div id="app">
                <account-component :user="{{ auth()->user()->id }}" :role="{{ auth()->user()->role }}"></account-component>
            </div>
        </v-app>
    </div>
@endsection
