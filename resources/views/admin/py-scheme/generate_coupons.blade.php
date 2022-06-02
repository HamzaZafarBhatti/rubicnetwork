@extends('admin.master')

@section('content')
    <div class="content">
        @include('admin.alert')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Generate Coupon</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-danger"></p>
                        <form action="{{ route('admin.plan.do_generate_coupons') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Codes Quantity:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="1" name="quantity" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Plan:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="plan_id" data-fouc required>
                                        <option value="">Select Plan</option>
                                        @if ($plans)
                                            @foreach ($plans as $plan)
                                                <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-form-label col-lg-2">Codes Length:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="1" name="length" required class="form-control">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="text-right">
                                <button type="submit" class="btn bg-dark">Submit<i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Coupon Codes</h6>
                        <div class="header-elements">
                            <a type="button" id="download_link" class="btn btn-primary" disabled>Download</a>
                        </div>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Coupon Code</th>
                                    <th>Plan Name</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    {{-- <th class="text-center">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $k => $val)
                                    <tr>
                                        <td>{{ ++$k }}.</td>
                                        <td>{{ $val->serial }}</td>
                                        <td>{{ $val->plan ? $val->plan->name : 'N/A' }}</td>
                                        <td>
                                            @if ($val->status == 'inactive')
                                                <span class="badge badge-danger">Disabled</span>
                                            @elseif($val->status == 'active')
                                                <span class="badge badge-success">Active</span>
                                            @endif
                                        </td>
                                        <td>{{ date('Y/m/d h:i:A', strtotime($val->created_at)) }}</td>
                                        <td>{{ date('Y/m/d h:i:A', strtotime($val->updated_at)) }}</td>
                                        {{-- <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class='dropdown-item' href="{{url('/')}}/admin/py-plan/{{$val->id}}"><i class="icon-pencil7 mr-2"></i>Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('script')
    <script>
        console.log('{{Session::get('download_link')}}')
        if('{{Session::get('download_link')}}') {
            // location.reload(true);
            $('#download_link').removeClass('disabled').attr('href', '{{route(Session::get('download_link') ?? 'user.dashboard')}}').trigger('click');
        } else {
            $('#download_link').addClass('disabled')
        }
    </script>
@endsection
