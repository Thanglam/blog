@extends('layouts.app')

@section('content')
 <div class="container">
        <div class="row">
        @include('partials.hello')
            <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Currency</th>
                    <th>Rate</th>  
                    <th>Action</th>    
                    </tr>
                </thead>
                <tbody>
                @forelse ($rates as $rate)
                <tr>
                    <th scope="row">{{ $rate->id }}</th>
                    <td>{{ $rate->currency }}</td>
                    <td>{{ $rate->rate }}</td>
                    <td><a class="btn btn-primary" href="{{url('rates', [$rate->id,'delete'])}}" role="button">Link</a></td>
                </tr>
                @empty
                <tr rowspan="3">
                    Please create a new rate.
                </tr>
                @endforelse
                </tbody>
                </table>
                <form method="post" action="{{ url('rate') }}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                    <label for="currency" class="col-xs-2 col-form-label">Currency</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text"  id="currency" name="currency">
                    </div>
                    </div> 
                     <div class="form-group row">
                    <label for="rate" class="col-xs-2 col-form-label">Rate</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number"  id="rate" name="rate">
                    </div>
                    </div> 
                    <button type="submit" class="btn btn-primary">Create</button>                
                </form>
            </div>
        </div>
  @endsection