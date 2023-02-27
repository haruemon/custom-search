@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>検索結果 <small>約 {{ $info->formattedTotalResults }} 件 （{{ $info->formattedSearchTime }} 秒） </small></h1>
@stop

@section('content')
@include('elements.search-form')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        @foreach($results as $result)
        <div class="card">
            <div class="card-body">
                <div class="attachment-block clearfix">
                    @if(isset($result->pagemap) && isset($result->pagemap->cse_thumbnail))
                    <img class="attachment-img" src="{{ $result->pagemap->cse_thumbnail[0]->src }}" width="{{ $result->pagemap->cse_thumbnail[0]->width }}" height="{{ $result->pagemap->cse_thumbnail[0]->height }}">
                    @endif
                    <div class="attachment-pushed">
                        <h4 class="attachment-heading"><a href="{{ $result->link }}">{!! $result->htmlTitle !!}</a></h4>
                        <div class="attachment-text">
                            {!! $result->htmlSnippet !!} <a href="{{ $result->link }}">more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="row">
    <div class="col-12">
        @if(isset($rawResults->queries) && isset($rawResults->queries->previousPage))
        <a href="{{ route('search') }}?search_keyword={{ Request::input('search_keyword', null) }}&start={{ $rawResults->queries->previousPage[0]->startIndex }}" class="btn btn-secondary">前へ</a>
        @endif
        @if(isset($rawResults->queries) && isset($rawResults->queries->nextPage))
        <a href="{{ route('search') }}?search_keyword={{ Request::input('search_keyword', null) }}&start={{ $rawResults->queries->nextPage[0]->startIndex }}" class="btn btn-secondary float-right">次へ</a>
        @endif
    </div>
</div>
@stop

@section('css')
    <style>
        .active-link {
            cursor: pointer;
        }
    </style>
@stop

@section('js')
    {{-- <script>
        $('.active-link').click(function() {
            $(this).find('a').click();
        })
    </script> --}}
@stop