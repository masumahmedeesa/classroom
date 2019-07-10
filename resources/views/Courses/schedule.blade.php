@extends('layouts.system')

@section('system')


        <div style="padding-left: 13px;">
            <a href="{{route('schedules')}}" class="btn btn-secondary btn-sm"> Go Static </a>
            <br>
            <h1 style="color: red;"> Search | Schedule | Dynamic</h1> <br>
        </div>

        <div class="container box">
            <div class="panel panel-default">
{{--                <div class="panel-heading">Search Customer Data</div>--}}
                <div class="panel-body">
                    <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Enter Session year" />
                    </div>
                    <div class="table-responsive">
{{--                        <h3 align="center">Total Data : <span id="total_records"></span></h3>--}}
                        <br>
                        <table class="table table-striped" style="color: white;">
                            <thead>
                            <tr>
                                <th>Session Year</th>
                                <th>Course Name</th>
                                <th>Course Code</th>
                                <th>Teacher Name</th>
                                <th>Credit</th>
                                <th>Class Span</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(){

                fetch_customer_data();

                function fetch_customer_data(query = '')
                {
                    $.ajax({
                        url:"{{ route('liveSearch.action') }}",
                        method:'GET',
                        data:{query:query},
                        dataType:'json',
                        success:function(data)
                        {
                            $('tbody').html(data.table_data);
                            $('#total_records').text(data.total_data);
                        }
                    })
                }

                $(document).on('keyup', '#search', function(){
                    var query = $(this).val();
                    fetch_customer_data(query);
                });
            });
        </script>

        <script type="text/javascript">

            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

        </script>


@endsection

