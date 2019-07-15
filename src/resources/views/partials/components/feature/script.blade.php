<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
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
            @else
                this.feature = {
                    'bdd_domain_id': '{{ $domain_id }}',
                    'color': 'primary',
                    'title': '',
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

                    let axios_route = '';

                    if(this.mode === 'store') {

                        axios_route = route('mage-bdd.feature.store');

                    } else {

                        axios_route = route('mage-bdd.feature.update', {'id': this.feature.id});

                    }

                    axios.post(axios_route , {
                        // TODO: meeting_id
                        'bdd_domain_id' : this.feature.bdd_domain_id,
                        'title' : this.feature.title,
                        'color' : this.feature.color,
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
                            message = 'There are some errors! Please check all the fields.'
                        }

                        self.toast('error', message);
                    });
                },
                delete_feature()
                {
                    window.location.href(route('mage-bdd.feature.delete', {'id': this.feature.id}));
                }
            }
    });

</script>