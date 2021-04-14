@if ($errors->any())    
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>        
@endif

@if(session('message'))
    <div class="alert alert-info">  
            {{ session('message') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-warning">  
            {{ session('error') }}
    </div>
@endif
