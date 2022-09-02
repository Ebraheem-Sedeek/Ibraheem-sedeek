@extends('layouts.parent')

@section('title', 'Creat Product')
@section('content')
<div class="col-12">
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>

    @endif
</div>
    <div class="col-12">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-6">
                    <label for="name_en">Name (EN)</label>
                    <input type="text" name="name_en" id="name_en" class="form-control" placeholder="Enter Name EN"
                        aria-describedby="helpId" value="{{ old('name_en') }}">
                    @error('name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="name_ar">Name (AR)</label>
                    <input type="text" name="name_ar" id="name_ar" class="form-control" placeholder="Enter Name_AR"
                        aria-describedby="helpId" value="{{ old('name_ar') }}">
                    @error('name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-4">
                    <label for="Code">Code</label>
                    <input type="number" name="Code" id="Code" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ old('Code') }}">
                    @error('Code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="Price">Price</label>
                    <input type="number" name="Price" id="Price" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ old('Price') }}">
                    @error('Price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ old('quantity') }}">
                    @error('quantity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">

                <div class="col-4">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option @selected(old('status') == 1) value="1">Acive</option>
                        <option @selected(old('status') == 0) value="0">Not Acive</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="brand_id">Brands</label>
                    <select name="brand_id" id="brand_id" class="form-control">
                        @foreach ($brands as $brand)
                            <option @selected(old('brand_id') == $brand->id)value="{{ $brand->id }}">
                                {{ $brand->name_en }}-{{ $brand->name_ar }}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="subcategory_id">Subcategory</label>
                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                        @foreach ($subcategories as $subcategory)
                            <option @selected(old('subcategory_id') == $subcategory->id) value="{{ $subcategory->id }}">
                                {{ $subcategory->name_en }}-{{ $subcategory->name_ar }}
                            </option>
                        @endforeach
                    </select>
                    @error('subcategory_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <label for="details_en">Detals (EN)</label>
                    <textarea name="details_en" id="details_en" class="form-control" cols="30" rows="10">{{ old('details_en') }}</textarea>
                    @error('details_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="details_ar">Detals (AR)</label>
                    <textarea name="details_ar" id="details_ar" class="form-control" cols="30" rows="10">{{ old('details_ar') }}</textarea>
                    @error('details_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" placeholder="">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary my-2">Create</button>
        </form>

    </div>


@endsection
