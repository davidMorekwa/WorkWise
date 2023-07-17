@extends('layouts.app')
<style>
    #cards {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
        width: 50%
    }

    #cards p {
        font-size: 16px;
        margin: 5px 0;
    }
</style>





@section('content')
    @if ($applications->isEmpty())
        <h2 style="text-align:center; padding-top:4rem; font-size:1.8rem;">There are no applications made.
        </h2>
    @else
        <h2 style="text-align:center; font-weight:600; color:#894c75;">Here are the jobs you have applied</h2>
        @foreach ($applications as $applied)
            <fieldset>
                <div style="display:flex; justify-content:center;">
                    <div id="cards">
                        <p>Job Title: {{ $applied->job->job_title }}</p>
                        <p>Job type: {{ $applied->job->type }}</p>
                        <form method="post" action="{{ route('applied.destroy', ['id' => $applied->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="border-radius: 10px;  background-color:#556973; color: aliceblue; border:none; padding:10px; font-weight:500;"
                                onclick="return confirm('Are you sure you want to delete this application?')">Remove
                                Application</button>
                        </form>
                    </div>
                </div>
            </fieldset>
        @endforeach
    @endif

@endsection
