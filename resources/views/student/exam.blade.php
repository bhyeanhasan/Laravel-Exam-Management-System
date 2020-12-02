@extends('student.default')
@section('title',' Student | Exam')
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
         <span class="h2 text-dark" style="font-weight:bold;">Exam Details</span>
        </div>



        <div class="card-body">
         <table class="table table-striped teble-hover table-bordered">
          <thead class="bg-dark">
           <tr class="text-center">
            <th>Course</th>
            <th>Course Code</th>
            <th>Exam Type</th>
            <th>Exam Mark</th>
            <th>Exam Date</th>
            <th>Exam Time</th>
            <th>Status</th>
            <th colspan="2">Action</th>
           </tr>
          </thead>

          <tbody>
            @foreach ($datas as $key=> $data)
            <tr class="text-center">
              <td>{{ $data->course }}</td>
              <td>{{ $data->course_id }}</td>
              <td>{{ $data->exam_type }}</td>
              <td>{{ $data->exam_mark }}</td>
              <td>{{ $data->exam_date}}</td>
              <td>{{ $data->exam_time }}</td>
              <td><?php
                if(strtotime( $data->exam_date)  < strtotime(date('d/m/Y')))
                {
                   echo "Complited";
                }else if(strtotime( $data->exam_date) == strtotime(date('d/m/Y')))
                {
                  echo "Running";
                }else
                {
                    echo "Pending";
                }
              ?></td>
             
              <td>
                <?php 
                  if($data->status == '1')
                  {
                  ?>
                        <a href="{{ url('/student/join_exam/'. $data->id) }}" class="btn btn-sm btn-info">Join Exam</a>
                  <?php
                }else{
                  ?>
                      <a class="btn btn-sm btn-info disabled">Join Exam</a>
                  <?php
                }
                ?>
              </td>
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
