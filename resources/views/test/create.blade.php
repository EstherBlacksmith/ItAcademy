<!-- /resources/views/post/create.blade.php -->

<h1>Create Post</h1>
<form method="POST" action="{{ route('BookCreated') }}" >
     @csrf
    
  <div class="form-group">      
        
    <label for="titulo" class="form-label">Título del libro</label>
    
    <input name="titulo" type="text" class="form-control" id="titulo"  value="{{ old('titulo') }}" >
  </div>
  
    @error('titulo')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>

<!-- Create Post Form -->