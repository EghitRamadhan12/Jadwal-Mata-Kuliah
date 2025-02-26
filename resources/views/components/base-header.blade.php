@props(['headerTitle', 'headerAddButton', 'buttonAdd', 'modalId', 'buttonExport', 'exportId', 'buttonGenerate', 'headerButtonGenerate', 'genereteId', 'buttonNext', 'nextId', 'buttonNextHeader'])

<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">{{ $headerTitle }}</h6>
    <div class="ml-auto">
        @if ($buttonExport == 'true')
            <i class="fas fa-file-excel fa-2xl pr-3 text-success" style="cursor: pointer;" id="{{ $exportId }}"></i>
        @endif
        @if ($buttonAdd == 'true')
            <button type="button" class="btn btn-outline-primary ml-auto" id="btnTambah" data-toggle="modal" data-target="{{ $modalId }}">
                <i class="fas fa fa-plus"></i> {{ $headerAddButton }}
            </button>
        @endif
        @if ($buttonGenerate == 'true')
            <button type="button" class="btn btn-outline-success ms-auto" id="mulai" data-target="{{ $genereteId }}">
                <i class="fas fa fa-plus"></i> {{ $headerButtonGenerate }}
            </button>
        @endif
        @if ($buttonNext == 'true')
            <button type="button" class="btn btn-outline-primary ms-auto" id="mulai" data-target="{{ $buttonNext }}">
                <i class="fas fa fa-plus"></i> {{ $buttonNextHeader }}
            </button>
        @endif
    </div>
</div>