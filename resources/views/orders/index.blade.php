@extends('layouts.app')
@section('content')
    <div class="container fluid ">
        <div class="row justify-content-center">

            <div class="col-md-2">
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
            </div><!-- 3 -->
            <tbody>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3>orders</h3>


                        </div><!-- card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>phone/email</th>
                                        <th>Date/time</th>
                                        <th>Meal</th>
                                        <th>S.meal</th>
                                        <th>M.meal</th>
                                        <th>L.meal</th>
                                        <th>Total$</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Accept</th>
                                        <th>Reject</th>
                                        <th>order completed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td scope="col">{{$order->user->name}}</td>
                                        <td scope="col">{{$order->user->email}}<br>{{$order->phone}}</td>
                                        <td scope="col">{{$order->date}}<br>{{$order->time}}</td>
                                        <td scope="col">{{$order->meal->name}}</td>
                                        <td scope="col">{{$order->small_meal}}</td>
                                        <td scope="col">{{$order->medium_meal}}</td>
                                        <td scope="col">{{$order->large_meal}}</td>
                                        <!--total -->
                                        <td scope="col">

                                            {{($order->meal->small_meal_price *$order->small_meal) +
                                            ($order->meal->med_meal_price *$order->medium_meal )+
                                           ( $order->meal->large_meal_price *$order->large_meal)}} $


                                        </td>
                                        <td scope="col">{{$order->body}}</td>
                                        <td scope="col">{{$order->status}}</td>

                                        <form action="{{route('order.status',['id'=>$order->id])}}" method="post">
                                            @csrf
                                            <td>
                                                <input type="submit" name="status" value="Accepted" class="btn btn-primary btn-sml">
                                            </td>
                                            <td>
                                                <input type="submit" name="status" value="Rejected" class="btn btn-danger btn-sml">
                                            </td>
                                            <td>
                                                <input type="submit" name="status" value="Completed" class="btn btn-success btn-sml">
                                            </td>


                                        </form>


                                    </tr>
                                  @endforeach
                                </tbody>





            </table>


        </div><!-- card-body -->
    </div><!-- card -->
    </div><!-- 9 -->



    </div><!-- row -->
    </div><!-- container -->
@endsection
