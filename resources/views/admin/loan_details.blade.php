@extends('admin.dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Loans Details</h2>
        <div>
            <span class="mr-3">Welcome, <strong>{{ auth()->user()->name }}</strong></span>
            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table border="1" cellpadding="10" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Client ID</th>
                        <th>Number of Payments</th>
                        <th>First Payment Date</th>
                        <th>Last Payment Date</th>
                        <th>Loan Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($loanDetails as $loan)
                        <tr>
                            <td>{{ $loan->clientid }}</td>
                            <td>{{ $loan->num_of_payment }}</td>
                            <td>{{ \Carbon\Carbon::parse($loan->first_payment_date)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($loan->last_payment_date)->format('Y-m-d') }}</td>
                            <td>₹{{ number_format($loan->loan_amount, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No loan records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
            {{ $loanDetails->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    

@endsection
