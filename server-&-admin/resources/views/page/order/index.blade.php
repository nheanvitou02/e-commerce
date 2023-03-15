@extends('layouts.app', ['title' => 'Orders'])
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold"><i class="fas fa-shopping-cart"></i> ORDERS</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('order.index') }}" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="q"
                                        placeholder="Search no.invoice">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align:center;width: 6%">NO.</th>
                                        <th scope="col">NO. Invoice</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Grand Total</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" style="width:15%;text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $no => $invoice)
                                        <tr>
                                            <th scope="row" style="text-align:center">
                                                {{ ++$no + ($datas->currentPage() - 1) * $datas->perPage() }}
                                            </th>
                                            <td>{{ $invoice->invoice }}</td>
                                            <td>{{ $invoice->name }}</td>
                                            <td class="text-center">{{ $invoice->status }}</td>
                                            <td>{{ moneyFormat($invoice->grand_total) }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('order.show', $invoice->id) }}"
                                                    class="btn btn-primary position-relative">
                                                    <i class="fa fa-list-ul"></i>
                                                    @if ($invoice->substatus == 'accept')
                                                        <span
                                                            class="position-absolute top-0 end-0 translate-middle p-1 bg-danger border border-light rounded-circle">
                                                        </span>
                                                    @endif
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            No data!
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            <div style="text-align: center">
                                {{ $datas->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
