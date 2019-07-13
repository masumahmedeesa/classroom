<div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" style="color:#0f2e5c;"> Exam Performance </h3>
            </div>
            <div class="modal-body">
                <form style="color: black;">
                    <div class="row">

                        <div class="col-md-6">
                            <label> Exam Type </label>
                            <input type="text" class="form-control" name="examType1" id="examType1" placeholder="TT | Quiz | Lab">

                        </div>

                        <div class="col-md-6 ml-auto">
                            <label> Obtained Marks</label>
                            <input type="number" class="form-control" name="obtainedMarks1" id="obtainedMarks1" placeholder="Obtained Marks">
                        </div>
                    </div>


                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="examType2" id="examType2" placeholder="TT | Quiz | Lab">

                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="number" class="form-control" name="obtainedMarks2" id="obtainedMarks2" placeholder="Obtained Marks">

                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="examType3" id="examType3" placeholder="TT | Quiz | Lab">

                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="number" class="form-control" name="obtainedMarks3" id="obtainedMarks3" placeholder="Obtained Marks">

                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="examType4" id="examType4" placeholder="TT | Quiz | Lab">

                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="number" class="form-control" name="obtainedMarks4" id="obtainedMarks4" placeholder="Obtained Marks">

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="transferDataBest">Best | Close</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="transferDataBest2">Best 2 | Close</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="transferDataBest3">Best 3 | Close</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="transferDataAverage">Average | Close</button>
                {{--                <button type="button" class="btn btn-primary bth-sm" id="transferData">Send message</button>--}}
            </div>
        </div>
    </div>
</div>