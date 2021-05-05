@extends('layout')
@section('title')
    Поиск
@endsection
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    @push('style')
    <style>
        #search-result__wrapper{
            margin: 1em 0;
        }
        .hard_row{
    display: flex;
    flex-direction: row;
}
    </style>
    @endpush
    @push('script')
        <script>
            $('.form-input').on('change', function () { 
                $('#laravel-result').css({'display':'none'})
        })
        </script>
    @endpush
    <section class="hello-section listing-list page-section listing-list--layout-1" id="search-result__wrapper">
        <div class="app" id="newflat-app"> 
            {{-- Передаем отсортированные коллекции и данные для фильтрации во vue там их будем принимать как props --}}
            <filters-vue
            :cities='{{$cities}}' 
            :apartment-category='{{$apartment_category}}'
            :quality='{{$quality}}'
            :builders='{{$builders}}'
            :quarter='{{$quarter}}'
            :apartments='{{$apartments}}'
            :home-types='{{$home_types}}'
            ></filters-vue>
        </div>
        
        <div class="container">
           
        </div>
        
    </section>
    @push('script')
    <script src="/js/filters-vue.js"></script>
    @endpush
@endsection
