<!-- resources/views/admin_dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <style>
        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #556973;

        }

        th {
            background-color: #556973;
            color: aliceblue;
        }

        tr:hover {
            background-color: #894c75;
            color: aliceblue;
        }
    </style>
    <div class="container">
        <h1>Admin Dashboard</h1>

        <!-- Users Table -->
        <h2>Users</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Email Verified At</th>
                    <th>Role Id</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                    <!-- Add more user fields as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->fname }}</td>
                        <td>{{ $user->lname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->email_verified_at }}</td>
                        <td>{{ $user->role_id }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <form method="post" action="{{ route('row.destroy', ['id' => $user->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this User?')">Delete</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Job Posts Table -->
        <h2>Job Posts</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Job Title</th>
                    <th>Job Type</th>
                    <th>Position Title</th>
                    <th>Overview</th>
                    <th>Responsibilites</th>
                    <th>Qualifications</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobposts as $jobPost)
                    <tr>
                        <td>{{ $jobPost->id }}</td>
                        <td>{{ $jobPost->job_title }}</td>
                        <td>{{ $jobPost->type }}</td>
                        <td>{{ $jobPost->position_title }}</td>
                        <td>{{ $jobPost->overview }}</td>
                        <td>{{ $jobPost->responsibilities }}</td>
                        <td>{{ $jobPost->qualifications }}</td>
                        <td>
                            <form method="post" action="{{ route('row.destroy', ['id' => $user->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this Job Post?')">Delete</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
