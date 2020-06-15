@extends('layouts.admin')
@section('content')


    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    @if(isset($title))
                        <h3>{{$title}}</h3>
                    @endif
                </div>

                <div class="title_right">
                    @if(isset($search) && $search === true)
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Поиск...">
                                <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Искать!</button>
                    </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>

            @if(isset($page))
                        <?= "<".$page."></".$page.">"; ?>
                @endif


        </div>
    </div>



@endsection
