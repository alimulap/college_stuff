@extends('m_user/template')
@section('title', 'CRUD User')
@section('content')
    @csrf
    <div class="float-right mb-2">
        <a class="btn btn-success" href="{{ route('m_user.create') }}"> Input User</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th width="20px" class="text-center">User id</th>
                <th width="150px" class="text-center">Level id</th>
                <th width="200px"class="text-center">username</th>
                <th width="200px"class="text-center">nama</th>
                <th width="150px"class="text-center">password</th>
                <th width="280px"class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $m_user)
            <tr>
                <td>{{ $m_user->user_id }}</td>
                <td>{{ $m_user->level_id }}</td>
                <td>{{ $m_user->username }}</td>
                <td>{{ $m_user->nama }}</td>
                <td>{{ $m_user->password }}</td>
                <td class="text-center">
                    <form action="{{ route('m_user.destroy',$m_user->user_id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('m_user.show',$m_user->user_id) }}">Show</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('m_user.edit',$m_user->user_id) }}">Edit</a>
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
