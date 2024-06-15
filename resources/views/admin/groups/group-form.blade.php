@extends('admin.templates.panel-form-template')
@section('title')
    @if(isset($item))
        {{__("Edit group")}} [{{$item->name}}]
    @else
        {{__("Add new group")}}
    @endif -
@endsection
@section('form')

    <div class="row">
        <div class="col-lg-3">
            @include('components.err')
            <div class="item-list mb-3">
                <h3 class="p-3">
                    <i class="ri-message-3-line"></i>
                    {{__("Tips")}}
                </h3>
                <ul>
                    <li>
                        {{__("You can leave the slug empty; it will be generated automatically.")}}
                    </li>
                </ul>
            </div>

            @if(isset($item))
                <div class="item-list mb-3">
                    <h3 class="p-3">
                        <i class="ri-image-2-line"></i>
                        {{__('Feature image')}}
                    </h3>
                    <img src="{{$item->imgUrl()}}" alt="{{$item->name}}" class="img-fluid">

                </div>
                <div class="item-list mb-3">
                    <h3 class="p-3">
                        <i class="ri-image-2-line"></i>
                        {{__('Background image')}}
                    </h3>
                    <img src="{{$item->bgUrl()}}" alt="{{$item->name}}" class="img-fluid">

                </div>
            @endif


        </div>
        <div class="col-lg-9 ps-xl-1 ps-xxl-1">
            <div class="general-form ">

                <h1>
                    @if(isset($item))
                        {{__("Edit group")}} [{{$item->name}}]
                    @else
                        {{__("Add new group")}}
                    @endif
                </h1>

                <div class="row">

                    <div class="form-group row">
                        <div class="col-md-6 mt-3">
                            <label for="name">
                                {{__('Group name')}}
                            </label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   placeholder="{{__('Group name')}}" value="{{old('name',$item->name??null)}}"/>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="name">
                                {{__('Group slug')}}
                            </label>
                            <input name="slug" type="text" class="form-control @error('slug') is-invalid @enderror"
                                   placeholder="{{__('Group slug')}}" value="{{old('slug',$item->slug??null)}}"/>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label for="subtitle">
                                    {{__('Subtitle')}}
                                </label>
                                <input name="subtitle" type="text"
                                       class="form-control @error('subtitle') is-invalid @enderror" id="subtitle"
                                       placeholder="{{__('Subtitle')}}"
                                       value="{{old('subtitle',$item->subtitle??null)}}"/>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="parent">
                                {{__('Group Parent')}}
                            </label>
                            <select name="parent_id" id="parent"
                                    class="form-control @error('parent') is-invalid @enderror">
                                <option value=""> {{__('No parent')}} </option>
                                @foreach($cats as $cat )
                                    @if( !isset($item) || $cat->id != $item->id )
                                        <option value="{{ $cat->id }}"
                                                @if (old('parent',$item->parent_id??null) == $cat->id  ) selected @endif >
                                            {{$cat->name}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="form-group">
                                <label for="image">
                                    {{__('Feature image')}}
                                </label>
                                <input accept=".jpg,.png,.svg" name="image" type="file"
                                       class="form-control @error('image') is-invalid @enderror" id="image"
                                       placeholder="{{__('Feature image')}}"/>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="form-group">
                                <label for="bg">
                                    {{__('Background image')}}
                                </label>
                                <input accept=".jpg,.png,.svg" name="bg" type="file"
                                       class="form-control @error('bg') is-invalid @enderror" id="bg"
                                       placeholder="{{__('Background image')}}"/>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="description">
                                {{__('Description')}}
                            </label>
                            <textarea rows="5" name="description"
                                      class="form-control @error('description') is-invalid @enderror"
                                      placeholder="{{__('Description')}}">{{old('description',$item->description??null)}}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label> &nbsp;</label>
                            <input name="" type="submit" class="btn btn-primary mt-2" value="{{__('Save')}}"/>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
