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
            <div class="card" :class="featureColor" id="mage-bdd-app">
                <div class="card-header">
                    <h3 class="card-title">@lang('mage-bdd.feature.create.card.title')</h3>
                    <div class="card-tools">
                        <button v-if="feature.id !== undefined" onclick="return confirm('@lang('Are you sure? This will also delete all dependant scenarios and lines')')" @click="delete_feature" class="btn btn-danger float-right"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
                <div class="card-body bg-dark">
                    @include('mage-bdd::partials.components.feature.body')
                </div>
                <div class="card-footer bg-dark" v-show="feature.id !== undefined">
                    @include('mage-bdd::partials.components.feature.footer')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @parent
    @include('mage-bdd::partials.components.feature.script', ['feature' => $feature])
@endsection