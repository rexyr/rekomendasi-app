@extends('layouts.admin.app')

@section('content')
    <div class="content mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header p-2">
                            <h4>Add Cafe</h4>
                        </div>
                        <div class="card-body p-2">
                            <div class="row justify-content-center">
                                <div class="col col-sm-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('admin.cafes.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <h4>User</h4>
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" value="{{ old('name') }}"
                                                        class="form-control @error('name') is-invalid @enderror" required
                                                        autofocus autocomplete="off" placeholder="User name">
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" value="{{ old('email') }}"
                                                        class="form-control @error('email') is-invalid @enderror" required
                                                        autocomplete="off" placeholder="User email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label class="form-label">Phone</label>
                                                    <input type="number" name="phone" value="{{ old('phone') }}"
                                                        class="form-control @error('phone') is-invalid @enderror" required
                                                        autocomplete="off" placeholder="User phone">
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label class="form-label">Username</label>
                                                    <input type="text" name="username" value="{{ old('username') }}"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        required autocomplete="off" placeholder="User username">
                                                </div>
                                            </div>
                                        </div>
                                        <h4>Cafe</h4>
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="cafe_name" value="{{ old('cafe_name') }}"
                                                        class="form-control @error('cafe_name') is-invalid @enderror"
                                                        required autocomplete="off" placeholder="Cafe name">
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" name="price" value="{{ old('price') }}"
                                                        class="form-control @error('price') is-invalid @enderror" required
                                                        autocomplete="off" placeholder="Cafe price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea name="address" id="address" cols="5"
                                                class="form-control @error('address') is-invalid @enderror" rows="2"
                                                placeholder="Cafe Address">{{ old('address') }}</textarea>
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
