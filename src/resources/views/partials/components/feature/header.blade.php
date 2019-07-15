<div class="form-group {{ ($errors->has('name')?'validation-error':'') }}">
    <label for="title" class="form-label">@lang('Title')</label>
    <input name="title" type="text" class="form-control" placeholder="@lang('Insert a title here')" v-model="feature.title">
    <span class="validation-message" v-if="errors && errors.title[0] !== undefined">@{{ errors.title[0] }}</span>
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
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary" @click="submitFeature">@lang('Submit')</button>
        <a href="{{ route('mage-bdd.domain.index') }}" class="btn btn-outline-light">@lang('Cancel')</a>
    </div>
</div>