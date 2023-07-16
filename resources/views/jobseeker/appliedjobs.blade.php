@extends('layouts.app')

@section('content')
    @if ($applications->isEmpty())
        <h2 style="text-align:center; padding-top:4rem; font-size:1.8rem;">There are no Job postings made yet.
        </h2>
    @else
        @foreach ($applications as $applied)
            <fieldset>
                <div class="card" id="cards">
                    <div style="font-size: 1.6rem;font-weight: 600; color: #894c75;">
                        <p>Job resume: {{ $applied->resume }}</p>
                    </div>
                    {{-- <div style="font-style: italic">
                        <p>Job Type: {{ $applied->type }}</p>
                    </div>
                    <div>
                        <p>OVERVIEW: <br />{!! $applied->overview !!}</p>
                    </div> --}}
                </div>
            </fieldset>
        @endforeach
    @endif
@endsection
