@extends('layouts.app')

@section('title', 'Home')

@section('head')
    @parent
    <script src="js/url-shortener.js"></script>
    <style>
        /* Error Messages Styling */
        .error {
            color: red;
            padding-left: 5px;
        }
        /* Success Messages Styling */
        .success {
            color: green;
            padding-left: 5px;
        }
        .destination {
            width: 234px;
        }
        .slug {
            /* Move the slug text box slightly to the right to make it more obvious it is for the shortened url*/
            margin-left: -2px;
        }
        .title {
            font-weight: bold;
            font-size: 30px;
        }
        /* Set the spacing of the control buttons */
        .controls {
            width: 314px;
        }
        /* float the reset button to the right */
        .reset {
            float: right;
        }
    </style>
@endsection

@section('content')
    <div class="Title">URL Shortener</div>
    <hr/>
    <div class="container">
        <!-- input for destination url-->
        <div class="form-group">
            <label for="destination" class="label">Long URL:</label>
            <input type="text" class="form-control destination" id="destination">
            <span class="error" id="destination-error"></span>
        </div>
        <br/>
        <!-- input for shortened url -->
        <div class="form-group" id="slug-input">
            <label for="slug" class="label" id="slug-label"></label>
            <input type="text" class="form-control slug" id="slug" value="">
            <span class="error" id="slug-error"></span>
        </div>
        <!-- display and copy button for shortened url -->
        <div class="form-group results" id="results" style="display:none">
            <span class="slug-display" id="slug-display"></span>
            <button class="btn far fa-clipboard" id="copy-button"> Copy</button>
            <span class="success" id="copy-success"></span>
        </div>
        <br/>
        <!-- button controls for creating and resetting Form -->
        <div class="form-group controls">
            <button class="btn far" id="create">Submit</button>
            <span class="success" id="create-success"></span>
            <button class="reset btn far" id="create-new">Reset</button>
        </div>
    </div>
@endsection