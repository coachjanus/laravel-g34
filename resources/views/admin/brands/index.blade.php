<div>
   <h1>{{ $title }}</h1>
</div>


Hello @{{ name }}

@verbatim
    Hello {{ name }}
    Hello {{ name }}
    Hello {{ name }}

@endverbatim

@if (count($brands)==1)
    I have one record
@elseif (count($brands)>1)
    I have multiple records
@else
    I don't have eny record
@endif

@unless (count($brands) > 0)
    No brands yet
@endunless

@isset($brands)
    brands is defined and is not null
@endisset

@auth
    The user is authenticated
@endauth

@guest
    The user is not authenticated
@endguest


@for ($i=0; $i<10; $i++)
    {{$i}}
@endfor

@foreach ($brands as $brand)
    {{$brand->name}} with id {{$brand->id}}

@endforeach

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>description</th>
            <th>created</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $brand)
        
        
        <tr>
            <td>{{$brand->name}}</td>
            <td>{{$brand->description}}</td>
            <td>{{$brand->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>description</th>
            <th>created</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $brand)
        <tr style="@if ($loop->first) color:green; @endif @if ($loop->last) color:red; @endif">
            <td>{{$brand->name}}</td>
            <td>{{$brand->description}}</td>
            <td>{{$brand->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>description</th>
            <th>created</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $brand)
        <tr style="@if ($loop->even) background-color:green; @endif @if ($loop->odd) background-color:red; @endif">
            <td>{{$brand->name}}</td>
            <td>{{$brand->description}}</td>
            <td>{{$brand->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>