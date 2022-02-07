@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class=" text-center">
        <div class="fs-4 text-shadow">“The fruit of the righteous is a tree of life; and he that winneth souls is wise.”</div>
            <div class="text-center">
                <img src="{{asset('img/logo.jpg')}}" class="w-370">
            </div>
            <div class="d-inline-flex">
                <div class="m-2">
                    <a class="btn btn-primary btn-lg text-dark rounded-pill w-200" href="/information">INFORMATION</a>
                </div>
                <div class="m-2">
                    <a class="btn btn-primary btn-lg text-dark rounded-pill w-200" href="/homecell">HOME CELL</a>
                </div>
                <div class="m-2">
                    <a class="btn btn-primary btn-lg text-dark rounded-pill w-200" href="/quotes">WISDOM QUOTES</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

