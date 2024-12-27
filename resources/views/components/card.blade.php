@props(['trending'=>false ])
<style>
.card{
    padding: 10px;
    background-color: gray;
    border-radius: 10px; 
    width: 500px;
}
.bgred{
    background-color:red; 
}
</style>

<div @class(['bgred'=>$trending, 'card'])>
    {{ $slot }}
    <a href="{{ $attributes->get('href') }}">details</a>
    
</div>