@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
<style>
    .icon-circle {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 20px;
    }
</style>
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Dashboard</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Dashboard
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3 col-sm-12 text-right">
            <select id="yearMonthFilter" class="custom-select form-control w-100" style="margin: 0;">
                <option value="" selected disabled>Select Year and Month</option>
                @foreach ($yearMonthOptions as $option)
                    <option value="{{ $option['value'] }}">{{ $option['text'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row pb-10">
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">₱ {{ number_format($totalRevenue, 0) }}</div>
                    <div class="font-17 text-dark weight-500">
                        <small>Total revenue</small>
                    </div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);">
                        <i class="icon-copy fa fa-line-chart"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">₱ {{ number_format($totalExpectedRevenue, 0) }}</div>
                    <div class="font-17 text-dark weight-500">
                        <small>Total expected revenue</small>
                    </div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#ff5b5b" style="color: rgb(255, 91, 91);">
                        <span class="icon-copy fa fa-bar-chart"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">₱ {{ number_format($totalExpenses, 0) }}</div>
                    <div class="font-17 text-dark weight-500">
                        <small>Total expenses</small>
                    </div>
                </div>
                <div class="widget-icon">
                    <div class="icon">
                        <i class="icon-copy fa fa-credit-card" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">₱ {{ number_format($totalCommissionFee, 0) }}</div>
                    <div class="font-17 text-dark weight-500"><small>Total commission fee</small></div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#09cc06" style="color: rgb(9, 204, 6);">
                        <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Metrics Section -->
<div class="row">
    <!-- Total Consignors -->
    <div class="col-xl-4 col-lg-6 mb-4">
        <div class="card-box shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="icon-circle" style="background-color: #007bff; color: white; padding: 15px; border-radius: 50%; margin-right: 15px;">
                    <i class="fa fa-users fa-lg"></i>
                </div>
                <div>
                    <h6 class="font-weight-bold mb-1">Total Consignors</h6>
                    <h4 class="font-weight-bold">{{ $totalConsignors }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Consignment Requests -->
    <div class="col-xl-4 col-lg-6 mb-4">
        <div class="card-box shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="icon-circle" style="background-color: #f39c12; color: white; padding: 15px; border-radius: 50%; margin-right: 15px;">
                    <i class="fa fa-hourglass-half fa-lg"></i>
                </div>
                <div>
                    <h6 class="font-weight-bold mb-1">Pending Requests</h6>
                    <h4 class="font-weight-bold">{{ $totalPendingConsignmentRequest }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Payments -->
    <div class="col-xl-4 col-lg-6 mb-4">
        <div class="card-box shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <div class="icon-circle" style="background-color: #e74c3c; color: white; padding: 15px; border-radius: 50%; margin-right: 15px;">
                    <i class="fa fa-money fa-lg"></i>
                </div>
                <div>
                    <h6 class="font-weight-bold mb-1">Pending Payments</h6>
                    <h4 class="font-weight-bold">{{ $totalPendingPayments }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Inventory Section -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
        <div class="card-box pd-30 pt-10 height-100-p">
            <h2 class="mb-30 h4">Inventory</h2>
            <div class="browser-visits">
                <ul class="list-unstyled">
                    <!-- Store Items with fa-cube -->
                    <li class="d-flex align-items-center mb-3">
                        <div class="icon mr-3">
                            <i class="fas fa-cube text-dark fa-2x"></i>
                        </div>
                        <div class="browser-name flex-grow-1">Store Items</div>
                        <div class="visit">
                            <span class="badge badge-pill badge-dark">{{ $totalInventoryItems['storeItems'] }}</span>
                        </div>
                    </li>
                    <!-- Consign Items with fa-handshake -->
                    <li class="d-flex align-items-center mb-3">
                        <div class="icon mr-3">
                            <i class="fas fa-handshake text-dark fa-2x"></i>
                        </div>
                        <div class="browser-name flex-grow-1">Consign Items</div>
                        <div class="visit">
                            <span class="badge badge-pill badge-dark">{{ $totalInventoryItems['consignItems'] }}</span>
                        </div>
                    </li>
                    <!-- Selling Items with fa-shopping-cart -->
                    <li class="d-flex align-items-center mb-3">
                        <div class="icon mr-3">
                            <i class="fas fa-shopping-cart text-dark fa-2x"></i>
                        </div>
                        <div class="browser-name flex-grow-1">Selling Items</div>
                        <div class="visit">
                            <span class="badge badge-pill badge-dark">{{ $totalInventoryItems['sellingItems'] }}</span>
                        </div>
                    </li>
                    <!-- Refund with fa-undo -->
                    <li class="d-flex align-items-center">
                        <div class="icon mr-3">
                            <i class="fas fa-undo text-dark fa-2x"></i>
                        </div>
                        <div class="browser-name flex-grow-1">Refund</div>
                        <div class="visit">
                            <span class="badge badge-pill badge-dark">{{ $totalInventoryItems['refundItems'] }}</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Best Selling Products Section -->
    <div class="col-lg-8 col-md-6 col-sm-12 mb-30">
        <div class="card-box pd-30 pt-10 height-100-p">
            <h2 class="mb-30 h4">Best Selling Products</h2>
            <div class="table-responsive">
                <table class="table table-striped" >
                    <thead>
                        <tr>
                            <th style="width: 40%;"><b>Name</b></th>
                            <th style="width: 30%"><b>Sku</b></th>
                            <th style="width: 10%;"><b>Sold</b></th>
                            <th class="text-nowrap" style="width: 30%;"><b>Total sales</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bestSellingProducts as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->total_quantity_sold }}</td>
                            <td>₱ {{ number_format($product->total_sales, 0) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
