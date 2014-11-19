@extends('_layouts.default')

@section('main')

{{Former::horizontal_open()
->id('MyForm')
->secure()
->rules(['name' => 'required'])
->method('POST');}}

@if ($errors->has('baby.add'))

<div class="alert alert-error">{{ $errors->first('baby.add', ':message') }}</div>

@endif

{{Former::xlarge_text('name')
->required()->autofocus();}}


{{Former::xlarge_text('birth_date')
->required();}}

{{Former::xlarge_text('birth_time')
->required();}}


{{Former::xlarge_text('birth_place');}}


{{Former::textarea('sign')
->rows(3)->columns(100);}}


{{Former::actions()
->large_primary_submit('Submit')
->large_inverse_reset('Reset');}}

{{Former::close();}}

<script type="text/javascript">
$(function(){
    $('#birth_date').datepicker({
        autoclose: true,
        language: "zh-CN",
        format:"yyyy-mm-dd"
    });
    $('#birth_time').clockpicker({
        autoclose: true
    });

});


</script>

@stop