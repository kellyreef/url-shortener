@extends('layouts.app')

@section('title', 'Home')

@section('content')
<h3>Create Shortlink</h3>
    <div>
        <label>Long URL:</label>
        <input type="text">
    </div>
    <br/>
    <button>Create</button>
@endsection