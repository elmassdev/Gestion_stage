@extends('layouts.app')

@section('content')
<div class="container my-2">
    <div class="card my-4">
        <div class="card-header"> {{ __('Ajouter un nouveau en-tête') }}  </div>
        <div class="row  card-body">
            <div class="col border border-solid rounded pt-2">
                <form action="{{ route('signatures.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="logo">Logo :</label>
                        <div class="col-md-8">
                            <input type="file" name="logo" id="logo" class="form-control">
                            @error('logo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="head1">la première ligne:</label>
                        <div class="col-md-8">
                        <input type="text" name="head1" id="head1" class="form-control" value="{{ old('head1') }}" required>
                        @error('head1')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="head2">Ligne 2:</label>
                        <div class="col-md-8">
                        <input type="text" name="head2" id="head2" class="form-control" value="{{ old('head2') }}" required>
                        @error('head2')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="head3">Ligne 3:</label>
                        <div class="col-md-8">
                        <input type="text" name="head3" id="head3" class="form-control" value="{{ old('head3') }}" required>
                        @error('head3')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="head4">Ligne 4:</label>
                        <div class="col-md-8">
                        <input type="text" name="head4" id="head4" class="form-control" value="{{ old('head4') }}" required>
                        @error('head4')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="sign1">Signature 1:</label>
                        <div class="col-md-8">
                        <input type="text" name="sign1" id="sign1" class="form-control" value="{{ old('sign1') }}" required>
                        @error('sign1')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="sign2">Signature 2:</label>
                        <div class="col-md-8">
                        <input type="text" name="sign2" id="sign2" class="form-control" value="{{ old('sign2') }}" required>
                        @error('sign2')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="sign_op">Signature OP:</label>
                        <div class="col-md-8">
                        <input type="text" name="sign_op" id="sign_op" class="form-control" value="{{ old('sign_op') }}" required>
                        @error('sign_op')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="sigle">Sigle:</label>
                        <div class="col-md-8">
                        <input type="text" name="sigle" id="sigle" class="form-control" value="{{ old('sigle') }}" required>
                        @error('sigle')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="phone">Phone:</label>
                        <div class="col-md-8">
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="Fax">Fax:</label>
                        <div class="col-md-8">
                        <input type="text" name="Fax" id="Fax" class="form-control" value="{{ old('Fax') }}" required>
                        @error('Fax')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="site">Site:</label>
                        <div class="col-md-8">
                        <select id="site" type="text" class="form-control  @error('site') is-invalid @enderror" name="site"  autocomplete="site">
                            <option value="Benguerir" @if (Auth::user()->site =='Benguerir') selected     @endif>Benguerir</option>
                            <option value="Youssoufia" @if (Auth::user()->site =='Youssoufia') selected     @endif > Youssoufia</option>
                        </select>
                        @error('site')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="effective_date">Date d'effet:</label>
                        <div class="col-md-8">
                        <input type="date" name="effective_date" id="effective_date" class="form-control" value="{{ old('effective_date') }}" required>
                        @error('effective_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="is_active" class="form-check-label">Activé</label>
                        <div class="col-md-8">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input form-control"
                            value="1" {{ old('is_active', $signature->is_active ?? false) ? 'checked' : '' }}>
                        @error('is_active')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary col-md-3 mx-auto">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
