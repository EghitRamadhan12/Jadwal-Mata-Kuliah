@props(['initId', 'thead'])

<div class="table-responsive">
    <table id="{{ $initId }}" class="table table-bordered table-striped">
        <thead class="thead-dark mt-3">
            {{ $thead }}
        </thead>
        <tbody>
        </tbody>
    </table>
</div>