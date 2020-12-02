@extends('student.default')
@section('title',' Student | Result')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
   <div class="mt-2"></div>
    <div class="container">
     <div class="row">
      <div class="col-sm-10 m-auto">
       <div class="card">
        <div class="card-header text-center bg-info">
          <div class="row">
           <div class="col-sm-11 text-cener">
            <strong class="h2 text-dark" style="font-weight:bold;">Your All Result</strong>
           </div>
           <div class="col-sm-1 text-right">
            <button class="btn btn-sm btn-danger ">Print</button>
           </div>
          </div>
        </div>
        <div class="card-body">
         <table class="table table-striped teble-hover table-bordered">
          <thead class="bg-dark">
           <tr class="text-center">
            <th>Session</th>
            <th>Semister</th>
            <th>Date</th>
            <th>Type</th>
            <th>Courese Code</th>
            <th>Total Mark</th>
            <th>Right Mark</th>
            <th>Print</th>
           </tr>
          </thead>

          <tbody>
            @foreach ($datas as $data)
            <tr class="text-center">
              <td>{{ $data->session }}</td>
              <td>{{ $data->semister }}</td>
              <td>{{ $data->exam_date }}</td>
              <td>{{ $data->exam_type }}</td>
              <td>{{ $data->course_id}}</td>
              <td>{{ $data->yes_ans+$data->no_ans}}</td>
              <td>{{ $data->yes_ans }}</td>
            <td><a href="{{url('/student/show_result/'.$data->exam_id.'/'.$data->id)}}" class="btn btn-sm btn-info">view</a></td>
          </tr>            
            @endforeach

          </tbody>
         </table>
        </div>
       </div>
      </div>
     </div>
    </div>
  </div>
</div>
@endsection
