<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1" name="viewport"/>

        <link rel="icon" href="/favicon.ico"/>
        <link id="theme" rel="stylesheet" type="text/css" href="/themes/clean/bulma.min.css">
        <link href="{{ mix('css/enso.css') }}" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <div id="app">
            <nav class="navbar has-bottom-top-large" role="navigation" aria-label="main navigation">
                <div class="navbar-brand">
                    <a class="navbar-item" href="https://laravel-enso.com">
                        <img src="/images/logo.svg" alt="Laravel Enso" width="28" height="28">
                        <h4 class="title is-4 has-margin-left-small">
                            Enso
                        </h4>
                    </a>
                </div>
            </nav>
            <div class="container has-margin-top-large">
                <div class="columns">
                    <div class="column is-one-fifth">
                        <vue-filter :options="activeOptions"
                            icons
                            title="Active"
                            v-model="filters.examples.is_active">
                        </vue-filter>
                    </div>
                    <div class="column is-one-fifth">
                        <vue-select-filter title="Seniority"
                            :options="seniorityOptions"
                            v-model="filters.examples.seniority">
                        </vue-select-filter>
                    </div>
                    <div class="column is-two-fifths">
                        <date-interval-filter
                            title="Hired Between"
                            :min="intervals.examples.hired_at.min"
                            @update-min="intervals.examples.hired_at.min = $event"
                            :max="intervals.examples.hired_at.max"
                            @update-max="intervals.examples.hired_at.max = $event">
                        </date-interval-filter>
                    </div>
                    <div class="column is-one-fifth">
                        <interval-filter
                            title="Salary"
                            type="number"
                            :min="intervals.examples.salary.min"
                            @update-min="intervals.examples.salary.min = $event"
                            :max="intervals.examples.salary.max"
                            @update-max="intervals.examples.salary.max = $event">
                        </interval-filter>
                    </div>
                </div>
                <vue-table path="/examples/table/init"
                    :custom-render="customRender"
                    :filters="filters"
                    :intervals="intervals"
                    @excel="$toastr.info('You just pressed Excel', 'Event')"
                    @create="$toastr.success('You just pressed Create', 'Event')"
                    @edit="$toastr.warning('You just pressed Edit', 'Event')"
                    @destroy="$toastr.error('You just pressed Delete', 'Event')"
                    id="example">
                </vue-table>
            </div>
        </div>

        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <script src="/js/example.js"></script>

    </body>
</html>