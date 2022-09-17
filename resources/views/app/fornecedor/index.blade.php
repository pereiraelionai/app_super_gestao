<h2>Fornecedores</h2>

{{-- Isso é um comentário --}}

@php
//Aqui é um comentário de PHP
@endphp

@forelse ($fornecedores as $indice => $fornecedor )
    Iteração atual: {{$loop->iteration}}    
    <br>
    Fornecedor: {{$fornecedor['nome']}}
    <br>
    Status: {{$fornecedor['status']}}
    <br>
    CNPJ: {{$fornecedor['CNPJ'] ?? 'Dado não foi preenchido'}} 
    <br>
    Telefone: ({{$fornecedor['ddd'] ?? ''}}) {{$fornecedor['telefone'] ?? ''}}
    <br>
    @if($loop->first)
        Primeira iteração do loop
    @endif
    @if($loop->last)
        Última iteração do loop
        <br>
        Total de registros: {{$loop->count}}
    @endif    
    <hr>
@empty
    Não existem fornecedor cadastrados!!!
@endforelse


















{{--
//-------------escapando a tag de impressão

@forelse ($fornecedores as $indice => $fornecedor )    
    Fornecedor: @{{$fornecedor['nome']}} //será impresso exatamente o que está digitado
    <br>
    Status: @{{$fornecedor['status']}}
    <br>
    CNPJ: @{{$fornecedor['CNPJ'] ?? 'Dado não foi preenchido'}} 
    <br>
    Telefone: @({{$fornecedor['ddd'] ?? ''}}) {{$fornecedor['telefone'] ?? ''}}
    <br>
    <hr>
@empty
    Não existem fornecedor cadastrados!!!
@endforelse


//-----------------------forelse

@forelse ($fornecedores as $indice => $fornecedor )    
    Fornecedor: {{$fornecedor['nome']}}
    <br>
    Status: {{$fornecedor['status']}}
    <br>
    CNPJ: {{$fornecedor['CNPJ'] ?? 'Dado não foi preenchido'}} 
    <br>
    Telefone: ({{$fornecedor['ddd'] ?? ''}}) {{$fornecedor['telefone'] ?? ''}}
    <br>
    <hr>
@empty
    Não existem fornecedor cadastrados!!!
@endforelse


//---------------foreach

@foreach ( $fornecedores as $indice => $fornecedor )    
    Fornecedor: {{$fornecedor['nome']}}
    <br>
    Status: {{$fornecedor['status']}}
    <br>
    CNPJ: {{$fornecedor['CNPJ'] ?? 'Dado não foi preenchido'}} 
    <br>
    Telefone: ({{$fornecedor['ddd'] ?? ''}}) {{$fornecedor['telefone'] ?? ''}}
    <br>
    <hr>
@endforeach


//---------------while

@php $i = 0 @endphp
@while(isset($fornecedores[$i]))
    Fornecedor: {{$fornecedores[$i]['nome']}}
    <br>
    Status: {{$fornecedores[$i]['status']}}
    <br>
    CNPJ: {{$fornecedores[$i]['CNPJ'] ?? 'Dado não foi preenchido'}} 
    <br>
    Telefone: ({{$fornecedores[$i]['ddd'] ?? ''}}) {{$fornecedores[0]['telefone'] ?? ''}}
    <br>
    <hr>
    @php $i++ @endphp
@endwhile



//--------------@for

@for($i = 0; isset($fornecedores[$i]); $i++)
    Fornecedor: {{$fornecedores[$i]['nome']}}
    <br>
    Status: {{$fornecedores[$i]['status']}}
    <br>
    CNPJ: {{$fornecedores[$i]['CNPJ'] ?? 'Dado não foi preenchido'}} 
    <br>
    Telefone: ({{$fornecedores[$i]['ddd'] ?? ''}}) {{$fornecedores[0]['telefone'] ?? ''}}
    <br>
    <hr>
@endfor


@for($i = 0; $i < 10; $i++)
    {{$i}}<br>
@endfor


//---------Switch

@switch($fornecedores[0]['ddd'])
    @case('11')
        São Paulo - SP
        @break
    @case('85')
        Fortaleza - CE
        @break
    @case('32')
        Juiz de Fora - MG
        @break
    @default
        Estado não identificado
@endswitch


// -------------------operador condicional default
@isset($fornecedores)
    Fornecedor: {{$fornecedores[0]['nome']}}
    <br>
    Status: {{$fornecedores[0]['status']}}
    <br>
    CNPJ: {{$fornecedores[0]['CNPJ'] ?? 'Dado não foi preenchido'}} 
    <!--
    Se a variável testada não esistir ou se for null o ?? aplica um valor padrão
    -->
@endisset



//------------------------------------@empty


@isset($fornecedores)
    Fornecedor: {{$fornecedores[0]['nome']}}
    <br>
    Status: {{$fornecedores[0]['status']}}
    <br>
    @isset($fornecedores[0]['CNPJ'])
        CNPJ: {{$fornecedores[0]['CNPJ']}}
        @empty($fornecedores[0]['CNPJ'])
            - Vazio
        @endempty
    @endisset
@endisset




//-------------------------@isset
@isset($fornecedores) - Verifica se a váriavel existe
    Fornecedor: {{$fornecedores[1]['nome']}}
    <br>
    Status: {{$fornecedores[1]['status']}}
    <br>
    @isset($fornecedores[1]['CNPJ'])
        CNPJ: {{$fornecedores[1]['CNPJ']}}
    @endisset
@endisset

//--------@unless executa se o retorno for falso

Fornecedor: {{$fornecedores[0]['nome']}}
<br>
Status: {{$fornecedores[0]['status']}}
<br>
@unless($fornecedores[0]['status'] == 'S')
    Fornecedor inativo
@endunless




//if e else
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Não existem fornecedores cadastrados</h3>
@endif
--}}