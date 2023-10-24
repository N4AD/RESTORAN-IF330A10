@extends('layouts.backend')
@section('title', 'Dashboard')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-chart">
                    <canvas id="sales-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Today's Sale</h4>
                    </div>
                    <div class="card-body">
                        ${{ $todaySale ?? 0 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-chart">
                    <canvas id="balance-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Today's Order</h4>
                    </div>
                    <div class="card-body">
                        {{ $todayOrder ?? 0 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-chart">
                    <canvas id="sales-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pending order</h4>
                    </div>
                    <div class="card-body">
                        {{ $pendingOrder ?? 0 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Order List</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.order') }}" class="btn btn-danger">View all Orders <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                            </tr>
                            @foreach ($orders as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td><span class="badge {{ $item->order_status === 0 ? 'badge-warning':($item->order_status === 1 ? 'badge-success':'badge-danger') }}">{{ $item->order_status === 0 ? 'pending':($item->order_status === 1 ? 'completed':'canceled') }}</span></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Reservation List</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.reserve') }}" class="btn btn-danger">View all Reservation <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                            </tr>
                            @foreach ($reservations as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td><span class="badge {{ $item->status === 0 ? 'badge-warning':($item->status === 1 ? 'badge-success':'badge-danger') }}">{{ $item->status === 0 ? 'pending':($item->status === 1 ? 'completed':'canceled') }}</span></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection