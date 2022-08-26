@extends('backends.master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 main-content">
                <div class="panel panel-default">
                    <div class="panel-heading font-weight-bold text-uppercase"><h3><strong>News</strong></h3></div>
                    <div class="panel-body">
                        @include('backends.notification')
                        <div class="addAndSearch">
                            <div class="clearfix">
                                    <a href="{{ url('/admincp/storys/create') }}" class="btn btn-success btn-sm" title="Add New Post">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Add new
                                    </a>
            
                            </div>
                            {!! Form::open(['method' => 'GET', 'url' => '/admincp/storys', 'class' => 'searchForm clearfix navbar-right', 'role' => 'search'])  !!}
                            <div class="input-group clearfix">
                                <input type="text" class="form-control" name="search" placeholder="Search ..." value="{{ Request::input('search') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        

                        <br/>
                        <br/>
                        <div class="table-responsive infoTable">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-custom">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th style="width: 15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php 
                                  if( !isset($_GET['page']) || $_GET['page']==1 ){
                                    $stt = 1;
                                  }else{
                                    $stt = ( ($_GET['page'] - 1) * $story->perPage() ) + 1;
                                  }
                                ?>
                                @foreach($story as $item)
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td class="text-left">
                                            {{ $item->name }}
                                        </td>
                                        <td class="text-left">
                                            {{ $item->slug }}
                                        </td>
                                        <td>
                                            <a href="{{ url('/admincp/storys/' . $item->id . '/edit') }}" title="Edit story"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        </td>
                                    </tr>
                                <?php $stt++; ?>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $story->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
