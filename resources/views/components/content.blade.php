<div>
    <div>
        {{$breadcrumbs ?? ''}}
    </div>

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            {{$header ?? ''}}
        </div>

        <div class="card-body">
            {{$slot}}
        </div>
    </div>

</div>
