<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="title" class="form-label">@lang('Description')</label>
            <input name="title" type="text" class="form-control mb-3 col-10" :class="{'is-invalid': this.errors && 'title' in this.errors }" placeholder="@lang('Insert a title here')" v-model="feature.title" @focus="is_valid">
            <span class="validation-message" v-if="this.errors && 'title' in this.errors">@{{ errors.title[0] }}</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Color</label>
            <div class="form-check">
                <div class="btn-group">
                    <button class="btn btn-outline-light" :class="{'active' : feature.color == 'light'}" @click="changeColor('light')">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                    <button class="btn btn-outline-info" :class="{'active' : feature.color == 'info'}" @click="changeColor('info')">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                    <button class="btn btn-outline-primary" :class="{'active' : feature.color == 'primary'}" @click="changeColor('primary')">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                    <button class="btn btn-outline-warning" :class="{'active' : feature.color == 'warning'}" @click="changeColor('warning')">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                    <button class="btn btn-outline-danger" :class="{'active' : feature.color == 'danger'}" @click="changeColor('danger')">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                    <button class="btn btn-outline-secondary" :class="{'active' : feature.color == 'secondary'}" @click="changeColor('secondary')">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div>
            </div>
        </div>
    </div>
</div>
<h4>@lang('Narrative')</h4>
<div class="row">
    <div class="col-md-9">
        <div class="form-group">
            <label class="form-label" for="asa" >@lang('As a ')</label>
            <input type="text" name="as_a" class="form-control" placeholder="" :class="{'is-invalid': this.errors && 'as_a' in this.errors}" @focus="is_valid" v-model="feature.as_a">
            <span class="validation-message" v-if="errors && 'as_a' in errors">@{{ errors.as_a[0] }}</span>
        </div>
        <div class="form-group">
            <label class="form-label" for="asa" >@lang('I want ')</label>
            <input type="text" name="i_want" class="form-control" placeholder="" :class="{'is-invalid': this.errors && 'i_want' in this.errors}" @focus="is_valid" v-model="feature.i_want">
            <span class="validation-message" v-if="errors && 'i_want' in errors">@{{ errors.i_want[0] }}</span>
        </div>
        <div class="form-group">
            <label class="form-label" for="asa" >@lang('So that ')</label>
            <input type="text" name="so_that" class="form-control" placeholder="" :class="{'is-invalid': this.errors && 'so_that' in this.errors}" @focus="is_valid" v-model="feature.so_that">
            <span class="validation-message" v-if="errors && 'so_that' in errors">@{{ errors.so_that[0] }}</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary" @click="submitFeature">@lang('Submit')</button>
        <a href="{{ route('mage-bdd.domain.index') }}" class="btn btn-outline-light">@lang('Cancel')</a>
    </div>
</div>