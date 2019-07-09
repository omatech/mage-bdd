@extends('mage::layout.page')
@section('web-title', __('mage-bdd.index.web-title'))
@section('page-title', __('mage-bdd.index.page-title'))
@section('breadcrumbs')
    <li class="breadcrumb-item">@lang('mage-bdd.index.breadcrumb.title')</li>
    <li class="breadcrumb-item active">@lang('mage-bdd.feature.create.breadcrumb.title')</li>
@endsection

@section('page')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('mage-bdd.feature.create.card.title')</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @parent
    <script>

    </script>
@endsection