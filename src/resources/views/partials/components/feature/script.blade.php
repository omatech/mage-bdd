<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.14/lodash.min.js"></script>
<script>

    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });

    let app = new Vue({
        el: '#mage-bdd-app',
        data: {
            feature: null,
            mode: 'create',
            errors: null
        },
        created()
        {
            @if(!empty($feature))
                this.feature = JSON.parse('@json($feature)');
                this.mode = 'update';
                _.each(this.feature.scenarios, scenario =>
                {
                    Vue.set(scenario, 'edit', false);
                    _.each(scenario.given, givenLine => Vue.set(givenLine, 'edit', false));
                    _.each(scenario.when, whenLine => Vue.set(whenLine, 'edit', false));
                    _.each(scenario.then, thenLine => Vue.set(thenLine, 'edit', false));
                });
            @else
                this.feature = {
                    'bdd_domain_id': '{{ $domain_id }}',
                    'color': 'primary',
                    'title': '',
                    'as_a' : '',
                    'i_want' : '',
                    'so_that' : '',
                };
                this.mode = 'store';
            @endif
        },
        computed:
            {
                featureColor()
                {
                    return (this.feature.color !== undefined) ? 'card-'+this.feature.color : '';
                }
            },
        methods:
            {
                changeColor(color)
                {
                    return this.feature.color = color;
                },
                toast(type, message)
                {
                    Toast.fire({
                        type: type,
                        title: message
                    });
                },
                submitFeature()
                {
                    let self = this;

                    let axios_route = (this.mode === 'store') ? route('mage-bdd.feature.store') : route('mage-bdd.feature.update', {'id': this.feature.id});

                    axios.post(axios_route , {
                        // TODO: meeting_id
                        'bdd_domain_id' : this.feature.bdd_domain_id,
                        'title' : this.feature.title,
                        'color' : this.feature.color,
                        'as_a' : this.feature.as_a,
                        'i_want' : this.feature.i_want,
                        'so_that' : this.feature.so_that,
                    }).then( response => {

                        if(self.mode === 'store') {
                            self.feature = response.data.feature;
                            self.mode = 'update';
                        }

                        self.toast('success', response.data.message);

                    }).catch(error => {

                        let message = 'Oops, Something went wrong!';

                        if(error.response.status === 422) {

                            self.errors = error.response.data.errors;
                            message = 'There are some errors! Please check all the fields.';

                            jQ.each(self.errors, (key, error) => Vue.set(self.errors, key, error));
                        }

                        self.toast('error', message);
                    });
                },
                delete_feature()
                {
                    window.location.href(route('mage-bdd.feature.delete', {'id': this.feature.id}));
                },
                is_valid(event)
                {
                    let name = jQ(event.target).attr('name');

                    if(this.errors && name in this.errors) Vue.delete(this.errors, name);
                },
                createScenario()
                {
                    this.feature.scenarios.push({
                        bdd_feature_id: this.feature.id,
                        given: [],
                        when: [],
                        then: [],
                        title: '',
                        edit: true,
                        id: null
                    });
                },
                saveScenario(scenario)
                {
                    let self = this;
                    let axios_route = (scenario.id) ? route('mage-bdd.scenario.update', {'id': scenario.id}): route('mage-bdd.scenario.store');

                    axios.post(axios_route ,
                    {
                        'bdd_feature_id' : this.feature.id,
                        'title' : scenario.title
                    }).then( response => {

                        scenario.id = response.data.scenario.id;
                        self.toast('success', response.data.message);

                    }).catch(error => {

                        let message = 'Oops, Something went wrong!';

                        self.toast('error', message);
                    });
                },
                saveLine(line, target)
                {
                    let self = this;
                    let axios_route = (line.id) ? route('mage-bdd.line.update', {'id': line.id}): route('mage-bdd.line.store');

                    target.addClass('text-warning');

                    axios.post(axios_route ,
                    {
                        'bdd_scenario_id' : line.bdd_scenario_id,
                        'text' : line.text
                    }).then( response => {

                        line.id = response.data.line.id;

                        console.log(target);
                        target.removeClass('text-warning');
                        target.addClass('text-success');

                        setTimeout(() => target.removeClass('text-success'), 1000);

//                        self.toast('success', response.data.message);

                    }).catch(error => {

                        let message = 'Oops, Something went wrong!';

                        self.toast('error', message);
                    });
                },
                editable(scenario)
                {
                    Vue.set(scenario, 'edit', true);
                },
                notEditable(scenario)
                {
                    this.saveScenario(scenario);
                    Vue.set(scenario, 'edit', false);
                },
                editableLine(line)
                {
                    Vue.set(line, 'edit', true);
                },
                notEditableLine(line, event)
                {
                    this.saveLine(line, jQ(event.target).parent());
                    Vue.set(line, 'edit', false);
                }
            },
        filters: {
            capitalize: function (value) {
                if (!value) return '';
                value = value.toString();
                return value.charAt(0).toUpperCase() + value.slice(1);
            }
        }
    });

</script>