@extends('layouts.app')

@section('content')
    <div class="content mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header p-2">
                            <h4>Edit Barber</h4>
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
                                    <form method="POST" action="{{ route('owner.barber.update', $barber) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label class="form-label">Price</label>
                                            <input type="number" name="price" value="{{ $barber->price }}"
                                                class="form-control @error('price') is-invalid @enderror" required autofocus
                                                placeholder="Barber price">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Open</label>
                                            <input type="time" name="open" value="{{ $barber->open->format('H:i') }}"
                                                class="form-control @error('open') is-invalid @enderror" required
                                                placeholder="Barber open">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Close</label>
                                            <input type="time" name="close" value="{{ $barber->close->format('H:i') }}"
                                                class="form-control @error('close') is-invalid @enderror" required
                                                placeholder="Barber close">
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
