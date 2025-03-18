@extends('Layouts.AdminMaster')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h2 style="padding-top: 50px; font-weight: bold; color: #333;">View All Contact Form Submissions</h2>
        </div>

        <div class="table-responsive pt-3">
            <table class="table table-striped table-hover" style="border-collapse: collapse; width: 100%;">
                <thead style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                    <tr>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Index</th> <!-- Changed ID to Index -->
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Name</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Phone Number</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Email</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Message</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Date</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Action</th> <!-- Action column for delete -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $index => $contact)
                    <tr>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $index + 1 }}</td> <!-- Index starts from 1 -->
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $contact->name }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $contact->phone_number }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $contact->email }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $contact->message }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $contact->created_at->format('d-m-Y') }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">
                            <!-- Delete button -->
                            <form action="{{ route('contacts.delete', $contact->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this submission?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination links -->
            <div class="pagination justify-content-center">
                {{ $contacts->links() }}
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-primary mt-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger mt-4">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>

@endsection
