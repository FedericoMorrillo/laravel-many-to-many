@extends('layouts.admin')
@section('content')
<div class="row d-flex justify-content-between mb-3">
    <div class="d-flex">
        <div>
            <h4 class="me-2">Nome del Progetto: </h4>   
        </div>
        <div>
            <h4>{{$project->title}}</h4>  
        </div>
    </div>
    
</div>
<!--/nome progetto-->

<!--descrizione progetto-->
<div class="row mb-2">
    <strong class="me-1">Descrizione: </strong> 
    <div>{{$project->description}}</div>
</div>
<!--/descrizione progetto-->

<!--linguaggio e ultimo commit-->
<div >
    <div class="d-flex mb-2">
        <strong class="me-1">Codice:</strong> 
        <div>{{$project->code}}</div>
    </div>
    <div class="d-flex">
        <strong class="me-1">Ultimo commit</strong>
        <div>{{$project->last_commit}}</div>
    </div>
    <div class="d-flex">
        <strong class="me-1">Tipo</strong>
        <div>{{$project->type->title}}</div>
    </div>
    
    
</div>
<!--/linguaggio e ultimo commit-->
<button class="mt-5 fm-btn">
<a href="{{route('admin.project.index')}}">Torna ai progetti</a>
</button>
@endsection