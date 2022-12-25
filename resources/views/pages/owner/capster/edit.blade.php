@extends('layouts.app')

@section('content')
    <div class="content mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header p-2">
                            <h4>Edit Capster {{ $capster->name }}</h4>
                        </div>
                        <div class="card-body p-2">
                            <div class="row justify-content-center">
                                <div class="col-9 col-md-6">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('owner.capsters.update', $capster) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row justify-content-center">
                                            <img src="{{ $capster->photo }}" alt="" width="100px" height="100px"
                                                class="mx-auto rounded-circle">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" value="{{ $capster->name }}"
                                                class="form-control @error('name') is-invalid @enderror" required autofocus
                                                placeholder="Capster name">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Age</label>
                                            <input type="number" name="age" value="{{ $capster->age }}"
                                                class="form-control @error('age') is-invalid @enderror" required
                                                placeholder="Capster age">
                                        </div>
                                        <div class="form-group">
                                            <label for="photo">Photo</label>
                                            <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                                id="photo" name="photo" accept=".png,.jpg,.jpeg">
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
