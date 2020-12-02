@extends('student.default')
@section('title',' Student | JoinExam')
@section('content')
<style>
  .q_option{
    list-style: none;
  }
  p{
    font-weight: bold;
  }
  .q_option > li{
     margin-top: 10px;
  }
  .h3{
    font-weight: 900;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
   <div class="mt-2"></div>
    <div class="container">
     <div class="row">
      <div class="col-sm-10 m-auto">
       <div class="card">
        <div class="card-header text-center">
          @if(Session::has('error'))
          <div class="alert alert-danger text-center">
          <strong>{{Session::get('error')}}</strong>
          </div>
         @endif
         <span class="h3"> <strong class="text-info">Course :</strong> {{$data[0]->course}}</span><br>
         <span class="h3"> <strong class="text-info">Course Id:</strong> {{$data[0]->course_id}}</span><br>
         <span class="h3"> <strong class="text-info">Marks:</strong> {{$data[0]->exam_mark}}</span>
        </div>
        <div class="card-header bg-dark">
         <div class="row">
          <div class="col-md-6">
            @if(date('i',strtotime($data[0]->exam_time)) < date('i')+$data[0]->exam_duration)
              <h3>Start : {{$data[0]->exam_duration}}</h3>
            @else
            <h1>Bak</h1>
            @endif
          </div>
          <div class="col-md-6 text-right">
          <h3>End : {{ date('h',strtotime($data[0]->exam_time))}}:{{  date('i',strtotime($data[0]->exam_time)) + $data[0]->exam_duration}} {{  date('A',strtotime($data[0]->exam_time))}}</h3>
          </div>
         </div>
        </div>
         </div>
        <div class="card-body">
        <form action="{{ url('/student/submit_question') }}" method="post" id="exam_submit_form">
            @csrf
            <input type="hidden" name="exam_id" value="{{ Request::segment(3) }}">
            <div class="row">
              @foreach ($data as $key=> $alls)
              <div class="col-sm-4 text-left">
                <div>
                  <p>{{ $key+1}}. {{ $alls->question }}</p>
                  <input type="hidden" name="question{{ $key+1}}" value="{{ $alls->id }}"> 
                  <ul class="q_option">
                    <li><input type="radio"  name="ans{{ $key+1}}" value="{{ $alls->option1 }}">  &nbsp;{{ $alls->option1 }}</li>
                    <li><input type="radio"  name="ans{{ $key+1}}" value="{{ $alls->option2 }}">  &nbsp;{{ $alls->option2 }}</li>
                    <li><input type="radio"  name="ans{{ $key+1}}" value="{{ $alls->option3 }}">  &nbsp;{{ $alls->option3 }}</li>
                    <li><input type="radio"  name="ans{{ $key+1}}" value="{{ $alls->option4 }}">  &nbsp;{{ $alls->option4 }}</li>
                    <li style="display: none;">
                      <input type="radio" checked="checked" value="0" name="ans{{ $key+1}}">
                    </li>
                  </ul>
                </div>
              </div>
              @endforeach
            </div>
            <input type="hidden" name="index" value="<?php  echo $key+1  ?>">
            <button class="btn btn-info form-control" id="exam_submit" type="submit">Submit</button>
          </form>
        </div>
       </div>
      </div>
     </div>
    </div>
  </div>
</div>
@endsection


