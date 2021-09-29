@extends('admin.app')
@section('content')
<div class="box">
        <div class="box-header with-border">
          <h2 >Tribhuvan International Airport</h2>
        </div>
        <!-- /.box-body -->
        <br>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>9</h3>

                  <p>Total Bay</p>
                </div>
                <div class="icon">
                  <i class="fas fa-plane-arrival"></i>
                </div>
                <a href="{{route('bay.index')}}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53</h3>

                  <p>Total Flight Type</p>
                </div>
                <div class="icon">
                  <i class="fas fa-plane"></i>
                </div>
                <a href="{{route('flighttype.index')}}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>36</h3>

                  <p>Total Counter</p>
                </div>
                <div class="icon">
                  <i class="fas fa-desktop"></i>
                </div>
                <a href="{{route('counter.index')}}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                    <h3>&nbsp;</h3>
                  <p>Search Available Bay</p>
                </div>
                <div class="icon">
                  <i class="fas fa-road"></i>
                </div>
            <a href="{{route('findbay.index')}}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                    <h3>&nbsp;</h3>
                  <p>Bay Graph</p>
                </div>
                <div class="icon">
                  <i class="fas fa-chart-bar"></i>
                </div>
            <a href="{{route('baygraph.index')}}" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
          </div>

        <!-- /.box-footer-->
      </div>
@endsection
