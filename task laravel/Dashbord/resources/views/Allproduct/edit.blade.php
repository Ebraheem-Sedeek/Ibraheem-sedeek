@extends('layouts.parent')

@section('title', 'product edit')
@section('content')
<div class="col-12">
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>

    @endif
</div>
    <div class="col-12">
        <form action="{{ route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col-6">
                    <label for="name_en">Name (EN)</label>
                    <input type="text" name="name_en" id="name_en" value="{{ $product->name_en }}" class="form-control"
                        placeholder="Enter Name EN" aria-describedby="helpId">
                    @error('name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="name_ar">Name (AR)</label>
                    <input type="text" name="name_ar" id="name_ar" value="{{ $product->name_ar }}" class="form-control"
                        placeholder="Enter Name_AR" aria-describedby="helpId">
                    @error('name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-4">
                    <label for="Code">Code</label>
                    <input type="number" name="Code" id="Code" value="{{ $product->code }}" class="form-control"
                        placeholder="" aria-describedby="helpId">
                    @error('Code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="Price">Price</label>
                    <input type="number" name="Price" id="Price" value="{{ $product->price }}" class="form-control"
                        placeholder="" aria-describedby="helpId">
                    @error('Price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}"
                        class="form-control" placeholder="" aria-describedby="helpId">
                    @error('quantity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">

                <div class="col-4">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option @selected($product->status == 1) value="1">Acive</option>
                        <option @selected($product->status == 0) value="0">Not Acive</option>
                    </select>

                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="col-4">
                    <label for="brand_id">Brands</label>
                    <select name="brand_id" id="brand_id" class="form-control">
                        @foreach ($brands as $brand)
                            <option @selected($product->brand_id == $brand->id) value="{{ $brand->id }}">
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
                            <option @selected($product->subcategory_id == $subcategory->id) value="{{ $subcategory->id }}">
                                {{ $subcategory->name_en }}-{{ $subcategory->name_ar }}</option>
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
                    <textarea name="details_en" id="details_en" class="form-control" cols="30" rows="10">{{ $product->details_en }}</textarea>
                    @error('details_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="details_ar">Detals (AR)</label>
                    <textarea name="details_ar" id="details_ar" class="form-control" cols="30" rows="10">{{ $product->details_ar }}</textarea>

                    @error('details_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <label for="image">Image</label>
                <img src="{{ asset('images/product/' . $product->image) }}" class="w-100" alt="">
                <input type="file" name="image" id="image" class="form-control" placeholder="">
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
            </div>
            <button class="btn btn-primary my-2">update</button>
        </form>

    </div>


@endsection
