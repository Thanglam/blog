@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="post" action="{{ url('currency') }}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                    <label for="example-number-input" class="col-xs-2 col-form-label">USD</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" value="1" id="example-number-input" name="usd">
                    </div>
                    </div> 
                    <button type="submit" class="btn btn-primary">Calculate</button>                
                </form>
        </div>
    </div>
</div>
@endsection
