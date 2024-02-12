@extends('layouts.admin')

@section('content')
    <!--contenitore-->
   <div class="container">

    <!--form-->
        <form class="form" action="{{route('admin.project.store')}}" method="POST">
        <h1 class="text-center">Aggiungi un nuovo progetto</h1>    
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nome progetto:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="formGroupExampleInput" placeholder="inserisci il nome" name="title" required>
          
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

          </div>

          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Description:</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="formGroupExampleInput" placeholder="inserisci la descrizione" name="description" required>
          
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

          </div>

          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Ultimo commit:</label>
            <input type="text" class="form-control @error('last_commit') is-invalid @enderror" id="formGroupExampleInput2" placeholder="ultimo commit" name="last_commit" required>
          
            @error('last_commit')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

          </div>

          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Codice:</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" id="formGroupExampleInput2" placeholder="inserisci il tipo di codice utilizzato" name="code" required>
          
            @error('code')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          
          </div>

          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Tipo:</label>
            <select class="form-select" aria-label="Default select example" name="type_id">
              <option selected>seleziona il tipo di progetto</option>
              @foreach ($types as $type)
                <option value="{{$type->id}}">{{$type->title}}</option>  
              @endforeach
            </select>
          
          </div>

          <input type="submit">
    </form>
    <!--/form-->

   </div>
   <!--/contenitore-->
@endsection