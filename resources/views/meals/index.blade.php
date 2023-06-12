@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Menu</h3>
                    </div><!-- card-header -->
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="list-group">
                                <a href="{{ route('meals') }}" class="list-group-item list-group-item-action"> All Meals</a>
                                <a href="{{ route('meals.create') }}" class="list-group-item list-group-item-action"> create
                                    new meal</a>
                                <a href="{{route('orders') }}" class="list-group-item list-group-item-action"> user order</a>
                            </div>
                        </form>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- 4 -->
            <tbody>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header  text-center">
                            @if (session('message'))
                                <div class="alert alert-success">
                                    <h2>{{ session('message') }}</h2>
                                </div>
                            @endif
                        </div><!-- card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>category</th>
                                        <th>S.price</th>
                                        <th>M.price</th>
                                        <th>L.price</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                @if (count($meals) > 0)
                                    @foreach ($meals as $key => $meal)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ Storage::url($meal->image) }}" width="90" height="80"
                                                    alt=""></td>
                                            <td>{{ $meal->name }}</td>
                                            <td>{{ $meal->description }}</td>
                                            <td>{{ $meal->category }}</td>
                                            <td>{{ $meal->small_meal_price }}</td>
                                            <td>{{ $meal->med_meal_price }}</td>
                                            <td>{{ $meal->large_meal_price }}</td>

                                            <td><a href="{{ route('meals.edit', ['id' => $meal->id]) }}">
                                                    <i class="fa fa-edit"></i></a></td>
                                            <td>
                                                <button type="button"class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $meal->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$meal->id}}" tabindex="-1" aria-labelledby="exampleModelLabel" aria-hidden="true">
                                                <form action="{{ route('meals.delete', ['id' => $meal->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="model-header">

                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               <h2>Are you sure to delete?</h2>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete </button>
                                                                <button type="button"  class="btn btn-primary"data-bs-dismiss="modal">cancel</button>
                                                            </div><!--model-header-->
                                                        </div><!--modal-content-->
                                                    </div><!--modal-dialog-->
                                                </form>
                                            </div><!-- modal fade -->
                                        </tr>
                                    @endforeach
                                @else
                                    <div class="alert alert-danger text-center">
                                        <h2>No meals to show</h2>
                                    </div>
                                @endif
            </tbody>

            </table>

            <div> {{ $meals->links() }}</div>
        </div><!-- card-body -->
    </div><!-- card -->
    </div><!-- 8 -->



    </div><!-- row -->
    </div><!-- container -->
@endsection
