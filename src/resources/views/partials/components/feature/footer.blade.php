<div class="card">
    <div class="card-body bg-secondary">
        <h2>@lang('Scenarios')</h2>
        <div class="card" v-if="feature.scenarios.length > 0" v-for="scenario in feature.scenarios" :key="scenario.id">
            <div class="card-header bg-dark">
                <h4 v-if="scenario.title.length > 0 && !scenario.edit" @click="editable(scenario)">@{{ scenario.title | capitalize}}</h4>
                <div class="form-group" v-else>
                    <input type="text" v-model="scenario.title" class="form-control" @blur="notEditable(scenario)" @keyup.enter="notEditable(scenario)">
                </div>
            </div>
            <div class="card-body bg-gray" v-if="scenario.title.length > 0 && scenario.given.length > 0">
                <div class="row">
                    <div v-for="(line, index) in scenario.given" :key="line.id" class="col-12">
                        <div v-if="!line.edit && line.text.length > 0"  @click="editableLine(line)">
                            <b v-if="index == 0">@{{ line.type | capitalize }}</b>
                            <b v-else>@lang('And')</b>
                            <span>@{{ line.text }}</span>
                        </div>
                        <div class="input-group mb-12" v-else>
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <b v-if="index == 0">@{{ line.type | capitalize }}</b>
                                    <b v-else>@lang('And')</b>
                                </span>
                            </div>
                            <input class="form-control" type="text" v-model="line.text" @blur="notEditableLine(line, $event)" @keyup.enter="notEditableLine(line, $event)">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div v-for="(line, index) in scenario.when" :key="line.id" class="col-12">
                        <div v-if="!line.edit && line.text.length > 0"  @click="editableLine(line)">
                            <b v-if="index == 0">@{{ line.type | capitalize }}</b>
                            <b v-else>@lang('And')</b>
                            <span>@{{ line.text }}</span>
                        </div>
                        <div class="input-group" v-else>
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <b v-if="index == 0">@{{ line.type | capitalize }}</b>
                                    <b v-else>@lang('And')</b>
                                </span>
                            </div>
                            <input class="form-control" type="text" v-model="line.text" @blur="notEditableLine(line, $event)" @keyup.enter="notEditableLine(line, $event)">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div v-for="(line, index) in scenario.then" :key="line.id" class="col-12">
                        <div v-if="!line.edit && line.text.length > 0"  @click="editableLine(line)">
                            <b v-if="index == 0">@{{ line.type | capitalize }}</b>
                            <b v-else>@lang('And')</b>
                            <span>@{{ line.text }}</span>
                        </div>
                        <div class="input-group mb-12" v-else>
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <b v-if="index == 0">@{{ line.type | capitalize }}</b>
                                    <b v-else>@lang('And')</b>
                                </span>
                            </div>
                            <input class="form-control" type="text" v-model="line.text" @blur="notEditableLine(line, $event)" @keyup.enter="notEditableLine(line, $event)">
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="card-body" v-else>--}}

            {{--</div>--}}
        </div>
        <button @click="createScenario" class="btn btn-primary">@lang('New Scenario')</button>
    </div>
</div>