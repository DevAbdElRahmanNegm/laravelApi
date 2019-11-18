@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Items</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="row mt-50">
                            <div class="col-md-8 col-md-offset-2">
                                <h3>Items</h3>
                                <div class="mt-30"></div>

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>title</th>
                                        <th>discraption</th>
                                        <th>img</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($item as $i)
                                        <tr>

                                            <th scope="row">{{$i->id}}</th>
                                            <td>{{$i->title}}</td>
                                            <td>{{$i->description}}</td>
                                            <td>
                                                <img src="uploads/{{$i->img}}" alt="Smiley face" height="42" width="42">
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>



                                </table>
                            </div>
                        </div><!-- /.row -->





                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection