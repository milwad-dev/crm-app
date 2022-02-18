<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">{{ $title }}</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('panel.index') }}">Panel</a>
                        </li>
                        {{ $slot }}
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @if (! is_null($buttonTitle))
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            <div class="mb-1 breadcrumb-right">
                <div class="dropdown">
                    <a href="{{ $buttonRoute }}">
                        <button class="btn-icon btn btn-primary btn-round btn-sm waves-effect waves-float waves-light"
                        type="button" aria-haspopup="true" aria-expanded="false">{{ $buttonTitle }}</button>
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
