@extends('layouts.app')
<link rel="stylesheet" href="index.css">
@section('content')
    @if ($filters->isEmpty())
        <h3 style="text-align:center;">No Jobs with such description found. <br>
            <a href="/" style="text-align:center; color:red; text-decoration:none;">Try Again</a>
        </h3>
    @else
        @foreach ($filters as $filter)
            <fieldset>
                <div class="card" id="cards">
                    <div style="font-size: 1.3rem;font-weight: 600; color: #894c75;">
                        <h3>Job Title: {{ $filter->job_title }}</h3>
                    </div>
                    <div style="font-style: italic">
                        <h5>Job Type: {{ $filter->type }}</h5>
                    </div>
                    <div>
                        <p>OVERVIEW: <br />{!! $filter->overview !!}</p>
                    </div>
                    @guest
                        <a href="{{ route('login') }}" class="btn-apply" style="text-decoration: none">Apply Now</a>
                    @else
                        <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="organization_id" value="{{ auth()->user()->id }}">
                            <input type="text" hidden name="job_id" id="job_id" value="{{ $organization->id }}"
                                required><br />
                            <input type="file" name="resume" id="resume" value="{{ auth()->user()->cv }}" required>
                            <button type="submit"
                                style="background-color: #556973;color:aliceblue; border: none; padding: 10px 20px; border-radius: 20px; font-size: 16px; cursor: pointer;">Apply</button>
                        </form>

                    </div>
                @endguest
            </fieldset>
        @endforeach
    @endif
@endsection
