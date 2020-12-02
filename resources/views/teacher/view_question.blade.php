@extends('teacher.default')
@section('title','Exam | Question')
@section('content')
<div class="content-wrapper">

  <section class="content">
    <div class="container">
     <div class="mt-5"></div>
     <div class="card">
      <div class="card-header text-center bg-dark">
       <div class="row">
        <div class="col-sm-4 text-left">
        <a href="{{url('/teacher/exam')}}" class="btn btn-sm btn-danger">Back</a>
        </div>
        <div class="col-sm-4 text-cener">
         <strong class="text-danger h3">Question Details</strong>
        </div>
        <div class="col-sm-4 text-right">
         <strong class="btn btn-info btn-sm"data-toggle="modal" data-target="#Exam_Question_Modal" onclick="set_id_question_modal({{$exams_id}})">Add Question</strong>
        </div>
       </div>
      </div>
      <div class="card-body">
        <div class="error"></div>
        <div class="success"></div>
    <!------===========Teacher Details Start=============------->
       <table class="table table-bordered table-striped">
        <thead class="bg-dark">
         <tr class="text-center">
          <td>No</td>
          <td>Question</td>
          <td>Option 1</td>
          <td>Option 2</td>
          <td>Option 3</td>
          <td>Option 4</td>
          <td>Ans</td>
          <td colspan="2">ACTION</td>
         </tr>
        </thead>
        <tbody>
        <!------=========== Shosw All Teacher Details Start=============------->
         @foreach ($questions as $key=> $question)
         <tr class="text-center">
          <td>{{$key+1}}</td>
          <td>{{$question->question}}</td>
          <td>{{$question->option1}}</td>
          <td>{{$question->option2}}</td>
          <td>{{$question->option3}}</td>
          <td>{{$question->option4}}</td>
          <td>{{$question->ans}}</td>
          <td>
           <button class="btn btn-sm btn-danger" onclick="questions_deletes({{$question->id}})">Delete</button>
          </td>
         </tr>
         @endforeach
        <!------=========== Shosw All Teacher Details End=============------->
        </tbody>
       </table>
    <!------===========Teacher Details End=============--------->
      </div>
     </div>
    </div>

  

<!------===========Add Exam Question Modal Start=============--------->  
 <div class="modal fade" id="Exam_Question_Modal" tabindex="-1" role="dialog" aria-labelledby="Exam_Question_ModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
     <div class="modal-content bg-dark">
       <div class="modal-body">
          <div class="card modal_Exam">
              <div class="card-header text-center bg-info">
                <div class="row">
                  <div class="col-sm-6 text-center">
                    <span class="h3"> Add Examnation Question </span>
                  </div>
                  <div class="col-sm-6 text-right">
                    <button type="button" class="btn btn-close" data-dismiss="modal">❌</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <strong><div  style="display: none;" class='alert bg-danger alert-dismissible fade show text-center' role='alert' id="question_error"></div></strong>
                <strong><div  style="display: none;" class='alert bg-success alert-dismissible fade show text-center' id="question_success" role='alert'></div></strong>
                <form id="question_form">

                  <input type="hidden" id="question_exam_id">

                  <div class="form-group">
                    <strong class="text-dark"><label for="question">Question :</label></strong>
                    <input type="text" class="form-control" id="question" placeholder="Enter Your Question" />
                  </div>
                  <div class="row">
                    <div class="form-group  col-sm-6">
                      <strong class="text-dark"><label for="question_option1">Option 1 :</label></strong>
                      <input type="text" class="form-control" id="question_option1" placeholder="Enter Option 1" />
                    </div>
                    <div class="form-group col-sm-6">
                      <strong class="text-dark"><label for="question_option2">Option 2 :</label></strong>
                      <input type="text" class="form-control" id="question_option2" placeholder="Enter Option 2" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-6">
                      <strong class="text-dark"><label for="question_option3">Option 3 :</label></strong>
                      <input type="text" class="form-control" id="question_option3" placeholder="Enter Option 3" />
                    </div>
                    <div class="form-group col-sm-6">
                      <strong class="text-dark"><label for="question_option4">Option 4 :</label></strong>
                      <input type="text" class="form-control" id="question_option4" placeholder="Enter Option 5" />
                    </div>
                  </div>
                  <div class="form-group">
                    <strong class="text-dark"><label for="question_right_option">Right Option :</label></strong>
                    <input type="text" class="form-control" id="question_right_option" placeholder="Enter Right Option" />
                  </div>
                  <button type="submit" class="btn bg-dark form-control" id="add_question_btn"><span class="text-info h5">Submit</span></button>
                </form>
              </div>
          </div>
       </div>
     </div>
     
  </div>
 </div>
<!------===========Add Exam Question Modal End=============--------->
  </section>
</div>


@endsection

@push('scripts')
<script>

function set_id_question_modal(id)
{
  $("#question_exam_id").val(id);
}

$("#add_question_btn").click(function(e){
   e.preventDefault();

   //<!--====== Access SignUp  Form Data======-->
   let exam_id            =   $("#question_exam_id").val();  
   let question           =   $("#question").val();
   let question_option1   =   $("#question_option1").val();
   let question_option2   =   $("#question_option2").val();
   let question_option3   =   $("#question_option3").val();
   let question_option4   =   $("#question_option4").val();
   let question_right_option   =   $("#question_right_option").val();
   let _token =   $('meta[name="csrf-token"]').attr('content');

   if(question=="" || question_option1=="" || question_option2=="" || question_option3=="" || question_option4=="" || question_right_option=="")
   {
    $("#question_error").show(50);
    $("#question_error").text('Fill All The Blanks');
    }
    else{
        $.ajax({
          url: "/exam/question",
          type:"POST",
          data:{
            exam_id:exam_id,
            question:question,
            question_option1:question_option1,
            question_option2:question_option2,
            question_option3:question_option3,
            question_option4:question_option4,
            question_right_option:question_right_option,
            _token: _token
          },
          success:function(response){
           console.log(response);
            if(response.error)
            {
             $("#question_error").show(100);
             $("#question_error").text(response.error);
            }else{
                $("#question_form").trigger('reset');
                $("#question_error").hide(500);
                
                $(location).attr('href', '/view_question/'+{{$exams_id}});


            }
      
          }
        })
    }

});


function questions_deletes(id)
{

  $.ajax({
    url:"/teacher/question/delete/"+id,
    type:"GET",
     dataType:"json",
    success:function(data)
    {
      $(location).attr('href', '/view_question/'+{{$exams_id}});
    }
  });
}




</script>
@endpush