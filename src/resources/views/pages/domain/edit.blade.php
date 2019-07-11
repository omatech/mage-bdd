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
                <div class="card-body bg-dark">
                    <form action="{{ route('mage-bdd.domain.update', ['id' => $domain->id]) }}" method="POST">
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
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-outline-light @if($domain->color == 'light') active @endif">
                                                <input value="secondary" type="radio" name="color" id="option3" autocomplete="off" @if($domain->color == 'light') checked @endif> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label class="btn btn-outline-info @if($domain->color == 'info') active @endif">
                                                <input value="info" type="radio" name="color" id="option1" autocomplete="off" @if($domain->color == 'info') checked @endif> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label class="btn btn-outline-primary @if($domain->color == 'primary') active @endif">
                                                <input value="primary" type="radio" name="color" id="option2" autocomplete="off" @if($domain->color == 'primary') checked @endif> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label class="btn btn-outline-warning @if($domain->color == 'warning') active @endif">
                                                <input value="warning" type="radio" name="color" id="option3" autocomplete="off" @if($domain->color == 'warning') checked @endif> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label class="btn btn-outline-danger @if($domain->color == 'danger') active @endif">
                                                <input value="danger" type="radio" name="color" id="option3" autocomplete="off" @if($domain->color == 'danger') checked @endif> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <label class="btn btn-outline-secondary @if($domain->color == 'secondary') active @endif">
                                                <input value="secondary" type="radio" name="color" id="option3" autocomplete="off" @if($domain->color == 'secondary') checked @endif> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">@lang('Submit')</button>
                                <a href="{{ route('mage-bdd.domain.index') }}" class="btn btn-outline-light">@lang('Cancel')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
