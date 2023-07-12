@extends('layouts.recruiterLayout')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    #button_job {
        background: #894c75;
        color: white;
        border: none;
        height: 35px;
        border-radius: 7px;
    }

    #job_overview,
    #qualifications,
    #responsibilities {
        height: 140px;
    }
</style>
@section('recruiter-content')
    <div class="card-body">
        <form method="POST" action="{{ route('JobPost.create') }}">
            @csrf
            {{-- Job type --}}
            <div class="row mb-3">
                <label for="job_type" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>

                <div class="col-md-6">
                    <select class="form-select" id="job_type" name="job_type">
                        <option value="full-time">Full Time</option>
                        <option value="internship">Internship</option>
                        <option value="independent contractor">Independent Contractor</option>
                        <option value="Apprenticeship">Apprenticeship</option>
                    </select>
                </div>
            </div>
            {{-- Job Title --}}
            <div class="row mb-3">
                <label for="Job Title" class="col-md-4 col-form-label text-md-end">{{ __('Job Title') }}</label>

                <div class="col-md-6">
                    <input id="job_title" type="text" class="form-control" name="job_title"
                        value="{{ old('job_title') }}" required autocomplete="job_title" autofocus
                        placeholder="e.g. Software Engineer">
                </div>
            </div>
            {{-- Position Title --}}
            <div class="row mb-3">
                <label for="position_title" class="col-md-4 col-form-label text-md-end">{{ __('Position Title') }}</label>

                <div class="col-md-6">
                    <input id="position_title" type="text" class="form-control" name="position_title"
                        value="{{ old('company_website') }}" autocomplete="company_website"
                        placeholder="e.g. Senior Software Engineer">
                </div>
            </div>
            {{-- Overview/Description --}}
            <div class="row mb-3 mt-1">
                <label for="job_overview" class="col-md-4 col-form-label text-md-end">{{ __('Job Description') }}</label>

                <div class="col-md-6">
                    <div id="job_overview" required></div>
                    <textarea name="txt_job_overview" id="txt_job_overview" style="display: none" ></textarea>
                    <script>
                        var jd = new Quill('#job_overview', {
                            theme: 'snow',
                            modules: {
                                toolbar: [
                                    [{
                                        'header': [1, 2, false]
                                    }],
                                    ['bold', 'italic', 'underline', 'strike'],
                                    [{
                                        'list': 'ordered'
                                    }, {
                                        'list': 'bullet'
                                    }],
                                    ['link']
                                ]
                            },
                            placeholder: 'Enter job desription/overview',
                            readOnly: false
                        });
                        var contentInput = document.querySelector('#txt_job_overview');
                        jd.on('text-change', function() {
                            contentInput.value = jd.root.innerHTML;
                            console.log(contentInput);
                        });
                    </script>
                </div>
            </div>
            <br>
            {{-- Qualifications --}}
            <div class="row mb-3 mt-1">
                <label for="qualifications" class="col-md-4 col-form-label text-md-end">{{ __('Qualifiations') }}</label>

                <div class="col-md-6">
                    <div id="qualifications" required></div>
                    <textarea name="txt_qualifications" id="txt_qualifications" style="display: none" ></textarea>
                    <script>
                        var quali = new Quill('#qualifications', {
                            theme: 'snow',
                            modules: {
                                toolbar: [
                                    [{
                                        'header': [1, 2, false]
                                    }],
                                    ['bold', 'italic', 'underline', 'strike'],
                                    [{
                                        'list': 'ordered'
                                    }, {
                                        'list': 'bullet'
                                    }],
                                    ['link']
                                ]
                            },
                            placeholder: 'Enter preferred qualifications',
                            readOnly: false
                        });
                        var qualiInput = document.querySelector('#txt_qualifications');
                        quali.on('text-change', function() {
                            qualiInput.value = quali.root.innerHTML;
                            console.log(qualiInput);
                        });
                    </script>
                </div>
            </div>
            <br>
            {{-- Responsibilities --}}
            <div class="row mb-3">
                <label for="responsibilities"
                    class="col-md-4 col-form-label text-md-end">{{ __('Responsibilities') }}</label>

                <div class="col-md-6">
                    <div id="responsibilities" required></div>
                    <textarea name="txt_responsibilities" id="txt_responsibilities" style="display: none"></textarea>
                    <script>
                        var resp = new Quill('#responsibilities', {
                            theme: 'snow',
                            modules: {
                                toolbar: [
                                    [{
                                        'header': [1, 2, false]
                                    }],
                                    ['bold', 'italic', 'underline', 'strike'],
                                    [{
                                        'list': 'ordered'
                                    }, {
                                        'list': 'bullet'
                                    }],
                                    ['link']
                                ]
                            },
                            placeholder: 'Enter job responsibilites',
                            readOnly: false
                        });
                        var respInput = document.querySelector('#txt_responsibilities');
                        resp.on('text-change', function() {
                            respInput.value = resp.root.innerHTML;
                            console.log(respInput);
                        });
                    </script>
                </div>
            </div>
            <br>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" id="button_job">
                        {{ __('Create Post') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection
