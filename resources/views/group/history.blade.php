@extends('layouts.app')
@section('content')
    <div class="container-fluid app-body">
        <div class="row">
            <div class="col-md-12 group-col">
                <h3>Recent Post Sent to Buffer</h3>
                <div class="panel panel-default">
                    <!--
                        <form action="" method = "GET">
                        </form>
                    -->
                    <table style="width:100%">
                        <tr>
                          <th>Group Name</th>
                          <th>Group Type</th>
                          <th>Account name</th>
                          <th>Post Text</th>
                          <th>Time</th>
                        </tr>
                        @foreach($history as $buffer)
                        <tr>
                            <td class="col-md-2">{{$buffer->groupInfo ? $buffer->groupInfo->type : ''}}</td>
                            <td class="col-md-2">{{$buffer->groupInfo ? $buffer->groupInfo->name : ''}}</td>
                            <td class="col-md-2">{{$buffer->accountInfo ? $buffer->accountInfo->name : ''}}</td>
                            <td class="col-md-4">{{$buffer->post_text}}</td>
                            <td class="col-md-2">{{$buffer->sent_at}}</td>
                          </tr>
                        @endforeach
                      </table> 
                      <div class="col-md-12 text-center">
                      {{ $history->links() }}
                      </div>
                </div>
            </div>
        </div>
    </div>

@endsection
