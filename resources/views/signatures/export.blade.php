<!-- resources/views/signature/export.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Export Signature</h1>

    @if($activeSignature)
        <div class="card mb-3">
            <div class="card-header">
                Active Signature
            </div>
            <div class="card-body">
                <p><strong>Ligne 1:</strong> {{ $activeSignature->head1 }}</p>
                <p><strong>Ligne 2:</strong> {{ $activeSignature->head2 }}</p>
                <p><strong>Ligne 3:</strong> {{ $activeSignature->head3 }}</p>
                <p><strong>Ligne 4:</strong> {{ $activeSignature->head4 }}</p>
                <p><strong>Signature 1:</strong> {{ $activeSignature->sign1 }}</p>
                <p><strong>Signature 2:</strong> {{ $activeSignature->sign2 }}</p>
            </div>
        </div>
    @endif

    <a href="{{ route('signatures.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection

