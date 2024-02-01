@extends('layouts.app')
@section('content')

<div class="container">
    <a href="/export-stagiaires" class="btn btn-primary text-light  my-2"><i class="fa-solid fa-save"></i> Sauvegarder le tableau stagiaires</a> <br>
    <a href="/export-filieres"class="btn btn-primary text-light  my-2"><i class="fa-solid fa-save"></i> Sauvgarder le tableau filieres</a> <br>
    <a href="/export-services"class="btn btn-primary text-light  my-2"><i class="fa-solid fa-save"></i> Sauvgarder le tableau services</a> <br>
    <a href="/export-encadrants"class="btn btn-primary text-light  my-2"><i class="fa-solid fa-save"></i> Sauvgarder le tableau encadrants</a> <br>
    <a href="/export-etablissements"class="btn btn-primary text-light  my-2"><i class="fa-solid fa-save"></i> Sauvgarder le tableau etablissements</a> <br>
</div>

@endsection
