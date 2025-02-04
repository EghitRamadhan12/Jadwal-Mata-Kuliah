@props(['slot'])

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>