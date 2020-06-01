<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
         <style>
             .marg {
                 margin-top: 100px
             }
             .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
         </style>
    </head>
    <body>

        <!-- Modal -->
        {{-- @extends('imageViews.layout') --}}

        {{-- @section('content') --}}

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('gns')}}" method="post">
                            @csrf
                            {{-- <input type="hidden" name="email" value=""> --}}
                            <label for="email">Recipient's Email:</label>
                            <input type="email" name="email" required>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        {{-- modal end --}}

        <div class="container-fluid">
            <div class="row">
                <div class="content">
                    <div class="title m-b-md">
                        @if (session('success'))
                        <div class="alert alert-success">
                            <p class="msg"> {{ session('success') }}</p>
                        </div>
                        @endif
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-12">
                                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Generate <i class="glyphicon glyphicon-file"></i> PDF & Send</button>

                        </div>
                    </div>

                    <div class="row marg">
                        <div class="col-md-12" style="">
                            @if(!empty($images))
                                @foreach($images as $file)
                                    <div class="col-md-3" style="margin-bottom: 1.5em">
                                        <img src="{{ asset('uploads/'.$file->getfilename()) }}" alt="no image" width="190" height="180">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
        </div>

        {{-- @endsection --}}


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

        <script>

            $(document).ready(function(){
            $('.alert-success').fadeIn().delay(1500).fadeOut();
            });
        </script>
    </body>
</html>
