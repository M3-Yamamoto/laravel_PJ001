@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

    			<div class="container">
    				<h2>Home Page</h2>
                    @if(session("message"))
                    <div class="alert alert-success" role="alert">
                      {{ session("message") }}
                    </div>
                    @endif
    				    <div>
    					   <a href="/recipe/create"><button class="btn btn-success">Create</button></a>
    					</div>
    				@foreach($data as $value)
    					<a href="/recipe/{{ $value->id }}">	<li>{{ $value->name }}</li></a>
    				<hr>
    				@endforeach
                    {{ $data->links() }}
    			</div>
            </div>
        </div>
    </div>
</div>
@endsection
