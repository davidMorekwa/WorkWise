@extends('layouts.app')

@section('content')
    @if ($applications->isEmpty())
        <h2 style="text-align:center; padding-top:4rem; font-size:1.8rem;">There are no applications made.
        </h2>
    @else
        @foreach ($applications as $applied)
            <fieldset>
                <div class="card" id="cards">
                    <div style="">
                        <p>Job resume: {{ $applied->resume }}</p>
                    </div>
                </div>
            </fieldset>
        @endforeach
    @endif

@endsection
