@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
    <input type="hidden" id="page_url" value="{{ route('language.index') }}">
    <section class="content-header">
        <div class="content-header-left">
            <h1>{{ $page_title }}</h1>
        </div>
        @can('language-create')
        <div class="content-header-right">
            <a href="{{ route('language.create') }}" class="btn btn-primary btn-sm">Add New Language</a>
        </div>
        @endcan
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="callout callout-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="box box-info">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-1">Search:</div>
                            <div class="d-flex col-sm-6">
                                <input type="text" id="search" class="form-control" placeholder="Search">
                            </div>
                            <div class="d-flex col-sm-5">
                                <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                    <option value="All" selected>Search by status</option>
                                    <option value="1">Active</option>
                                    <option value="2">In-Active</option>
                                </select>
                            </div>
                        </div>
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Language</th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach($languages as $key=>$language)
                                    <tr id="id-{{ $language->slug }}">
                                        <td>{{  $languages->firstItem()+$key }}.</td>
                                        <td>{{ $language->title }}</td>
                                        <td>{{ $language->code }}</td>
                                        <td>{!! $language->description !!}</td>
                                        <td>
                                            @if($language->status)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">In-Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('language-edit')
                                                <a class="btn btn-primary btn-xs" href="{{ route('language.edit', $language->slug) }}"><i class="fa fa-edit"></i> Edit</a>
                                            @endcan
                                            @can('language-delete')
                                                <button class="btn btn-danger btn-xs delete" data-slug="{{ $language->slug }}" data-del-url="{{ url('language', $language->slug) }}"><i class="fa fa-trash"></i> Delete</button>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6">
                                        Displying {{$languages->firstItem()}} to {{$languages->lastItem()}} of {{$languages->total()}} records
                                        <div class="d-flex justify-content-center">
                                            {!! $languages->links('pagination::bootstrap-4') !!}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
@endsection

@push('js')
@endpush
