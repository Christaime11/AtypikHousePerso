@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $product->description) }}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label class="required" for="price">{{ trans('cruds.product.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" required>
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                            <label class="required" for="categories">{{ trans('cruds.product.fields.category') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="categories[]" id="categories" multiple required>
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || $product->categories->contains($id)) ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('categories'))
                                <span class="help-block" role="alert">{{ $errors->first('categories') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('adresse') ? 'has-error' : '' }}">
                            <label class="required" for="adresse">{{ trans('cruds.product.fields.adresse') }}</label>
                            <input class="form-control" type="text" name="adresse" id="adresse" value="{{ old('adresse', $product->adresse) }}" required>
                            @if($errors->has('adresse'))
                                <span class="help-block" role="alert">{{ $errors->first('adresse') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.adresse_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nombre_lit') ? 'has-error' : '' }}">
                            <label class="required" for="nombre_lit">{{ trans('cruds.product.fields.nombre_lit') }}</label>
                            <input class="form-control" type="number" name="nombre_lit" id="nombre_lit" value="{{ old('nombre_lit', $product->nombre_lit) }}" step="1" required>
                            @if($errors->has('nombre_lit'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre_lit') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.nombre_lit_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('has_tv') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.product.fields.has_tv') }}</label>
                            <select class="form-control" name="has_tv" id="has_tv" required>
                                <option value disabled {{ old('has_tv', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Product::HAS_TV_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('has_tv', $product->has_tv) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('has_tv'))
                                <span class="help-block" role="alert">{{ $errors->first('has_tv') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.has_tv_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('has_chauffage') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.product.fields.has_chauffage') }}</label>
                            <select class="form-control" name="has_chauffage" id="has_chauffage" required>
                                <option value disabled {{ old('has_chauffage', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Product::HAS_CHAUFFAGE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('has_chauffage', $product->has_chauffage) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('has_chauffage'))
                                <span class="help-block" role="alert">{{ $errors->first('has_chauffage') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.has_chauffage_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('has_climatiseur') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.product.fields.has_climatiseur') }}</label>
                            <select class="form-control" name="has_climatiseur" id="has_climatiseur" required>
                                <option value disabled {{ old('has_climatiseur', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Product::HAS_CLIMATISEUR_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('has_climatiseur', $product->has_climatiseur) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('has_climatiseur'))
                                <span class="help-block" role="alert">{{ $errors->first('has_climatiseur') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.has_climatiseur_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('has_internet') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.product.fields.has_internet') }}</label>
                            <select class="form-control" name="has_internet" id="has_internet" required>
                                <option value disabled {{ old('has_internet', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Product::HAS_INTERNET_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('has_internet', $product->has_internet) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('has_internet'))
                                <span class="help-block" role="alert">{{ $errors->first('has_internet') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.has_internet_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                            <label class="required" for="photo">{{ trans('cruds.product.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <span class="help-block" role="alert">{{ $errors->first('photo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('admin.products.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($product) && $product->photo)
      var files = {!! json_encode($product->photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection