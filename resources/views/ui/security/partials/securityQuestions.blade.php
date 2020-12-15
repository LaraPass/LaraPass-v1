<div class="modal fade" id="security-questions" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                    <large>Setup Security Questions</large>
                </div>
                <form role="form" method="POST" action="{{ route('securityQuestions') }}">
                  @csrf
                    <div class="form-group mb-3">
                        <select name="question1" id="question1" class="form-control form-control-alternative" required="">
                          <option value="" selected disabled="">Select Question # 1</option>
                          <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                          <option value="In what city or town did your mother and father meet?">In what city or town did your mother and father meet?</option>
                          <option value="What is your favorite team?">What is your favorite team?</option>
                          <option value="What was your favorite sport in high school?">What was your favorite sport in high school?</option>
                          <option value="What is the first name of the boy or girl that you first kissed?">What is the first name of the boy or girl that you first kissed?</option>
                          <option value="What was the name of the hospital where you were born?">What was the name of the hospital where you were born?</option>
                          <option value="What school did you attend for sixth grade?">What school did you attend for sixth grade?</option>
                          <option value="In what town was your first job?">In what town was your first job?</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                            <input class="form-control" placeholder="Answer # 1" type="text" name="answer1" id="answer1" required="">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <select name="question2" id="question2" class="form-control form-control-alternative" required="">
                          <option value="" selected disabled="">Select Question # 2</option>
                          <option value="What is the name of your favorite childhood friend?">What is the name of your favorite childhood friend?</option>
                          <option value="What is the middle name of your oldest child?">What is the middle name of your oldest child?</option>
                          <option value="What is your favorite movie?">What is your favorite movie?</option>
                          <option value="What was your favorite food as a child?">What was your favorite food as a child?</option>
                          <option value="What was the make and model of your first car?">What was the make and model of your first car?</option>
                          <option value="Who is your childhood sports hero?">Who is your childhood sports hero?</option>
                          <option value="What was the last name of your third grade teacher?">What was the last name of your third grade teacher?</option>
                          <option value="What was the name of the company where you had your first job?">What was the name of the company where you had your first job?</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                            <input class="form-control" placeholder="Answer # 2" type="text" name="answer2" id="answer2" required="">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-danger my-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>