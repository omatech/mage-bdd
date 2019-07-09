@extends('mage::layout.page')
@section('web-title', __('mage-bdd.index.web-title'))
@section('page-title', __('mage-bdd.index.page-title'))
@section('breadcrumbs')
    <li class="breadcrumb-item">@lang('mage-bdd.index.breadcrumb.title')</li>
    <li class="breadcrumb-item active">@lang('mage-bdd.domain.create.breadcrumb.title')</li>
@endsection

@section('page')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('mage-bdd.domain.create.card.title')</h3>
                    <div class="card-tools">
                        @if(isset($domain))<a onclick="return confirm('@lang('Are you sure? This will also delete all dependant features')')" href="{{ route('mage-bdd.domain.delete', ['id' => $domain->id]) }}" class="btn btn-danger float-right"><i class="fas fa-trash"></i></a>@endif
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('mage-bdd.domain.store') }}">
                        @csrf
                        <div class="form-group {{ ($errors->has('name')?'validation-error':'') }}">
                            <label for="name" class="form-label">@lang('Name')</label>
                            <input name="name" type="text" class="form-control" placeholder="@lang('Insert a name here')" value="{{ $domain->name ?? null }}">
                            @if($errors->has('name'))<span class="validation-message">{{ $errors->first('name') }}</span>@endif
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Color</label>
                                    <div class="form-check">
                                        <input type="hidden" name="color" value="" id="color-select">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-color" data-value="info">&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-primary btn-color" data-value="primary">&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-warning btn-color" data-value="warning">&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-danger btn-color" data-value="danger">&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-secondary btn-color" data-value="secondary">&nbsp;&nbsp;</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">@lang('Submit')</button>
                                <a href="{{ route('mage-bdd.domain.index') }}" class="btn btn-default">@lang('Cancel')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @parent
    <script>
        jQ('.btn-color').on('click', function(){
            var value = jQ(this).attr('data-value');
            jQ('#color-select').val(value);
        });
    </script>
@endsection