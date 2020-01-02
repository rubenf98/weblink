@extends('layout')

@section('content')
<div class="docs-container">
    <div class="tabs-container">
        <ul class="tab-list">
            <li class="tab-item" id="t-1">
                <span class="tab-title"> Overview</span>
            </li>
            <li class="tab-item" id="t-3">
                <span class="tab-title"> Api</span>
            </li>
            <li class="tab-item" id="t-4">
                <span class="tab-title"> Data</span>
            </li>
        </ul>
    </div>

    <div id="doc-content-1" class="doc-content">
        @include('docs.overview')
    </div>
    <div id="doc-content-3" class="doc-content">
        @include('docs.api')
    </div>
    <div id="doc-content-4" class="doc-content">
        @include('docs.data')
    </div>
</div>

<script src="/js/welcome.js"></script>
@endsection