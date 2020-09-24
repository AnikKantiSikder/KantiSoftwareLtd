
@extends('Backend.Layouts.master')

@section('content')
<!-- Main contents starts here -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage News and Event</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">news and event</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->

            <div class="card">
              <div class="card-header">
                <h3>News and Event list
                  <a class="btn btn-success btn-sm float-right" href="{{ route('news_events.add') }}">
                    <i class="fa fa-plus-circle"></i>
                    Add news and event
                  </a>
                  

                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped" style="text-align: center;">
                      <thead>
                        <tr>
                          <th>SL.</th>
                          <th>Date</th>
                          <th>Image</th>
                          <th>Short title</th>
                          <th>Long title</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>

                      @foreach ($allData as $key=> $newsevent)
                      <tr>
                        <td> {{$key+1}} </td>
                        <td>{{date('d/m/Y', strtotime($newsevent->date))}}</td>
                        <td><img src="{{(!empty($newsevent->image))?url('public/Upload/NewsEvent_images/'.$newsevent->image):
                        url('public/Upload/no_image.png') }}" width="140px"; height="100px"></td>

                        <td>{{$newsevent->short_title}}</td>
                        <td>{{$newsevent->long_title}}</td>
                        <td>
                          <a title="Edit" class="btn btn-sm btn-info"
                           href="{{ route('news_events.edit', $newsevent->id) }}">
                          <i class="fa fa-edit"></i></a><br><br>
                          
                          <a title="Delete" id="delete" class="btn btn-sm btn-danger"
                           href="{{ route('news_events.delete', $newsevent->id) }}">
                          <i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>

                </table>
              </div><!-- /.card-body -->
            </div>

            <!-- /.card -->
          </section>
          <!-- /.Left col -->

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Main content ends here -->
@endsection

