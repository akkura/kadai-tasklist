@extends('layouts.app')

@section('content')

   
    
<div class="row">
    <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
     <h1>メッセージ新規作成ページ</h1>
     {!! Form::model($task,['route' => 'tasks.store']) !!}
     
      <div class="form-group">    
        {!! Form::label('status', 'ステータス:') !!}
        {!! Form::text('status',null,['class' => 'form-control']) !!}
      </div>
      
      <div class="form-group"> 
        {!! Form::label('content','メッセージ:') !!}
        {!! Form::text('content',null,['class' => 'form-control']) !!}
      </div>
      
        {!! Form::submit('投稿',['class' => 'btn btn-primary']) !!}
    
    {!! Form::close() !!}
        
    </div>
</div>

@endsection