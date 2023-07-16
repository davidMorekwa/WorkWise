<!-- resources/views/admin_dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>

        <!-- Users Table -->
        <h2>Users</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- Add more user fields as needed -->
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <!-- Add more user fields as needed -->
                    </tr>
                @endforeach --}}
            </tbody>
        </table>

        <!-- Job Posts Table -->
        <h2>Job Posts</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <!-- Add more job post fields as needed -->
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($jobPosts as $jobPost)
                    <tr>
                        <td>{{ $jobPost->id }}</td>
                        <td>{{ $jobPost->title }}</td>
                        <td>{{ $jobPost->description }}</td>
                        <!-- Add more job post fields as needed -->
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
@endsection
