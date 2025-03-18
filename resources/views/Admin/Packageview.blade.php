@extends('Layouts.AdminMaster')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid text-center">
        <div style="display: flex; float: right; margin-top: 30px">
            <a class="btn btn-secondary" href="{{ route('packages.insert') }}">Add New Package</a>
        </div>
        <h2 style="padding-top: 50px">View All Packages</h2>

        <div class="table-responsive pt-3">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Package Name</th>
                        <th>Amount</th>
                        <th>Days</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $index => $package)
                    <tr>
                        <td class="align-middle">{{ $index + 1 }}</td>
                        <td class="align-middle">{{ $package->packagename }}</td>
                        <td class="align-middle">{{ $package->amount }}</td>
                        <td class="align-middle">{{ $package->days }}</td>
                        <td class="align-middle">{{ $package->description }}</td>
                        <td class="align-middle">{{ $package->created_at }}</td>
                        <td align="center">
                       <a href="{{ route('delete_package', ['packageid' => $package->packageid]) }}"class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this package?')">
        Delete
    </a>
</td>
                        <td class="align-middle">
                            <!-- Edit Package -->
                            <a href="{{ route('packages.edit', $package->packageid) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if(session('success'))
            <div class="alert alert-primary">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>

@endsection
