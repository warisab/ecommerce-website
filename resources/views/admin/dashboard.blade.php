@extends('adminlayout')
<p class="alert-success">
    <?php
       $message=Session()->get('message');
       if($message)
       {
           echo $message;
           Session()->put('message',null);
       }
       
    ?>