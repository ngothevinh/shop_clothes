@extends('admin.layout.master')

@section('title','Blog')
@section('body')

    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Blog
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>

                <div class="page-title-actions">
                    <a href="./admin/blog/create" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-plus fa-w-20"></i>
                                    </span>
                        Create
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-header">

                        <form>
                            <div class="input-group">
                                <input type="search" name="search" id="search"
                                       placeholder="Search everything" class="form-control"
                                       value="{{request('search')}}">
                                <span class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-search"></i>&nbsp;
                                                    Search
                                                </button>
                                            </span>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Title</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @foreach($brands as $brand)--}}
                                <tr>
                                    <td class="text-center text-muted">1</td>
                                    <td>sdfsdfsd</td>
                                    <td class="text-center">dghfchfg</td>
                                    <td class="text-center">
                                        <a href="#"
                                           class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                            Details
                                        </a>
                                        <a href="#" data-toggle="tooltip" title="Edit"
                                           data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                        <span class="btn-icon-wrapper opacity-8">
                                                            <i class="fa fa-edit fa-w-20"></i>
                                                        </span>
                                        </a>
                                    </td>
                                </tr>
{{--                            @endforeach--}}
                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
{{--                        {{$brands->links()}}--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
