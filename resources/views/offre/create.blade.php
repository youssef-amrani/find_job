@extends('layouts.app')

@section('content')

<form method="Post" action="{{route('offre.store')}}">
@method("POST")

<label> offre title </label>
    <input type="text" name="title" required><br>


<label> content </label>
    <input type="text" name="content" required><br>


<label> type_offre </label>
    <input type="text" name="type_offre" required><br>


<label> Localisation </label>
    <input type="text" name="Localisation" required><br>


 <label> date_debut</label>
    <input type="date" name="date_debut" required><br>
    

<label> date_fin </label>
    <input type="date" name="date_fin" required><br>

    <button type="submit">sir 3la lah </button> 
</form>
     








@endsection