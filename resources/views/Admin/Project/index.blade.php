
@extends('layouts.admin')

@section('content')
<div class="fm-container bg-card">

    <h6 class="text-white bg-black">Progetti:</h6>
    <div class="box d-flex flex-wrap scroll">
        @foreach ($projects as $project)
        
            <!--card-->
            <div class="fm-card text-white">

                <!--nome progetto-->
                <div class="row d-flex justify-content-between">
                    <div class="d-flex">
                        <div>
                            <strong class="me-2">Progetto: </strong>   
                        </div>
                        <div>
                            <h5>{{$project->title}}</h5>  
                        </div>
                    </div>
                    <button class="fm-btn">
                        <a href="{{route('admin.project.show', $project)}}">Mostra</a>
                    </button>
                    <button class="fm-btn me-2">
                        <a href="{{route('admin.project.edit', $project)}}">Modifica</a>
                    </button>
                </div>
                <!--/nome progetto-->

                <!--linguaggio e ultimo commit-->
                <div class=" d-flex justify-content-between">
                    <div>
                        <strong class="me-1">Linguaggio:</strong> 
                        <div>{{$project->code}}</div>
                    </div>
                    <div>
                        <strong class="me-1">aggiornato:</strong> 
                        <div>{{$project->last_commit}}</div>
                    </div>
                </div>
                <!--/linguaggio e ultimo commit-->
                <div class=" d-flex justify-content-between">

                    <div>
                        <strong class="me-1">Tipo:</strong> 
                        <div>{{$project->type->title}}</div>
                    </div>

                    <!--destroy-->
                    <form class=" m-0 d-flex justify-content-center" action="{{route('admin.project.destroy', $project->id)}}" method="POST">
                        @csrf

                        <!--richiamiamo il metodo-->
                        @method('DELETE')
                        <button class="fm-btn text-white">
                            Elimina
                        </button>
                    </form>
                    <!--/destroy-->
                    
                </div>
                
                
                
            </div>
            <!--/card-->
        @endforeach
    </div>

   <!--aggiungere progetto-->
    <button class="fm-btn">
    <a href="{{route('admin.project.create')}}"> Aggiungi progetto</a>
    </button>
</div>
@endsection  
    
