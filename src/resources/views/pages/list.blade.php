@extends('mage::layout.page')
@section('web-title', __('mage-bdd.index.web-title'))
@section('page-title', __('mage-bdd.index.page-title'))
@section('breadcrumbs')
    <li class="breadcrumb-item active">@lang('mage-bdd.index.breadcrumb.title')</li>
@endsection

@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/AdminLTE.css') }}">
@endsection

@section('page')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@lang('mage-bdd.domains.title')</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @foreach($domains as $domain)

                <div class="col-md-3">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $domain->name }}</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                            <ul class="list-group">
                                <li class="list-group-item active"><a href="#">Feature <span class="pull-right badge bg-black">Scenarios</span></a></li>
                                @foreach($domain->features as $feature)
                                    <li class="list-group-item"><a href="{{ route('mage-bdd.feature.show') }}">{{ $feature->title }} <span class="pull-right badge bg-{{ array_rand(['red', 'blue', 'aqua', 'green', 'yellow']) }}">{{ $feature->scenarios()->count() }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    @parent



@endsection