@extends('adminlte::page')

@section('title', 'Dashboard | Shoepoint Admin Page')

@section('content_header')
<div class="container-fluid">
    <h1><strong>Dashboard</strong></h1>
</div>
@stop

@section('content')
    <div class="container-fluid">
        {{-- ALERTS --}}
        @if (session('statusType'))
            @if(session('statusType') == 'success')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('statusMsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @else
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('statusMsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        @endif
        
        <div class="row">
            <div class="col-md-6">
                <canvas id="myChart" width="400" height="180"></canvas>
                <script>
                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Transaction per Month',
                            data: [23, 19, 27, 15, 30, 31],
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)',
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 0.75)',
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
                </script>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Visitor Today</h3>
                    </div>
                    <div class="card-body">
                        <h1>15</h1>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3>New Order(s)</h3>
                    </div>
                    <div class="card-body">
                        <h1>3</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3>This Month's Revenue</h3>
                    </div>
                    <div class="card-body">
                        <h1>IDR 1.565.000</h1>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3>Order in Process</h3>
                    </div>
                    <div class="card-body">
                        <h1>3</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <canvas id="myChart1" width="400" height="180"></canvas>
                <script>
                var ctx = document.getElementById('myChart1');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Income per Month',
                            data: [1150000, 1000000, 1250000, 950000, 1500000, 1565000],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.2)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 0.75)',
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
                </script>
            </div>
            <div class="col-md-6">
                <canvas id="myChart2" width="400" height="180"></canvas>
                <script>
                var ctx = document.getElementById('myChart2');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Visitor per Month',
                            data: [150, 200, 234, 192, 378, 350],
                            backgroundColor: [
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 159, 64, 0.75)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
                </script>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-md-12">
                <h3 class="mb-3"><strong>Recent Transactions</strong></h3>
                <table id="recent" class="display" style="width:100%">
                    <caption>Recent Transactions</caption>
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>User</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_recent_transactions as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->service_name }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->status_name }}</td>
                                <td><a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/chart.js/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#recent').DataTable({
                columnDefs: [
                    { orderable: false, targets: 5 }
                ],
                "paging": false,
                "pageLength": 10,
                "lengthChange": false,
                "ordering": false,
            });
        });
    </script>
@stop