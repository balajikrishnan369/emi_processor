@extends('admin.dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Process EMIs</h2>
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
    <button class="btn btn-success btn-sm" id="processEmiBtn">
        Process Data 
        <span id="loader" class="spinner-border spinner-border-sm ms-2" role="status" style="display: none;"></span>
    </button>
    <div class="row mt-2">
        <div class="col-md-12">
        @if($emiDetails->isNotEmpty())
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th style="position: sticky;z-index: 2;top: 0; left: 0;background-color: #f8f9fa;">Client ID</th>
                    @foreach($emiDetails->first() as $key => $value)
                        @if($key != 'clientid')
                            <th>{{ $key }}</th>
                        @endif
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($emiDetails as $emi)
                    <tr>
                        <td style="position: sticky;z-index: 2;top: 0; left: 0;background-color: #f8f9fa;">{{ $emi->clientid }}</td>
                        @foreach($emi as $key => $value)
                            @if($key != 'clientid')
                                <td>{{ number_format($value, 2) }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $emiDetails->links('pagination::bootstrap-5') }}
        </div>
        @else
            <p>EMIs are not processed yet</p>
        @endif
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#processEmiBtn').on('click', function(e) {
            e.preventDefault();
            $('#loader').show();
            $.ajax({
                url: '{{ route('process.emi') }}',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(response) {
                    location.href="{{ route('process.emi.index') }}";
                },
                error: function(xhr) {
                    alert('Something went wrong!');
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

@endsection
