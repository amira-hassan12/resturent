
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
                        <a href="{{route('meals')}}" class="list-group-item list-group-item-action"> All Meals</a>
                        <a href="{{route('meals.create')}}"  class="list-group-item list-group-item-action"> create new meal</a>


                    </div>
                    </form>


                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- 4 -->

        <div class="col-md-8">
            <div class="card">

                <div class="card-header ">

                        <h3>Edit meal</h3>

                </div><!-- card-header -->

                <div class="card-body">

                    <form action="{{route('meals.update',['id'=>$meal->id])}}" method="post" enctype="multipart/form-data">
                        @csrf

                        @method('PUT')
                    <div class="form-group mb-3">
                        <label>name of meal</label>
                        <input type="text" value="{{$meal->name}}" class="form-control form-control-lg" name="name" placeholder="name of meal">
                    </div>
                    <div class="form-group">
                        <label>description of meal</label>
                        <textarea  name="description" class="form-control form-control-lg" rows="5" placeholder="description of meal"> {{$meal->description}}</textarea>
                    </div>

                    <div class="form-inline">
                        <label>Meals Price (LE)</label>
                        <input type="number" name="small_meal_price" placeholder="small meal price" value="{{$meal->small_meal_price}}" >
                        <input type="number"  name="med_meal_price" placeholder="medium meal price" value="{{$meal->med_meal_price}}" >
                        <input type="number"  name="large_meal_price" placeholder="large meal price"value="{{$meal->large_meal_price}}" >


                        <div class="form-group mb-3">
                            <label>Meal category</label>
                            <select name="category"  class="form-control form-control-lg" >
                                <option value="{{$meal->category}}">{{$meal->category}}</option>
                                <option value="shawerma">shawerma</option>
                                <option value="Burger">Burger</option>
                                <option value="pizza">pizza</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>meal image</label>
                            <input type="file" class="form-control form-control-lg form-control-file" name="image">
                            <img src="{{Storage::url($meal->image)}}" width="80" alt="">
                        </div>

                        <div class="form-group text-center d-grid">
                            <button type="submit" class="btn btn-lg btn-primary" >save </button>
                        </div>
                </div><!-- card-body --> </form>
            </div><!-- card -->
        </div><!-- 8 -->



    </div><!-- row -->
</div><!-- container -->
@endsection
