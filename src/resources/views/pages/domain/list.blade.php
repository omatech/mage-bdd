@extends('mage::layout.page')
@section('web-title', __('mage-bdd.index.web-title'))
@section('page-title', __('mage-bdd.index.page-title'))
@section('breadcrumbs')
    <li class="breadcrumb-item active">@lang('mage-bdd.index.breadcrumb.title')</li>
@endsection

@section('page')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('mage-bdd.domains.title')</h3>
                    <div class="card-tools">
                        <a href="{{ route('mage-bdd.domain.create') }}" class="btn btn-primary"><i data-feather="plus"></i>@lang('New Domain')</a>
                    </div>
                </div>
                <div class="card-body">
                    @foreach($domains as $domain)
                        <div class="col-md-12">
                            <div class="card collapsed-card card-{{ $domain->color }}">
                                <div class="card-header">
                                    <h3 class="card-title" data-widget="collapse">{{ $domain->name }}</h3>
                                    <div class="card-tools">
                                        <button data-id="{{ $domain->id }}" class="btn-edit-domain btn btn-tool">
                                            <i class="fa fa-pen"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-id="{{ $domain->id }}" data-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @foreach($domain->features->sortBy('color') as $feature)
                                        @if($loop->index % 4 == 0)
                                            <div class="row">
                                        @endif
                                                <div class="col-md-3 col-sm-6 col-12">
                                                    <div class="info-box">
                                                        <span class="info-box-icon bg-{{ $feature->color }}"><i class="far fa-"></i></span>

                                                        <div class="info-box-content">
                                                            <span class="info-box-text"><a href="{{ route('mage-bdd.feature.show') }}">{{ $feature->title }} </a></span>
                                                            <span class="info-box-number">{{ $feature->scenarios()->count() }} Scenarios</span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                        @if($loop->iteration % 4 == 0 or $loop->last)
                                            @if($loop->last && $loop->iteration % 4 == 0)
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-6 col-12">
                                                        <a class="info-box" href="{{ route('mage-bdd.feature.create') }}">
                                                            <span class="info-box-icon bg-primary"><i class="fa fa-plus"></i></span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-number">@lang('New Feature')</span>
                                                            </div>
                                                            <!-- /.info-box-content -->
                                                        </a>
                                                        <!-- /.info-box -->
                                                    </div>
                                                </div>
                                            @elseif($loop->last && $loop->iteration % 4 != 0)
                                                    <div class="col-md-3 col-sm-6 col-12">
                                                        <a class="info-box" href="{{ route('mage-bdd.feature.create') }}">
                                                            <span class="info-box-icon bg-primary"><i class="fa fa-plus"></i></span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-number">@lang('New Feature')</span>
                                                            </div>
                                                            <!-- /.info-box-content -->
                                                        </a>
                                                        <!-- /.info-box -->
                                                    </div>
                                                </div>
                                            @else
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @parent
    <script>
        jQ('.btn-edit-domain').on('click', function(){
           let id = jQ(this).attr("data-id");
           window.location.href = route('mage-bdd.domain.edit', {'id': id});
        });
    </script>
@endsection