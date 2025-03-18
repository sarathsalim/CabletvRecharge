@extends('Layouts.AdminMaster')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h2 style="padding-top: 50px; font-weight: bold; color: #333;">View All Complaints</h2>
        </div>

        <div class="table-responsive pt-3">
            <table class="table table-striped table-hover" style="border-collapse: collapse; width: 100%;">
                <thead style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                    <tr>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">#</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Customer Name</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Smart Card No</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Complaint Date</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Complaint</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Status</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complaints as $index => $complaint)
                    <tr>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $index + 1 }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">
                            {{ $complaint->customer->name ?? 'N/A' }} <!-- Assuming 'customer' relationship is set -->
                        </td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $complaint->smartcardno }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ \Carbon\Carbon::parse($complaint->complaintdate)->format('d-m-Y') }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $complaint->complaint }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $complaint->status }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">
                            <a href="{{ route('complaints.email', $complaint->complaintid) }}" class="btn btn-primary">
                                Send Email
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if(session('status'))
            <div class="alert alert-primary mt-4">
                {{ session('status') }}
            </div>
        @endif
    </div>
</div>

@endsection
