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
          <strong class="btn btn-info btn-sm"data-toggle="modal" data-target="#Exam_Question_Modal">Add Question</strong>
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
              <th class="text-left">
                <input  type='checkbox' id='chkall' /> 
                <a href="" class="btn btn-light btn-sm" id="deleteAll"><i class="fas fa-edit"></i></a>
              </th>
              <th>No</th>
              <th>Question</th>
              <th>Option 1</th>
              <th>Option 2</th>
              <th>Option 3</th>
              <th>Option 4</th>
              <th>Ans</th>
              <th colspan="2">ACTION</th>
            </tr>
            </thead>
            <!------=========== Shosw All Question Details Start=============------->
            <tbody>
            </tbody>
            <!------=========== Shosw All Question Details End=============--------->
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
            <!------=========== Card header Start=============--------->  
              <div class="card-header text-center bg-info">
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-6 text-center">
                    <span class="h3"> Add Examnation Question </span>
                  </div>
                  <div class="col-sm-3 text-right">
                    <button type="button" class="btn btn-close" data-dismiss="modal">❌</button>
                  </div>
                </div>
              </div>
              <!------=========== Card header End=============---------> 
              
              <!------=========== Card Body Start=============--------->   
              <div class="card-body">
                <!------=========== warning message Start=============--------->
                <strong><div style="display: none;" id="question_error" class="alert bg-danger text-center"></div></strong>
                <strong ><div style="display: none;" id="question_success" class="alert bg-success text-center"></div></strong>
                <!------=========== warning message End=============--------->
                
                <!------=========== Question Add Form Start=============--------->
                <form id="question_form">

                   
                <input type="hidden" id="question_exam_id" value="{{$id}}"><!---===Hidden input field===--->

                  <div class="form-group"><!---=== Question field===--->
                    <strong class="text-dark"><label for="question">Question :</label></strong>
                    <input type="text" class="form-control" id="question" placeholder="Enter Your Question" />
                  </div>
                  <div class="row">
                    <div class="form-group  col-sm-6"><!---=== Option 1 field===--->
                      <strong class="text-dark"><label for="question_option1">Option 1 :</label></strong>
                      <input type="text" class="form-control" id="question_option1" placeholder="Enter Option 1" />
                    </div>
                    <div class="form-group col-sm-6"><!---=== Option 2 field===--->
                      <strong class="text-dark"><label for="question_option2">Option 2 :</label></strong>
                      <input type="text" class="form-control" id="question_option2" placeholder="Enter Option 2" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-6"><!---=== Option 3 field===--->
                      <strong class="text-dark"><label for="question_option3">Option 3 :</label></strong>
                      <input type="text" class="form-control" id="question_option3" placeholder="Enter Option 3" />
                    </div>
                    <div class="form-group col-sm-6"><!---=== Option 4 field===--->
                      <strong class="text-dark"><label for="question_option4">Option 4 :</label></strong>
                      <input type="text" class="form-control" id="question_option4" placeholder="Enter Option 5" />
                    </div>
                  </div>
                  <div class="form-group"><!---=== Right Option field===--->
                    <strong class="text-dark"><label for="question_right_option">Right Option :</label></strong>
                    <input type="text" class="form-control" id="question_right_option" placeholder="Enter Right Option" />
                  </div>
                  <button type="submit" class="btn bg-dark form-control" id="add_question_btn"><span class="text-info h5">Submit</span></button>
                </form>
                <!------=========== Question Add Form End=============--------->
              </div>
              <!------=========== Card Body End =============--------->
          </div>
       </div>
     </div>
     
  </div>
 </div>
<!------===========Add Exam Question Modal End=============--------->




<!------===========Edit Exam Question Modal Start=============--------->  
<div class="modal fade" id="Edit_Exam_Question_Modal" tabindex="-1" role="dialog" aria-labelledby="Edit_Exam_Question_ModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
     <div class="modal-content bg-dark">
       <div class="modal-body">
          <div class="card modal_Exam">
              <!------=========== Card header Start=============--------->  
              <div class="card-header text-center bg-info">
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-6 text-center">
                    <span class="h3"> Edit Examnation Question </span>
                  </div>
                  <div class="col-sm-3 text-right">
                    <button id="edit_modal" type="button" class="btn btn-close" data-dismiss="modal">❌</button>
                  </div>
                </div>
              </div>
              <!------=========== Card header End=============---------> 
              
              <!------=========== Card Body Start=============--------->  
              <div class="card-body">
                <!------=========== warning message Start=============--------->
                <strong><div style="display: none;" id="edit_question_error" class="alert bg-danger text-center"></div></strong>
                <strong ><div style="display: none;" id="edit_question_success" class="alert bg-success text-center"></div></strong>
                <!------=========== warning message End=============--------->
                
                <!------=========== Question Edit Form Start=============--------->
                <form id="edit_question_form">

                  <input type="hidden" id="edit_question_id"><!---===Hidden input field===--->

                  <div class="form-group"><!---=== Question field===--->
                    <strong class="text-dark"><label for="question">Question :</label></strong>
                    <input type="text" class="form-control" id="edit_question" placeholder="Enter Your Question" />
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-6"><!---=== Option 1 field===--->
                      <strong class="text-dark"><label for="question_option1">Option 1 :</label></strong>
                      <input type="text" class="form-control" id="edit_question_option1" placeholder="Enter Option 1" />
                    </div>
                    <div class="form-group col-sm-6"><!---=== Option 2 field===--->
                      <strong class="text-dark"><label for="question_option2">Option 2 :</label></strong>
                      <input type="text" class="form-control" id="edit_question_option2" placeholder="Enter Option 2" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-6"><!---=== Option 3 field===--->
                      <strong class="text-dark"><label for="question_option3">Option 3 :</label></strong>
                      <input type="text" class="form-control" id="edit_question_option3" placeholder="Enter Option 3" />
                    </div>
                    <div class="form-group col-sm-6"><!---=== Option 4 field===--->
                      <strong class="text-dark"><label for="question_option4">Option 4 :</label></strong>
                      <input type="text" class="form-control" id="edit_question_option4" placeholder="Enter Option 5" />
                    </div>
                  </div>
                  <div class="form-group"><!---=== Right Option field===--->
                    <strong class="text-dark"><label for="question_right_option">Right Option :</label></strong>
                    <input type="text" class="form-control" id="edit_question_right_option" placeholder="Enter Right Option" />
                  </div>
                  <button type="submit" class="btn bg-dark form-control" id="edit_question_btn"><span class="text-info h5">Update</span></button>
                </form>
                <!------=========== Question Edit Form End=============--------->
              </div>
              <!------=========== Card Body End=============---------> 
          </div>
       </div>
     </div>
     
  </div>
 </div>
<!------===========Edit Exam Question Modal End=============--------->

</section>
</div>
@endsection



@push('scripts')
<script>

  questions();//<!------========= Call Function ========--------->
  //<!------========= Get All Question Details ========---------> 
  function questions(){
    $.ajax({
      type: "GET",
      dataType: 'json',
      url: "/questions_details/"+{{$id}}, 
      success: function(response){
        console.log(response);
        //<!------========= Create Dynamic Data ========--------->
        var data = ""
        $.each(response, function(key,value){
        
          data = data + "<tr class='text-center'>"

          data = data + "<td class='text-left'>"
            data = data + "<input type='checkbox' name='ids' class='checkBoxClass' value="+value.id+" />"
          data = data + "</td>"
          data = data + "<td>"+(key+1)+"</td>"
            data = data + "<td>"+value.question+"</td>"
            data = data + "<td>"+value.option1+"</td>"
            data = data + "<td>"+value.option2+"</td>"
            data = data + "<td>"+value.option3+"</td>"
            data = data + "<td>"+value.option4+"</td>"
            data = data + "<td>"+value.ans+"</td>"

          data = data + "<td>"
          data =data + "<button  class='btn btn-warning btn-sm mx-1'data-toggle='modal' data-target='#Edit_Exam_Question_Modal' onclick='edit_question("+value.id+")'>Edit</button><button  class='btn btn-danger btn-sm mx-1'onclick='questions_deletes("+value.id+")'>Delete</button>"
          data = data + "</td>" 

          data = data + "</tr>"
        });
        //<!------========= At last Put Data inside tbody ========--------->
        $('tbody').html(data);
      
      }
    });
  }
  questions();//<!------========= Call Function ========--------->


  //<!------========= Add Question ========--------->
  $("#add_question_btn").click(function(e){
    e.preventDefault();

    //<!--====== Access Add  Form Data======-->
    let exam_id            =   $("#question_exam_id").val();  
    let question           =   $("#question").val();
    let question_option1   =   $("#question_option1").val();
    let question_option2   =   $("#question_option2").val();
    let question_option3   =   $("#question_option3").val();
    let question_option4   =   $("#question_option4").val();
    let question_right_option   =   $("#question_right_option").val();
    let _token =   $('meta[name="csrf-token"]').attr('content');

    //<!--====== If every field is empty ======-->
    if(question=="" || question_option1=="" || question_option2=="" || question_option3=="" || question_option4=="" || question_right_option=="")
    {
      $("#question_error").show(50);
      $("#question_error").text('Fill All The Blanks');
    }
    else{
        $.ajax({
          url: "/exam/question",
          type:"POST",//<!--====== Send Post Request  ======-->
          data:{//<!--====== Pass Data ======-->
            exam_id:exam_id,
            question:question,
            question_option1:question_option1,
            question_option2:question_option2,
            question_option3:question_option3,
            question_option4:question_option4,
            question_right_option:question_right_option,
            _token: _token//<!--====== Pass Laravel csrf token also  ======-->
          },
          success:function(response){
          console.log(response.success);
            //<!--====== If any error come form response======-->
            if(response.error)
            {
            $("#question_success").hide();//<!--====== First hide success message ======-->
            $("#question_error").show();//<!--====== Then show error message ======-->
            $("#question_error").text(response.error);//<!--====== Put error response, inside question_error message ======-->
            }
            //<!--====== If Everything is ok ======-->
            else{
            questions();//<!--====== Call questions() for dynamic show ======-->
            $("#question_form").trigger('reset');//<!--====== For Reaset Form ======-->
            $("#question_error").hide(100);//<!--====== First hide error message ======-->

            setTimeout(() => {//<!--====== 500ms latter Success message show ======-->
                $("#question_success").show(100);
                $("#question_success").text(response.success);
            }, 500);
              

              setTimeout(() => {//<!--====== 1500ms latter Success message become hide ======-->
                $("#question_success").hide(700).text("");
              }, 1500);
            }
      
          }
        })
    }

  });

  //<!------========= Delete Question ========--------->
  function questions_deletes(id)
  {

    $.ajax({
      url:"/teacher/question/delete/"+id,
      type:"GET",
      dataType:"json",
      success:function(res)
      {
        questions();
        $(".success").show();
        $(".success").html('<div class="alert bg-success text-center"><strong>Delete Data Successfully</strong></div>');
        setTimeout(() => {//<!--====== 1500ms latter Success message become blank ======-->
          $(".success").hide(700).html("");
        }, 1500);
      }
    });
  }

  //<!------========= This function for, put exist value, inside edit form ========--------->
  function edit_question(id)
  {
    $.ajax({
    type:"GET",
    dataType:"json",
    url:"/question_edit/"+id,
    success: function(res)//<!--====== Put, getting response value, inside edit form, input field ======-->
    {
      console.log(res.data[0].id);
      $("#edit_question_exam_id").val(res.data[0].exam_id);
      $("#edit_question_id").val(res.data[0].id);
      $("#edit_question").val(res.data[0].question);
      $("#edit_question_option1").val(res.data[0].option1);
      $("#edit_question_option2").val(res.data[0].option2);
      $("#edit_question_option3").val(res.data[0].option3);
      $("#edit_question_option4").val(res.data[0].option4);
      $("#edit_question_right_option").val(res.data[0].ans);
    }
    });
  } 

  //<!------========= This function for, update , edditing data ========--------->
  $("#edit_question_btn").click(function(e){
    e.preventDefault();

    //<!--====== Access Update  Form Data======-->
    let question_id        =   $("#edit_question_id").val(); 
    let question           =   $("#edit_question").val();
    let question_option1   =   $("#edit_question_option1").val();
    let question_option2   =   $("#edit_question_option2").val();
    let question_option3   =   $("#edit_question_option3").val();
    let question_option4   =   $("#edit_question_option4").val();
    let question_right_option   =   $("#edit_question_right_option").val();
    //<!--====== Get Laravel unique token for post methoad ======-->
    let _token =   $('meta[name="csrf-token"]').attr('content');

    //<!--====== If every field is empty ======-->
    if(question=="" || question_option1=="" || question_option2=="" || question_option3=="" || question_option4=="" || question_right_option=="")
    {
      $("#edit_question_error").show(50);
      $("#edit_question_error").text('Fill All The Blanks');
      }
      else{
          $.ajax({
            url: "/question_update",
            type:"POST",
            data:{//<!--====== Pass data ======-->
              question_id:question_id,
              question:question,
              question_option1:question_option1,
              question_option2:question_option2,
              question_option3:question_option3,
              question_option4:question_option4,
              question_right_option:question_right_option,
              _token: _token
            },
            success:function(response){
            console.log(response.success);
            //<!--====== If any error come form response======-->
              if(response.error)
              {
              $("#edit_question_success").hide();
              $("#edit_question_error").show();
              $("#edit_question_error").text(response.error);
              }
              //<!--====== If Everything is ok ======-->
              else{
              questions();//<!--====== Call questions() for dynamic show ======-->
              $("#question_form").trigger('reset');//<!--====== For Reaset Form ======-->
              $("#edit_question_error").hide(100);

              setTimeout(() => {//<!--====== 500ms latter Success message show ======-->
                  $("#edit_question_success").show(100);
                  $("#edit_question_success").text(response.success);
              }, 500);
                

                setTimeout(() => {//<!--====== 1500ms latter Success message hide and modal close ======-->
                  $("#edit_question_success").hide(700).text("");
                $("#edit_modal").click();
                }, 2500);
              }

              

        
            }
          });
      }

  });


  //<!------========= Select All By Checkbox========--------->
  $("#chkall").click(function(){
    $(".checkBoxClass").prop('checked', $(this).prop('checked'));
  });

  //<!------=========Send Request for Delete All Checkbox data========--------->
  $("#deleteAll").click(function(e){
      e.preventDefault();
      //<!------========= Create array for store selected item ========--------->
      var allids = [];
      //<!------========= Push every selected question vaue inside array ========--------->
      $("input:checkbox[name=ids]:checked").each(function(){
        allids.push($(this).val());
      });
      
      $.ajax({//<!------========= Send Ajax GET Request ========--------->
        type:"GET",
        url:"/allquestion/delete",
        dataType: 'json',
        data:{//<!------========= Send All selected Question Data ========--------->
          ids:allids
        },
        success:function(response)
        {  
          questions();
          $(".success").show();
          $(".success").html('<div class="alert bg-success text-center"><strong>All Data Successfully Delete </strong></div>');
          setTimeout(() => {//<!--====== 1500ms latter Success message become blank ======-->
            $(".success").hide(700).html("");
          }, 1500);
          $("#chkall").click();
        }
      });
  });

</script>
@endpush