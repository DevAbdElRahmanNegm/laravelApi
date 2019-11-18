@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Category</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>title</th>
                                    <th>discraption</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categorydeteils as $c)
                                    <tr>
                                        <th scope="row">{{$c->id}}</th>
                                        <td>{{$c->title}}</td>
                                        <td>{{$c->descraption}}</td>
                                    </tr>

                                </tbody>
                                @endforeach
                            </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
