@php
    use Illuminate\Support\Facades\Request;
    $title = ucwords(last(str_replace('-', ' ', request()->segments())));
    if(is_numeric($title)) {
    $newTitle = count(request()->segments())-1;
    $title = ucwords(str_replace('-', ' ', Request::segment($newTitle)));
    }
    if($title) { 
    $title = $title . ' |'; 
    }
@endphp
<title>@if (trim($__env->yieldContent('title'))) @yield('title') | @else {{$title}} @endif Urban Overstock</title>