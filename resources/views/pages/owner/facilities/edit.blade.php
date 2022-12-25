@extends('layouts.app')

@section('content')
    <div class="content mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header p-2">
                            <h4>Edit Facility</h4>
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
                                    <form method="POST" action="{{ route('owner.facilities.update', $facility) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" value="{{ $facility->name }}"
                                                class="form-control @error('name') is-invalid @enderror" required autofocus
                                                placeholder="Facility name">
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
