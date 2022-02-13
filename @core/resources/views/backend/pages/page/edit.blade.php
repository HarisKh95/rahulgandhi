@extends('backend.admin-master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
<x-media.css/>
<x-summernote.css/>
@endsection
@section('site-title')
    {{__('Edit Page')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Edit Page')}}  </h4>
                            <div class="header-title">
                                <a href="{{ route('admin.page') }}" class="btn btn-primary mt-4 pr-4 pl-4">{{__('All Pages')}}</a>
                            </div>
                        </div>
                        <form action="{{route('admin.page.update',$page_post->id)}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="title">{{__('Title')}}</label>
                                <input type="text" class="form-control" name="title" value="{{$page_post->title}}" placeholder="{{__('Title')}}">
                            </div>
                            <div class="form-group">
                                <label>{{__('Content')}}</label>
                                <input type="hidden" name="content" value="{{$page_post->content}}">
                                <div class="summernote" data-content="{{ $page_post->content }}">{!! ($page_post->content) !!}</div>
                            </div>
                            <div class="form-group">
                                <label for="slug">{{__('Slug')}}</label>
                                <input type="text" class="form-control" name="slug" value="{{$page_post->slug}}" placeholder="{{__('Slug')}}">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_title">{{__('Meta Title')}}</label>
                                    <input type="text" name="meta_title" value="{{$page_post->meta_title}}" class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="og_meta_title">{{__('OG Meta Title')}}</label>
                                    <input type="text" name="og_meta_title" value="{{$page_post->og_meta_title}}" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_description">{{__('Meta Description')}}</label>
                                    <textarea name="meta_description" class="form-control" rows="5" id="meta_description">{{$page_post->meta_description}}</textarea>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="og_meta_description">{{__('OG Meta Description')}}</label>
                                    <textarea name="og_meta_description" class="form-control" rows="5" id="og_meta_description">{{$page_post->og_meta_description}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_tags">{{__('Meta Tags')}}</label>
                                    <input type="text" name="meta_tags" class="form-control" data-role="tagsinput"
                                        id="meta_tags" value="{{$page_post->meta_tags}}" >
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="og_meta_image">{{__('OG Meta Image')}}</label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $image = get_attachment_image_by_id($page_post->og_meta_image,null,true);
                                                $image_btn_label = 'Upload Image';
                                            @endphp
                                            @if (!empty($image))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="{{$image['img_url']}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $image_btn_label = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="og_meta_image" name="og_meta_image" value="{{$page_post->og_meta_image}}">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                            {{__($image_btn_label)}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <x-fields.status :name="'status'" :title="__('Status')" :value="$page_post->status"/>
                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup/>
@endsection
@section('script')
<x-media.js/>
<x-summernote.js/>
<x-btn.update/>
<script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
@endsection
